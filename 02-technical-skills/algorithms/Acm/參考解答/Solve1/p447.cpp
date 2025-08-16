/* @JUDGE_ID: xxxxxx 447 C++ */
#include <stdio.h>
#include <assert.h>

int old_quarters[21][21];
int new_quarters[21][21];

int copy(int from[21][21], int to[21][21]) {
  int i, j;
  for (i = 0; i < 21; i++)
    for (j = 0; j < 21; j++)
       to[i][j] = from[i][j];

}

int init(int a[21][21]) {
  int i, j;
  for (i = 0; i < 21; i++)
    for (j = 0; j < 21; j++)
       a[i][j] = 0;
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

void print(int a[21][21]) {
  int i, j;
  for (i = 1; i <= 20; i++) {
    for (j = 1; j <= 20; j++)
      if (a[i][j]) printf("O");
      else printf(" ");
    printf("\n");
  }
  for (i = 1; i <= 20; i++)
    printf("*");
  printf("\n");
}

int there_is(int i, int j) {
  if (i >= 1 && i <= 20 && j >= 1 && j <= 20) 
    return old_quarters[i][j];
  return 0;
}

void execute() {
  int i, j, count;
  for (i = 1; i <= 20; i++) 
    for (j = 1; j <= 20; j++) {
      count = 0;
      count += there_is(i + 1, j - 1);
      count += there_is(i + 1, j);
      count += there_is(i + 1, j + 1);
      count += there_is(i - 1, j - 1);
      count += there_is(i - 1, j);
      count += there_is(i - 1, j + 1);
      count += there_is(i, j + 1);
      count += there_is(i, j - 1);
      if (old_quarters[i][j]) {
        if (count == 2 || count == 3)
          new_quarters[i][j] = 1;
        else new_quarters[i][j] = 0;
      }   
      else {
        if (count == 3)
          new_quarters[i][j] = 1;
        else new_quarters[i][j] = 0;
      }
    }
}

int main() {
  int i, t, np, j,  dummy, x, y, a;
  char line[1000];
  getsLine(line);
  dummy = sscanf(line, "%d", &np);
  assert(dummy == 1);
  getsLine(line);
  printf("\n");
  for (t = 1; t <= np; t++) {
    init(old_quarters);
    init(new_quarters);
    getsLine(line);
    dummy = sscanf(line, "%d", &a);
    assert(dummy == 1); 
    while (getsLine(line)) {
      dummy = sscanf(line, "%d %d", &x, &y);
      assert(dummy == 2); 
      old_quarters[x][y] = 1;
    }
    for (i = 1; i <= 20; i++)
      printf("*");
    printf("\n");
    print(old_quarters); 
    for (j = 2; j <= a; j++) {
      execute();
      copy(new_quarters, old_quarters);
      print(new_quarters); 
    }
    printf("\n");
  }
  return 0;
}
