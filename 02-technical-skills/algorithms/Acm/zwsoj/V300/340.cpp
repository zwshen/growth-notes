/* @JUDGE_ID: 13160EW 340 C++ */
// Q340: Master-Mind Hints
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#define size 10000
int main()
{
	int n;
	long a,b;
	int i,j;
	int ans[size];
	int p[size];
	int mark[size];
	int ct ;
	long games = 0;
	while(1) {
		scanf("%d",&n);
		if( n==0 ) break;
		games++;
		// ���o�K�X
		for(i=0;i<n;i++) 
			scanf("%d",&ans[i] );
		// �C���s��
		printf("Game %ld:\n",games);
		while( 1 ) {
			ct = 0;
			for(i=0;i<n;i++) {
				scanf("%d",&p[i] );
				mark[i] = 0;
				if(p[i]==0) ct++;
			}
			if( ct==n ) break; // ���մ��ո�Ƶ���
			a = 0;
			b = 0;
			for(i=0;i<n;i++) {
				// ����a ����
				if( ans[i] == p[i] ) {
					mark[i] = 1;	// �аO���Q�ΨӧP�_a
					p[i] = 0;
					a++;			// �o��@��a
				}
			} // end for i

			for(i=0;i<n;i++) {
				if( !mark[i] ) {
					for(j=0 ; j<n ; j++)  {
						if(  ans[i] == p[j]  ) {
						p[j] = 0;
						b++;
						break;
						} // end if
					} // end for j
				}
			} // end for i
			printf("    (%ld,%ld)\n",a,b);
		} // end while
	}
	return 0;
}
//@END_OF_SOURCE_CODE
