/*
 * UVa 400 (AC)
 * Author: chchwy
 * Last Modified: 2009.04.22
 */
#include <iostream>
#include <cmath>
using namespace std;

bool cmpAscii(const string &a, const string &b){
    int min = ( a.length()<b.length() )? a.length() : b.length();
    for(int i=0;i<min;++i){
        if(a[i]<b[i])
            return true;
        else if(a[i]>b[i])
            return false;
    }
    if( a.length() < b.length() )
        return true;
    return false;
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("400.in","r",stdin);
    #endif

    string filename[100];
    int numFile;

    while(scanf("%d ", &numFile)==1){
        for(int i=0;i<numFile;++i)
            getline(cin, filename[i]);

        std::sort(filename, filename+numFile, cmpAscii);

        int longest=0;
        for(int i=0;i<numFile;++i)
            if(filename[i].length() > longest)
                longest=filename[i].length();

        int colNum = 62/(longest+2);
        int rowNum = ceil((float)numFile/colNum); //無條件進位

        string row[101];

        cout<<"------------------------------------------------------------\n";

        for(int i=0;i<numFile;++i){

            int space = longest - filename[i].length();
            if(i/rowNum != colNum-1) space += 2;

            for(int j=0;j<space;++j)
                    filename[i]+=" ";

            row[i%rowNum]+=filename[i];
        }
        for(int i=0;i<rowNum;++i)
            cout << row[i] <<endl;
    }
    return 0;
}

