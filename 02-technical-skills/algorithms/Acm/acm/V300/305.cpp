#include <stdio.h>

void find(int k) 
{
	long m = k;
	int n,bads,loc;
	
	while(1) {
		m++;		// 目前正在判斷的解
		n = 2*k;	// 共有2*k個人
		bads = k;	// 有 k 個壞人
		loc = -1;	// 循環中的位置
		while( bads > 0 ) {
			loc = ( loc+m )%n;
			if( loc < k ) break;
			bads--;		// 壞人數少一
			n--;		// 總人數少一
			loc--;		// 循環位置退一格
		}
		if( n==k ) break; // 找到解答
	}
	
	// 輸出解答
	printf("%ld\n",m);
}

int main()
{
	int k;
	while(1) {
		scanf("%d",&k);
		if( k == 0 ) break;
		find(k);
	}
	return 1;
}