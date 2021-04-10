import random
N = 100


def calculate_squares(n, k):
    squares = []
    for i in range(1, n+1):
        if i % k == 0:
            squares.append(str(i*i))
    return squares


with open('input', 'w') as f:
    f.write(str(N) + "\n")
    for i in range(N):
        n = random.randint(1, 1000)
        k = random.randint(1, 100)
        f.write(str(n) + " " + str(k) + "\n")


with open('input', 'r') as f_in:
    f_in.readline()
    with open('output', 'w') as f_out:
        for i in range(N):
            n, k = f_in.readline().split()
            n, k = int(n), int(k)
            squares = " ".join(calculate_squares(n, k)).strip()
            f_out.write(str(i+1) + " " + squares + "\n")
