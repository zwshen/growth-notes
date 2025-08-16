/* @JUDGE_ID: 13160EW 729 C++ */
// 06/07/03 21:23:38
// Q729: The Hamming Distance Problem

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{ 
	char buf[30];
	int i,j;
	int k,n,h;
	bool newline = false;
	scanf("%d",&k);
	while( k-- > 0 ) {

		if(newline) printf("\n");
		else newline = true;

		scanf("%d %d" , &n , &h );
		buf[n] = 0;
		for(i=0;i<n-h;i++)
			buf[i] = '0';
		while(i<n) buf[i++] = '1';

		while(1) {
			printf("%s\n",buf);
			i = n-1 ;
			// ���q�k�ܥ����1
			while( buf[i]=='0' ) i--;
			// �A������0
			j = -1;
			while( buf[i]=='1' ) {
				i--;
				j++;	// �O�����X��1
			}
			if( i < 0 ) break;	// �S���U�@�ո�
			// �N 1 ������
			buf[i] = '1';
			// �ɹs
			for( i+=1 ; i < n-j;i++)
				buf[i] = '0';
			// �ɳѤU��1
			while(i<n) buf[i++] = '1';
		}
	}


	return 0;
}

//@END_OF_SOURCE_CODE
