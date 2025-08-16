/* @JUDGE_ID: xxxxxx 128  C++  */

/* Author: Reuber Guerra Duarte(reuber@dcc.ufmg.br) */

#include <stdio.h>
#include <string.h>

int compute() {
  char line[1500];
  int len, last = 0, i = 0;
  unsigned long value = 0, s1, s2;
  char ch;
  while (gets(line)) {
    if (line[0] == '#') break;
    len = strlen(line);
    value = 0;
    for (i = 0; i < len; i++) {
      value = value << 8; 
      value += line[i];
      value = value % 34943L;
    }
    value = value << 16; 
    value = value % 34943L;
    if (value) value = 34943L - value;
    s1 = value >> 8;
    s2 = value - (s1 << 8);
    printf("%.2lX %.2lX\n", s1, s2);
  }
  return 0;
}

int main() {
  while (compute());
  return 0;
}
