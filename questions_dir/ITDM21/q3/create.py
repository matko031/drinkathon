import random
N = 100


with open('input', 'w') as f:
    f.write(str(N) + "\n")
    for n in range(N):
        num = random.randint(1, 1000000)
        num_str = str(num)
        perm = []
        for i in range(len(num_str)):
            perm.append(str(random.randint(1, len(num_str))))
        f.write(num_str + " " + "".join(perm).strip() + "\n")






with open('input', 'r') as f_in:
    f_in.readline()
    with open('output', 'w') as f_out:
        for i in range(N):
            num, perm = f_in.readline().split()
            output = ""
            for j in perm:
                output += num[int(j)-1]
            f_out.write(str(i+1) + " " + output + "\n")


