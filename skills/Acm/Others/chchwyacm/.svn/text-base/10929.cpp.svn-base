/**
 * UVa 10929 You can say 11 (AC)
 * Author: chchwy
 * Last Modified: 2010.01.30
 */
#include<iostream>
using namespace std;

int main(){

    string num;
    while( getline(cin,num) ){
        if(num[0]=='0' && num.length()==1 ) break;

        int sum=0;
        for(int i=0;i<num.length();i+=2)
            sum += (num[i]-'0');
        for(int i=1;i<num.length();i+=2)
            sum -= (num[i]-'0');

        if(sum%11 == 0)
            cout<<num<<" is a multiple of 11.\n";
        else
            cout<<num<<" is not a multiple of 11.\n";
    }
}
