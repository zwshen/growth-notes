/* @JUDGE_ID: 13160EW 100 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>

#define max 25

int current[max];
int answer[max];
int matrix[max][max];

int LCS(int n) 
{
	int i,j;
	for(i=0;i<=n;i++)
		for(j=0;j<=n;j++)
			matrix[i][j] = 0;
	/*
	printf("FIND_LCS:\n");
	for(i=0;i<n;i++)
		printf("%3d",current[i] );
	printf("\n");
	for(i=0;i<n;i++)
		printf("%3d",answer[i] );
	printf("\n");
	*/
	for(i=1;i<=n;i++)
		for(j=1;j<=n;j++) {
			if( current[i-1] == answer[j-1] )
				matrix[i][j] = matrix[i-1][j-1]+1;
			else
				if( matrix[i-1][j] > matrix[i][j-1] )
					matrix[i][j] = matrix[i-1][j];
				else
					matrix[i][j] = matrix[i][j-1];
		}

	return matrix[n][n];
}

int main()
{
	int i,n,t;
	// n 個解答
	scanf("%d" , &n );
	// 解答
	for(i=0 ; i<n;i++) {
		scanf("%d" , &t );
		current[t-1] = i+1;
	} // end while
	while( scanf("%d",&t )==1 ) {
		// 每一個學生的答案
		answer[t-1] = 1;
		for(i=1 ; i<n ; i++) {
			scanf("%d",&t );
			answer[t-1] = i+1;
		}
		printf("%d\n",LCS(n) );
	} // end while
	return 0;
}
//@END_OF_SOURCE_CODE
