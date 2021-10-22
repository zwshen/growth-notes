/* @JUDGE_ID:  xxxxxx  469  C++  */

#include <stdio.h>
#include <assert.h>
#include <string.h>

#define MAX 100

typedef struct point {
  int r, c;
};

int nr, nc;

int pn;
point stack[MAX * MAX];
int top;
int cells[MAX][MAX];
int visited[MAX][MAX];
int count;

void push(int r, int c) {
  if (r >= 0 && c >= 0 && r < nr && c < nc && cells[r][c] &&
      !visited[r][c]) {
    visited[r][c] = 1;
    stack[top].r = r;
    stack[top++].c = c;
    count++;
  }
}

int visit(int r, int c) {
  int i, j;
  point k;
  top = 0;
  for (i = 0; i < nr; i++)
    for (j = 0; j < nc; j++)
      visited[i][j] = 0;
  assert(cells[r][c]);
  count = 1;
  visited[r][c] = 1;
  stack[top].r = r;
  stack[top++].c = c;

  while (top > 0) {
    k = stack[--top];
    r = k.r;
    c = k.c;
    push(r - 1, c - 1);
    push(r - 1, c);
    push(r - 1, c + 1);
    push(r, c - 1);
    push(r, c + 1);
    push(r + 1, c - 1);
    push(r + 1, c);
    push(r + 1, c + 1);
  }
  printf("%d\n", count);
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r') s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;    
}

int main() {
  int n, dummy, len, x, y, i, j;
  char line[1000];
  getsLine(line);
  dummy = sscanf(line, "%d", &n);
  assert(dummy == 1);
  getsLine(line);
  for (i = 1; i <= n; i++) {
    nc = -1;
    nr = 0;
    while (getsLine(line)) {
       len = strlen(line);
       assert(len <= 99);
       if (line[0] == 'W' || line[0] == 'L') {
         if (nc >= 0) assert(len == nc);
         else nc = len;
         for (j = 0; j < len; j++)
           if (line[j] == 'W') cells[nr][j] = 1;
         else cells[nr][j] = 0;
         nr++;
       }
       else {
         dummy = sscanf(line, "%d %d", &x, &y);
         assert(dummy == 2);
         visit(x - 1, y - 1);
       }
    }
    printf("\n");
  }
  return 0;
}
