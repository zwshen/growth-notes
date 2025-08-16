/* @JUDGE_ID: 13160EW 291 C++ */
// 06/07/03 21:42:15
// Q291: The House Of Santa Claus
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int maze[6][6] = { 0 };
int side = 8;
int queue[10];
int top = 0;

void go( int pos , int s ) 
{
	int i;
	if( s == 0 ) {
		for( i = 0;i <= side;i++)
			printf("%d",queue[i] );
		printf("\n");
	} else {
		for( i = 1 ; i <= 5 ; i++) {
			if( maze[pos][i]==1) {
				queue[top++] = i;
				maze[pos][i] = 0;
				maze[i][pos] = 0;
				go( i , s - 1 );
				maze[pos][i] = 1;
				maze[i][pos] = 1;
				top--;
			}
		}
	
	}
}

int main()
{ 
	maze[1][2] = maze[1][3] =  maze[1][5] = 1;
	maze[2][1] = maze[2][3] =  maze[2][5] = 1;
	maze[3][4] = maze[3][5] =  maze[3][1] = 1;
	maze[4][3] = maze[4][5] = 1;
	maze[5][4] = maze[5][3] = maze[5][2] = 1;
	queue[top++] = 1;
	go( 1 , 8 );

	return 0;
}

//@END_OF_SOURCE_CODE
