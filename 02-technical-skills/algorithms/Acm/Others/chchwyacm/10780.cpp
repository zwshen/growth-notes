/**
 * UVa 10780 Again Prime? No time. (WA)
 * Author: chchwy
 * Last Modified: 2010.01.30
 */
#include<cstdio>

int run(int m, int n){ // (n! / m^x) §ä³Ì¤jªºx

    int counter=0;

    for(int i=2;i<=n;++i){
        printf("test %d!\n",i);
        int fac = i;
        while(fac%m==0){
            ++counter;
            fac /= m;
            printf("yes devied %d, cnt=%d, remain fac=%d\n", m,counter,fac);
        }
    }
    return counter;
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("10780.in","r",stdin);
    #endif

    int numCase;
    scanf("%d", &numCase);

    for(int i=1;i<=numCase;++i){
        printf("Case %d:\n",i);

        int m, n;
        scanf("%d %d",&m,&n);

        int ret;
        if( (ret=run(m,n))>0 )
            printf("%d\n", ret);
        else
            puts("Impossible to divide");
    }
    return 0;
}
