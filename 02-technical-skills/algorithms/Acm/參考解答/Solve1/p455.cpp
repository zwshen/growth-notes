/* @JUDGE_ID: xxxxxx 455 C++ */

#include <stdio.h>
#include <string.h>

int main() {
  char word[100];
  int n, i, j, k, len;
  scanf("%d", &n);
  for (i = 0; i < n; i++) {
    scanf("%s", word);
    len = strlen(word);
    for (j = 1; j < len; j++)
      if (len % j == 0) {
	for (k = j; k < len; k++)
	  if (word[k] != word[k % j])
	    break;
	if (k == len) break;
      }
    printf("%d\n\n", j);
  }
  return 0;
}
