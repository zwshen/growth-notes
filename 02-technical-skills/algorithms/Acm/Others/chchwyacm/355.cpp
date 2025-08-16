#include<iostream>
#include<algorithm>
using namespace std;

inline int CharToDigit(char c){
    if( isdigit(c) )
        return c-'0';
    return c-'A'+10;
}

inline char DigitToChar(int n){
    return "0123456789ABCDEF"[n];
}

bool checkIllegal(int base1, string& in ){
    for(int i=0;i<in.length();++i)
        if( CharToDigit(in[i])>=base1 )
            return true;
    return false;
}

/* convert string 'in' to int 'value'. */
long long parseValue( int base1, string& in ){

    if( checkIllegal(base1, in) ) return -1;

    long long value=0;
    long long curBase=1;

    for(int i=in.length()-1;i>=0;--i) {

        value += CharToDigit(in[i]) * curBase;
        curBase *= base1;
    }
    return value;
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

int main() {

    #ifndef ONLINE_JUDGE
    freopen("355.in","r",stdin);
    #endif

    int base1, base2;
    string in;

    while( cin>>base1>>base2>>in ){

        long long value = parseValue(base1, in);

        if( value<0 ){ //wrong
            cout<<in<<" is an illegal base "<<base1<<" number\n";
            continue;
        }
        cout<<in<<" base "<<base1<<" = "<<toBase(base2, value)<<" base "<<base2<<"\n";
    }
    return 0;
}
