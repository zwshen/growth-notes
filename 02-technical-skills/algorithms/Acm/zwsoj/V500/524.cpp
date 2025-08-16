/* @JUDGE_ID: 13160EW 524 C++ */
// 524 Prime Ring Problem  
// 給一組數字，圍成一圈，任兩個數字相加仍然是質數
// 由於n 最多只會到 16，則質數最大只到16+15=31
// 建table 來解即可。

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int stack[17];
int sp = 0;
int narr[17];
int n;
int prime[32] = { 0,0,1,1,0,1,0,1,0,0,0,1,0,1,0,0,0,1,0,1,0,0,0,1,0,0,0,0,0,1,0,1 };
void r(int prev,int times) {
	int i;
	if( times == n ) {
		if( prime[stack[sp-1] + 1] ) { // 尾巴加1也要是質數
			// 找到一組解
			for(i=0;i<n;i++) printf("%d ",stack[i] );
			printf("\n");
		}
	} else {
		for(i=2;i<=n;i++ ) {
			if( narr[i] ) continue;
			if( prime[prev+i] ) { // 相加是質數
				narr[i] = 1;
				stack[sp++] = i;
				r(i,times+1);
				sp--;
				narr[i] = 0;
			}
		}
	}
}

int main()
{
	int ct = 1;
	int i;
	while( scanf("%d",&n)==1 )
	{
		printf("Case %d:\n",ct++);
		for( i=0 ; i<17 ; i++ ) narr[i] = 0;
		stack[0] = 	narr[1] = sp = 1;
		r( 1,1 ); // 開始遞迴
		printf("\n");
	}
	return 0;
}
//@END_OF_SOURCE_CODE
