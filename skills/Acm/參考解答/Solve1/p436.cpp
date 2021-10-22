/* @JUDGE_ID: xxxxxx 436 C++ */
    
#include <stdio.h>
#include <string.h>

#define MAXD	31

typedef float elem;
elem table[MAXD][MAXD];

char currency[MAXD][100];

int dimension;	

void error() {
  int um = 1, zero = 0; 
  um = um / zero;
}
int index(char s[]) {
  int i;
  for (i = 0; i < dimension; i++)
    if (strcmp(currency[i], s) == 0) return i;
  error();
}

int ReadTable()
/* return 1 if exchange rates read, 0 otherwise */
{
    int i,j, m;
    float p;
    int c1, c2;
    char d1[100], d2[100];
    if (scanf("%d",&dimension) != 1)
	return 0;
    if (dimension == 0) return 0;
    for (i = 0; i < dimension; i++)
      scanf("%s", currency[i]);
    for(i=0;i<dimension;i++)
	for(j=0;j<dimension;j++){
	    table[i][j] = 0.0;
	}
    scanf("%d", &m);
    for (i = 0; i < m; i++) {
      scanf("%s %f %s", d1, &p, d2);
      c1 = index(d1);
      c2 = index(d2);
      table[c1][c2] = (elem)p;
    }
    return 1;
}

void allShortestPath() // adjacency matrix
  {
    int x, y, j;
	for (y = 0; y < dimension; y++)
      for (x = 0; x < dimension; x++) 
        if (table[x][y] != 0.0)
          for (j = 0; j < dimension; j++) 
            if (table[y][j] > 0.0)
               if (table[x][j] == 0.0 || (table[x][y]*table[y][j] > table[x][j]))
                  table[x][j] = table[x][y] * table[y][j];
  }

int CycleExists() {
    int i,j;
    for(i=0;i<dimension;i++){
	for(j=0;j<dimension;j++){
	    if (table[i][j]*table[j][i] > 1.0){
		return 1;
	    }
	}
    }
    return 0;
}

int main() {
    int pn = 0;
    while(ReadTable()){
	if (dimension > 30) error();
      allShortestPath();
      if (CycleExists())
	  printf("Case %d: Yes\n", ++pn);
      else printf("Case %d: No\n", ++pn);
    }
   return 0;
}
