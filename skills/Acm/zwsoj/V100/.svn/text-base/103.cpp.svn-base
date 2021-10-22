/* @JUDGE_ID: 13160EW 103 c++ */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
//#include <fstream>
#include <cstdlib>

using namespace std;

// 第二維的最後一格儲存盒子編號
int boxs[30][11] = { 0 };
int len[31] = { 0 };
int next_box[31] = { 0 };

int k,n;
int comp_1(const void* e1,const void* e2) 
{
	return *((int*)e1) - *((int*)e2);
}
	
int comp_2(const void* e1,const void* e2) 
{
	int *a1 = (int*)e1;
	int *a2 = (int*)e2;
	int i;
	for(i=0;i<n;i++) {
		if( a1[i] < a2[i] ) return -1;
		else if( a1[i] > a2[i] ) return 1;
	}
	return a1[n] - a2[n];
}

int isInBox(int* small , int* big) 
{
	int i;
	for( i=0 ; i < n ; i++ ) 
		if( small[i] >= big[i] ) return 0;
	return 1;
}

int main()
{
	int i,j;
	int nextp = k;
	int max_len = 0;
	int first;
//	ifstream cin("103.txt");
	while(cin >> k >> n ) 
	{
		// 輸入 k 個盒子
		for(i=0;i<k;i++) {
			// n 個維度
			for(j=0;j<n;j++)
				cin >> boxs[i][j];
			boxs[i][j] = i+1;	// 盒子編號
			qsort( boxs[i], n, sizeof(int), comp_1 );
		} // end for i

		qsort( boxs, k,sizeof(boxs[0]),comp_2 );

		max_len = 0;
		for( i = k-1 ; i >=0  ; i-- ) {
			len[i] = 1;
			nextp =k;
			for( j = i + 1 ; j < k ; j++ ) {
				// 長度沒有我長，則不列入考慮
				if( len[j] < len[i] ) continue;
				if( isInBox( boxs[i] , boxs[j] ) ) {
					len[i] = len[j] + 1;
					nextp = j;
				}
			}
			if( max_len <= len[i] ) {
				max_len = len[i];
				first = i;
			}
			next_box[i] = nextp;
			/*
			for( j = i ; j < k ; j++ ) 
				cout << len[j] << " ";
			cout << endl;
			*/
		}
		/*
		for(i=0;i<k;i++) {
			cout << boxs[i][n] << ":";
			for(j=0;j<n;j++) {
				cout << boxs[i][j] << " ";
			}
			cout << "\tlength:" << len[i] 
				<< "\tnextp:" << next_box[i] ;
			cout << endl;
		}
		*/
		cout << max_len << endl;
		nextp = first;
		while( nextp!= k ) {
			cout << boxs[nextp][n] << " ";
			nextp = next_box[nextp];
		}
		cout << endl;
	} // end while

		
	//cin.close();
	return 0;
}

//@END_OF_SOURCE_CODE
