#include<iostream>
using namespace std;

int main(){
    #ifndef ONLINE_JUDGE
    freopen("105.in","r",stdin);
    #endif;

    int left, height, right; //building
    int map[10000+1];
    int rightMax=0; //max position

    memset(map,0,sizeof(map));
	
    //read and brute force
    while(scanf("%d %d %d", &left, &height, &right)==3){

        for(int i=left; i<right; ++i){
            if(height > map[i])
                map[i] = height;
        }
        if(right>rightMax)
            rightMax = right;
    }

    //output
    int prev = 0;
    for(int i=0; i<rightMax; ++i){
        if(prev==map[i])
            continue;
        printf("%d %d ",i,map[i]);
        prev = map[i];
    }
    printf("%d %d\n",rightMax, 0); //bug solved
    return 0;
}
