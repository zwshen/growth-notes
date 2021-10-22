#include <stdio.h>
#include <algorithm>
#include <vector>
using namespace std;

typedef struct no {
	int w;
	bool visited;
} node;

void checkNode(int m, int n, int matrix[][105], node graph[][105]) {
	int i, j, minVal=INT_MAX;

	for (int k=0; k<m; k++) {
		for (int l=0; l<n; l++)
			if (minVal>graph[k][l].w && !graph[k][l].visited) {
				i=k; j=l; minVal=graph[i][j].w;
			}
	}

	if (minVal==INT_MAX) return;

	graph[i][j].visited=true;

	/*	for (int k=0; k<m; k++) {
		for (int l=0; l<n; l++)
		printf("%10d ", graph[k][l].w);

		printf("\n");
		} */

	if (i>=1) if (!matrix[i-1][j]) {
		int temp = min(graph[i-1][j].w, graph[i][j].w+1);
		graph[i-1][j].w = temp;
	}

	if (j>=1) if (!matrix[i][j-1]) {
		int temp = (min(graph[i][j-1].w, graph[i][j].w+1));
		graph[i][j-1].w = temp;
	}

	if ((i+1)<m) if (!matrix[i+1][j]) {
		int temp = (min(graph[i+1][j].w, graph[i][j].w+1));
		graph[i+1][j].w = temp;
	}

	if ((j+1)<n) if (!matrix[i][j+1]) {
		int temp = (min(graph[i][j+1].w, graph[i][j].w+1));
		graph[i][j+1].w = temp;
	}

	checkNode(m, n, matrix, graph);
}

int main() {
	int matrix[105][105];
	int m, n;
	node graph[105][105];
	int cases;

	scanf("%d", &cases);

	while (cases--) {
		int acol, arow;
		int bcol, brow;
		int num=0;

		scanf("%d%d", &n, &m);

		for (int i=0; i<m; i++) {
			for (int j=0; j<n; j++) 
				scanf("%d", &matrix[i][j]);
		}

		scanf("%d%d", &acol, &arow);
		scanf("%d%d", &bcol, &brow);

		for (int i=0; i<m; i++) {
			for (int j=0; j<n; j++) {
				graph[i][j].w=INT_MAX;
				graph[i][j].visited=false;
			}
		}

		int i=arow, j=acol;
		graph[i][j].w=0;

		checkNode(m, n, matrix, graph);

		printf("%d\n", graph[brow][bcol].w+1);

		/* for (i=0; i<m; i++) {
		   for (j=0; j<n; j++)
		   printf("%10d ", graph[i][j].w);

		   printf("\n");
		   } */
	}

	return 0;
}
