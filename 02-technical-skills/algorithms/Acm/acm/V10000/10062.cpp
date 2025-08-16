/* @JUDGE_ID: 13160EW 10062 C++ */
//Q10062: Tell me the frequencies!

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <stdlib.h>

typedef struct sWord {
	char alpha;
	int num;
}  word;

word alpha[255];

int comp(const void* e1,const void* e2) {
	word a1 =*(word*)e1;
	word a2 =*(word*)e2;
	if( a2.num==a1.num)	return a2.alpha - a1.alpha;
	return (a1.num - a2.num);
}

int main()
{
	int i,n;
	char buf[1005];
	char* p;
	scanf("%d",&n);
	while ( (p=gets(buf))!=NULL) {
		for(i=0;i<256;i++) {
			alpha[i].alpha = i;
			alpha[i].num = 0;
		}
		while( *p!=0) {
			alpha[*p].num++;
			p++;
		} // end while

		qsort( alpha,256,sizeof(word),comp);
		i = 0;
		while( alpha[i].num == 0 ) i++;
		while( i<256 ) {
			printf("%d %d\n",alpha[i].alpha , alpha[i].num );
			i++;
		}
		printf("\n");
	} // end while n
	return 0;
}
//@END_OF_SOURCE_CODE
