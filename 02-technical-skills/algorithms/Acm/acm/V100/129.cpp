/* @JUDGE_ID: 13160EW 129 C++ */
// 01/19/04 01:12:41
// Krypton Factor
// 產生連續無重覆的字串
//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 
#include <string.h>

#define MAX 40000
char str[MAX];
int n,l;
int last;

bool check() 
{
	int length;
	int i;
	int half = (last+1)/2;
	for( length = 1 ; length <= half ; length++) {
		for( i = 0 ; i < length; i++) {
			if( str[last-i] != str[last-length-i] ) break;
		}
		if( i == length ) return false;
	}
	return true;
}

void gen()
{
	int ct = 1;
	str[0] = 0; // 'A'
	str[1] = 1; // 'B'
	last = 0;
	while( ct < n ) {
		// generate next
		if( check() ) {
			// extend 
			ct++;
			str[++last] =  0 ;
		} else {
			// do backtrack
			while(1) {
				for( ; str[last] == l ; last--);
				str[last]++;
				if( str[last] != l ) break;
			}
		}
	} // end while
	// finaly check
	while( !check() ) {
		while(1) {
			for( ; str[last] == l ; last--);
			str[last]++;
			if( str[last] != l ) break;
		}
	}
}

int main()
{
	int i;
	while(1) {
		scanf("%d %d", &n , &l );
		if( n == 0 ) break; // end
		gen();
		int ct = 0;
		printf("%c" , str[0] + 'A');
		for( i = 1 ; i <= last ; i++) {
			if( i % 4 ==0 ) {
				ct++;
				if( ct % 16 ==0 ) 
					printf("\n");
				else 
					printf(" ");
			}
			printf("%c" , str[i] + 'A');
		}
		printf("\n%d\n" , last+1 );
	}
	return 0;
}