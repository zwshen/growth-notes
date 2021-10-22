/* @JUDGE_ID:  xxxxxx  338  C++  */

/* Author: Reuber Guerra Duarte(reuber@dcc.ufmg.br) */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
int n;
long long x, y, product;

void multiply() {
  product = (long long)(x)*(y);
}

void print(char ch, int i) {
  int j;
  for (j = 1; j <= i; j++)
    printf("%c", ch);
}

int digits(long long r) {
  int i = 0;
  if (r == 0) return 1;
  while (r > 0) {
    r = r / 10;
    i++;
  }
  return i;
}

void print() {
  int d1, d2, d3, max, i;
  long long temp, temp_n;
  int count = 0;
  d3 = digits(product);
  max = d3;
  d1 = digits(x);
  d2 = digits(y);
  if (d1 > max) max = d1;
  if (d2 > max) max = d2;
  print(' ', max - d1);
  printf("%lld\n", x);
  print(' ', max - d2);
  printf("%lld\n", y);
  if (d2 > d1) d1 = d2;
  print(' ', max - d1);
  print('-', d1);
  printf("\n");
  temp = y;
  while (temp > 0) {
    if (temp % 10 != 0) count++;
    temp = temp / 10;
  }
  temp = y;
  if (y > 9) {
    n = digits(y);
    for (i = 0; i < n; i++)
      {
        temp_n = (long long)((long long)temp % 10)*(x);
        d1 = digits(temp_n);
        if (temp_n > 0) {
          print(' ', max - d1 - i);
          printf("%lld\n", temp_n);
        }
        temp = temp / 10;
      }
    print('-', d3);
    printf("\n");
  }
  print(' ', max - d3);
  printf("%lld\n", product);
  printf("\n");
}

void error() {
  int um = 1, zero = 0;
  um = um / zero;
}

int main() {
  char p[30];
  int i = 0;
  while (1 == scanf("%lld", &x)) {
    if (x == 0) {
      if (1 != scanf("%lld", &y)) break;
    }
    else scanf("%lld", &y);
    if (x < 0 || y < 0) error();
    multiply();
    print();
  }
  return 0;
}
