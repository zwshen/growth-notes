#include <stdio.h>

void find(int k) 
{
	long m = k;
	int n,bads,loc;
	
	while(1) {
		m++;		// �ثe���b�P�_����
		n = 2*k;	// �@��2*k�ӤH
		bads = k;	// �� k ���a�H
		loc = -1;	// �`��������m
		while( bads > 0 ) {
			loc = ( loc+m )%n;
			if( loc < k ) break;
			bads--;		// �a�H�Ƥ֤@
			n--;		// �`�H�Ƥ֤@
			loc--;		// �`����m�h�@��
		}
		if( n==k ) break; // ���ѵ�
	}
	
	// ��X�ѵ�
	printf("%ld\n",m);
}

int main()
{
	int k;
	while(1) {
		scanf("%d",&k);
		if( k == 0 ) break;
		find(k);
	}
	return 1;
}