/* @JUDGE_ID: xxxxxx 483 C++ */

#include <stdio.h>
#include <ctype.h>
#include <string.h>

char word[10000];

int main() {
  int i = 0;
  int k = 1, t;
  char ch;
  k = scanf("%c", &ch);
  while (k == 1) {
    while (isgraph(ch)) {
       word[i++] = ch;
       k = scanf("%c", &ch);
       if (k != 1) break; 
    }
    if (i > 0) {
      word[i] = '\0';
      for (t = strlen(word) - 1; t >= 0; t--)
        printf("%c", word[t]);
      i = 0;
    }
    if (k != 1) break;
    while (!isgraph(ch)) {
       printf("%c", ch);
       k = scanf("%c", &ch);
       if (k != 1) break; 
    }
  }
  return 0;
}
