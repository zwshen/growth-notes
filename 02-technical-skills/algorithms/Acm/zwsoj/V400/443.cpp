/* @JUDGE_ID: 13160EW 443 C++ */
// 06/20/03 22:34:42
// 113 0:00.023 64 ¨H ¬F¤å C++ 2003/06/20-14:27:24.301 1669103   (H0)  
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <stdio.h>

unsigned long a[5843];
unsigned long small(unsigned long a,unsigned long b,unsigned long c,unsigned long d) {
	unsigned long temp = a;
	if( temp > b ) temp = b;
	if( temp > c) temp = c;
	if( temp > d) temp = d;
	return temp;
}
void make_table()
{
	int i;
	int two = 0 , three = 0 ,five = 0 , seven = 0;
	a[0] = 1;
	for(i=1 ; i<5843;i++) {
		a[i] = small( a[two]*2 , a[three]*3 ,a[five]*5,a[seven]*7);
		if( a[i] % 2 == 0 ) two++;
		if( a[i] % 3 == 0 ) three++;
		if( a[i] % 5 == 0 ) five++;
		if( a[i] % 7 == 0 ) seven++;
		//printf("%d\n" , a[i] );
	}

}
int main()
{ 
	make_table();
	int n;
	while( 1 ) {
		scanf("%d",&n);
		if( n<=0 ) break;
		switch( n%100 ) {
		case 11: case 12: case 13: 
			printf("The %dth humble number is %ld.\n", n , a[n-1] );
			break;
		default:
			switch( n%10) {
				case 1:
				printf("The %dst humble number is %ld.\n", n , a[n-1] );
					break;
				case 2:
				printf("The %dnd humble number is %ld.\n", n , a[n-1] );
					break;
				case 3:
				printf("The %drd humble number is %ld.\n", n , a[n-1] );
					break;
				default:
				printf("The %dth humble number is %ld.\n", n , a[n-1] );
			}
			
		}
	}
	
	return 0;
}

//@END_OF_SOURCE_CODE
