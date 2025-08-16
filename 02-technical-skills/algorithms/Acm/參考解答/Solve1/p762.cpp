/* @JUDGE_ID: xxxxxxx 762 C++ */

#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

#define MAX (26 * 26 + 1)

int n;
int na;
int cities[MAX][MAX];
char names[MAX][10];

int queue[MAX];
int head, tail;
int parent[MAX];

void init() {
  head = 0;
  tail = 0;
}

int get_code(char s[]) {
  int i;
  for (i = 0; i < n; i++)
    if (strcmp(s, names[i]) == 0) return i;
  strcpy(names[n], s);
  for (i = 0; i <= n; i++) {
    cities[i][n] = -1;
    cities[n][i] = -1;
  }
  parent[n] = -1;
  return n++; 
}

void search(int n1, int n2) {
  int k, j;
  queue[tail++] = n1;
  while (head != tail) {
    k = queue[head++];
    for (j = 0; j < n; j++)
      if (parent[j] < 0 && j != k && cities[k][j] >= 0) {
        parent[j] = k;
        if (j == n2) return;        
        queue[tail++] = j;
      }
  }
}

void print_route(int n1, int n2) {
  if (n2 == n1) return;
  print_route(n1, parent[n2]);
  printf("%s %s\n", names[parent[n2]], names[n2]);  
}

int main() {
  char c1[100], c2[100];
  int n1, n2, np = 0;
  int i;
  while (1 == scanf("%d", &na)) {
    init();
    n = 0;
    for (i = 0; i < na; i++) {
      scanf("%s %s", c1, c2);
      n1 = get_code(c1);
      n2 = get_code(c2);
      cities[n1][n2] = i;
      cities[n2][n1] = i;
    }
    scanf("%s %s", c1, c2);
    n1 = get_code(c1);
    n2 = get_code(c2);
    search(n1, n2);    
    if (np > 0) printf("\n");
    np++;
    if (parent[n2] >= 0) {
      print_route(n1, n2);
    }
    else printf("No route\n");
  }
  return 0;
}
