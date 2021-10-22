/* @JUDGE_ID: xxxxxxx 356 C++ */

#include <stdio.h>
#include <math.h>

double r;
double cx, cy;
int c1, c2;

int dist(int x, int y) {
  return (sqrt((cx - x)*(cx - x) + (cy - y)*(cy - y))) <= r;
}

int count(int x1, int y1, int x2, int y2, 
          int x3, int y3, int x4, int y4) {
  int c = 0;
  c += dist(x1, y1);
  c += dist(x2, y2);
  c += dist(x3, y3);
  c += dist(x4, y4);
  return c;
}

int main() {
  int i, j, c, f = 1, n;
  cx = 0.0;
  cy = 0.0;
  while (1 == scanf("%d", &n)) {
    r = (double)n - 0.5;
    c1 = 0; c2 = 0;
    for (i = -n; i < n; i++)
      for (j = -n; j < n; j++) {
        c = count(j, i, j + 1, i + 1, j, i + 1, j + 1, i);
        if (c == 4) 
          c1++;
        else if (c >= 1 && c <= 3)
          c2++;
      }
    if (f) f = 0;
    else printf("\n");
    printf("In the case n = %d, %d cells contain segments of the circle.\n",
           n, c2);
    printf("There are %d cells completely contained in the circle.\n",c1);
  }
  return 0;
}
