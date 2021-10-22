/* @JUDGE_ID: 13160EW 847 C++ */
// 08/06/03 16:26:57
// Q847: A multiplication game
//@BEGIN_OF_SOURCE_CODE

#include <iostream>
using namespace std;

#define size 16
long double table[size+1];

void create()
{
    long double x = 1;
    for(int i=0 ; i< size ; i+=2) {
        x*=9;
        table[i] = x;
        x*=2;
        table[i+1] = x;
    }
}

int main()
{ 
	long double n;
	int i;
	create();
	while( cin>>n ) {
        for( i = 0 ;i < size ; i++)
			if( n <= table[i] ) break;
        if( i & 0x01 ) 
            cout << "Ollie wins." << endl;
		else 
			cout << "Stan wins." << endl;
	}
	return 0;
}

//@END_OF_SOURCE_CODE
