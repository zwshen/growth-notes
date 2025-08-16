/* @JUDGE_ID: xxxxxx 100 C++ */ 

#include <stdio.h>
#include <math.h>

/* Maximum value for j */
#define MAX 10000

/* holds previously computed values */
int table[MAX + 1];

/**
  * Computes the maximum cycle length over all numbers between i
  * and j.
  *
  * @param i Start of the interval
  * @param j End of the interval
  *
  * NOTE: j >= i
  */
int cycle(int i, int j) {
  int t, max, number, nc;
  max = 0;
  /* For each number t inside the interval (i, j), computes the
     cycle length (cycle(t) = k_t). 

     cycle(i) = k_i
     cycle(i + 1) = k_i+1
     ...
     cycle(t) = k_t
     ...
     cycle(j) = k_j

     maximum_cycle = maximum value of cycle(c), where i <= c <= j
             
    */
  for (t = i; t <= j; t++) {
    nc = 0;
    number = t;

    /* This loop continues while we don't found a previously 
       computed value. */
    while (number > MAX || table[number] < 0) {
      nc++;
      if (number % 2 == 1) 
        /* if number is odd then number = 3 * number + 1   
        /* number = number + (number << 1) + 1 = number + 2 * number + 1
                  = 3 * number + 1 */ 
        number += (number << 1) + 1;  /* number << 1 == 2 * number */
 
      else 
        /* if number is even then number = number / 2  */
        number = (number >> 1);  /* number >> 1 = number / 2 */
    }
    /* We obtain the cycle length of the current number */
    nc += table[number];
 
    /* Stores the computed value. */
    table[t] = nc;

    /* Updates the maximum cycle length. */
    if (nc > max) max = nc;
  }

  /* Returns the maximum cycle length. */
  return max;
}

int main() {
  int i, j;
  /* Initializes the table that stores previously computed values. */
  for (i = 0; i <= MAX; i++)
    table[i] = -1;
  /* Sets the answer for 1. */
  table[1] = 1;
  /* For each pair of integers i and j, determines the maximum cycle
     length over all numbers between i and j. */
  while (2 == scanf("%d %d", &i, &j))    
    /* Prints the answer for the current pair */
    /* NOTE: j must be equal greater than i (j >= i). If i is 
             greater than j, exchanges i and j. */
    printf("%d %d %d\n", i, j, cycle(i < j ? i: j, i < j ? j: i));
  return 0;
}
