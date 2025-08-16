/* @JUDGE_ID: xxxxxx 471 C++ */

#include <stdio.h>
#include <assert.h>
#define MAX 9876543210ll
int d[10];
int valid(long long a) {
  int i;
  for (i = 0; i < 10; i++)
    d[i] = 0;
  while (a > 0) {
    if (d[a % 10]) return 0;
    d[a % 10] = 1;
    a = a / 10;
  }
  return 1;
}

int main() {
  int i, pn;
  char temp[10000];
  long long n;
  long long k, p;
  scanf("%d", &pn);
  for (i = 0; i < pn; i++) {
    scanf("%s", temp);
    assert(strlen(temp) <= 10);
    sscanf(temp, "%lld", &n); 
    k = 1;
    p = n;
    printf("\n");
    while (p <= (long long)MAX) {
      if (valid(p) && valid(k))
        printf("%lld / %lld = %lld\n", p, k, n);
      k++;
      p += n;
    }    
  } 
  printf("\n");
  return 0;
}
