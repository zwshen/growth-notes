#include <stdio.h>

#define H 10001
int height[H] = { 0 };

void make_height(int left,int right,int h) 
{
    for(int i = left ; i < right ; i++)
        if( height[i] < h ) height[i] = h;
}

void out(int base , int len )
{
    int i,now_h = 1;
    for( i = 0 ; i <= len+1 ; i++ )
        if( now_h != height[i] ) {
            printf("%d %d ", i+base , height[i] );
            now_h = height[i];
        }
}

int main()
{
    int l,h,r;
    int left  , right_max =0;
    // 第一筆資料 
    scanf("%d %d %d",&l,&h,&r);
    make_height( 0 , r-l , h);
    left = l; // 最左邊的邊界    
    right_max = r-left;
    while( scanf("%d %d %d",&l,&h,&r)==3 ) {
        make_height( l-left , r-left , h);
        if( right_max < r-left ) right_max = r-left;
    }
    
    out( left , right_max );
    return 0;
}
