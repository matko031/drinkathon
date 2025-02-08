# Question 4 – The Code Knights and the Drunken Droid’s Puzzle

## Story

A long time ago, in a galaxy far, far away…
The Code Knights, a group of elite Rebel programmers, spent their days writing algorithms and their nights drinking Corellian ale while debating the best way to sort numbers in O(n log n) time.
One fateful evening, their astromech droid, R2-IPA, rolled into the cantina, beeping erratically. It had intercepted an important Imperial security code hidden inside a sequence of numbers. Unfortunately, due to excessive oil shots and overclocking, R2-IPA had scrambled the numbers.
The message was still there, but the only way to decode it was to extract the most important values. The Code Knights needed to act fast—but they were drunk, and math was suddenly harder than usual.
Can you help them decrypt the sequence before the Empire updates its security protocols?

## Problem

Given a sequence of N integers, find and output:

* The largest number in the sequence.
* The smallest number in the sequence.
* The sum of all numbers in the sequence.
* The product of all numbers in the sequence modulo 1,000,000,007 (to prevent massive numbers).

## Input

* Number of test cases
* Per test case:
  * A single line containing N space-separated integers

## Output

* Per test case:
  * Four space-separated integers:
    * Max number
    * Min number
    * Sum of numbers
    * Product of numbers modulo 1,000,000,007

## Example

```txt
Input:
2
3 7 2 9 5
10 20 30 40

Output:
9 2 26 1890
40 10 100 240000

Explanation:
* Max = 9
  Min = 2
  Sum = 3 + 7 + 2 + 9 + 5 = 26
  Product = (3 × 7 × 2 × 9 × 5) % 1,000,000,007 = 1890
```
