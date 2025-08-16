/*************************************************
 * Solution to problem Heads / Tails Probability *
 * - Specification:                              *
 *  http://acm.fi.uva.es/problemset/v4/474.html  *
 *************************************************
 * Author: Reuber Guerra Duarte                  *
 * e-mail: reuber@dcc.ufmg.br                    *
 * home-page: www.dcc.ufmg.br/~reuber            *
 * Last updated: 05/11/2000                      *
 *************************************************/

/* @JUDGE_ID: xxxxxx 474 C++ */
#include <stdio.h>
#include <math.h>

double log2e;
void print(int k) {
  int y;
  double x;
  y = (int)ceil((double)k * log10(2));
  x = pow(2, y*log2e - k);
  printf("2^-%d = %.3lfe-%d\n", k, ((int)(x * 1000.0 + 0.5))/1000.0,
         y);
}

int main() {
  int i;
  log2e = 1/log10(2);
  while (1 == scanf("%d", &i)) 
    print(i);
  return 0;
}  
