/* @JUDGE_ID: xxxxxx 444 C++ */

#include <stdio.h>
#include <assert.h>
#include <string.h>

char message[10000];
char result[10000];
int valid[128];
int count;

void init() {
  int i;
  for (i = 0; i < 128; i++)
    valid[i] = 0;
  for (i = (int)'a'; i <= (int)'z'; i++)
    valid[i] = 1;
  for (i = (int)'A'; i <= (int)'Z'; i++)
    valid[i] = 1;
  valid[' '] = 1;
  valid['!'] = 1;
  valid[','] = 1;
  valid['.'] = 1;
  valid[':'] = 1;
  valid[';'] = 1;
  valid['?'] = 1;
}

int getsLine(char s[]) {
  int i = 0;
  int dec = 1;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
     if (ch != '\r') s[i++] = ch;
     if (ch >= '0' && ch <= '9') dec = 2;
     if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return dec;
}

int main() {
  int len;
  int len1;
  char number[10];
  int k, i, j, t;
  init();
  while (0 != (k = getsLine(message))) {
    len = strlen(message);
    //assert(len <= 80);
    if (k == 1) /* encode */ {
      for (i = len - 1; i >= 0; i--) {
	sprintf(number, "%d", (int)message[i]);
	for (j = strlen(number) - 1; j >= 0; j--)
	  printf("%c", number[j]);
      }
    }
    else {  /* decode */
      count = 0;
      j = 0;
      t = 0;
      for (i = len - 1; i >= 0; ) {
	while (t < 3 && !valid[j]) {
	   j = j * 10;
	   j += message[i] - '0';
	   t++;
	   i--;
	}
	assert(valid[j]);
	printf("%c", (char)j);
	t = 0; j = 0;
      }
    }
    printf("\n");
  }
  return 0;
}
