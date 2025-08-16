/* @JUDGE_ID: xxxxxx 459 C++ */
#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>

#define maxV 27
#define unseen 5000
int V;
int a[maxV][maxV];

/* DFS - Depth-first search */
int val[maxV];
int id = 0;
int conec = 0;
int n;

void visit(int k) {
  int t;
  val[k] = ++id;
  for (t = 1; t <= V; t++)
    if (a[k][t] != 0)
      if (val[t] == unseen) visit(t);
}

void search() {
  int k;
  for (k = 1; k <= V; k++) {
    val[k] = unseen;
  }
  for (k = 1; k <= V; k++)
    if (val[k] == unseen) {
      conec++;
      visit(k);
    }
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  int dummy;
  dummy = scanf("%c", &ch);
  if (dummy == 0) return 0;
  while (ch != '\n') {
    if (ch != '\r') s[i++] = ch;
    dummy = scanf("%c", &ch);
    if (dummy == 0) break;
  }
  s[i] = '\0';
  return i;
}

int adjmatrix() {
  int x, y;
  int dummy;
  char s[100], str[5];
  char c;
  conec = 0;
  dummy = getsLine(s);
  dummy = sscanf(s, "%s", str);
  assert(dummy == 1);
  c = str[0];
  assert(c >= 'A' && c <= 'Z');
  V = c - 'A' + 1;
  for (x = 1; x <= V; x++)
    for (y = 1; y <= V; y++)
       a[x][y] = 0;
  for (x = 1; x <= V; x++) a[x][x] = 1;
  while (getsLine(s)) {
    assert(strlen(s) >= 2);
    assert(s[0] >= 'A' && s[0] <= 'Z');
    assert(s[1] >= 'A' && s[1] <= 'Z');
    a[s[1] - 'A' + 1][s[0] - 'A' + 1] = 1;
    a[s[0] - 'A' + 1][s[1] - 'A' + 1] = 1;
  }
  return 1;
}

int main() {
  int i, dummy;
  char s[100];
  dummy = getsLine(s);
  dummy = sscanf(s, "%d", &n);
  assert(dummy == 1);
  assert(n > 0);
  getsLine(s);
  printf("\n");
  for (i = 1; i <= n; i++) {
    dummy = adjmatrix();
    assert(dummy == 1);
    search();
    printf("%d\n\n", conec);
  }
  return 0;
}
