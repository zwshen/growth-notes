/* @JUDGE_ID: 13160EW 10189 C++ */
// Q10189: Minesweeper
// 2003/06/03

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <memory.h>

#define size 102

int board[size][size];

int main()
{
	char buf[105];
	int n,m;
	int i,j,x,y;
	int ct = 0;
	bool newline = false;
	while(1) {
		scanf("%d %d",&n,&m);
		if( n == 0 || m==0 ) break;
		
		if( newline ) printf("\n");
		else newline = true;

		memset(board , 0, sizeof(int)*size*size );
		for(i=0;i<n;i++) {
			//gets( buf );
			scanf("%s",buf);
			for(j=0;j<m;j++)
			{
				if( buf[j]=='*' )  {
					board[i][j] = -1;
					for(x=i-1;x<=i+1;x++) 
						for(y=j-1;y<=j+1;y++) {
							if( x < 0 || x >= n) continue;
							if( y < 0 || y >= m) continue;
							if( x==i && y == j) continue;
							if( board[x][y] ==-1 ) continue;
							board[x][y]++;
						} 
				}
			} // end for j
		} // end for i 
		// ¿é¥X¦a¹p°Ï
		ct++;
		printf("Field #%d:\n",ct);
		for(i=0;i<n;i++) {
			for(j=0;j<m;j++)  {
				if( board[i][j]==-1 ) printf("*");
				else printf("%d",board[i][j]);
			}
			printf("\n");
		}
	}

	return 0;
}
//@END_OF_SOURCE_CODE
