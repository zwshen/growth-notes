/*
	PROG: milkweed
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <deque>
using namespace std;

typedef struct pt {
	int i, j;
	int week;
} Pt;

int x, y, mx, my, lacks;
char field[110][110];
int iter[][2] = {{0, 1}, {1, 0}, {0, -1}, {-1, 0},
		{1, 1}, {-1, 1}, {1, -1}, {-1, -1}};
deque<Pt> queue;
int nWeeks;

void spread(int i, int j, int week=0) {
	if (field[i][j]=='.') lacks--;	

	field[i][j]='M'; 
	nWeeks=week;

	if (!lacks) return;

	for (int k=0; k<8; k++) {
		Pt temp; 
		temp.i = i+iter[k][0]; 
		temp.j = j+iter[k][1];
		temp.week = week+1;

		queue.push_back(temp);
	}
}

void BSF() {
	spread(my-1, mx-1, 0);

	while (lacks>0) {
		int ytemp = queue.front().i;
		int xtemp = queue.front().j;
		int week = queue.front().week;
	
		if (ytemp>=0 && ytemp<y && xtemp>=0 && xtemp<x) 
			if (field[ytemp][xtemp]=='.')
				spread(ytemp, xtemp, week);
	
		queue.pop_front();
	}
}

int main() {
	freopen("milkweed.in", "r", stdin);
	freopen("milkweed.out", "w", stdout);

	scanf("%d %d %d %d", &x, &y, &mx, &my);
	lacks=x*y;

	for (int i=y-1; i>=0; i--) {
		for (int j=0; j<x; j++) {
			scanf(" %c", &field[i][j]);

			if (field[i][j]=='*') lacks--;
		}
	}

//	printf("%d\n", lacks);
//	queue.clear();	
	BSF();

/*	for (int i=0; i<y; i++) {
		for (int j=0; j<x; j++)
			printf("%c", field[i][j]);

		printf("\n");
	} */

	printf("%d\n", nWeeks);
 
	return 0;
}
