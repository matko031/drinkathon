import random
N = 100



def output_sum(n):
    res = ""
    previous = 0
    for i in range(n):
        res += "{} {}\n".format(i, i+previous)
        previous=i
    return res


with open('input', 'w') as f:
    for i in range(N):
        n = random.randint(1, 200)
        f.write(str(n) + "\n")



with open('input', 'r') as f_in:
    f_in.readline()
    with open('output', 'w') as f_out:
        for i in range(N-1):
            n = int(f_in.readline())
            f_out.write(output_sum(n))
