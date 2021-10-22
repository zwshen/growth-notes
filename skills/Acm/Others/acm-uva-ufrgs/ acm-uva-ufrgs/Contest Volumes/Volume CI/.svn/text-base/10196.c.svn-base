/* Author: lmborba */
#include <stdio.h>

#define chuta(a) (a + (bw*32))

char arr[8][9];

int acha (int a, int b, int bw) {
  int recebe,val;
  int i,j;

  i = a-1;
  j = b-1;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    i--;
    j--;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('B')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a+1;
  j = b-1;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    i++;
    j--;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('B')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a-1;
  j = b+1;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    i--;
    j++;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('B')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a+1;
  j = b+1;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    i++;
    j++;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('B')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a+1;
  j = b;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    i++;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('R')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a-1;
  j = b;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    i--;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('R')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a;
  j = b+1;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    j++;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('R')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  i = a;
  j = b-1;
  while ((i >= 0) && (j >= 0) && (i < 8) && (j < 8) && (arr[i][j] == '.')) {
    j--;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if ((arr[i][j] == chuta('R')) || (arr[i][j] == chuta('Q'))) {
      return 1;
    };
  };

  if (bw) {
    i = a-1;
    j = b-1;
  } else {
    i = a+1;
    j = b-1;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('P')) {
      return 1;
    };
  };

  if (bw) {
    i = a-1;
    j = b+1;
  } else {
    i = a+1;
    j = b+1;
  };
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('P')) {
      return 1;
    };
  };

  i = a-2;
  j = b+1;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a-1;
  j = b+2;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a-2;
  j = b-1;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a-1;
  j = b-2;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a+2;
  j = b-1;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a+1;
  j = b-2;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a+2;
  j = b+1;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  i = a+1;
  j = b+2;
  if ((i >= 0) && (j >= 0) && (i < 8) && (j < 8)) {
    if (arr[i][j] == chuta('N')) {
      return 1;
    };
  };

  return 0;

};

int main() {

  int i,j,x,bool;

  bool = 0;

  for (i=0;i<8;i++) {
    scanf("%s",arr[i]);
    for (j=0;j<8;j++) {
      if (arr[i][j] != '.') {
	bool = 1;
	break;
      };
    };
  };
  
  getchar();
  getchar();

  x = 1;
  
  while (bool) {

    bool = 0;

    for (i=0;i<8;i++) {
      for (j=0;j<8;j++) {
	if (arr[i][j] == 'k') {
	  bool = bool | acha(i,j,0);
	};
	if (arr[i][j] == 'K') {
	  bool = bool | (acha(i,j,1) * 2);
	};
      };
    };

    if (bool == 2) {
      printf("Game #%d: white king is in check.\n",x);
    } else if (bool == 1) {
      printf("Game #%d: black king is in check.\n",x);
    } else {
      printf("Game #%d: no king is in check.\n",x);
    };

    x++;

    bool = 0;

    for (i=0;i<8;i++) {
      scanf("%s",arr[i]);
      for (j=0;j<8;j++) {
	if (arr[i][j] != '.') {
	  bool = 1;
	  break;
	};
      };
    };
    getchar();
    getchar();
  };
  
  return 0;
};