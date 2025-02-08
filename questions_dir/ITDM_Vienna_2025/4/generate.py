import random

MODULO = 1_000_000_007

def sequence_stats(numbers):
    max_num = max(numbers)
    min_num = min(numbers)
    sum_num = sum(numbers)
    product_num = 1
    for num in numbers:
        product_num = (product_num * num) % MODULO
    return max_num, min_num, sum_num, product_num

def generate_test_cases():
    with open("input", "w") as infile, open("output", "w") as outfile:
        infile.write("100\n")  # Number of test cases
        for _ in range(100):
            n = random.randint(2, 10)  # Number of integers in the sequence
            numbers = [random.randint(1, 1000) for _ in range(n)]
            infile.write(" ".join(map(str, numbers)) + "\n")
            outfile.write(" ".join(map(str, sequence_stats(numbers))) + "\n")

generate_test_cases()
