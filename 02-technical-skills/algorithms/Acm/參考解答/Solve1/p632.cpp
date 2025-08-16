/* @JUDGE_ID: xxxxxx 632 C++ */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define MAX 2001

char words[MAX][MAX];
char s1[MAX];
int N;
int count;

void error() {
  int um = 1, zero = 0;
  um = um / zero;
}

int stringCmp(void const* a, void const* b) {
  char *aa = (char*)a; 
  char *bb = (char*)b; 
  return (strcmp(aa, bb));
} 

int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r')
      s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;
}
  
void fillTable() {
  int i, j;
  for (i = 1; i < N; i++) {
    for (j = 0; j < N; j++)
      words[i][j] = words[0][(i + j) % N];
    words[i][N] = '\0';
  }
}

int main() {
  int pn, i, j;
  char line[100];
  getsLine(line);
  sscanf(line, "%d", &pn);
  for (i = 0; i < pn; i++) {
    while (1) {
      getsLine(line);
      if (1 == sscanf(line, "%d", &N)) break;
    }
    count = 0;
    strcpy(words[0], "");
    while (count < N) {
      getsLine(line); 
      if (strlen(line) == 50) {
        strcat(words[0], line);
        count += 50;
      }
      else if (strlen(line) < 50) {
        strcat(words[0], line);
        count += strlen(line);
        //if (count < N) error();
      }
    }
    if (i > 0) printf("\n");
    if (N < 2) {
      error();
    }
    fillTable();
    strcpy(s1, words[1]);
    qsort(words,N,MAX,stringCmp);
    for (j = 0; j < N; j++)
      if (strcmp(words[j], s1) == 0) {
	printf("%d\n", j);
      }
    for (j = 0; j < N; j++) {
      if (j != 0 && j % 50 == 0) printf("\n");
      printf("%c", words[j][N - 1]);
    }
    printf("\n");
  }
  return 0;
} 
 
