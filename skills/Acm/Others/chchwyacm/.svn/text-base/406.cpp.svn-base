/*
 * UVa 406 Prime Cuts (AC)
 * Author: chchwy
 * Last Modified: 2009.11.22
 */
#include<iostream>
#include<vector>
using namespace std;
enum{MAX=1001};

char p[MAX]; //prime=0, not prime=1

void shieve(){
    p[0]=1;
    p[1]=0; //本題1算質數
    for(int i=2;i*i<MAX;++i){
        if(p[i]==1)
            continue;
        for(int j=i*i;j<MAX;j+=i)
            p[j]=1;
    }
}

int main(){

    shieve();

    int N,C;
    while(scanf("%d %d", &N, &C)==2){

        printf("%d %d:", N,C);

        vector<int> prime;
        for(int i=1;i<=N;++i)
            if(p[i]==0)
                prime.push_back(i);

        int cuts = (prime.size()%2==0)? C*2 : C*2-1;
        if(cuts>prime.size())cuts=prime.size();

        int skip = (int)(prime.size()-cuts) / 2;
        if(skip<0) skip=0;


        for(int i=skip;i<skip+cuts;++i)
            printf(" %d", prime[i]);
        printf("\n\n");
    }
    return 0;
}

