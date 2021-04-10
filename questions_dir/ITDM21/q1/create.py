import random
N = 100

with open('input', 'w') as f:
    f.write(str(N) + '\n')
    for i in range(N):
        n1 = random.randint(1,1000)/10
        n2 = random.randint(1,1000)/10
        if random.randint(1,100) > 50:
            n1 = float(int(n1))
        if random.randint(1, 100) > 90:
            n2 = float(int(n2))
        f.write(str(n1) + " " + str(n2) + "\n")


with open('input', 'r') as f_in:
    f_in.readline()
    with open('output', 'w') as f_out:
        for i in range(N):
            n1, n2 = f_in.readline().split()
            n1, n2 = float(n1), float(n2)
            prod = n1 * n2
            if float(int(prod)) == prod:
                f_out.write(str(round(float(n1+n2),2)) + '\n')
            else:
                f_out.write(str(round(float(n1*n2),2)) + '\n')


