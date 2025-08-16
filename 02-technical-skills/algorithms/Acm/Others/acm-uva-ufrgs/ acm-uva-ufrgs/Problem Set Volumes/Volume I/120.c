/* Author: lmborba */
#include <stdio.h>
#include <stdlib.h>

int pancakes[31];
int pancakes2[31];
int n;

void preenche(char * a) {
  int i;
  n = 0;
  i = 0;
  while (a[i] != '\n') {
    if ((a[i] >= 48) && (a[i]<=57)) {
      pancakes[n] = a[i] - 48;
      i++;
      while ((a[i] >= 48) && (a[i]<=57)) {
	pancakes[n] = (pancakes[n]*10) + (a[i]-48);
	i++;
      };
      n++;
    } else {
      i++;
    };
  };
};

void swap1(int a, int b) {
  int aux;
  aux = pancakes[a];
  pancakes[a] = pancakes[b];
  pancakes[b] = aux;
};

void inverte (int a) {
  int i,j;
  for (i=0,j=a;i<j;i++,j--) {
    swap1(i,j);
  };
};

void calcula() {
  int i;
  int j;
  int t;
  for (i=0;i<(n-1);i++) {
    if (pancakes[0] == pancakes2[i]) {
      inverte(n-1-i);
      printf("%d ",i+1);
    } else {
      j = 1;
      t = -1;
      while ((j<(n-1-i))) {
	if (pancakes[j] == pancakes2[i]) {
	  t = j;
	  break;
	};
	j++;
      };
      if (t != -1) {
	inverte(t);
	inverte(n-1-i);
	printf("%d ",n-t);
	printf("%d ",i+1);
      };
    };
  };
};

void swap(int a, int b) {
  int aux;
  aux = pancakes2[a];
  pancakes2[a] = pancakes2[b];
  pancakes2[b] = aux;
};

int heapify(int g, int a, int b) {
  int d1,d2;
  if (a > b) {
    return 0;
  };
  d1 = heapify(g,a*2,b);
  d2 = heapify(g,a*2+1,b);
  if (d1 > d2) {
    if (pancakes2[g+a-1] < d1) {
      swap(g+a-1,g+a*2-1);
    };
  } else {
    if (pancakes2[g+a-1] < d2) {
      swap(g+a-1,g+a*2);
    };
  };
  return pancakes2[g+a-1];
};

void heapsort(){
  int i;
  for (i=0;i<n;i++) {
    heapify(i,1,n-i);
  };
};

int main() {
  char * a;
  int i;
  a = (char *) malloc(sizeof(char)*100);
  a = fgets(a,100,stdin);
  while (a) {
    preenche(a);
    for (i=0;i<n;i++) {
      if (i>0) {
	printf(" ");
      };
      printf("%d",pancakes[i]);
      pancakes2[i] = pancakes[i];
    };
    printf("\n");

    heapsort();

    calcula();

    printf("0\n");

    a = fgets(a,100,stdin);
  };
  return 0;
};