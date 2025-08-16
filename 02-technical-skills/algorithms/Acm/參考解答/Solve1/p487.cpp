/* @JUDGE_ID: xxxxxx 487 C++ */

#include <stdio.h>
#include <assert.h>
#include <string.h>
#include <stdlib.h>

char words[2][10000000];

typedef struct word {
  char *w;
  int visited[20];
  int r, c;
} word;

#define MAX 50000
char a[21][21];
word queue[2][MAX];
int count[2];
int next[2];

word *w = NULL;
int n;
int current;
int iter;
int other;
int max;

inline int is_visited(word *w, int r, int c) {
  return (w->visited[r] >> c) & 0x1;  
}
inline mark(word *w, int r, int c) {
  w->visited[r] |= 1 << c;
}

inline void put(int r, int c) {
  if (r >= 0 && c >= 0 && r < n && c < n) {
    if (!is_visited(w, r, c) && w->w[iter] < a[r][c]) {
      word *w2 = &queue[other][count[other]];
      int i = 0; 
      for (i = 0; i < n; i++)
        w2->visited[i] = w->visited[i];
      w2->w = &words[other][next[other]];
      strcpy(w2->w, w->w);
      w2->r = r;
      w2->c = c;
      w2->w[iter + 1] = a[r][c];
      w2->w[iter + 2] = '\0';
      next[other] += iter + 3;
      //printf("putting word %s\n", w2->w);
      mark(w2, r, c);
      count[other]++;
      assert(count[other] <= MAX);
    }
  }
}

int cmp(const void *a, const void *b) {
  word *aa = (word *)a;
  word *bb = (word *)b;
  int eq = strcmp(aa->w, bb->w);
  if (eq != 0) return eq;
  if (aa->r != bb->r) {
    if (aa->r > bb->r) return +1;
    return -1;
  }
  if (aa->c != bb->c) {
    if (aa->c > bb->c) return +1;
    return -1;
  }
  return 0;
}

int equal_w(word *a, word *b) {
  if (a == NULL) return 0;
  if (a->w == NULL) return 0;
  if (strcmp(a->w, b->w) == 0 && a->r == b->r && a->c == b->c) {
    int i;
    for (i = 0; i < n; i++)
     if (a->visited[i] != b->visited[i]) return 0;
    return 1;
  }
  return 0;
}

void search() {
  int r, c, k;
  char *p = NULL;
  current = 0;
  iter = 0;
  next[current] = 0;
  count[current] = 0;
  max = n * n;
  for (r = 0; r < n; r++)
    for (c = 0; c < n; c++) {
      w = &queue[current][count[current]];
      w->w = &words[current][next[current]];
      w->w[0] = a[r][c];
      w->w[1] = '\0';
      //printf("word[%d][%d] = %s\n", r, c, w->w);
      next[current] += 2;
      w->r = r;
      w->c = c;
      for (k = 0; k < n; k++)
        w->visited[k] = 0;
      mark(w, r, c);
      count[current]++;
    }            
  while (1) {
    /* print */ 
    //printf("count[current] = %d\n", count[current]);
    //printf("iter = %d count[current] = %d\n", iter, count[current]);
    if (count[current] == 0) break;
    qsort(queue[current], count[current], sizeof(word), cmp);
    if (iter > 1) {    
      printf("%s\n", queue[current][0].w);
      for (k = 1; k < count[current]; k++)
        if (strcmp(queue[current][k - 1].w, queue[current][k].w) != 0) 
          printf("%s\n", queue[current][k].w);
    }
    if (iter == max - 1) break;
    /* generate */
    w = NULL;
    other = 1 - current;
    count[other] = 0;
    next[other] = 0;
    for (k = 0; k < count[current]; k++) {
      //printf("word[%d] = %s\n", k, queue[current][k].w);
      if (!equal_w(w, &queue[current][k])) {
        w = &queue[current][k];
        r = w->r;
        c = w->c;
        //printf("putting word %s at %d,%d\n", w->w, r, c);
        put(r - 1, c - 1);
        put(r - 1, c);
        put(r - 1, c + 1);
        put(r, c - 1);
        put(r, c + 1);
        put(r + 1, c - 1);
        put(r + 1, c);
        put(r + 1, c + 1);
      }
    }
    current = other;
    iter++;
  }
}

int main() {
  int i, pn, r = 0;
  scanf("%d", &pn);
  for (i = 0; i < pn; i++) {
    scanf("%d", &n);
    assert(n <= 20);
    for (r = 0; r < n; r++) {
      scanf("%s", a[r]);
      assert(strlen(a[r]) == n);
    }
    search();
    printf("\n");
  }
  return 0;
}
