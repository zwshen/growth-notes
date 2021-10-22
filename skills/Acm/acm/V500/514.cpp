/* @JUDGE_ID: 13160EW 514 C++ */
// 06/17/03 23:10:18
// Q514: Rails

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#define size 1000

int stack[size];
int stop;
int num[size];
int train[size];

int main()
{ 
	int i,n,ti;
	bool newline = false;
	// 火車編號列表
	for(i=0;i<size;i++) train[i] = i+1;
	while(1) {
		scanf("%d",&n);
		if( n == 0 ) break;
		if(newline)		printf("\n");
		else newline = true;
		while(1) {
			// 讀取每一組資料
			scanf("%d" , &num[0] );
			if( num[0] == 0 ) break;
			for(i=1;i<n;i++) scanf("%d",&num[i]);

			////////////////////////////////////
			stop = ti = i = 0;
			while( ti < n) {
				// 先將火車置入堆疊
				stack[stop++] = train[ti++];
				while( stop > 0 ) {
					// 判斷在堆疊最上方的火車編號是否可以離開
					if( stack[stop-1] == num[i] ) {
						// ok..exit it.
						i++;
						stop--;
					} else break;
				}
			}
			////////////////////////////////////
			if( stop==0) printf("YES\n");
			else printf("NO\n");
		}
	}



	return 0;
}

//@END_OF_SOURCE_CODE
