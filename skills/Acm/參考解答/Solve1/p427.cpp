/* @JUDGE_ID: xxxxxx 427 C++ "Simulation" */
#include <math.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define MY_PI acos(-1)
double angle;
double wide, length;
double wide1, wide2;

int passed() {
  double x1, y1, y2;
  x1 = wide * sin(angle);
  y1 = - sin(angle) * length - cos(angle) * wide;
  y2 = tan(angle)*(wide1 - x1) + y1;
  if (y2 < -wide2) {
    return 0;
  }
  return 1;
}

int execute() {
  double increment = 0.1;
  angle = MY_PI/2 - increment;
  while (angle > 0.0) {
    if (!passed()) return 0;
    angle -= increment;
  }
  return 1;
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i++] = '\0';
  return i;
}

int main() {
  char line[10000];
  char *p;
  int i;
  double temp_len, temp_wide;
  while (getsLine(line)) {
    p = strtok(line, " \b\t\n\r,");
    if (p == NULL) continue;
    length = atof(p);
    p = strtok(NULL, " \b\t\n\r,");
    if (p == NULL) continue;
    wide = atof(p);
    p = strtok(NULL, " \b\t\n\r,");
    temp_len = length;
    temp_wide = wide;   
    while (p != NULL) {
      wide1 = atof(p);
      p = strtok(NULL, " \b\t\n\r,");
      if (p == NULL) break;
      wide2 = atof(p);
      if (execute()) 
        printf("Y");
      else {
        length = wide;
        wide = temp_len;
        if (execute())
          printf("Y");
        else printf("N");
        wide = temp_wide;
        length = temp_len;
      }   
      p = strtok(NULL, " \b\t\n\r,");
    }         
    printf("\n");
  }  
  return 0;
}  
