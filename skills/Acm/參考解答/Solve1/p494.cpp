/* @JUDGE_ID: xxxxxx 494 C++ */
#include <stdio.h>

int count;
int lastWasLetter;
char ch;

void put(char ch) {
  if ((ch >= 'a' && ch <= 'z') || (ch >= 'A' && ch <= 'Z')) {
    if (!lastWasLetter) {
      count++;
      lastWasLetter = 1;
    }
  }
  else if (ch == '\n') {
    printf("%d\n", count);
    lastWasLetter = 0;
    count = 0;
  }
  else lastWasLetter = 0; 
}

int main() {
  count = 0;
  lastWasLetter = 0;
  while (1 == scanf("%c", &ch))
    put(ch);
  if (ch != '\n') put(ch);
  return 0; 
}
