/* @JUDGE_ID: 13160EW 499 C++ */
// What's The Frequency, Kenneth?

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <stdlib.h>

typedef struct sWord {
	char alpha;
	int num;
}  word;

word alpha[60] = { 0 };

int comp(const void* e1,const void* e2) {
	word a1 =*(word*)e1;
	word a2 =*(word*)e2;
	if( a2.num==a1.num)	return a1.alpha - a2.alpha;
	return (a2.num - a1.num);
}

int main()
{
	int i,n,max;
	char buf[1000];
	char* p;
	scanf("%d",&n);
	while ( (p=gets(buf))!=NULL) {
		for(i=0;i<26;i++) {
			alpha[i].alpha = 'A' + i;
			alpha[i].num = 0;
		}
		for(;i<52;i++) {
			alpha[i].alpha = 'a' + (i-26);
			alpha[i].num = 0;
		}
		while( *p!=0) {
			if( *p>='a' && *p<='z') {
				alpha[*p-'a'+26].num++;
			} else 	if( *p>='A' && *p<='Z') {
				alpha[*p-'A'].num++;
			}
			p++;
		} // end while

		// 已經字母順序和數字大小排過
		// 大寫的在前、小寫的在後
		qsort( alpha,52,sizeof(word),comp);

		max = alpha[0].num;
		i = 0;
		// 顯示前幾個一樣大的字母
		while( i < 52 && alpha[i].num == max ) {
			printf("%c",alpha[i].alpha );
			i++;
		}
		// max 的值
		printf(" %d\n",max);
	} // end while n
	return 0;
}
//@END_OF_SOURCE_CODE
