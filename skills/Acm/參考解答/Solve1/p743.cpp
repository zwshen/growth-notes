/****************************************************
 * Solution to problem The MTM Machine from         *
 * ACM South America Regional Contest 1999          *
 * - Specification:                                 *
 *  http://acm.uva.es/problemset/v7/743.html        *
 ****************************************************
 * Author: Reuber Guerra Duarte                     *
 * e-mail: reuber@dcc.ufmg.br                       *
 * home-page: www.dcc.ufmg.br/~reuber               *
 * Last updated: 05/11/2000                         *
 ****************************************************/

/* @JUDGE_ID:  xxxxxx  743  C++  */

#include <stdio.h>
#include <string.h>

#define MAX 5001
char number[MAX];

int mtm(char n[], char p[]) {
  int i;
  char temp1[MAX];
  char temp2[MAX];
  if (strlen(n) <= 0) return 0;
  if (n[0] == '2' && strlen(n) > 1) {
    for (i = 1; i < strlen(n); i++)
      p[i - 1] = n[i];
    p[strlen(n) - 1] = '\0';
    return 1;
  }
  else if (n[0] == '3') {
    for (i = 1; i < strlen(n); i++)
      temp1[i - 1] = n[i];
    temp1[strlen(n) - 1] = '\0';
    if (mtm(temp1, temp2)) {
      strcpy(p, temp2);
      strcat(p, "2");
      strcat(p, temp2);
      return 1;
    }
  }
  return 0;
}


int main() {
  int i;
  int pn = 0;
  int accept;
  char produced[1100];
  char number[1100];
  char *p;
  char temp[1100];
  while (1 == scanf("%s", number)) {
    accept = 1;
    if (strcmp(number, "0") == 0) break;
    strcpy(temp, number);
    p = strtok(temp, " \r\t\b");
    if (strcmp(p, "0") == 0) break;
    
    for (i = 0; i < strlen(p); i++)
      if (p[i] == '0') break;
    if (i < strlen(p))
      accept = 0;
    else if (!mtm(p, produced)) {
      accept = 0;
    }
    printf("Case %d:\n", ++pn);
    if (accept)
      printf("%s\n", produced);
    else printf("NOT ACCEPTABLE\n");
  }
  return 0;
}
