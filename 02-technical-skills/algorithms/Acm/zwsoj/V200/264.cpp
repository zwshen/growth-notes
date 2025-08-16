/* @JUDGE_ID: 13160EW 264 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>

using namespace std;

void out(unsigned long n)
{
	unsigned long tot;
	unsigned long row,col,step;
	char odd;
	row = col = tot = step = 1 ;
	odd = 1;
	// 先取行所在
	while( tot+step <= n ) {
		tot +=step;
		step++;
		col++;
		odd = 1 - odd;
	}
	// 再取得行所在
	while( tot != n ) {
		tot++;	col--;	row++;
	}
	if( odd == 1) 		row ^= col ^=row ^=col;
	cout << "TERM " << n << " IS " << row << "/" << col << endl;
}
int main()
{
	unsigned long n = 0;
	while( cin  >> n ) 
	{
		if( n == 1) {
			cout << "TERM 1 IS 1/1" << endl;
			continue;
		} else {
			out(n);	
		}
	}

	return 0;
}
//@END_OF_SOURCE_CODE
