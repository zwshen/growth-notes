/* @JUDGE_ID: 13160EW 455 C++ */
// 06/05/03 22:15:24
// Q455: Periodic Strings

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

int main()
{ 
	int n;
	int best_len , base_ch,i;
	int len;
	char buf[100];
	bool flag;
	scanf("%d",&n);
	gets(buf);
	while( n-- > 0 ) 
	{
		gets(buf);
		gets(buf);
		len = strlen(buf);
		best_len = 0;
		while( best_len < len ) {
			best_len++;
			if( len % best_len != 0) continue;
			flag = true;
			for( base_ch = 0 ; base_ch < best_len && flag ; base_ch++) {
				for( i = base_ch + best_len ; i<len ; i+=best_len) {
					if( buf[base_ch] != buf[i] ) {
						flag  = false;
						break;
					} // end if
				} // for i
			} // for base_ch
			if( flag ) break;	// §ä¨ì¸Ñ
		} // while
		printf("%d\n" , best_len ); // ¸Ñ
		if(n > 0 ) printf("\n");
	}


	return 0;
}

//@END_OF_SOURCE_CODE
