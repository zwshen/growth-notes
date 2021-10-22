/* @JUDGE_ID: 13160EW 167 C++ */
// �D�X�K�ӦZ�Ҧ��Ѫ��Ҧ��\�k

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
#include <fstream>
using namespace std;

const int N = 8;
int board[N][N] = { 0 };
int le[2*N+1] = { 0 };
int mid[N] = { 0 };
int ri[2*N+1] = { 0 };

int ct=0;

ofstream fout;

void visit(int n) 
{
	int i,j;
	if( n== N) {
		ct ++;
		//fout << " solution: " << ct << endl;
		// ���@�ո�
		fout << "// " << ct << endl;
		fout << " { "  ;
		for(i=0;i<N;i++) {
			for(j=0;j<N;j++) {
				if( board[i][j]==1)
					fout << " { " << i << "," << j << " }," ;
				//fout << board[i][j] << " ";
			}
		}
		fout << " }, \n";
		//fout << "---------------------------" << endl;	
		return;
	}
	for(i=0;i<N;i++) {
		if( board[n][i]==0 
			&& mid[i]==0		// ����i��
			&& le[N+(i-n)]==0		// ���W���i��
			&& ri[i+n]==0			// �k�W���i��
			)
		{
			mid[i] = 1;
			le[N+(i-n)] = 1;
			ri[i+n] = 1;
			board[n][i] = 1;
			
			visit(n+1);

			mid[i] = 0; 
			le[N+(i-n)] = 0;
			ri[i+n] = 0;
			board[n][i] = 0;
		}
	}		
}

int main()
{
	fout.open("q.txt",ios::out);
	fout << " { \n";
	visit( 0 );
	fout << " } \n";
	fout.close();
	return 0;
}



//@END_OF_SOURCE_CODE
