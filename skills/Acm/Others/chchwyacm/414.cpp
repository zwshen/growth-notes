/**
 * UVa 414 Machined Surface
 * Author: chchwy
 * Last Modified: 2010.02.06
 */
#include<iostream>
using namespace std;

int run (int numLine){

    int minSpace=25;
    int totalSpace=0;

    for(int i=0;i<numLine;++i){
        char buf[32];
        fgets(buf,sizeof(buf),stdin);

        int curSpace=0;
        for(int i=0;i<25;++i){
            if(buf[i]==' ')
                curSpace++;
        }

        if(curSpace<minSpace)
            minSpace = curSpace;

        totalSpace += curSpace;
    }
    return totalSpace - (minSpace*numLine);
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("414.in","r",stdin);
    #endif

    int numLine;
    while( scanf("%d ",&numLine) ){
        if( numLine == 0 ) break;

        printf("%d\n", run(numLine) );
    }
    return 0;
}
