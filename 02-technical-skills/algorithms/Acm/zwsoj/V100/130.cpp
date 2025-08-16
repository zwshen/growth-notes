/* @JUDGE_ID: 13160EW 130 C++ */
// 06/07/03 12:23:54
// Q130:Roman Roulette  

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int queue[105];

void CountRoman(int n,int k) 
{
	int i;
	int tot=n;
	int killed , next = -1;
	int ct = 0;

	for(i=0;i<n;i++)
		queue[i] = i+1;

	while( tot > 1 ) {
		// ��Ĥ@�ӭn�������H
		ct = 0;
		while( ct < k ) {
			next = ( next + 1 ) % n;
			if( queue[next]!=0 ) ct++;
		}
		killed = next;			// find it
		queue[killed] = 0;	// kill it
		next-- ;
		// ��I����
		ct = 0;
		while( ct < k ) {
			next = ( next + 1 ) % n;
			if( queue[next]!=0 ) ct++;
		}
		// ��I���̽ը�Q��������m
		queue[killed] = queue[next];
		queue[next] = 0;
		next = killed;		
		tot--; // �֤@�ӤH�F
	}
	i = 0;
	while( queue[i] == 0) i++;

	// ���B�D�X�Ӫ��̫�@�ӤH���s��
	// �N�O�̫᪺�s���̦�m�A�� jopesh �����O1��
	// �ҥH�ö���1 ���Ʀb�o�Ӧ�m
	// �]�N�O�� ��X���G �ö��O
	// �@�Ӱ_�l��m�A�����쥻��1���Ʀb��n�O�̫�s������m

	// (n - �ثe����m+1 ) �A +1 �N�O ��X���G
	printf("%d\n" , (n - queue[i] + 1) % n + 1 );
	
}

int main()
{ 
	int n,k;
	while(1) {
		scanf("%d %d",&n,&k );
		if( n == 0 && k == 0 ) break;
		CountRoman(n,k);
	}


	return 0;
}

//@END_OF_SOURCE_CODE
