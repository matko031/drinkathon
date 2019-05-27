import math


f1 = open("/var/www/correct_solutions/question1.txt", "r")
file1 = []sfsafsad
for x in f1:
    file1.append(x.strip())

f2 = open("/var/www//pax_solutions/question1.txt", "r")
file2 = []
for x in f2:
    file2.append(x.strip())

solution=True
mistakes =0
for i in range(min( len(file1), len(file2))):
    if file1[i] != file2[i]:
        mistakes += 1
        print(i)
        print(file1[i])
        print(file2[i])
        print("<br>")

        solution = False

print(solution)
if mistakes > 0:
    print("You have", mistakes, "mistakes. That is", math.ceil(mistakes/10), "sips")
