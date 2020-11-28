import random
N = 100


def output_sum(n):
    res = ""
    s = 0
    for i in range(n):
        s += i
        res += "{} {}\n".format(i, s)
    return res


with open('input', 'w') as f:
    list_len = random.randint(1, 15)
    for i in range(N):
        lis = []
        list_len = random.randint(1,100)
        for j in range(list_len):
            lis.append(random.randint(1, 200))
        f.write(str(lis) + "\n")


"""
with open('input', 'r') as f_in:
    f_in.readline()
    with open('output', 'w') as f_out:
        for i in range(N-1):
            n = int(f_in.readline())
            f_out.write(output_sum(n))
"""