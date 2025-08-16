/* @JUDGE_ID: 13160EW 101 C++  */

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
#include <fstream>
#include <string>

using namespace std;

const int MAX = 25;

// �@�� MAX �Ӱ��|�A�C�@�Ӧ��̦h 25 ��Ŷ�
int stack[MAX][MAX];
// 25 �� top ����
int top[MAX];

// ���s�]�w���|���A
void reset() 
{
	int i;
	for(i=0;i<MAX;i++) {
		top[i] = 0;
		stack[i][0] = i; // ��J 0 ~ n-1
	}
}

// �j�M�n��Ҧb�����|��m
int search_block(int n,int block) 
{
	int i,j;
	for(i=0;i<n;i++)
		for( j=0;j <= top[i];j++)
			if( stack[i][j]==block) return i;
	return -1;
}

// ��ܰ��|���A
void show_stack(int n) 
{
	int i,j;
	for(i=0;i<n;i++) {
		cout.width(2);
		cout << i << ": ";
		for( j = 0 ;j  <= top[i];j++)
			cout << stack[i][j] << " ";
		cout << endl;
	}
}

// �Nblock ���W���Ҧ��n��A�������� to �o�Ӧ�m
void move_all(int where,int block,int to) 
{
	int who=stack[ where ][ top[where] ];
	int i,j;
	if( to == -1 ) {
		while( top[where] >= 0 && who != block ) 
		{
			// �k�^���
			stack[ who ][ ++top[who] ] = who;
			top[where]--;
			who = stack[where][top[where]];
		}
		// �����k��
	} else {
		// �������� to �h
		for( i=0;i<=top[where] ;i++) {
			if( stack[where][i] == block ) break;
		}
		
		for(j=i;j<=top[where];j++)
			stack[ to ][ ++top[to] ] = stack[where][j];
		top[where] = i-1;
	}
}

int main()
{
	int n;
	int a,b;
	string cmd,type;
	int where_a,where_b;
	
//	ifstream cin("101.txt");

	while( cin >> n ) {
		// �}�l�@�մ��ո��
		reset();	// ���s�]�w
		cin >> cmd;
		while( cmd != "quit" ) {
			cin >> a >> type >> b;
			where_a = search_block(n, a );
			where_b = search_block(n, b );
			if( where_a >= 0 && where_b >= 0 && where_a != where_b ) {
			if( cmd=="move" ) {
				// move a onto b
				// �b�Na�h��b�W���e�A���Na�Mb�W���n���^��Ӫ���m
				if( type=="onto" ) {
					// a �W�����k��
					move_all( where_a, a , -1);
					// b �W�����k��
					move_all( where_b, b , -1);
					// �N a ��bb �W
					stack[ where_b ][ ++top[where_b] ] =a;
					top[ where_a ]--;
				}

				// move a over b
				// �b�Na�h��b�Ҧb������n�줧�W���e�A���Na�W���n���^��Ӫ����_
				//�]b�Ҧb������n�줣�ʡ^ 
				if( type=="over") {
					// a �W�����k��
					move_all( where_a, a , -1);
					// �Na ��bb �W
					stack[ where_b ][ ++top[where_b] ] =a;
					top[ where_a ]--;
				}
			} // end if move

			if( cmd=="pile" ) {
				// pile a onto b
				// �Na�����M��W���n��@�_���b�W�A
				// �b�h���eb�W�誺�n���^��� 
				if( type == "onto") {
					// b �W�����k��
					move_all( where_b, b , -1);
					// �N a �H�W�������� b
					move_all( where_a, a , where_b );
				}
				// pile a over b
				// �Na�����M��W���n��@�_�h���b�Ҧb������n�줧�W 
				if( type=="over") {
					// �N a �H�W�������� b
					move_all( where_a, a , where_b );
				}
			} // end if "pile"
			} //end if where_a,where_b
		cin >> cmd;
//		cout << " ------------- �������G ----------" << endl;
		//cout << "Read cmd:" << cmd << " " << a << " " << type << " " << b << endl;
		//show_stack( n );
		} // end while quit
		// ��ܵ��G
		show_stack( n );
	} // end while n

	//cin.close();
	return 1;
}

//@END_OF_SOURCE_CODE