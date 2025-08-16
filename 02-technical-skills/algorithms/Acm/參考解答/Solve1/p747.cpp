/****************************************************
 * Solution to problem Grid Soccer from             *
 * ACM South America Regional Contest 1999          *
 * - Specification:                                 *
 *  http://acm.uva.es/problemset/v7/747.html        *
 ****************************************************
 * Author: Reuber Guerra Duarte                     *
 * e-mail: reuber@dcc.ufmg.br                       *
 * home-page: www.dcc.ufmg.br/~reuber               *
 * Last updated: 05/11/2000                         *
 ****************************************************/

/* @JUDGE_ID:  xxxxxx  747  C++  */

#include <stdio.h>
#include <string.h>

#define UNSEEN 10000
#define MAX 400
int cost[MAX];
int dist[MAX];
int parent[MAX];
int goals[MAX];
int s, g, p, n, N;
int start, pn, ng;

int queue[MAX];
int a[MAX][MAX];
int head, tail;

void getPosition(int k, int *x, int *y) {
  *x = k % N;
  *y = k / N;
}

int id(int x, int y) {
  return (y * N) + x;
}

int absolute(int a) {
  if (a < 0) return -a;
  return a;
}

void enqueue(int i, int par, int c) {
  int x1, x2, y1, y2;
  int d, j;
  getPosition(i, &x1, &y1);
  getPosition(par, &x2, &y2);
  d = dist[par] + absolute(x1 - x2) + absolute(y1 - y2);
  if (cost[i] == UNSEEN) {
    dist[i] = d;
    cost[i] = c;
    parent[i] = par;
    queue[tail] = i;
    tail = (tail + 1) % MAX;
  }
  else if (c <= cost[i]) {
    if (d < dist[i]) {
      dist[i] = d;
      parent[i] = par;
      for (j = head; j != tail; j = (j + 1) % MAX)
	if (queue[j] == i) break;
      if (j != tail) {
	queue[tail] = i;
	tail = (tail + 1) % MAX;
      }
    }
  }
}

int first() {
  int a = queue[head];
  head = (head + 1) % MAX;
  return a;
}

int empty() {
  return (head == tail);
}

void init() {
  int i, j;
  for (i = 0; i < MAX; i++) {
    cost[i] = UNSEEN;
    parent[i] = -1;
    dist[i] = UNSEEN;
  }
  for (i = 0; i < N; i++)
    for (j = 0; j < N; j++)
      a[i][j] = 1;
}

void shortestPath() {
  int k, i, j, x,y;
  tail = 0;
  head = 0;
  enqueue(start, start, 0);
  while (!empty()) {
    k = first();
    getPosition(k, &x, &y);
    j = x + 1;
    i = y;
    while (j < N && a[i][j]) {
      enqueue(id(j, i), k, cost[k] + 1);
      j++;
    }
    j = x - 1;
    while (j >= 0 && a[i][j]) {
      enqueue(id(j, i), k, cost[k] + 1);
      j--;
    }
    j = x;
    i = y + 1;
    while (i < N && a[i][j]) {
      enqueue(id(j, i), k, cost[k] + 1);
      i++;
    }
    j = x;
    i = y - 1;
    while (i >= 0 && a[i][j]) {
      enqueue(id(j, i), k, cost[k] + 1);
      i--;
    }
  }
}

void printPath(int k) {
  int x, y;
  if (parent[k] != k) {
    printPath(parent[k]);
  }
  getPosition(k, &x, &y);
  printf("(%d,%d)", x - s, y);
}

void print() {
  int i;
  int min = 0;
  int minVal = UNSEEN;
  for (i = 0; i < ng; i++)
    if (cost[goals[i]] < minVal) {
      minVal = cost[goals[i]];
      min = goals[i];
    }
    else if (cost[goals[i]] == minVal && dist[goals[i]] < dist[min]) {
      minVal = cost[goals[i]];
      min = goals[i];
    }
  printf("Scenario %d.\n", ++pn);
  if (minVal == UNSEEN)
    printf(" Situation Impossible\n\n");
  else {
    printf(" Goal with %d kicks: ", minVal);
    printPath(min);
    printf("\n\n");
  }
}

int main() {
  int x, y, i, j, t;
  while (1 == scanf("%d", &s)) {
    if (s == 0) break;
    scanf("%d %d %d", &g, &p, &n);
    N = 2 * s + 1;
    init();
    for (t = 0; t < n; t++) {
      scanf("%d %d", &x, &y);
      x += s;
      for (i = y - p; i <= y + p; i++)
	for (j = x - p; j <= x + p; j++)
	  if (i >= 0 && i < N && j >= 0 && j < N)
	    a[i][j] = 0;
    }
    ng = 2*g + 1;
    for (i = s - g; i <= s + g; i++)
    goals[i - (s - g)] = id(i, 2*s);
      start = s;
    shortestPath();
    print();
  }
  return 0;
}
