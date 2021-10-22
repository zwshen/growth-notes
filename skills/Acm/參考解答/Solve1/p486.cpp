/* @JUDGE_ID:  xxxxxx  486  C++  */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char table[28][15] = {
 "zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine",
 "ten", "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", 
 "seventeen", "eighteen", "nineteen", "twenty", "thirty", "forty", "fifty", 
 "sixty", "seventy", "eighty", "ninety"};

int n = 28;
int value[28] = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 
                10, 11, 12, 13, 14, 15, 16,
                17, 18, 19, 20, 30, 40, 50,
                60, 70, 80, 90};

int index(char s[]) {
  int i;
  for (i = 0; i < n; i++)
    if (strcmp(table[i], s) == 0) return i;
  return -1;
}

int getsLine(char s[]) {
  char ch;
  int i = 0;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    s[i++] = ch;
    if (1 != scanf("%c", &ch)) 
      break;
  }
  s[i] = '\0';
  return i;
}

int main() {
  int i;
  char line[10000];
  char *p;
  int neg, acc, unit, number;
  while (getsLine(line)) {
    neg = 0;
    acc = 0;
    unit = 0;
    number = 0;
    p = strtok(line, " \b\r\t");
    while (p != NULL) {
      for (i = 0; i < strlen(p); i++)
        if (p[i] >= 'A' && p[i] <= 'Z')
          p[i] = p[i] - 'A' + 'a';
      if (strcmp(p, "negative") == 0) {
        neg = 1;
      }
      else if (strcmp(p, "hundred") == 0) {
        acc += unit * 100;
        unit = 0;
      } 
      else if (strcmp(p, "thousand") == 0) {
        acc += unit;
        number += acc * 1000;
        acc = 0;
       unit = 0;
      } 
      else if (strcmp(p, "million") == 0) {
        acc += unit;
        number += acc * 1000000;
        acc = 0;
        unit = 0;
      } 
      else {
        i = index(p);
        if (i < 0) {
          i = 0;
          i = i / i;
        }
        if (value[i] < 10)
          unit += value[i];
        else acc += value[i];
      }
      p = strtok(NULL, " \b\r\t");
    }
    number += unit + acc;
    if (neg && number != 0) 
      printf("-");
    printf("%d\n", number);
  }      
  return 0;
}
