#include <cstdlib>
#include <iostream>
#include <math.h>

#define FRECKLES 101
using namespace std;


// Adjacent matrix for graph weights
double graph[FRECKLES][FRECKLES];

struct coordinates {
    double x;
    double y;
};

double dist(coordinates p1, coordinates p2) {

       return sqrt(pow(p1.x-p2.x,2)+pow(p1.y-p2.y,2));

}

int compare (const void * a, const void * b) {
      if (a < b) {
          return -1;
      } else {
          return 1;
      }
}

double prim(double graph[][FRECKLES], int points, int src) {

    int visited[points], parent[points];
    double d[points], min, stcost;
    int u, v;

    for (int i = 0; i < points; i++) {
		d[i] = graph[src][i];
		visited[i] = 0;
		parent[i] = src;
	}

    visited[src] = 1;
	stcost = 0;
	for (int i = 0; i < points-1; i++)
	{
		min = 999;
		for (int j = 0; j < points; j++)
		{
			if (!visited[j] && d[j] < min)
			{
				min = d[j];
				u = j;
			}
		}
		visited[u] = 1;
		stcost = stcost + d[u]; //graph[i][u];
		for (v = 0; v < points; v++)
			if (!visited[v] && (graph[u][v] < d[v]))
			{
				d[v] = graph[u][v];
				parent[v] = u;
			}
	}
    return stcost;
}

int main(int argc, char *argv[]) {

    int cases = 0;

    // Read number of cases
    cin >> cases;

    // Test each case
    for (int i = 0; i < cases; i++) {
        int points = 0;
        // read number of points
        cin >> points;
        
        // freckles coordinates
        coordinates coord[points];
        // Read each point and calc weight
        for (int j = 0; j < points; j++) {
            cin >> coord[j].x >> coord[j].y;
        }
        for (int j = 0; j < points; j++) {
            for (int k = j; k < points; k++) {
                graph[j][k] = dist(coord[j], coord[k]);
                graph[k][j] = graph[j][k];
            }
        }
        // Print result
        printf("%.2lf\n", prim(graph, points, 0));
        if (i < cases-1)
           cout << endl;

    }
    return EXIT_SUCCESS;
}
