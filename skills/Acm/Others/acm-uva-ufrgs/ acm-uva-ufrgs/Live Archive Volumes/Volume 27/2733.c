/* Author: lmborba */
#include <stdio.h>
#include <stdlib.h>

char str[230];

separa(int * indice, int * moda, int * modb) {
  int i;
  int n;
  int boo=0;
  i = 1;
  if (str[0] == '-') {
    boo = 1;
    n = 0;
  } else {
    n = str[0] - 48;
  };
  while (str[i] != ':') {
    n = 10 * n + str[i]-48;
    i++;
  };
  if (boo) {
    n = 0 - n;
  };
  *indice = i+1;
  *moda = (26 + (n%26)) % 26;
  *modb = (10 + (n%10)) % 10;
};

int converte(char val, char base, char mod) {
  return (val + mod) % base;
};

int main() {
  int a,i;
  char str2[210];
  int mod1;
  int mod2;
  int ind;
  fgets(str,230,stdin);
  while (!((str[0] == '#') && (str[1] == '\n'))) {
    separa(&ind,&mod1,&mod2);
    i = ind;
    while (str[i] != 0) {
      if ((str[i] >=97) && (str[i] <= 122)) {
	printf("%c",97+converte(str[i]-97,26,mod1));
      } else if ((str[i] >=65) && (str[i] <= 90)) {
	printf("%c",65+converte(str[i]-65,26,mod1));
      } else if ((str[i] >=48) && (str[i] <= 57)) {
	printf("%c",48+converte(str[i]-48,10,mod2));
      } else {
	printf("%c",str[i]);
      };
      i++;
    };
    fgets(str,230,stdin);
  };
}