/**
 * UVa 107 (AC)
 * Author: chchwy
 * Last Modified: 2010.02.28
 */
#include<iostream>

void find(int initHeight, int kitten ){

    /* iterate n to fit the answer */
    for(int n=2;n<=initHeight;++n){

        int curHeight = initHeight;
        int nowCat = 1;

        //for output
        int totalCat=0 , notWorkCat=0;

        while( (curHeight%n)==0 ){
            totalCat += curHeight*nowCat;
            notWorkCat += nowCat;

            curHeight = curHeight/n;
            nowCat = nowCat*(n-1);
        }

        if(nowCat==kitten){
            totalCat += nowCat;
            printf("%d %d\n", notWorkCat, totalCat);
            break;
        }
    }
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("107.in","r",stdin);
    #endif

    int initHeight, kitten; //start height, number of kitten

    while( scanf("%d %d", &initHeight, &kitten) ){

        if( initHeight==0 || kitten==0 )
            break;

        /* special case */
        if(initHeight==1 && kitten==1)
            printf("0 1\n");
        else if(initHeight==1 )
            printf("1 %d\n",kitten);

        /* find n */
        find(initHeight, kitten);

    }
    return 0;
}
