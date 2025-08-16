/* @JUDGE_ID: xxxxxx 429 C++ */
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>
#define MAX 200

char line[10000];
int n;
char words[MAX][11];
int queue[MAX];
int head, tail;
int val[MAX];

int a[MAX][MAX];

int w1, w2;

int find(char s[]) {
  int i;
  for (i = 0; i < n; i++)
    if (strcmp(s, words[i]) == 0) return i;
  assert(i < n);
  return -1;
}

void put(char s[]) {
  strcpy(words[n], s);
  n++;
  assert(n <= MAX);
}

void init() {
  int i, j, len1, len2;
  int k, dif;
  for (i = 0; i < n; i++)
    for (j = i; j < n; j++) {
      len1 = strlen(words[i]);
      len2 = strlen(words[j]);
      if (len1 != len2) {
	a[i][j] = 0;
	a[j][i] = 0;
      }
      else {
	dif = 0;
	for (k = 0; k < len1 && dif <= 1; k++)
	  if (words[i][k] != words[j][k]) dif++;
	if (dif == 1) {
	  a[i][j] = 1;
	  a[j][i] = 1;
	}
	else {
	  a[i][j] = 0;
	  a[j][i] = 0;
	}
      }
    }
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  s[0] = '\0';
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r') s[i++]  = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;
}

int visit(int w1) {
  int i;
  int k;
  for (i = 0; i < n; i++)
    val[i] = -1;
  head = 0;
  tail = 0;
  queue[tail++] = w1;
  val[w1] = 0;
  while (head != tail) {
    k = queue[head++];
    for (i = 0; i < n; i++)
      if (val[i] < 0 && a[k][i]) {
	queue[tail++] = i;
	val[i] = val[k] + 1;
	if (i == w2) return val[i];
      }
  }
  return -1;
}

int main() {
  int i, dummy, np, d;
  char word1[100], word2[100];
  char word[100];
  getsLine(line);
  dummy = sscanf(line, "%d", &np);
  assert(dummy == 1);
  getsLine(line);
  for (i = 1; i <= np; i++) {
    n = 0;
    while (getsLine(line)) {
      dummy = sscanf(line, "%s", word);
      assert(dummy == 1);
      if (strcmp(word, "*") == 0) break;
      put(word);
    }
    init();
    while (getsLine(line)) {
      dummy = sscanf(line, "%s %s", word1, word2);
      assert(dummy == 2);
      w1 = find(word1);
      w2 = find(word2);
      d = visit(w1);
      printf("%s %s %d\n", word1, word2, d);
    }
    printf("\n");
  }
  return 0;
}
