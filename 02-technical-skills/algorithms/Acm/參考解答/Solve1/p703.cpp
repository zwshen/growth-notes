/************************************************
 * Solution to problem Triple Ties: The         *
 * Organizer's Nightmare                        *
 * - Specification:                             *
 *  http://acm.fi.uva.es/problemset/v7/703.html *
 ************************************************
 * Author: Reuber Guerra Duarte                 *
 * e-mail: reuber@dcc.ufmg.br                   *
 * home-page: www.dcc.ufmg.br/~reuber           *
 * Last updated: 05/11/2000                     *
 ************************************************/   

/* @JUDGE_ID: xxxxxx 703 C++ */

#include <stdio.h>
#include <assert.h>
#define MAX 101
#define MAX2 1000000
int table[MAX][MAX];
int points[MAX];
int n;
int count;

typedef struct tie {
  int t1;
  int t2;
  int t3;
} tie;

tie ties[MAX2];

void addTie(int t1, int t2, int t3) {
  ties[count].t1 = t1;
  ties[count].t2 = t2;
  ties[count].t3 = t3;
  count++;
  assert(count < MAX2);
} 


int main() {
  int i, j, k, dummy;
  while (1 == scanf("%d", &n)) {
    count = 0;
    assert(n >= 3 && n <= 100);
    for (i = 1; i <= n; i++)
      points[i] = 0;
    for (i = 1; i <= n; i++)
      for (j = 1; j <= n; j++) { 
	dummy = scanf("%d", &table[i][j]);
        assert(dummy == 1);
        assert(table[i][j] == 0 || table[i][j] == 1);
      }
    for (i = 1; i <= n; i++) {
      for (j = 1; j < i; j++) {
	if ((points[i] == points[j])&&(table[i][j]))
	  for (k = 1; k < j; k++)
	    if (points[j] == points[k])
	      if (table[j][k] && table[k][i]
                  && !table[k][j] && !table[j][i] &&
                  !table[i][k])
		 addTie(i, j, k);
      }
      for (j = i + 1; j <= n; j++)
	if (points[i] == points[j])
	  for (k = j + 1; k <= n; k++)
	    if (points[j] == points[k]) {
	      if (table[i][j] && table[j][k] && table[k][i]
                         && !table[j][i] && !table[k][j] && !table[i][k])
		addTie(i, j, k);
	      else if (!table[i][j] && !table[j][i] &&
		  !table[i][k] && !table[k][i] &&
		  !table[j][k] && !table[k][j])
		addTie(i, j, k);
	    }
    }
    printf("%d\n", count);
    for (i = 0; i < count; i++) 
      printf("%d %d %d\n", ties[i].t1, ties[i].t2, ties[i].t3);
  }
  return 0;
}

