/* @JUDGE_ID: xxxxxx 445 C++ */

#include <stdio.h>
#include <assert.h>
#include <string.h>

char lastWasNewLine;
int count = 0;
int countLine = 0;

void put(char ch) {
  int i;
  if (ch == '\n') {
    if (lastWasNewLine) {
      printf("\n\n");
      count = 0;
      countLine = 0;
    }
    else lastWasNewLine = 1;
    return;
  }
  if (!((ch >= '0' && ch <= '9') || (ch == '!') ||
     (ch >= 'A' && ch <= 'Z')||(ch == 'b')||(ch == '*')))
    return;
  lastWasNewLine = 0;
  if (ch == '!') {
    assert(countLine <= 132);
    printf("\n");
    countLine = 0;
  }
  else if (ch >= '0' && ch <= '9') {
    count += ch - '0';
  }
  else {
    assert(count > 0);
    countLine += count;
    for (i = 0; i < count; i++)
      if (ch == 'b') printf(" ");
      else printf("%c", ch);
    count = 0;
  }
}


int main() {
  char ch;
  lastWasNewLine = 1;
  count = 0;
  countLine = 0;
  while (1 == scanf("%c", &ch))
    put(ch);
  return 0;
}