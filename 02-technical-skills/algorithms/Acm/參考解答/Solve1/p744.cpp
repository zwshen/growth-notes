/************************************************
 * Solution to problem Triangular Museum from   *
 * ACM South America Regional Contest 1999      *
 * - Specification:                             *
 *  http://acm.fi.uva.es/problemset/v7/744.html *
 ************************************************
 * Author: Reuber Guerra Duarte                 *
 * e-mail: reuber@dcc.ufmg.br                   *
 * home-page: www.dcc.ufmg.br/~reuber           *
 * Last updated: 05/11/2000                     *
 ************************************************/

/* @JUDGE_ID: xxxxxx 744 C++ */
#include <stdio.h>
#include <assert.h>
#include <string.h>
#define MAX 50
typedef struct move {
  int a;
  int b;
} move;

move moves[1000];

char names[1000][10];
int current[MAX][2*MAX + 10];
int end[MAX][2*MAX + 10];
int K;
int count = 0;
int r, c;
int n, n_moves;

int search(char s[]) {
  int i;
  for (i = 0; i < n; i++)
    if (strcmp(s, names[i]) == 0)
      return i;
  strcpy(names[n], s);
  n++;
  return n - 1;
}

void put_move(int a, int b) {
  moves[n_moves].a = a;
  moves[n_moves].b = b;
  n_moves++;
}

void find(int v, int *r, int *c) {
  int i, j;
  for (i = 1; i <= K; i++)
    for (j = 1; j <= 2*i - 1; j++)
       if (current[i][j] == v) {
	 *r = i;
	 *c = j;
	 return;
       }
  return;
}

void change(int r1, int c1, int r2, int c2) {
  int temp;
  put_move(current[r1][c1], current[r2][c2]);
  temp = current[r1][c1];
  current[r1][c1] = current[r2][c2];
  current[r2][c2] = temp;
}

void exchange(int ro, int co, int rd, int cd) {
  int i, mr, mc, cc;
  // r1 e c1 = from
  // r2 e c2 = to
  assert(rd <= ro); 
  if (rd == ro) {
    if (co <= cd) {
      for (i = co; i < cd; i++)
	change(rd, i, rd, i + 1);
    }
    else {
      for (i = co; i > cd; i--)
	change(rd, i, rd, i - 1);
    }
  }
  else if (rd < ro) {
    while (co < 2*ro - 2) {
      change(ro, co, ro, co + 1);
      co++;
    }
    while (ro != rd) {
      if (co % 2 == 1) {
	change(ro, co, ro, co - 1);
	co--;
      }
      else {
	change(ro, co, ro - 1, co - 1);
	co--;
	ro--;
      }
    }
    while (co != cd) {
      change(ro, co, ro, co - 1);
      co--;
    }
  }
}

void fix(int r, int c) {
  int r2, c2;
  find(end[r][c], &r2, &c2);
  exchange(r2, c2, r, c);
}

void init() {
  int i, j;
  n = 0;
  n_moves = 0;
}

int readProblem() {
  int i, j, k;
  char temp[100];
  scanf("%d", &K);
  if (K == 0) return 0;
  init();
  for (i = 1; i <= K; i++)
    for (j = 1; j <= 2*i - 1; j++) {
      scanf("%s", temp);
      k = search(temp);
      current[i][j] = k;
   }
  for (i = 1; i <= K; i++)
    for (j = 1; j <= 2*i - 1; j++) {
      scanf("%s", temp);
      k = search(temp);
      end[i][j] = k;
    }
  return 1;
}

int main() {
  int i, j;
  while (readProblem()) {
    for (i = 1; i <= K; i++)
      for (j = 1; j <= 2*i - 1; j++)
	 fix(i, j);
    printf("%d\n", n_moves);
    for (i = 0; i < n_moves; i++)
      printf("%s %s\n", names[moves[i].a], names[moves[i].b]);
    printf("\n");
  }
  return 0;
}

