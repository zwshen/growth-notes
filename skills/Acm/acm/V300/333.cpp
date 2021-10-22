/* @JUDGE_ID: 13160EW 333 C++ */
// 08/07/03 23:50:28
// Q333: Recognizing Good ISBNs
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <ctype.h>

char buf[80];
char buf2[80];
int s1[30];

int main()
{ 
	int i,j;
	int s1i;
//	int last;
	bool correct;
	while( gets(buf) ) {
		s1i = i = j = 0;
		
		correct = true;	// �����]�O�諸
		while( buf[i]!= 0 ) {
			// �u�� �Ʀr �� -
			if( buf[i]!=' ' ) {
				buf2[j++] = buf[i];
				if( isdigit(buf[i]) ) 
					s1[s1i++] = buf[i]-48; // �X�{�Ʀr
				else if( ( buf[i]=='x' || buf[i]=='X' ) && s1i==9 )
					s1[s1i++] = 10; // x ��X�{�b�ĤQ�ӼƦr
				else if(buf[i]!='-') correct = false;	// �����T���r��
			}  // end if
			i++;
		}
		buf2[j++] = 0;	// �r���0
		if(s1i!=10) correct = false;
		if( correct  ) {
			//last = s1[9];
			//  s1
			for( i = 1 ;i < s1i;i++)	s1[i]+=s1[i-1];
			//  s2
			for( i = 1 ;i < s1i;i++)	s1[i]+=s1[i-1];
			//printf("%d %d\n",s1[9] , last);
			if( s1[9] % 11 != 0 ) correct = false;

		}
		if(correct)
			printf("%s is correct.\n" , buf2);
		else
			printf("%s is incorrect.\n" , buf2);
	}


	return 0;
}

//@END_OF_SOURCE_CODE
