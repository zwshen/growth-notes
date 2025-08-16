/* @JUDGE_ID: 13160EW 101 C++  */

//@BEGIN_OF_SOURCE_CODE

#include <iostream>
#include <fstream>
#include <string>

using namespace std;

const int MAX = 25;

// 共有 MAX 個堆疊，每一個有最多 25 格空間
int stack[MAX][MAX];
// 25 個 top 指標
int top[MAX];

// 重新設定堆疊狀態
void reset() 
{
	int i;
	for(i=0;i<MAX;i++) {
		top[i] = 0;
		stack[i][0] = i; // 放入 0 ~ n-1
	}
}

// 搜尋積木所在的堆疊位置
int search_block(int n,int block) 
{
	int i,j;
	for(i=0;i<n;i++)
		for( j=0;j <= top[i];j++)
			if( stack[i][j]==block) return i;
	return -1;
}

// 顯示堆疊狀態
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

// 將block 之上的所有積木，全都移到 to 這個位置
void move_all(int where,int block,int to) 
{
	int who=stack[ where ][ top[where] ];
	int i,j;
	if( to == -1 ) {
		while( top[where] >= 0 && who != block ) 
		{
			// 歸回原位
			stack[ who ][ ++top[who] ] = who;
			top[where]--;
			who = stack[where][top[where]];
		}
		// 全部歸位
	} else {
		// 全部移到 to 去
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
		// 開始一組測試資料
		reset();	// 重新設定
		cin >> cmd;
		while( cmd != "quit" ) {
			cin >> a >> type >> b;
			where_a = search_block(n, a );
			where_b = search_block(n, b );
			if( where_a >= 0 && where_b >= 0 && where_a != where_b ) {
			if( cmd=="move" ) {
				// move a onto b
				// 在將a搬到b上之前，先將a和b上的積木放回原來的位置
				if( type=="onto" ) {
					// a 上的先歸位
					move_all( where_a, a , -1);
					// b 上的先歸位
					move_all( where_b, b , -1);
					// 將 a 放在b 上
					stack[ where_b ][ ++top[where_b] ] =a;
					top[ where_a ]--;
				}

				// move a over b
				// 在將a搬到b所在的那堆積木之上之前，先將a上的積木放回原來的位罝
				//（b所在的那堆積木不動） 
				if( type=="over") {
					// a 上的先歸位
					move_all( where_a, a , -1);
					// 將a 放在b 上
					stack[ where_b ][ ++top[where_b] ] =a;
					top[ where_a ]--;
				}
			} // end if move

			if( cmd=="pile" ) {
				// pile a onto b
				// 將a本身和其上的積木一起放到b上，
				// 在搬之前b上方的積木放回原位 
				if( type == "onto") {
					// b 上的先歸位
					move_all( where_b, b , -1);
					// 將 a 以上全都移到 b
					move_all( where_a, a , where_b );
				}
				// pile a over b
				// 將a本身和其上的積木一起搬到到b所在的那堆積木之上 
				if( type=="over") {
					// 將 a 以上全都移到 b
					move_all( where_a, a , where_b );
				}
			} // end if "pile"
			} //end if where_a,where_b
		cin >> cmd;
//		cout << " ------------- 中間結果 ----------" << endl;
		//cout << "Read cmd:" << cmd << " " << a << " " << type << " " << b << endl;
		//show_stack( n );
		} // end while quit
		// 顯示結果
		show_stack( n );
	} // end while n

	//cin.close();
	return 1;
}

//@END_OF_SOURCE_CODE