/** 
 * A solution for the "Tourist Guide" problem.
 *
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/100/10099.html
 * 
 * Author: Joana Matos Fonseca da Trindade 
 * Date: 2008.05.18
 */ 
#include <iostream>
#include <math.h>

#define MAXV 101

#define max(a, b) ((a > b) ? (a) : (b))
#define min(a, b) ((a < b) ? (a) : (b))

using namespace std;

/* adjacency matrix structure */
typedef struct {
    unsigned long weight[MAXV+1][MAXV+1]; /* adjacency/weight info */
    int nvertices;              /* number of vertices in graph */
} adjacency_matrix;

/* initialize matrix with weight zero and "infinite" as edges */
int initialize_adjacency_matrix(adjacency_matrix *g) {
    int i,j;                      /* counters */
    g->nvertices = 0;
    for (i=1; i<=MAXV; i++) {
	    for (j=1; j<=MAXV; j++) {
	        g->weight[i][j] = 0;
	    }
    }
    return 0;
}

/* read input */
int read_adjacency_matrix(adjacency_matrix *g, bool directed, int nvertices, int nedges) {
    int i;                        /* counter */
    int x,y;                      /* vertices */
    unsigned long w;              /* weight */ 
    initialize_adjacency_matrix(g);
	
    g->nvertices = nvertices;

    for (int i=0; i<nedges; i++) {
        cin >> x >> y >> w; 
		
	    /* remove driver from the weight count */
	    w--;
		
	    g->weight[x][y] = w;
		
	    if (directed==false) {
		    g->weight[y][x] = w;
	    }
		
    }                  
    return 0;
}

/* floyd-warshal maximin algorithm */
int maximin(adjacency_matrix *g) {
    int i,j;           /* dimension counters */
    int k;             /* intermediate vertex counter */
    for (k=1; k<=g->nvertices; k++) {
        for (i=1; i<=g->nvertices; i++) {
            for (j=1; j<=g->nvertices; j++) {
			    /* maximin */
                g->weight[i][j] = max(g->weight[i][j], min(g->weight[i][k], g->weight[k][j]));
            }
        }
    }
    return 0;
}

/* main */
int main() {
    int sc; /* scenario counter */
    int nc; /* number of cities */
    int nr; /* number of road segments */
    int start, dest, nt; /* start city, destination city, number of tourists */
    adjacency_matrix g; /* graph */
	
    sc = 0;	
    while (cin >> nc >> nr && ((nc != 0) || (nr != 0))) {
        sc++;
 
        read_adjacency_matrix(&g, false, nc, nr);
        cin >> start >> dest >> nt;
        maximin(&g);

        cout << "Scenario #" << sc << endl;
        cout << "Minimum Number of Trips = " << ceil(((double)nt) / g.weight[start][dest]) << endl << endl;  
    }
    return 0;    
}

