/* @JUDGE_ID: xxxxxx 484 C++ */

#include <stdio.h>
#include <stdlib.h>

typedef struct cell {
  int number;
  int count;
  cell *next;
} cell;

cell *head = NULL;
cell *tail = NULL;

void init() {
  head = (cell *) malloc(sizeof (cell));
  tail = (cell *) malloc(sizeof (cell));
  head->next = tail;
  tail->next = tail;
}

void put(int n) {
  cell *k = head;
  cell *t = k->next;
  while (t != tail) {
    if (t->number == n) {
      t->count++;
      return;
    }
    k = t;
    t = k->next;
  }
  k->next = (cell *) malloc(sizeof (cell));
  if (k->next == NULL) {
    printf("no memory\n");
    exit(0);
  }
  k = k->next;
  k->next = tail;
  k->number = n;
  k->count = 1;
}

void print() {
  cell *t = head->next;
  while (t != tail) {
    printf("%d %d\n", t->number, t->count);
    t = t->next;
  }
}

void freeCells() {
  cell *t = head;
  cell *k = head->next;
  while (t != tail) {
    free(t);
    t = k;
    k = k->next;
  }
  free(tail);
}

int main() {
  int n;
  init();
  while (1 == scanf("%d", &n)) {
    put(n);
  }
  print();
  freeCells();
  return 0;
}