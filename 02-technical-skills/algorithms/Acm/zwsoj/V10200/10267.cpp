/* @JUDGE_ID: 13160EW 10267 C++ */
// 04/14/07 14:01:38
// Problem E: Graphical Editor 

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h>

const int MAX_GRID = 251;
int cur_rows = MAX_GRID;	// cols
int cur_cols = MAX_GRID;	// rows
char grid[MAX_GRID][MAX_GRID] = {0};

#define swap(x,y) x^=y^=x^=y

void clear_bmp() {
	int i,j;
	for(i=1;i<=cur_rows;i++)
		for(j=1;j<=cur_cols;j++) {
			grid[i][j] = 'O';
		}
}

void create_bmp(int cols, int rows) {
	// allocate height & width
	cur_rows = rows;
	cur_cols = cols;
	clear_bmp();
}

inline void color_pixel(int col, int row, char color) {
	grid[row][col] = color;
}

// recursive color region
void color_region(int col, int row, char r, char color) 
{
	if( grid[row][col] == color) return;

	color_pixel(col, row, color);

	if( row > 1 && grid[row-1][col] == r ) {
		color_region(col, row-1, r, color);
	}

	if( col > 1 && grid[row][col-1] == r ) {
		color_region(col-1, row, r, color);
	}

	if( row + 1 <= cur_rows && grid[row+1][col] == r ) {
		color_region(col, row+1, r, color);
	}

	if( col + 1 <= cur_cols && grid[row][col+1] == r ) {
		color_region(col+1, row, r, color);
	}
}

void out(char* name) {
	printf("%s\n", name);
	int i,j;
	for(i=1;i<=cur_rows;i++) {
		for(j=1;j<=cur_cols;j++) {
			printf("%c", grid[i][j] );
		}
		printf("\n");
	}
}

int main()
{
	bool terminate = false;
	char keyin, color;
	int x1,y1,x2,y2;
	int i,j;
	char name[30];
	while(!terminate) {
		scanf("%c", &keyin);		
		switch(keyin) {
			case 'I':	// create
				scanf("%d %d", &x1, &y1);
				create_bmp(x1, y1);
			break;
			case 'C':	// clear
				clear_bmp();
			break;
			case 'L':	// color
				scanf("%d %d %c", &x1, &y1, &color);
				color_pixel(x1, y1, color);
			break;
			case 'V':	// vertical 
				scanf("%d %d %d %c", &x1, &y1, &y2, &color);
				if(y1>y2) swap(y1,y2);
				for(i=y1;i<=y2;i++)
					color_pixel(x1, i, color);
			break;
			case 'H':	// horizontal
				scanf("%d %d %d %c", &x1, &x2, &y1, &color);
				if(x1>x2) swap(x1,x2);
				for(i=x1;i<=x2;i++)
					color_pixel(i, y1, color);
			break;
			case 'K':	// rectangle
				scanf("%d %d %d %d %c", &x1, &y1, &x2, &y2, &color);
				if( x1 > x2 ) swap(x1,x2);
				if( y1 > y2) swap(y1,y2);
				for(i=x1;i<=x2;i++)
					for(j=y1;j<=y2;j++)
						color_pixel(i,j, color);
			break;
			case 'F':	// region
				scanf("%d %d %c", &x1, &y1, &color);
				color_region(x1, y1, grid[y1][x1], color);
			break;
			case 'S':	// store
				scanf("%s", name);
				out(name);
			break;
			case 'X':	// store
				terminate = true;
			break;
			default:	// ignore this line
			break;
		}
	}
	return 0;
}
