/**
 * UVa Triangle Wave (AC)
 * Author: chchwy
 * Last Modified: 2010.02.03
 */
#include<cstdio>

void wave(int A){
	
    int curA=1;
    while(curA<A){
        for(int i=0;i<curA;++i)
            printf("%d",curA);
        printf("\n");

        ++curA;
    }
    while(curA>0){
        for(i=0;i<curA;++i)
            printf("%d",curA);
        printf("\n");

        --curA;
    }
}

int main(){
    int caseNum;
    scanf("%d", &caseNum);

    while(caseNum--){
        int A,F;
        scanf("%d %d", &A,&F);

        for(int i=0;i<F;++i){
            wave(A);
            if(i!=F-1) printf("\n");
        }

        if(caseNum!=0) printf("\n");
    }
}
