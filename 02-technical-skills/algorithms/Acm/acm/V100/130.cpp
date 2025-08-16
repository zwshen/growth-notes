/* @JUDGE_ID: 13160EW 130 C++ */
// 06/07/03 12:23:54
// Q130:Roman Roulette  

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int queue[105];

void CountRoman(int n,int k) 
{
	int i;
	int tot=n;
	int killed , next = -1;
	int ct = 0;

	for(i=0;i<n;i++)
		queue[i] = i+1;

	while( tot > 1 ) {
		// 找第一個要殺掉的人
		ct = 0;
		while( ct < k ) {
			next = ( next + 1 ) % n;
			if( queue[next]!=0 ) ct++;
		}
		killed = next;			// find it
		queue[killed] = 0;	// kill it
		next-- ;
		// 找埋葬者
		ct = 0;
		while( ct < k ) {
			next = ( next + 1 ) % n;
			if( queue[next]!=0 ) ct++;
		}
		// 把埋葬者調到被殺掉的位置
		queue[killed] = queue[next];
		queue[next] = 0;
		next = killed;		
		tot--; // 少一個人了
	}
	i = 0;
	while( queue[i] == 0) i++;

	// 此處求出來的最後一個人的編號
	// 就是最後的存活者位置，而 jopesh 本身是1號
	// 所以並須讓1 號排在這個位置
	// 也就是指 輸出結果 並須是
	// 一個起始位置，而讓原本的1號排在剛好是最後存活的位置

	// (n - 目前的位置+1 ) 再 +1 就是 輸出結果
	printf("%d\n" , (n - queue[i] + 1) % n + 1 );
	
}

int main()
{ 
	int n,k;
	while(1) {
		scanf("%d %d",&n,&k );
		if( n == 0 && k == 0 ) break;
		CountRoman(n,k);
	}


	return 0;
}

//@END_OF_SOURCE_CODE
