/* @JUDGE_ID: 13160EW 572 C++ */
// 06/13/03 08:20:02
// Q572: Oil Deposits
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

char oil[101][101];

int m,n;
void mark(int x,int y) 
{
	if(x<0 || x >=m) return;
	if(y<0 || y >=n) return;
	if( oil[x][y]=='@' ) {
		oil[x][y] = 0;
		
		mark(x-1,y);
		mark(x+1,y);
		
		mark(x-1,y-1);
		mark(x,y-1);
		mark(x+1,y-1);
		
		mark(x-1,y+1);
		mark(x,y+1);
		mark(x+1,y+1);
	}
}

int main()
{ 
	int i,j,ct;
	while( scanf("%d %d",&m,&n) ) {
		if( m == 0 || n == 0 ) break;
		for(i=0;i<m;i++)
			scanf("%s", oil[i] );
		ct = 0;
		for(i=0;i<m;i++)
			for(j=0;j<n;j++)
				if( oil[i][j]=='@') {
					ct++;
					mark(i,j);
				}
		printf("%d\n",ct);
	}

	return 0;
}

//@END_OF_SOURCE_CODE
