/* @JUDGE_ID: xxxxxx 454 C++ */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define MAX 100
int N;
int letters[100][52];
char lines[100][MAX];

void count() {
  int t;
  int i, len;
  for (t = 0; t < N; t++) {
    len = strlen(lines[t]);
    for (i = 0; i < 52; i++)
      letters[t][i] = 0;
    for (i = 0; i < len; i++) {
      if (lines[t][i] >= 'a' && lines[t][i] <= 'z')
	letters[t][lines[t][i] - 'a']++;
      else if (lines[t][i] >= 'A' && lines[t][i] <= 'Z')
	letters[t][lines[t][i] - 'A' + 26]++;
    }
  }
}
void addWord(char word[]) {
  strcpy(lines[N], word);
  N++;
}

int cmp(const void *a, const void *b) {
  char *c = (char *)a;
  char *d = (char *)b;
  return strcmp(c, d);
}
/*
  int i. j, min;
  char temp[MAX];
  for (i = 0; i < N - 1; i++) {
    min = i;
    for (j = i + 1; j < N; j++)
      if (strcmp(lines[j], lines[min]) < 0)
	 min = j;
    strcpy(temp, lines[min]);
    strcpy(lines[min], lines[i]);
    strcpy(lines[i], temp);
  }
} */

void sort() {
  qsort(lines, N, MAX, cmp);
}

int equal(int i, int j) {
  int k;
  for (k = 0; k < 52; k++)
    if (letters[i][k] != letters[j][k]) return 0;
  return 1;
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch !=  '\n') {
    if (ch != '\r') s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;
}
int main() {
   char temp[MAX];
   int np, i, j, k;
   getsLine(temp);
   sscanf(temp, "%d", &np);
   getsLine(temp);
   for (i = 0; i < np; i++) {
     N = 0;
     while (getsLine(temp)) addWord(temp);
     sort();
     count();
     for (j = 0; j < N; j++)
       for (k = j + 1; k < N; k++)
	 if (equal(j, k)) printf("%s = %s\n", lines[j], lines[k]);
     printf("\n");
   }
   return 0;
}