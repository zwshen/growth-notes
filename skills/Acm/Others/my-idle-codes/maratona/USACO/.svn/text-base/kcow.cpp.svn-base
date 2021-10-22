/* 
	PROG: kcow
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <deque>
using namespace std;

int cases;
int x, y;
char field[155][155];
deque< pair< pair<int, int>, int> > queue;

int search(int i, int j, int count) {
	if (i<0 || j<0 || j>=x || i>=y) return -1;
	if (field[i][j]=='*') return -1;
	if (field[i][j]=='V') return -1;

	field[i][j]='V';

	pair<int, int> coords;
	count++;

	coords.first=i-2; coords.second=j+1;
	queue.push_back(make_pair(coords, count));
	coords.first=i-1; coords.second=j+2;
	queue.push_back(make_pair(coords, count));
	coords.first=i+1; coords.second=j+2;
	queue.push_back(make_pair(coords, count));
	coords.first=i+2; coords.second=j+1;
	queue.push_back(make_pair(coords, count));
	coords.first=i+2; coords.second=j-1;
	queue.push_back(make_pair(coords, count));
	coords.first=i+1; coords.second=j-2;
	queue.push_back(make_pair(coords, count));
	coords.first=i-1; coords.second=j-2;
	queue.push_back(make_pair(coords, count));
	coords.first=i-2; coords.second=j-1;
	queue.push_back(make_pair(coords, count));
}

int BSF(int i, int j) {
	queue.push_back(make_pair(make_pair(i,j), 0));

	while (!queue.empty()) {
		int fY = queue.front().first.first, fX = queue.front().first.second;
		int cont =  queue.front().second;
	
		if (fY>=0 && fY<y && fX>=0 && fX<x) if (field[fY][fX]=='H') return cont;
	
		queue.pop_front();	
		search(fY, fX, cont);
	}
}

int initX, initY;

int main() {
	FILE* fin = fopen("kcow.in", "r");
	FILE* fout = fopen("kcow.out", "w");

	fscanf(fin, "%d %d", &x, &y);

	for (int i=0; i<y; i++) {
		for (int j=0; j<x; j++) {
			fscanf(fin, " %c", &field[i][j]);

			if (field[i][j]=='K') {initX=j; initY=i;}
		}
	}

	/*		for (int i=0; i<y; i++) {
			for (int j=0; j<x; j++)
			printf("%c", field[i][j]);

			printf("\n");
			} */

	int solve = BSF(initY, initX);
	//		printf("%d %d\n", initX, initY);

	fprintf(fout, "%d\n", solve); 

	return 0;
}
