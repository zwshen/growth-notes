/* @JUDGE_ID:   xxxxxx   460   C++ */

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>

typedef struct rectangle {
  int x1;
  int x2;
  int y1;
  int y2;
} rectangle;

typedef struct interval {
  int x1;
  int x2;
} interval;

int my_max(int a, int b) {
  return (a > b) ?  a: b;
}

int my_min(int a, int b) {
  return (a < b) ?  a: b;
}

interval overlap(int p1, int p2, int p3, int p4) {
  interval interv;
  interv.x1 = my_max(p1, p3);
  interv.x2 = my_min(p2, p4);
  return interv;
}

int overlap(interval interv) {
  return (interv.x2 > interv.x1);
}

void overlap(rectangle r1, rectangle r2) {
  interval horizontal = overlap(r1.x1, r1.x2, r2.x1, r2.x2);
  interval vertical = overlap(r1.y1, r1.y2, r2.y1, r2.y2);
  if (overlap(vertical) && overlap(horizontal)) {
    printf("%d %d %d %d\n\n", horizontal.x1, vertical.x1,
			      horizontal.x2, vertical.x2);
  }
  else printf("No Overlap\n\n");
}


int main() {
  int i, dummy, n;
  rectangle r1;
  rectangle r2;
  dummy = scanf("%d", &n);
  assert(dummy == 1);
  printf("\n");
  for (i = 1; i <= n; i++) {
    dummy = scanf("%d %d %d %d", &r1.x1, &r1.y1, &r1.x2, &r1.y2);
    assert(dummy == 4);
    dummy = scanf("%d %d %d %d", &r2.x1, &r2.y1, &r2.x2, &r2.y2);
    assert(dummy == 4);
    overlap(r1, r2);
  }
  return 0;
}
