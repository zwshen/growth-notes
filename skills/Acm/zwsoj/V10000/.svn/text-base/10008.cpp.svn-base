#include <stdio.h>
#include <stdlib.h>

typedef struct sWord {
	char alpha;
	int num;
}  word;

word alpha[26];

int comp(const void* e1,const void* e2) {
	word a1 =*(word*)e1;
	word a2 =*(word*)e2;
	if( a2.num==a1.num)	return a1.alpha - a2.alpha;
	return (a2.num - a1.num);
}

int main()
{
	int n;
	int i;
	char buf[1000];
	char* p;
	for(i=0;i<26;i++) {
		alpha[i].alpha = 'A' + i;
		alpha[i].num = 0;
	}
	scanf("%d",&n);
	while (n-- >= 0 ) {
		p = gets(buf);
		while( *p!=0) {
			if( *p>='a' && *p<='z') {
				alpha[*p-'a'].num++;
			} else 	if( *p>='A' && *p<='Z') {
				alpha[*p-'A'].num++;
			}
			p++;
		} // end while
	} // end while n
	qsort( alpha,26,sizeof(word),comp);
	for(i=0;i<26 && alpha[i].num>0 ;i++) {
		printf("%c %d\n",alpha[i].alpha,alpha[i].num );
	}
	return 0;
}
