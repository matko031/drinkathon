from flask import Flask, render_template, request, redirect, url_for, flash, session
from flask_mysqldb import MySQL
from wtforms import Form, StringField, TextAreaField, PasswordField, validators
from passlib.hash import sha256_crypt
from functools import wraps
import os, stat, subprocess
app = Flask(__name__)

#Config MySQL
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'matko031'
app.config['MYSQL_PASSWORD'] = 'matko49627'
app.config['MYSQL_DB'] = 'matko031_drinkathon'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'

# init MYSQL
mysql = MySQL(app)


@app.route('/')
@app.route('/home')
def homepage():
    return render_template('homepage.html')

@app.route('/about')
def about():
    return render_template('about.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    form = RegisterForm(request.form)
    if request.method == 'POST' and form.validate():
        team_name = form.team_name.data
        pax1 = form.pax1.data
        pax2 = form.pax2.data
        email = form.email.data
        password = sha256_crypt.hash(str(form.password.data))

        cur = mysql.connection.cursor()

        query = "INSERT INTO teams(name, pax1, pax2, email, password) VALUES(%s, %s, %s, %s, %s)"
        cur.execute(query, [team_name, pax1, pax2, email, password])
        mysql.connection.commit()

        pwd = os.getcwd()
        os.makedirs(pwd+'/teams/'+team_name, exist_ok=True)

        cur.close()
        flash('You are sucesfully registered', 'success')

        return redirect(url_for('homepage'))

    return render_template('register.html', form=form)

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        team_name = request.form['team_name']
        password_candidate = request.form['password']

        cur = mysql.connection.cursor()

        query = "SELECT * FROM teams WHERE name = %s"
        result = cur.execute(query, [team_name])

        if result > 0:
            data = cur.fetchone()
            password = data['password']

            if sha256_crypt.verify(password_candidate, password):
                session['logged_in'] = True
                session['team_name'] = team_name

                flash('You are now logged in', 'success')
                return redirect(url_for('homepage'))


            else:
                error = 'Invalid login'
                return render_template('login.html', error=error)

            cur.close()

        else:
            error = 'Username not found'
            return render_template('login.html', error=error)


    return render_template('login.html')

def is_logged_in(f):
    @wraps(f)
    def wrap(*args, **kwargs):
        if 'logged_in' in session:
            return f(*args, **kwargs)
        else:
            flash('Unathorized, please log in', 'danger')
            return redirect(url_for('login'))

    return wrap

@app.route('/logout')
def logout():
    session.clear()
    flash('You are now logged out', 'success')
    return redirect(url_for('homepage'))


@app.route('/questions')
def questions():
    cur = mysql.connection.cursor()
    query = "SELECT name FROM questions"
    cur.execute(query)
    result = cur.fetchall()
    cur.close()

    return render_template('choose_question.html', questions=result)


@app.route('/choose_question')
def choose_question():
    cur = mysql.connection.cursor()
    query = "SELECT name, id FROM questions"
    cur.execute(query)
    result = cur.fetchall()
    cur.close()

    return render_template('choose_question.html', questions=result)


@app.route('/submit/<string:id>', methods=['GET', 'POST'])
@is_logged_in
def submit(id):

    if request.method == 'GET':
        code=''
        pwd = os.getcwd()
        dir_path = pwd+'/teams/'+session['team_name']+'/'+str(id)

        cur = mysql.connection.cursor()
        query = "SELECT name FROM questions WHERE id=%s"
        cur.execute(query, [str(id)])
        result = cur.fetchone
        cur.close()


        if not os.path.exists(dir_path):
            os.mkdir(dir_path)

            f = open(dir_path + "/" + "/error", "w+")
            f.close()

            f = open(dir_path + "/" + "output", "w+")
            f.close()

            f = open(dir_path + "/" + "/code.py", "w+")
            f.close()

        if os.path.exists(dir_path+"/code.py"):
            f = open(dir_path+"/code.py", "r")
            code = f.read()
            f.close()

        else:
            flash('Code file does not exist', 'danger')
            return redirect(url_for('homepage'))

        return render_template('submit.html', code=code, id=id)

    else:
        code = request.form['code']
        team_dir = os.getcwd()+"/teams/"+session['team_name']+"/"+str(id)
        qdir = os.getcwd()+"/static/questions"+"/nl/"+str(id)

        code_file = team_dir + "/code.py"
        err_file = team_dir + "/error"
        team_output_file = team_dir + "/output"

        question_input_file = qdir + "/input"
        question_output_file = qdir + "/output"


        f = open(question_input_file, 'r')
        question_input = f.read()
        f.close()

        f = open(question_output_file, 'r')
        question_output = f.read()
        f.close()

        f = open(code_file, 'w+')
        f.write(code)
        f.close

        #os.chmod(code_file, stat.S_IEXEC)
        command = "ulimit -t 2 && cat " + question_input + " | python3 " + code_file + " 2>" + err_file + " 1>"+ team_output_file;
        print(command)
        subprocess.call(command, shell=True)

        return redirect(url_for('result'))


@app.route('/result')
def result():
    return render_template('result.html')

@app.route('/team')
@is_logged_in
def team():
    return render_template('team.html')


class RegisterForm(Form):
    team_name = StringField('Team Name', [validators.Length(min=1, max=20)])
    pax1 = StringField('Participant 1', [validators.Length(min=1, max=20)])
    pax2 = StringField('Participant 2', [validators.Length(min=1, max=20)])
    email = StringField('Email', [validators.Length(min=6, max=30)])
    password = PasswordField('Password', [validators.DataRequired(), validators.EqualTo('confirm', message='Passwords do not match') ])
    confirm = PasswordField('Confirm Password')




if __name__=='__main__':
    app.secret_key='483uriovnjosJKD73g8i'
    app.run(debug=True)