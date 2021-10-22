/****************************************************
 * Solution to problem Domino Game from             *
 * ACM South America Regional Contest 1999          *
 * - Specification:                                 *
 *  http://acm.uva.es/problemset/v7/742.html        *
 ****************************************************
 * Author: Reuber Guerra Duarte                     *
 * e-mail: reuber@dcc.ufmg.br                       *
 * home-page: www.dcc.ufmg.br/~reuber               *
 * Last updated: 05/11/2000                         *
 ****************************************************/
/* @JUDGE_ID:  xxxxxx  742  C++  */

#include <stdio.h>
#include <string.h>

#define RED 0
#define GREEN 1
#define START 0
#define END 1
#define NORMAL 0
#define INVERTED 1

typedef struct piece {
  int p1;
  int p2;
};

piece pieces[2][20];
int used[2][20];
int count[2];
int canWin[2];
int players[2];
int n;
int nj;
piece tab[30];
int sent[30];
void error() {
  int um = 1, zero = 0;
  um = um  / zero;
}

void verify() {
  int i;
  for (i = 0; i < nj - 1; i++)
    if (sent[i] == NORMAL) {
      if (sent[i + 1] == NORMAL) {
	if (tab[i].p2 != tab[i + 1].p1) error();
      }
      else if (tab[i].p2 != tab[i + 1].p2) error();
    }
    else if (sent[i + 1] == NORMAL) {
      if (tab[i].p1 != tab[i + 1].p1) error();
    }
    else if (tab[i].p1 != tab[i + 1].p2) error();
}

void defineFirst() {
  int i, p;
  int max = RED;
  int index = -1;
  int maxValue = -1;
  for (p = RED; p <= GREEN; p++)
    for (i = 0; i < n; i++) {
      if (pieces[p][i].p1 == pieces[p][i].p2 &&
	  pieces[p][i].p1 > maxValue) {
	max = p;
	index = i;
	maxValue = pieces[p][i].p1;
      }
    }
  if (maxValue < 0) error();
  tab[0] = pieces[max][index];
  sent[0] = NORMAL;
  nj = 1;
  count[max]--;
  used[max][index] = 1;
  players[0] = max;
  players[1] = 1 - max;
}

void init() {
  int p, i;
  for (p = RED; p <= GREEN; p++) {
    for (i = 0; i < n; i++)
      used[p][i] = 0;
    canWin[p] = 0;
    count[p] = n;
  }
  nj = 0;
  defineFirst();
}

int getNumber(int j) {
   if (j == START) {
     if (sent[0] == INVERTED) return tab[0].p2;
     return tab[0].p1;
   }
   else if (j == END) {
     if (sent[nj - 1] == INVERTED) return tab[nj - 1].p1;
     return tab[nj - 1].p2;
   }
   error();
   return -1;
}

void remove(int pos) {
  int i;
  if (pos == START) {
    for (i = 1; i < nj; i++) {
      tab[i - 1] = tab[i];
      sent[i - 1] = sent[i];
    }
  }
  tab[nj - 1].p1 = -1;
  tab[nj - 1].p2 = -1;
  sent[nj - 1] = 0;
  nj--;
  //verify();
}

void debug() {
  int i;
  for (i = 0; i < nj; i++)
    if (sent[i] == NORMAL)
      printf(" |%d %d|", tab[i].p1, tab[i].p2);
    else printf(" |%d %d|", tab[i].p2, tab[i].p1);
  printf("\n\n");

}

int canPut(int i, int j) {
  int k;
  if (nj == 0) return 1;
  if (pieces[i][j].p1 == getNumber(START)) return 1;
  if (pieces[i][j].p2 == getNumber(START)) return 1;
  if (pieces[i][j].p1 == getNumber(END)) return 1;
  if (pieces[i][j].p2 == getNumber(END)) return 1;
  return 0;
}

int put(int i, int j, int pos) {
  int k;
  if (nj == 0) {
    tab[nj] = pieces[i][j];
    sent[nj] = NORMAL;
    nj++;
    return 1;
  }
  else if (pos == START) {
    if (pieces[i][j].p1 == getNumber(START)) {
      for (k = nj; k >= 1; k--) {
	tab[k] = tab[k - 1];
	sent[k] = sent[k - 1];
      }
      tab[0] = pieces[i][j];
      sent[0] = INVERTED;
      nj++;
      //verify();
      return 1;
    }
    else if (pieces[i][j].p2 == getNumber(START)) {
      for (k = nj; k >= 1; k--) {
	tab[k] = tab[k - 1];
	sent[k] = sent[k - 1];
      }
      tab[0] = pieces[i][j];
      sent[0] = NORMAL;
      nj++;
      //verify();
      return 1;
    }
  }
  else if (pos == END) {
    if (pieces[i][j].p1 == getNumber(END)) {
      tab[nj] = pieces[i][j];
      sent[nj] = NORMAL;
      nj++;
      //verify();
      return 1;
    }
    else if (pieces[i][j].p2 == getNumber(END)) {
      tab[nj] = pieces[i][j];
      sent[nj] = INVERTED;
      nj++;
      //verify();
      return 1;
    }
  }
  return 0;
}

void play(int p, int canp) {
  int i, j;
  for (i = 0; i < n; i++)
    if (!used[p][i]) {
      for (j = END; j >= START; j--) {
	if (put(p, i, j)) {
	  used[p][i] = 1;
	  count[p]--;
	  if (count[p] == 0) {
	     //if (!canWin[p]) debug();
	     canWin[p] = 1;
	  }
	  else play(1 - p, 1);
	  if (canWin[0] && canWin[1]) return;
	  count[p]++;
	  used[p][i] = 0;
	  remove(j);
	}
      }
    }
  for (i = 0; i < n; i++)
    if (!used[p][i])
      if (canPut(p, i)) break;
  if (i >= n) {
    if (canp)
      play(1 - p, 0);
  }
}

void print() {
  int cond;
  cond = canWin[0] + 2*canWin[1];
  switch (cond) {
    case 0: printf("No players can win\n");
	    break;
    case 1: printf("Only player Red can win\n");
	    break;
    case 2: printf("Only player Green can win\n");
	    break;
    case 3: printf("Both players can win\n");
	    break;
  }
}

int main() {
  int p, i;
  while (1 == scanf("%d", &n)) {
    if (n == 0) break;
    for (p = RED; p <= GREEN; p++)
      for (i = 0; i < n; i++)
	scanf("%d %d", &pieces[p][i].p1, &pieces[p][i].p2);
    init();
    play(players[1], 0);
    print();
  }
  return 0;
}
