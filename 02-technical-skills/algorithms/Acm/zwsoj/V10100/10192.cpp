/* @JUDGE_ID: 13160EW 10192 C++ "DP" */
// Q10192: Vacation
// 2003/06/03
//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <string.h>

const int size = 105;
int a[size][size] = { 0 };

int main()
{
	int i,j;
	int m,n;
	int ct = 0;
	char s1[size];
	char s2[size];
	while( 	1 ) {
		gets(s1);
		if(s1[0]=='#' ) break;
		gets(s2);
		m = strlen(s1);
		n = strlen(s2);
		for(i=0;i<=m;i++)
			for(j=0;j<=n;j++)	a[i][j] = 0;

		for(i=1;i<=m;i++) {
			for(j=1;j<=n;j++) {
				if( s1[i-1] == s2[j-1] )	
					a[i][j] = a[i-1][j-1]+1;
				else
					if( a[i][j-1] > a[i-1][j] )
						a[i][j] = a[i][j-1];
					else 
						a[i][j] = a[i-1][j];
			} // end for j
		} // end for i
		// ¿é¥X¸Ñµª
		ct++;
		printf("Case #%d: you can visit at most %d cities.\n",ct , a[m][n]);
	}
	
	return 0;
}
//@END_OF_SOURCE_CODE
