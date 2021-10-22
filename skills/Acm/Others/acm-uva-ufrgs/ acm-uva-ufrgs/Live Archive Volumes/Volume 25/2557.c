/* 
 * A solution for "The Drunk Jailer" problem.
 * UVa ID: 2557
 * 
 * Problem description:
 * http://acmicpc-live-archive.uva.es/nuevoportal/data/problem.php?p=2557
 */
#include <stdio.h>

int main() {
  int n;
  int a;
  int i;
  int j;
  scanf("%d",&n);
  for (i=0;i<n;i++) {
    scanf("%d",&a);
    j = 1;
    while (j*j <= a) {
      j++;
    };
    printf("%d\n",j-1);
  };
  return 0;
};