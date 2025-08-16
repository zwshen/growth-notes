#include<iostream>
#include<bitset>
using namespace std;

#define MAXSIZE 3000

int main(){

    #ifndef ONLINE_JUDGE
    freopen("10038.in", "r", stdin);
    #endif

    int length; //the length of sequence
    int seq[MAXSIZE];
    bitset<MAXSIZE> s;

    //for each case
    while( scanf("%d ",&length)==1 ){

        //read sequence
        for(int i=0;i<length;++i)
            scanf("%d ", &seq[i] );

        if(length==1){
            puts("Jolly");
            continue;
        }

        s.reset(); //init set

        //add into set
        for(int i=1;i<length;++i){
            int diff = abs( seq[i] - seq[i-1] );
            if(diff>0 && diff<length)
                s.set(diff);
        }

        //judge
        if( s.count() == length-1 )
            puts("Jolly");
        else
            puts("Not jolly");
    }
    return 0;
}
