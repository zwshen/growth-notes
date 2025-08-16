/* @JUDGE_ID: 13160EW 482 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <string>
#include <ctype.h>

#define MAX_N 10000
#define MAXC 300000

using namespace std;

typedef struct sIndex {
	int order;
	int index;
} Index;

int comp(const void* e1,const void* e2) 
{
	Index v1 = *(Index*)e1;
	Index v2 = *(Index*)e2;
	return (v1.order - v2.order );
}

int main()
{
	char buf[MAXC];
	Index iarr[MAX_N];
	string farr[MAX_N];
	int i_index;
	int n;
	int i,j,k;
	cin >> n;
	cin.getline(buf,1);
	while( n > 0 ) {
		n--;
		cin.getline(buf,1);
		cin.getline(buf,MAXC);
		i_index = 0;
		i=0;
		// 解析字串
		while( buf[i]!= 0 ) {
			// 去空格
			while( buf[i]!= 0 && !isdigit(buf[i]) )		i++;
			// 得到整數
			k = buf[i]-'0';
			i++;
			while( buf[i]!= 0 && isdigit(buf[i]) ) {
				k = k*10 + buf[i]-'0';
				i++;
			}
			iarr[ i_index ].order = k;
			iarr[ i_index ].index = i_index;
			i_index++;
		} // end while
		// quick sort
		qsort( (void*)&iarr,i_index,sizeof(Index),comp);

		// 讀入浮點數
		cin.getline(buf,MAXC);
		i=0;
		k = 0;
		j = 0;
		// 解析字串
		while( buf[i]!= 0 ) {
			// 去空格
			while( buf[i]!= 0 && buf[i] == ' ')	i++;
			// 得到浮點數
			j = i;
			while( buf[i]!= 0 && buf[i] != ' ' )	i++;
			if( buf[i]!= 0 ) buf[i++] = 0;
			farr[k] = (buf+j);
			k++;
		} // end while
		
		for( i=0 ; i < i_index ; i++) {
			cout << farr[ iarr[i].index ] << endl;
		}
		cout << endl;
	}
	return 0;	
}
//@END_OF_SOURCE_CODE
