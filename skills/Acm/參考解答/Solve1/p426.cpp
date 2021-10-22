/* @JUDGE_ID: xxxxxx 426 C++ */
#include <stdio.h>
#include <math.h>
#include <string.h>       
#include <stdlib.h>
#include <assert.h>

#define MAX 10000
char line[1000];

typedef struct check {
  char date[10];
  int id;
  double value;
} check;

check *checks;

int cmp(const void *a, const void *b) {
  check *c = (check *)a;
  check *d = (check *)b;
  if (c->id < d->id) return -1;
  else if (c->id > d->id) return +1;
  return 0;
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  s[0] = '\0';
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r') s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;
}

void printCheck(int i) {
  printf("%4d%c %9.2lf %s", checks[i].id,
	(i > 0 && checks[i].id > checks[i - 1].id + 1) ? '*': ' ',
	checks[i].value , checks[i].date);
}

int main() {
  int np, dummy, i, j, k;
  char *p;
  int start[3];
  int end[3];
  int rows;
  int n;
  checks = (check *)malloc(sizeof(check) * MAX);
  assert(checks != NULL);
  getsLine(line);
  dummy = sscanf(line, "%d", &np);
  assert(dummy == 1);
  getsLine(line);
  for (i = 0; i < np; i++) {
    n = 0;
    while (getsLine(line)) {
      //printf("line %s\n", line);
      p = strtok(line, " \t\r\b\n");
      strcpy(checks[n].date, p);
      p = strtok(NULL, " \t\r\b\n");
      assert(p != NULL);
      checks[n].id = atoi(p);
      p = strtok(NULL, " \t\r\b\n");
      assert(p != NULL);
      checks[n].value = atof(p);
      assert(checks[n].id >= 1 && checks[n].id <= 9999);
      //printf("%d %.2lf %s\n", checks[n].id, checks[n].value, checks[n].date);
      n++;
      assert(n < MAX);
    }
    qsort(checks, n, sizeof(check), cmp);
    if (n % 3 == 0)
      rows = n / 3;
    else rows = n / 3 + 1;
    start[0] = 0;
    end[0] = rows;
    start[1] = end[0];
    if (n <= 1)
      end[1] = start[1];
    else end[1] = start[1] + rows;
    start[2] = end[1];
    if (n % 3 == 0)
      end[2] = start[2]  + rows;
    else end[2] = start[2] + rows - (3 - (n % 3));
    for (j = 0; j < rows; j++) {
      for (k = 0; k < 3; k++) {
	if (start[k] < end[k]) {
	   if (k > 0)
	     printf("   ");
	   printCheck(start[k]);
	   start[k]++;
	}
      }
      printf("\n");
    }
    printf("\n");
  }
  free(checks);
  return 0;
}
