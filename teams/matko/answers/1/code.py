alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']

row1 = input()
row2 = input()
row3 = input()

row1=list(row1)
row2=list(row2)
row3=list(row3)
rows = [row1,row2,row3]

encoding = {}
counter = 0
for letter in alphabet:
 ls = []
 for row in rows:
  ls.append(row[counter*2])
  ls.append(row[counter*2+1])
 encoding[str(ls)]=letter
 counter +=1


nb_test = int(input())
for i in range(nb_test):
 row1 = input()
 row2 = input()
 row3 = input()

 row1=list(row1)
 row2=list(row2)
 row3=list(row3)
 rows = [row1,row2,row3]
 inpt=[]

 for j in range(int(len(row1)/2)):
  ls=[]
  for row in rows:
   ls.append(row[j*2])
   ls.append(row[j*2+1])
  inpt.append(str(ls))
 output=""
 for term in inpt:
  output += encoding[term]
 print(str(i+1+1)+" "+output)
