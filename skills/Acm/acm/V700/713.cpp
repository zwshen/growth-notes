/* @JUDGE_ID: 13160EW 713 C++ */
// Q713: Adding Reversed Numbers

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <string.h>

#define SIZE 200

int main()
{
	char buf1[SIZE],buf2[SIZE];
	int i,j,k;
	int c;
	while( scanf("%s %s",buf1,buf2) ) {
		i = 0;
		c = 0;
		// 兩數相加
		while( buf1[i]!= 0 && buf2[i]!=0 ) {
			buf1[i] = (buf1[i] + buf2[i])-48 + c;
			if( buf1[i] > '9' ) {
				buf1[i] = (buf1[i]-'0')%10+'0';
				c = 1;
			} else c = 0;
			i++;
		}
		if( buf1[i]!= 0 ) {
			// 第一個數字還有剩
			while( buf1[i]!= 0 ) {
				buf1[i] += c;
				if( buf1[i] > '9' ) {
					buf1[i] = (buf1[i]-'0')%10+'0';
					c = 1;
				} else
					c = 0;
				i++;
			}
		} else { 
			// 第二個數字還有剩
			while( buf2[i]!= 0 ) {
				buf1[i] = buf2[i] + c;
				if( buf1[i] > '9' ) {
					buf1[i] = (buf1[i]-'0')%10+'0';
					c = 1;
				} else
					c = 0;
				i++;
			}
		}
		// 還有進位
		if( c==1 ) buf1[i++] = '1';
		j = i-1;
		while( j>=0 && buf1[j] == '0') j--;
		buf1[j+1] = 0;
		k=0;
		while( k<j && buf1[k] == '0') k++;
		printf("%s\n",buf1+k);
	}

	return 0;
}
//@END_OF_SOURCE_CODE
