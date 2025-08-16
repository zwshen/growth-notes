/* @JUDGE_ID: xxxxxx 704 C++ */ 
#include <stdio.h> 
#include <stdlib.h> 
#include <assert.h>

#define DEBUG 1

typedef struct config {
  int a[21];
  int min;
  int moves[10];
} config;

int moves[30];
config configs[2000];

int trans[4][21] = {
 /* 1 */  {2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 0, 1,
         12, 13, 14, 15, 16, 17, 18, 19, 20},
 /* 2 */  {0, 1, 2, 3, 4, 5, 6, 7, 8, 19, 20, 9,
          10, 11, 12, 13, 14, 15, 16, 17, 18},
 /* 3 */  {10, 11, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9,
           12, 13, 14, 15, 16, 17, 18, 19, 20},
 /* 4 */  {0, 1, 2, 3, 4, 5, 6, 7, 8, 11, 12, 13,
          14, 15, 16, 17, 18, 19, 20, 9, 10},
};

int temp[24];
int finalConf[24] = {
0, 3, 4, 3, 0, 5, 6, 5, 0, 1, 
2, 1, 0, 7, 8, 7, 0, 9, 10, 9, 
0, 1, 2, 1};
int N;
int count[11] = {6, 2, 1, 2, 1, 2, 1, 2, 1, 2, 1}; 
int startConf[24];
int min;
int minM[16];
int c = 0;

int start[11*11*11*11];
int cmp(const void *a, const void *b) {
  config *c = (config *)a;
  config *d = (config *)b;
  if (c->a[0] < d->a[0])
    return -1;
  if (c->a[0] > d->a[0])
    return +1;
  if (c->a[1] > d->a[1])
    return +1;
  if (c->a[1] < d->a[1])
    return -1;
  if (c->a[2] > d->a[2])
    return +1;
  if (c->a[2] < d->a[2])
    return -1;
  if (c->a[3] > d->a[3])
    return +1;
  if (c->a[3] < d->a[3])
    return -1;
  return 0;
}

int search(int a[]) {
  int i, j;
  for (i = 0; i < N; i++) {
    for(j = 0; j < 21; j++)
      if (a[j] != configs[i].a[j]) break;
    if (j == 21) return i;
  } 
  return -1;
}

int search2(int a[]) {
  int i, j;
  c++;
 // if (c > 0 && c % 10000 == 0)
 //   printf("c = %d\n", c);
  j = start[a[0] + a[1]*11 + a[2]*121 + a[3] * 1331];
  if (j < 0) return -1;
  while (j < N && a[2] == configs[j].a[2] && a[1] == configs[j].a[1]
        && a[3] == configs[j].a[3] && a[0] == configs[j].a[0]) {
    for (i = 4; i < 21; i++)  
      if (a[i] != configs[j].a[i]) break;
    if (i == 21) return j;
    j++;
  }
  return -1;
}

int equal(int a[]) {
  for (int i = 0; i < 21; i++) 
    if (a[i] != finalConf[i]) return 0;
  return 1;
}

void transform(int a[], int b[], int type) {
  for (int i = 0; i < 21; i++) 
     b[trans[type - 1][i]] = a[i];
}

int rev(int mov) {
  switch(mov) {
    case 1: return 3; 
    case 2: return 4;
    case 3: return 1; 
    case 4: return 2; 
  }
  return -1;
}

void reverse(int a[], int k) {
  int i;
  for (i = k - 1; i >= 0; i--)
     a[k - 1 - i] = rev(moves[i]);
}

void copyTo(int pos, int conf[], int min) {
  int i;
  for (i = 0; i < 21; i++)
    configs[pos].a[i] = conf[i];
  configs[pos].min = min;
  for (i = min - 1; i >= 0; i--)
    configs[pos].moves[min - 1 - i] = rev(moves[i]);
}

void addMove(int a[], int k) {
  int i;
  int j = search(a);
  int b[30];  
  //printf("AddMove: ");
 // for (i = 0; i < 21; i++)
//    printf(" %d", a[i]);
 // printf("\n");
  if (j < 0) {
    copyTo(N, a, k);
    N++; 
    assert(N < 2000);
  }  
  else {
    if (k < configs[j].min) {
      copyTo(j, a, k);
    }
    else if (k == configs[j].min) {
      reverse(b, k);
      for (i = 0; i < k; i++)
        if (b[i] != configs[j].moves[i]) break;
      if (b[i] < configs[j].moves[i]) {
	copyTo(j, a, k);
      }
    }
  }
} 

void init(int a[], int k) {
  int i;
  int b[24];
  if (k > 6) return;
  if (k > 0) 
    addMove(a, k);
  for (i = 1; i <= 4; i++) { 
      if (k > 0) {
        switch (moves[k - 1]) {
          case 1: if (i == 3) continue; break;
          case 2: if (i == 4) continue; break;
          case 3: if (i == 1) continue; break;
          case 4: if (i == 2) continue; break;
        }
      }
      transform(a, b, i);
      moves[k] = i;
      init(b, k + 1);
  }
}

void computeMin(int a[], int k) {
  int i;
  if (k < min) {
    min = k;
    for (i = 0; i < k; i++)
      minM[i] = moves[i];
  }
  else if (k == min) {
    for (i = 0; i < k; i++)
      if (moves[i] != minM[i])
        break;
    if (moves[i] < minM[i]) {
      for (i = 0; i < k; i++)
        minM[i] = moves[i];
    }
  }
}

void find(int a[], int k, int count) {
  int i, j;
  int b[21];
  if (k > min - 6) return;
  j = search2(a);
  if (j >= 0 && (configs[j].min + k <= min)) {
    for (i = 0; i < configs[j].min; i++) 
      moves[k + i] = configs[j].moves[i];
      computeMin(a, k + configs[j].min);
    return;
  }
  if (equal(a)) {
    computeMin(a, k);
  }
  else {
    for (i = 1; i <= 4; i++) { 
      if (k > 0) {
        switch (moves[k - 1]) {
          case 1: if (i == 3) continue; break;
          case 2: if (i == 4) continue; break;
          case 3: if (i == 1) continue; break;
          case 4: if (i == 2) continue; break;
        }
        //if (moves[k - 1] == i && count == 3) continue;
      }
      transform(a, b, i);
      moves[k] = i;
      //if (k > 0 && i != moves[k - 1])
        find(b, k + 1, 1);
     // else find(b, k + 1, count + 1);
     // retirei count
    } 
  }
}

int main() {
  int i, j, t, k, n;
  int count2[11];
  config d;
  N = 0;
  //if (DEBUG) printf("Starting static info\n");
  init(finalConf, 0);
  qsort(configs, N, sizeof(config), cmp);
  for (i = 0; i < 11*11*11*11; i++)
     start[i] = -1;
  for (i = 0; i < N; i++) {
    d = configs[i];
    j = d.a[0] + d.a[1] * 11 + d.a[2] * 121 + d.a[3] * 1331;
    if (start[j] < 0) start[j] = i;
  }
  //if (DEBUG) printf("Ending static info\n");
/* 
  for (i = 0; i <= 10; i++)
    for (j = 0; j <= 10; j++)
      for (t = 0; t <= 10; t++)
        for (k = 0; k <= 10; k++)
          printf("Start[%d][%d][%d][%d] = %d\n", i, j, t, 
                 k, start[i + j * 11 + t*121 + k * 1331]);

  for (i = 0; i < N; i++) {
    printf("%d)", i);
    for (j = 0; j < 21; j++)
      printf(" %d", configs[i].a[j]);
    printf(" MOVES: ");
    for (j = 0; j < configs[i].min; j++)
      printf("%d", configs[i].moves[j]);
    printf("\n");
  } */
  scanf("%d", &n);
  for (j = 1; j <= n; j++) {
    for (i = 0; i < 24; i++)
      scanf("%d", &startConf[i]);
    for (i = 0; i < 24; i++)
      assert(startConf[i] >= 0 && startConf[i] <= 10);
    assert(startConf[9] == startConf[21]);
    assert(startConf[10] == startConf[22]);
    assert(startConf[11] == startConf[23]);
    for (i = 0; i < 11; i++)
       count2[i] = 0;
    for (i = 0; i < 21; i++)
      count2[startConf[i]]++;
    for (i = 0; i < 11; i++)
      assert(count2[i] == count[i]);
    min = 17;
    if (equal(startConf)) 
      printf("PUZZLE ALREADY SOLVED\n");
    else {
      find(startConf, 0, 0);
      if (min > 16) {
        printf("NO SOLUTION WAS FOUND IN 16 STEPS\n");
      }
      else {
        for (i = 0; i < min; i++)
          printf("%d", minM[i]);
        printf("\n");
      }      
    }
  }  
  return 0;
}
