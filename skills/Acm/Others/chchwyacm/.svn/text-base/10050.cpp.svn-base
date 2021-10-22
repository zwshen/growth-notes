/*
 * UVa 10050
 * Author: chchwy
 * Last Modified: 2009.11.4
 */
#include <iostream>
#include <bitset>

#define MAX 3651

int countHartals(){
    int numDay, numParty;
    scanf("%d %d ", &numDay, &numParty);

    std::bitset<MAX> day; //1-3650

    for(int i=0;i<numParty;++i){
        int hartal;
        scanf("%d ", &hartal );

        for(int i=0;i<=numDay; i+=hartal ){
            if( i%7 == 0 || i%7 == 6) //friday & saturday
                continue;
            day.set(i);
        }
    }
    return day.count();
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("10050.in","r",stdin);
    freopen("10050.out","w",stdout);
    #endif

    int numCase;
    scanf("%d ", &numCase);

    while( numCase-- )
        printf("%d\n", countHartals() );

    return 0;
}
