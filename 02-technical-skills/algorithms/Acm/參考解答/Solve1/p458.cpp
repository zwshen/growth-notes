/* @JUDGE_ID: xxxxxx 458 C++ */

#include <stdio.h>

int main() {
  char ch;
  while (1 == scanf("%c", &ch)) 
    if (ch == '\n') printf("\n");
    else printf("%c", (char)((ch + 249) % 256));
  return 0;
}
