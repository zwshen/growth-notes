/* @JUDGE_ID:  xxxxxx  101  C++  */

#include <stdio.h>
#include <string.h>

int stacks[25][25];
int n;
int top[25];

int search(int k) {
  int i, j;
  for (i = 0; i < n; i++)
    for (j = 0; j < top[i]; j++)
      if (stacks[i][j] == k) return i;
  return -1;
}

void restore(int k, int stackk) {
  int i, j, p;
  for (i = 0; i < top[stackk]; i++)
    if (stacks[stackk][i] == k) break;
  for (j = i + 1; j < top[stackk]; j++) {
    p = stacks[stackk][j];
    stacks[p][top[p]++] = p;
  }
  top[stackk] = i + 1;
}

void pile(int a, int stacka, int stackb) {
  int i, j, k;
  for (i = 0; i < top[stacka]; i++)
    if (stacks[stacka][i] == a) break;
  for (j = i; j < top[stacka]; j++)
    stacks[stackb][top[stackb]++] = stacks[stacka][j];
  top[stacka] = i;
}

int main() {
  char command[50];
  char type[50];
  int a, b, stacka, stackb;
  int i, j;
  while (1 == scanf("%d", &n)) {
    if (n == 0) break;
    for (i = 0; i < n; i++)
      top[i] = 1;
    for (i = 0; i < n; i++)
      stacks[i][0] = i;
    scanf("%s", command);
    while (strcmp(command, "quit") != 0) {
      scanf("%d %s %d", &a, type, &b);
      stacka = search(a);
      stackb = search(b);
      if (stacka >= 0 && stackb >= 0 && stacka != stackb) {
	if (strcmp(command, "move") == 0) {
	  if (strcmp(type, "onto") == 0) {
	    restore(a, stacka);
	    restore(b, stackb);
	    pile(a, stacka, stackb);
	  }
	  else if (strcmp(type, "over") == 0) {
	    restore(a, stacka);
	    pile(a, stacka, stackb);
	  }
	}
	else if (strcmp(command, "pile") == 0) {
	  if (strcmp(type, "onto") == 0) {
	    restore(b, stackb);
	    pile(a, stacka, stackb);
	  }
	  else if (strcmp(type, "over") == 0) {
	    pile(a, stacka, stackb);
	  }
	}
      }
      scanf("%s", command);
    }
    for (i = 0; i < n; i++) {
      printf("%2d:      ", i);
      for (j = 0; j < top[i]; j++)
	printf(" %d", stacks[i][j]);
      printf("\n");
    }
  }
  return 0;
}
