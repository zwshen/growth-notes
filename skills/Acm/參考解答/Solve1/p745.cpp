/****************************************************
 * Solution to problem Numeric Puzzles Again! from  *
 * ACM South America Regional Contest 1999          *
 * - Specification:                                 *
 *  http://acm.uva.es/problemset/v7/745.html        *
 ****************************************************
 * Author: Reuber Guerra Duarte                     *
 * e-mail: reuber@dcc.ufmg.br                       *
 * home-page: www.dcc.ufmg.br/~reuber               *
 * Last updated: 05/11/2000                         *
 ****************************************************/

/* @JUDGE_ID: xxxxxx 745 C++ */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int len;
int p;
double sum, max;

typedef struct piece {
  int a[22][22];
  int m, n;
};

piece pieces[21];
int puzzle[21][21];
int answer[21][21];
int bak[21][21];
int find;
void error() {
  int um = 1, zero = 0;
  um = um / zero;
}

void findSum() {
  int i, j;
  double mult = 1.0;
  sum = 0.0;
  for (i = 0; i < len; i++) {
    mult = 1.0;
    for (j = len - 1; j >= 0; j--) {
      sum += ((double)puzzle[i][j]) * mult;
      mult *= 10.0;
    }
  }
  if (sum > max) {
    for (i = 0; i < len; i++)
      for (j = 0; j < len; j++)
	answer[i][j] = puzzle[i][j];
    max = sum;
  }
}

void rotate() {
  int i, j;
  for (i = 0; i < len; i++)
    for (j = 0; j < len; j++)
       bak[i][j] = puzzle[i][j];
  for (i = 0; i < len; i++)
    for (j = 0; j < len; j++)
      puzzle[j][len - i - 1] = bak[i][j];
}

void solve(int k) {
  int i, j, m, n;
  int nao = 0;
  if (k == p) {
    find = 1;
    return;
  }
  else {
    for (i = 0; i < len; i++) {
      if (i + pieces[k].m > len) break;
      for (j = 0; j < len; j++) {
	nao = 0;
	if (j + pieces[k].n > len) break;
	for (m = 0; m < pieces[k].m; m++) {
	  for (n = 0; n < pieces[k].n; n++)
	    if (puzzle[i + m][j + n] != 0 &&
		pieces[k].a[m][n] != 0) {
	      nao = 1;
	      break;
	    }
	  if (nao) break;
	}
	if (!nao) {
	  for (m = 0; m < pieces[k].m; m++)
	    for (n = 0; n < pieces[k].n; n++)
	       if (pieces[k].a[m][n] != 0)
		 puzzle[i + m][j + n] = pieces[k].a[m][n];
	  solve(k + 1);
	  if (find) return;
	  for (m = 0; m < pieces[k].m; m++)
	    for (n = 0; n < pieces[k].n; n++)
	       if (pieces[k].a[m][n] != 0)
		 puzzle[i + m][j + n] = 0;
	}
      }
    }
  }
}

void print() {
  int i, j;
  if (!find) {
    printf("No solution\n");
    error();
  }
  max = -1.0f;
  findSum();
  rotate();
  findSum();
  rotate();
  findSum();
  rotate();
  findSum();
  for (i = 0; i < len; i++) {
    for (j = 0; j < len; j++)
      printf("%d", answer[i][j]);
    printf("\n");
  }
  printf("\n");
}

int getsLine(char line[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    line[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  line[i++] = '\0';
  return i;
}

int main() {
  char line[1000];
  int r, c;
  int next, i, j, k = -1, t;
  while (1 == scanf("%d\n", &len)) {
    if (len == 0) break;
    getsLine(line);
    p = atoi(line);
    for (i = 0; i < p; i++) {
      pieces[i].m = 0;
      pieces[i].n = 0;
      for (j = 0; j <= 20; j++)
	for (k = 0; k <= 20; k++)
	  pieces[i].a[j][k] = 0;
    }
    next = -1;
    for (i = -1; ; ) {
      getsLine(line);
      if (line[0] == '#') break;
      for (j = 0; j < strlen(line); j++)
	 if (line[j] >= '0' && line[j] <= '9')
	   if ((line[j] - '0') != next) {
	     i++;
	     next = line[j] - '0';
	     r = -1;
	     break;
	   }
      c = 0;
      r++;
      for (j = 0; j < strlen(line); j++)
	 if (line[j] >= '0' && line[j] <= '9') {
	   pieces[i].a[r][c++] = line[j] - '0';
	   if (c > pieces[i].n) pieces[i].n = c;
	 }
	 else if (line[j] == ' ')
	   pieces[i].a[r][c++] = 0;
      pieces[i].m = r + 1;
    }
    /*
    for (k = 0; k < p; k++) {
      // removes empty columns
      for (j = pieces[k].n - 1; j >= 0; j--) {
	for (i = 0; i < pieces[k].m; i++)
	  if (pieces[k].a[i][j] != 0) break;
	if (i < pieces[k].n) break;
	else pieces[k].n = j;
      }
      // removes empty lines
      for (i = pieces[k].m - 1; i >= 0; i--) {
	for (j = 0; j < pieces[k].n; j++)
	  if (pieces[k].a[i][j] != 0) break;
	if (j < pieces[k].n) break;
	else pieces[k].m = i;
      }
      for (j = 0; j < pieces[k].n; j++) {
        for (i = pieces[k].m - 1; i >= 0; i--) 
          if (pieces[k].a[i][j] != 0) {
            break;
          }
        if (i >= 0) break;
      }
     
      if (j != 0) {
        for (t = j; t < pieces[k].n; t++)
          for (i = 0; i < pieces[k].m; i++)
            pieces[k].a[i][t - j] = pieces[k].a[i][t];
         pieces[k].n = pieces[k].n - j; 
      }
    }
    */
    for (i = 0; i < len; i++)
      for (j = 0; j < len; j++)
	puzzle[i][j] = 0;
    find = 0;
    solve(0);
    print();
  }
  return 0;
}


       

   
