/**
 * UVa 11185 Ternary
 * Author: chchwy
 * Last Modified: 2010.02.03
 */
#include<iostream>
using namespace std;

inline char DigitToChar(int n){
    return "0123456789ABCDEF"[n];
}

/* convert int 'value' to string 'out' */
string toBase( int base2, long long value ){

    if(value==0) return "0";

    string out;
    while( value>0 ){
        out += DigitToChar( value%base2 );
        value /= base2;
    }
    reverse(out.begin(), out.end());
    return out;
}

int main(){

    int n;
    while(scanf("%d",&n)==1 && n>=0)
        printf("%s\n",toBase(3, n).c_str() );

    return 0;
}
