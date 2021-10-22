/************************************************
 * Solution to problem Copying Books from       *
 * ACM Central European Regional Contest 1998   *
 * - Specification:                             *  
 *  http://acm.fi.uva.es/problemset/v7/714.html *
 ************************************************
 * Author: Reuber Guerra Duarte                 *
 * e-mail: reuber@dcc.ufmg.br                   *
 * home-page: www.dcc.ufmg.br/~reuber           *
 * Last updated: 05/11/2000                     * 
 ************************************************/

/* @JUDGE_ID: xxxxxx 714 C "Binary search" */

#include <stdio.h>
#include <assert.h>

#define MAX 500

typedef long INTEGER;
INTEGER books[MAX];
INTEGER mark[MAX+1];
INTEGER N, m, k;

int isPossible(INTEGER value) {
  INTEGER i, s, b, sum = 0;
  s = k;
  b = m;
  while (s > 0) {
    if (sum + books[b - 1] <= value) {
      sum += books[b - 1];
      b--;
      if (b < s) {
	s--;
	break;
      }
    }
    else {
      sum = 0;
      s--;
      if (b == s) break;
    }
  }
  if (s == 0 && b > 0)
    return 0;
  return 1;
}

void makeMark(INTEGER value) {
  INTEGER s = k - 1, sum = 0, i, j;
  INTEGER b = m - 1;
  int first = 1;
  mark[k] = m;
  for (s = k - 1; s >= 0; s--) {
    for (sum = 0; sum + books[b] <= value && b >= s; ) {
      sum += books[b];
      mark[s] = b;
      b--;
    }
  }
  for (i = 0; i < k; i++) {
    if (i > 0) printf(" /");
    for (j = mark[i]; j < mark[i + 1]; j++) {
      if (first) first = 0;
      else printf(" ");
      printf("%ld", books[j]);
    }
  }
  printf("\n");
}

INTEGER search() {
  INTEGER max, min, c, sum, i, j, n, t, value;
  sum = 0;
  max = 0;
  for (i = 0; i < m; i++) {
    sum += books[i];
    if (books[i] > max) max = books[i];
  }
  min = sum / k;
  if (sum % k != 0)
    min++;
  if (max > min) min = max;
  max = 0;
  if (m % k == 0) {
    n = m / k;
    t = k + 1;
  }
  else {
    n = m / k + 1;
    t = m % k;
  }
  j = 0;
  c = 0;
  for (i = 0; i < k; i++) {
    if (i == t) n--;
    sum = 0;
    for (c = 0; c < n; c++, j++)
      sum += books[j];
    if (sum > max) max = sum;
  }
  value = (max + min)/2;
  while (max > min) {
    if (isPossible(value))
      max = value;
    else min = value + 1;
    value = (max + min)/2;
  }
  return value;
}

int main(void) {
  INTEGER i, j, min;
  int dummy;
  dummy = scanf("%ld", &N);
  for (i = 0; i < N; i++) {
     dummy = scanf("%ld %ld", &m, &k);
     for (j = 0; j < m; j++) {
       dummy = scanf("%ld", &books[j]);
     }
     min = search();
     makeMark(min);
  }
  return 0;
}
