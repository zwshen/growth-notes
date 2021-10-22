/* @JUDGE_ID: xxxxxx 428 C++ */
#include <stdio.h>
#include <stdlib.h>
#include <math.h>
#include <string.h>
#include <assert.h>
#define MY_PI 3.141593
char line[10000];
double pi180;
double coveredArea, roofArea, floorSpace;
double totalCoveredArea, totalRoofArea, totalFloorSpace;
char *p;
int end2 = 0;
int end = 0;

void compute(double b, double r, double d, double a) {
  double area = ((b + r)*d)/2.0;
  roofArea += area;
  coveredArea += area * cos(pi180 * a);
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

double getNextDouble() {
  double i;
  assert(p != NULL);
  i = atof(p);
  p = strtok(NULL, " \n\r\t");
  if (p == NULL) {
    getsLine(line);
    p = strtok(line, " \n\r\t");
    if (p == NULL) {
      getsLine(line);
      p = strtok(line, " \n\r\t");
      if (p == NULL)
	end = 1;
      end2 = 1;
    }
  }
  return i;
}

int main() {
  double i, r, b, h, a;
  int lots = 0;
  pi180 = acos(-1)/180.0;
  end = 0;
  end2 = 0;
 // printf("%lf\n", M_PI);
  totalCoveredArea = 0.0;
  totalRoofArea = 0.0;
  totalFloorSpace = 0.0;
  printf("Roof Area     Floor Area     %% Covered\n");
  printf("---------     ----------     ---------\n");
  getsLine(line);
  p = strtok(line, " \n\r\t");
  while (!end) {
    end2 = 0;
    floorSpace = getNextDouble();
    coveredArea = 0.0;
    roofArea = 0.0;
    assert(floorSpace > 0);
    lots++;
    while (!end2) {
      b = getNextDouble();
      r = getNextDouble();
      h = getNextDouble();
      a = getNextDouble();
      assert(b >= 0.0 && r >= 0.0 && h >= 0.0 && a >= 0.0);
      compute(b, r, h, a);
    }
    totalRoofArea += roofArea;
    totalFloorSpace += floorSpace;
    totalCoveredArea += coveredArea;
    printf("%9.2lf     %10.2lf     %8.2lf%%\n",
	   roofArea, coveredArea, (coveredArea/floorSpace)*100);
  }
  printf("\n");
  printf("Total surface area of roofs %11.2lf\n", totalRoofArea);
  printf("Total area covered by roofs %11.2lf\n", totalCoveredArea);
  printf("Percentage of total area covered by roofs %7.2lf%%\n",
	 (totalCoveredArea / totalFloorSpace) * 100.0);
  printf("Average roof surface area per lot   %13.2lf\n",
	 totalRoofArea/(double)lots);
  printf("Average floor space covered per lot %13.2lf\n",
	 totalCoveredArea/(double)lots);
  return 0;
}
