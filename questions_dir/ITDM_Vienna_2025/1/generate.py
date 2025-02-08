import random

def sum_of_digits(n):
    return sum(int(digit) for digit in str(n))

def generate_test_cases():
    with open("input", "w") as infile, open("output", "w") as outfile:
        infile.write("100\n")  # Number of test cases
        for _ in range(100):
            num = random.randint(1, 10**9)
            infile.write(f"{num}\n")
            outfile.write(f"{sum_of_digits(num)}\n")

generate_test_cases()
