/* @JUDGE_ID: xxxxxx 216 C++ */

#include <stdio.h>
#include <math.h>
#include <stdlib.h>
#include <string.h>

typedef struct reg {
  double x;
  double y;
} reg;

double mindist;
double atualdist;
int minline[9];
double dist[9][9];
reg c[9];
int use[9], n;
int linecomp[9];

void error() {
  int um = 1, zero = 0;
  um = um / zero;
}

void link(int k) {
  int m;
  double bak;
  if (k < n) {
    for (m = 0; m < n; m++)
      if (!use[m]) {
	  use[m] = 1;
	  linecomp[k] = m;
	  bak = atualdist;
	  if (k > 0)
	     atualdist += dist[linecomp[k-1]][linecomp[k]];
	  if (atualdist < mindist)
	    link(k+1);
	  use[m] = 0;
	  atualdist = bak;
	}
  }
  else {
    if (atualdist < mindist) {
      mindist = atualdist;
      for (m = 0; m < n; m++)
	minline[m] = linecomp[m];
    }
  }
}


int main() {
  int i, j, net;
  net = 0;
  while (1 == scanf("%d", &n)) {
    if (n == 0) break;
    mindist = 100000000.0;
    atualdist = 0.0;
    if (n > 8) error();
    for (i = 0; i < n; i++)
	scanf("%lf %lf", &c[i].x, &c[i].y);
    for (i = 0; i < n; i++)
	for (j = i; j < n; j++) {
	  dist[i][j] = sqrt((c[i].x - c[j].x)*(c[i].x - c[j].x)+
			    (c[i].y - c[j].y)*(c[i].y - c[j].y));
	  dist[j][i] = dist[i][j];
	}
    for (i = 0; i < n; i++)
      use[i] = 0;
    link(0);
    printf("**********************************************************\n");
    printf("Network #%d\n", ++net);
    for(i = 0; i < n - 1; i++)
	printf("Cable requirement to connect (%d,%d) to (%d,%d) is %3.2f feet.\n",
	   (int)c[minline[i]].x, (int)c[minline[i]].y, (int)c[minline[i+1]].x,
	   (int)c[minline[i+1]].y, dist[minline[i]][minline[i+1]]+16);
    printf("Number of feet of cable required is %3.2f.\n",
	     mindist+(n-1)*16);
   }
   return 0;
 }

