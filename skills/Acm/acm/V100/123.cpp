/* @JUDGE_ID: 13160EW 123 C++ */
// 01/17/04 23:31:36
// 123 Searching Quickly
//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 
#include <stdlib.h>
#include <string.h>

struct sKEY {
	char word[15];
	int row;  // which title
	int col;  // position
} key[2000];
int key_max;

int MyComp(const void* e1 , const void* e2)
{
	sKEY* s1 = (sKEY*)e1;
	sKEY* s2 = (sKEY*)e2;
	int r = strcmp( s1->word , s2->word ) ; 
	if( r != 0) return r;
	return s1->row - s2->row;	
}

struct sIgnore {
	char word[15];
	int len; 
} ignore[51];

int ignore_max ;

// the string is ignore or not.
bool IsIgnore( char* str ) 
{
	int i , len = strlen(str);
	for( i = 0 ; i < ignore_max ; i++)
		if( len == ignore[i].len  // 先判斷長度、再判斷內容
			&& strcmp( ignore[i].word , str)== 0) return false;
	return true;
}
int main()
{
	// 先取得所有 ignore word
	ignore_max = 0;
	while( gets( ignore[ ignore_max ].word ) )  {
		if( ignore[ ignore_max ].word[0] == ':' ) break;
		ignore[ignore_max].len = strlen(ignore[ignore_max].word) ;
		ignore_max++;
	}

	char buf[201][1000];
	char str[100];
	int i , j ,ct = 0 , len;
	key_max = 0;
	while( gets( buf[ct] ) ) {
		// 全轉小寫
		//_strlwr( buf[ct] );
		len = strlen(buf[ct] );
		for(i=0;i<len;i++)
			if( buf[ct][i] >= 'A' && buf[ct][i] <= 'Z' )
				buf[ct][i] = buf[ct][i] - 'A' + 'a';
		// 拆出每一個word 看是不是keyword
		i = 0 ;
		while( buf[ct][i] != 0 ) {
			// remove space
			while( buf[ct][i] != 0 && buf[ct][i] == ' ' ) i++;
			// find a word
			j = 0;
			while( buf[ct][i]!= 0 && buf[ct][i] >= 'a' && buf[ct][i] <= 'z') {
				// 轉大寫
				str[j++] = buf[ct][i];
				i++;
			}
			str[j++] = 0;
			if( IsIgnore( str ) ) {
				// add new keyword
				//_strupr(str);
				j = 0;
				while( str[j]!=0 ) {
					str[j] = str[j] -'a' + 'A';
					j++;
				}
				strcpy( key[key_max].word , str );
				key[key_max].row = ct;
				key[key_max].col = i-j;
				key_max++;
			}
		}
		ct++ ;
	} // end while
	
	// quick sort
	qsort( key , key_max , sizeof(sKEY) , MyComp );
	for( i = 0 ;i < key_max ; i++) {
		j = 0 ;
		while( j < key[i].col ) {
			printf( "%c" ,  buf[ key[i].row ][j] );
			j++;
		}
		printf("%s" , key[i].word );
		while( buf[ key[i].row ][j] != 0 && buf[ key[i].row ][j] != ' ' ) j++;
		while( buf[ key[i].row ][j] != 0 ) {
			printf( "%c" ,  buf[ key[i].row ][j] );
			j++;
		}
		printf("\n");
	}


	return 0;
}