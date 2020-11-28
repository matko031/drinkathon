import random
N = 100

with open('input', 'w') as f:
    f.write(str(N) + '\n')
    for i in range(N):
        n1 = random.randint(1,1000)
        n2 = random.randint(1,1000)
        f.write(str(n1) + " " + str(n2) + "\n")

with open('input', 'r') as f_in:
    f_in.readline()
    with open('output', 'w') as f_out:
        for i in range(N):
            n1, n2 = f_in.readline().split()
            n1, n2 = int(n1), int(n2)
            if n1*n2 < 1500:
                f_out.write(str(n1*n2) + '\n')
            else:
                f_out.write(str(n1+n2) + '\n')


