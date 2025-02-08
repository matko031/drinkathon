import random

def collatz_steps(n):
    steps = 0
    while n != 1:
        n = n // 2 if n % 2 == 0 else 3 * n + 1
        steps += 1
    return steps

def generate_test_cases():
    with open("input", "w") as infile, open("output", "w") as outfile:
        infile.write("100\n")  # Number of test cases
        for _ in range(100):
            num = random.randint(1, 10**6)
            infile.write(f"{num}\n")
            outfile.write(f"{collatz_steps(num)}\n")

generate_test_cases()
