/*
 * UVa 10301 (WA)
 * Author: chchwy
 * Last Modified: 2009.11.09
 */
#include<iostream>
#include<cmath>
#include<vector>
using namespace std;

class Ring {
public:
    double x, y, radius;

    double distance(Ring&);
    bool  isGlued(Ring&);
    void print();
};

/* 計算兩個圓心的距離 */
double Ring::distance(Ring& r){
    return sqrt( (x-r.x)*(x-r.x) + (y-r.y)*(y-r.y) );
}
/* 圓心距離必須 小於半徑之和 大於半徑之差 */
bool Ring::isGlued(Ring& r){

    double dist = distance(r);
    return dist < (radius+r.radius) && dist > fabs( radius-r.radius );
}

void Ring::print(){ printf("(%.2f, %.2f, %.2f)\n", x, y, radius); }

/* find the largest component */
int pickUpLargest( vector<Ring>& list ){

    vector<vector<Ring> > component;
    while( !list.empty() ){

        Ring r = list.back(); list.pop_back();

        for(int i=0;i<component.size();++i){
            if( isGlued(component[i], r ) ){
                component.push_back(r);
                break;
            }
        }
    }
}

int main() {
    #ifndef ONLINE_JUDGE
    freopen("10301.in","r",stdin);
    #endif

    int numRing;
    while( scanf("%d",&numRing ) ){

        if(numRing<0) break;

        /* read input */
        vector<Ring> rings;

        for(int i=0;i<numRing;++i){
            Ring r;
            scanf("%lf %lf %lf", &r.x, &r.y, &r.radius );
            rings.push_back(r);
        }

        /* find the largest component */
        int max = pickUpLargest(rings);

        if ( max==1 ) printf("The largest component contains 1 ring.\n");
        else  printf("The largest component contains %d rings.\n", max);
    }
    return 0;
}
