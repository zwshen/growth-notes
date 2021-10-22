/* Author: lmborba */
#include <stdio.h>

long long int salvar[33][8];
int cheios[8][8];
int matriz_xadrez[8][8];

void enxadrifica() {
  int i,j;
  for (i=0;i<8;i++) {
    for (j=0;j<8;j++) {
      matriz_xadrez[i][j] = (i+j) % 2;
    };
  };
  for (i=0;i<33;i++) {
    for (j=0;j<8;j++) {
      salvar[i][j] = 0;
    };
  };
};

int max (int a, int b) {
  if (a > b) {
    return a;
  } else {
    return b;
  };
};

int min (int a, int b) {
  if (a < b) {
    return a;
  } else {
    return b;
  };
};

long long int calcula_real(int pecas, int atual, int total, int mat[8][8], int linha, int coluna) {
  int mat_local[8][8];
  int i,j;
  int k,l;
  long long int retorno;
  if (pecas == 0) {
    return 1;
  } else {
    mat_local[linha][coluna] = 2;
    for (i=coluna+1;i<total;i++) {
      if (matriz_xadrez[linha][i] == atual) {
	mat_local[linha][i] = mat[linha][i];
      };
    };
    for (i=linha+1;i<total;i++) {
      for (j=0;j<total;j++) {
	if (matriz_xadrez[i][j] == atual) {
	  if (((i-linha) == (j-coluna)) || ((i-linha) == (coluna-j))) {
	    mat_local[i][j] = 1;
	  } else {
	    mat_local[i][j] = mat[i][j];
	  };
	};
      };
    };
    retorno = 0;
    for (i=coluna+1;i<total;i++) {
      if ((matriz_xadrez[linha][i] == atual) && (mat_local[linha][i] == 0)) {
	retorno += calcula_real(pecas-1, atual, total, mat_local, linha, i);
      };
    };
    for (i=linha+1;i<total;i++) {
      for (j=0;j<total;j++) {
	if ((matriz_xadrez[i][j] == atual) && (mat_local[i][j] == 0)) {
	  retorno += calcula_real(pecas-1, atual, total, mat_local, i, j);
	};
      };
    };
    return retorno;
  };
};

long long int calcula(int casas, int pecas, int atual, int total) {
  int mat_local[8][8];
  int i,j;
  long long int a;
  if (salvar[casas][pecas]) {
    return salvar[casas][pecas];
  } else if (pecas == 0) {
    return 1;
  } else {
    for (i=0;i<total;i++) {
      for (j=0;j<total;j++) {
	mat_local[i][j] = 0;
      };
    };
    for (i=0;i<total;i++) {
      for (j=0;j<total;j++) {
	if (matriz_xadrez[i][j] == atual) {
	  a = calcula_real(pecas-1,atual,total,mat_local,i,j);
	  salvar[casas][pecas] += a;
	};
      };
    };
    return salvar[casas][pecas];
  };
};

int main() {
  int n,k,i;
  long long int retorno;
  long long int a,b;
  
  enxadrifica();
  
  scanf("%d",&n);
  scanf("%d",&k);

  while (n || k) {

    if (k == 1) {
      printf("%d\n",n*n);
    } else if (k == 0) {
      printf("1\n");
    } else {
      retorno = 0;
      for (i=max(k-n+1,0);i<=min(n-1,k);i++) {
	a = calcula(((n*n)/2)+(n%2),i,0,n);
	b = calcula((n*n)/2,k-i,1,n);
	retorno += a * b;
      };
      printf("%lld\n",retorno);
    };
    
    scanf("%d",&n);
    scanf("%d",&k);
  };

  return 0;
};