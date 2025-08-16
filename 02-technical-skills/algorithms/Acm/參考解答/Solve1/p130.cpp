/* @JUDGE_ID:  xxxxxx 130  C++  */

#include <stdio.h>
#include <string.h>

int queue[101];
int n, k;

void roman() {
  int count, i, next = -1;
  int killed;
  for (i = 0; i < n; i++)
    queue[i] = i + 1;
  count = 0;
  i = n;
  while (i > 1) {
    count = 0;
    while (count < k) {
      next = (next + 1) % n;
      if (queue[next]) count++;
    }
    killed = next;
    queue[next] = 0;
    count = 0;
    next--;
    while (count < k) {
      next = (next + 1) % n;
      if (queue[next]) count++;
    }
    queue[killed] = queue[next];
    queue[next] = 0;
    next = killed;
    i--;
  }
  for (i = 0; i < n; i++)
    if (queue[i]) {
       if (queue[i] == 1)
	 printf("1\n");
       else printf("%d\n", n - queue[i] + 2);
       break;
    }
}

int main() {
  while (scanf("%d %d", &n, &k)) {
    if (n == 0 && k == 0) break;
    roman();
  }
  return 0;
}
