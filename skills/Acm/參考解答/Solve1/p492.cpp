/* @JUDGE_ID: xxxxxx 492 C++ */

#include <string.h>
#include <stdio.h>

int index;

int main() {
  index = 0;
  char consoant = 0;
  char ch;
  while (1 == scanf("%c", &ch)) {
    if ((ch >= 'a' && ch <= 'z')||(ch >= 'A' && ch <= 'Z')) {
      if (index == 0) {
        if ((ch == 'a') || (ch == 'A') || (ch == 'e') || (ch == 'E') ||
           (ch == 'i') || (ch == 'I') || (ch == 'o') || (ch == 'O') ||
           (ch == 'u') || (ch == 'U')) { 
          printf("%c", ch);
        }
        else {
          consoant = ch;
        }
      }
      else printf("%c", ch);
      index++;
    } 
    else {
      if (index > 0) {
        if (consoant) printf("%c", consoant);
        printf("ay");
      }
      index = 0; consoant = 0;
      printf("%c", ch);
    }
  }
  if (index > 0) {
    if (consoant) printf("%c", consoant);
    printf("ay");
  }
  return 0;
}
