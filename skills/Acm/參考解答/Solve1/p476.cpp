/* @JUDGE_ID: xxxxxx 476 C++ */

#include <stdio.h>
#include <string.h>
#include <math.h>
#include <assert.h>

#define RECTANGLE 1
#define CIRCLE 2
#define TRIANGLE 3

typedef struct figure {
  double x1;
  double y1;
  double x2;
  double y2;
  double x3;
  double y3;
  double r;
  int type;
} figure;

figure figures[10];
int N;

int contain(int k, double x, double y) {
 // printf("Point %lf, %lf. Rect (%lf, %lf), (%lf, %lf)\n", x, y,
  //        figures[k].x1, figures[k].y1, figures[k].x2, figures[k].y2);
  switch (figures[k].type) {
    case RECTANGLE:
      if (x > figures[k].x1 && x < figures[k].x2 &&
          y < figures[k].y1 && y > figures[k].y2) return 1;
    case CIRCLE:
    //  return (sqrt((x - figures[k].x1)*(x - figures[k].x1) +
    //               (y - figures[k].y1)*(y - figures[k].y1)) <= figures[k].r);
    case TRIANGLE:
      break;
  }
  return 0;
}

int main() {
  int n, i, dummy, count, j, point;
  double temp;
  double x, y;
  char type[100];
    N = 0;
    while (1) {
      scanf("%s", type);
      if (strcmp(type, "*") == 0) break;
      if (strcmp(type, "r") == 0) {
        dummy = scanf("%lf %lf %lf %lf", &figures[N].x1,
                       &figures[N].y1, &figures[N].x2, &figures[N].y2); 
        assert(dummy == 4);
        figures[N].type = RECTANGLE;
        if (figures[N].y2 >= figures[N].y1) {
          temp = figures[N].y1;
          figures[N].y1 = figures[N].y2;
          figures[N].y2 = temp;
          temp = figures[N].x1;
          figures[N].x1 = figures[N].x2;
          figures[N].x2 = temp;
        }
        N++;
        assert(N <= 10);
      }
      else if (strcmp(type, "c") == 0) {
        assert(0); 
       dummy = scanf("%lf %lf %lf", &figures[N].x1,
                       &figures[N].y1, &figures[N].r);
        assert(dummy == 4);
        figures[N].type = CIRCLE;
        N++;
        assert(N <= 10);
      }
      else if (strcmp(type, "t") == 0) {
        assert(0); 
        dummy = scanf("%lf %lf %lf %lf", &figures[N].x1,
                       &figures[N].y1, &figures[N].x2, &figures[N].y1,
                       &figures[N].x3, &figures[N].y3); 
        assert(dummy == 7);
        figures[N].type = TRIANGLE;
        N++;
        assert(N <= 10);
      }
      else assert(0);
    }
    point = 0;
    while (1) {
      dummy = scanf("%lf %lf", &x, &y);
      assert(dummy == 2);
      count = 0;
      point++;
      if (x == 9999.9 && y == 9999.9)
         break;
      for (j = 0; j < N; j++)
        if (contain(j, x, y)) {
          printf("Point %d is contained in figure %d\n", point, j + 1);
          count++;
        }
      if (count == 0)
         printf("Point %d is not contained in any figure\n", point);
    }
  return 0;  
}
