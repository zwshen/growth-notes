/*
 * UVa 10300
 * Author: chchwy
 * Last Modified: 2009.10.30
 */
#include <iostream>

int main(){

    #ifndef ONLINE_JUDGE
    freopen("10300.in","r",stdin);
    #endif

    int cases;
    scanf("%d ", &cases);

    while(cases--){
        int numFarmer;
        scanf("%d ", &numFarmer);

        int sum=0;
        int farmSize, numAnimal, efValue;
        for(int i=0;i<numFarmer;++i){
            scanf("%d %d %d ", &farmSize, &numAnimal, &efValue);
            sum += farmSize * efValue;
        }
        printf("%d\n", sum);
    }
    return 0;
}
