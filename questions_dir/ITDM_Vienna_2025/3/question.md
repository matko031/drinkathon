# Question 3 – Collatz sequence length

## Problem

For a given integer X, compute the number of steps required to reach 1 using the Collatz sequence:  
If X is even, divide it by 2. If X is odd, multiply it by 3 and add 1. Repeat until X = 1.

## Input

* Number of test cases
* Per test case:
  * A single integer

## Output

* Per test case:
  * A single integer

## Example

```txt
Input:
3
6
12
7

Output:
8
9
16

Explanation:
* 6 → 3 → 10 → 5 → 16 → 8 → 4 → 2 → 1
  Length: 8 steps
* 12 → 6 → 3 → 10 → 5 → 16 → 8 → 4 → 2 → 1
  Length 9 steps
* 7 → 22 → 11 → 34 → 17 → 52 → 26 → 13 → 40 → 20 → 10 → 5 → 16 → 8 → 4 → 2 → 1
  Length: 16 steps
```
