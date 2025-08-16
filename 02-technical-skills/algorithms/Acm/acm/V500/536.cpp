// Q536: Tree Recovery

#include <stdio.h>
#include <string.h>


char p[30],m[30];
int len;
int head;

void recursive(int start , int end)
{
	int i;
	if(start < end)  {
		head++;
		for(i=0;i<len;i++) {
			// find root
			if( p[head] == m[i] ) {
				// ¥ª
				recursive( start , i );
				// ¥k
				recursive( i+1 , end);
				// ¤¤
				printf("%c" , m[i]);
				break;
			}
		}	 // end for
	} // end if
}


int main()
{
	while( scanf("%s %s", p , m )==2) {
		head = -1;
		len = strlen(p);
		recursive( 0 , len );
		printf("\n");
	}
	
	return 0;
}
