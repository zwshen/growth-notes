/* @JUDGE_ID: xxxxxx 457 C++ */
#include <stdio.h>
#include <stdlib.h>
#include <assert.h>
#include <string.h>

int dishes[42];
int newDishes[42];
int dna[10];

void simulate(int k) {
  int i, j, count, temp;
  for (i = 1; i <= k; i++) {
    for (j = 1; j <= 40; j++) {
      switch (dishes[j]) {
        case 1: printf("."); break;
        case 2: printf("x"); break;
        case 3: printf("W"); break;
        case 0: printf(" "); break;
      }
    }
    printf("\n");
    for (j = 1; j <= 40; j++) 
      newDishes[j] = dna[dishes[j - 1] + dishes[j] + dishes[j + 1]];
    for (j = 1; j <= 40; j++)
      dishes[j] = newDishes[j];
  }
}

int main() {
  int i, n, j, dummy;
  scanf("%d", &n);
  dishes[0] = 0;
  dishes[41] = 0;
  printf("\n");
  for (i = 0; i < n; i++) {
    for (j = 0; j < 10; j++) scanf("%d", &dna[j]);
    for (j = 1; j <= 40; j++)
      dishes[j] = 0;
    dishes[20] = 1;
    simulate(50);
    printf("\n");
  }
  return 0;
}
