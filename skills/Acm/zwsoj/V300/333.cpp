/* @JUDGE_ID: 13160EW 333 C++ */
// 08/07/03 23:50:28
// Q333: Recognizing Good ISBNs
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>
#include <ctype.h>


char buf[80];
char buf2[80];
int numbers[80];


int main()
{ 
	int i,j;
	int s1i;
	bool correct;

	while( gets(buf) ) {
		s1i = i = j = 0;
		correct = true;
		
		while( buf[i] == ' ') i++;
		while( buf[i] != '\0') {
			buf2[j++] = buf[i];
			i++;
		}

		// buf2 = buf1 繷Ю
		j--;
		while( buf2[j]==' ' )  j--;
		buf2[j+1] = '\0';
		
		
		j=0;
		while( buf2[j] != 0 ) {
			// 计
			if( isdigit(buf2[j]) )  {
				numbers[s1i++] = (buf2[j]-48); // 瞷计
			}
			else if( ( buf2[j]=='x' || buf2[j]=='X' )) {
				if( s1i==9 ) {
					numbers[s1i++] = 10; // x 瞷材计
				} else {
					correct = false;
					break;
				}
			} else if(buf2[j]!='-') {
				correct = false;
				break;
			}
			j++;
		}


		if(s1i != 10)
			correct = false;

		if( correct ) {
			// σ納玡10计
			//  s1
			for( i = 1; i<10; i++)	numbers[i] += numbers[i-1];
			//  s2
			for( i = 1; i<10; i++)	numbers[i] += numbers[i-1];
			
			// 11埃荷琌タ絋ISBN
			correct = numbers[9]%11==0;
		}
		if(correct)
			printf("%s is correct.\n" , buf2);
		else
			printf("%s is incorrect.\n" , buf2);
	}


	return 0;
}

//@END_OF_SOURCE_CODE
