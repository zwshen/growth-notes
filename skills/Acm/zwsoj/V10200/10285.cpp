/* @JUDGE_ID: 13160EW 10285 C++ */
// 08/07/03 16:41:36
// Q10285: Longest Run on a Snowboard
// Recursive
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

#define SIZE 101

int org[SIZE][SIZE];
int len[SIZE][SIZE];
int r,c;
int find(int x,int y)
{
	if( x < 0 || y < 0 || x >= r || y >= c ) return 0;	
	if( len[x][y]!=0 ) return len[x][y];
	int l = 1;
	// up 
	if( x-1 >= 0 && org[x-1][y] < org[x][y] ) {
		len[x][y] = 1 + find( x-1 , y);
		if( l < len[x][y] ) l = len[x][y];
	}
	// down
	if( x+1 < r && org[x+1][y] < org[x][y] ) {
		len[x][y] = 1 + find( x+1 , y);
		if( l < len[x][y] ) l = len[x][y];
	}
	// left
	if( y-1 >= 0 && org[x][y-1] < org[x][y] ) {
		len[x][y] = 1 + find( x , y-1);
		if( l < len[x][y] ) l = len[x][y];
	}
	// right
	if( y+1 < c && org[x][y+1] < org[x][y] ) {
		len[x][y] = 1 + find( x , y+1);
		if( l < len[x][y] ) l = len[x][y];
	}

	// finally. return result.
	return (len[x][y] = l);
}

int main()
{ 
	int n;
	scanf("%d",&n);
	char s[20];
	int i,j;
	int q,k;
	while( n-- > 0 ) {
		scanf("%s %d %d", s , &r , &c);
		q = k = 0;
		for(i=0;i<r;i++)
			for(j=0;j<c;j++) {
				// get each point's height
				scanf( "%d" , &org[i][j] );
				// clear each point to 0
				len[i][j] = 0;	
			}
		
		for(i=0;i<r;i++)
			for(j=0;j<c;j++) {
				k = find(i , j );
				if( q < k) q = k;
			}
		printf("%s: %d\n" , s , q );
	} // end while


	return 0;
}

//@END_OF_SOURCE_CODE
