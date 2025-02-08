import random
import string

def random_word(length):
    return ''.join(random.choice(string.ascii_lowercase) for _ in range(length))

def random_sentence():
    return ' '.join(random_word(random.randint(3, 10)) for _ in range(random.randint(1, 6)))

def reverse_sentence(sentence):
    return ' '.join(word[::-1] for word in sentence.split()[::-1])

def generate_test_cases():
    with open("input", "w") as infile, open("output", "w") as outfile:
        infile.write("100\n")  # Number of test cases
        for _ in range(100):
            sentence = random_sentence()
            infile.write(sentence + "\n")
            outfile.write(reverse_sentence(sentence) + "\n")

generate_test_cases()
