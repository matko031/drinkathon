
f1 = open("correct_solution.txt", "r")
file1 = []
for x in f1:
    file1.append(x.strip())

f2 = open("../pax_solutions/pax_solution.txt", "r")
file2 = []
for x in f2:
    file2.append(x.strip())

solution=True
for i in range(len(file1)):
    if file1[i] != file2[i]:
        print(i)
        print(file1[i])
        print(file2[i])
        print("")
        
        solution = False

f3 = open("../test_result.txt")
f3.write(solution)
f3.close()

    

    



