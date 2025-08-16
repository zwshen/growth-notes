/* @JUDGE_ID: 13160EW 10324 C++ */
// 06/16/03 08:17:15
// Q10324: Zeros and Ones
// ²Ä100ÃD accept
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

#define SIZE 1000000

char buf[SIZE+1];
long num[SIZE+1];
int len;
void do_set()
{
	long sum =0;
	long i;;
	for(i=0;i<len;i++) {
		if( buf[i] == '1' ) sum+=1;
		num[i] = sum;
	}
}

int main()
{ 
	int n,k;
	long i,j,d;
	int ct = 1;
	while( scanf("%s",buf)==1 ) {
		scanf("%d",&n);
		len = strlen(buf);
		do_set();
		printf("Case %d:\n" , ct++ );
		for( k = 0 ; k < n ; k++) {
			scanf("%ld %ld",&i,&j);
			if( i >= len || j >= len)
				printf("NO\n");
			else {
				if( i > j ) i^=j^=i^=j;	
				d = num[j]-num[i];
				if( buf[i] == buf[j] && (d == 0 || d ==(j-i)) )
					printf("YES\n");
				else 
					printf("NO\n");		
			}
		}
	}


	return 0;
}

//@END_OF_SOURCE_CODE
