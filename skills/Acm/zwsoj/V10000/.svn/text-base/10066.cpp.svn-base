/* @JUDGE_ID: 13160EW 10066 C++ */
// 06/15/03 23:53:00

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int tower1[101],tower2[101];
int maze[101][101];

int lcs(int n1,int n2)
{
	int i,j;
	for( i = 0 ; i < n1 ; i++) maze[i][0] = 0;
	for( i = 0 ; i < n2 ; i++) maze[0][i] = 0;
	
	for( i = 1 ; i <= n1 ; i++)  { 
		for( j = 1 ; j <= n2 ; j++ ) {
			if( tower1[i-1] == tower2[j-1] )
				maze[i][j] = maze[i-1][j-1] + 1;
			else if( maze[i][j-1] > maze[i-1][j] )
				maze[i][j] = maze[i][j-1];
			else 
				maze[i][j] = maze[i-1][j];
		}
	}

	return maze[n1][n2];
}

int main()
{ 
	int n1,n2;
	int i;
	int ct = 1;
	while(1) {
		scanf("%d %d",&n1,&n2);
		if( n1 == 0 || n2 == 0) break;
		for(i=0;i<n1;i++) scanf("%d",&tower1[i]);
		for(i=0;i<n2;i++) scanf("%d",&tower2[i]);
		printf("Twin Towers #%d\n",ct++);
		printf("Number of Tiles : %d\n" , lcs(n1,n2) );
	}


	return 0;
}

//@END_OF_SOURCE_CODE
