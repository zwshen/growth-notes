/* @JUDGE_ID:  xxxxxx  489  C++  */

#include <stdio.h>
#include <string.h>
int round;
int letters[30];
int guess[30];
int wrong;
int nletters;

void error() {
  int um = 1, zero = 0;
  um = um / zero;
}
int getsLine(char s[]) {
   int i = 0;
   char ch;
   if (1 != scanf("%c", &ch)) return 0;
   while (ch != '\n') {
     s[i++] = ch;
      if (1 != scanf("%c", &ch)) break;
   }
   s[i] = '\0';
   return i;
}
int main() {
  char ch;
  char line[100];
  char round[1000];
  int win = 0;
  int i = 0;
  while (getsLine(line)) {
    if (!sscanf(line, "%s", round)) error();
    if (strcmp(round, "-1") == 0)
      break;
    for (i = 0; i < 26; i++) {
      letters[i] = 0;
      guess[i] = 0;
    }
    wrong = 0;
    win = 0;
    while (1 == scanf("%c", &ch)) {
      if (ch == '\n') break;
      if (ch >= 'a' && ch <= 'z') {
	letters[ch - 'a'] = 1;
      }
    }
    nletters = 0;
    for (i = 0; i < 26; i++)
      if (letters[i]) nletters++;

    while (1 == scanf("%c", &ch)) {
      if (ch == '\n') break;
      if (ch >= 'a' && ch <= 'z') {
        if (!guess[ch - 'a']) {
	  if (letters[ch - 'a']) {
	    // right
	    nletters--;
            if (nletters <= 0 && wrong < 7)
              win = 1;
	  }
	  else // wrong
	    wrong++;
	  guess[ch - 'a'] = 1;
	}
        else wrong++;
      }
    }
    printf("Round %s\n", round);
    if (win)
      printf("You win.\n");
    else if (wrong >= 7)
      printf("You lose.\n");
    else printf("You chickened out.\n");
  }
  return 0;
}
