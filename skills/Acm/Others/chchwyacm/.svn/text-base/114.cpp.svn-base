/**
 * UVa 114 Simulation Wizardry (AC)
 * Author: chchwy
 * Last Modified: 2009.02.03
 */
#include<iostream>
using namespace std;

enum{
    MAX_SIZE=51+2,
    SPACE=0, WALL=1, BUMPER=2,
};

// 0=> 朝x方向增加  1=> 朝y方向增加
// 2=> 朝x方向減小  3=> 朝y方向減小
const int move[4][2] = {{1,0},{0,1},{-1,0},{0,-1}};

class Grid{
public :
    int type;
    int cost;
    int value;

    void set (int ptype, int pvalue, int pcost ){
        type=ptype; value=pvalue; cost=pcost;
    }
};

int run(Grid map[MAX_SIZE][MAX_SIZE], int x, int y, int direction, int life ){

    int point=0;

    while( life > 1 ) {

        life -= 1;

        int nextX = x + move[ direction ][0];
        int nextY = y + move[ direction ][1];


        switch( map[nextY][nextX].type ){
        case WALL:
        case BUMPER:
            life -= map[nextY][nextX].cost;
            point += map[nextY][nextX].value;
            direction  = (direction+3)%4; //turn right;
            break;
        case SPACE:
            x = nextX, y = nextY;
            break;
        }
    }
    return point;
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("114.in","r",stdin);
    #endif

    /* surface size */
    int m,n;
    scanf("%d %d", &m, &n);

    /* map surface */
    Grid map[MAX_SIZE][MAX_SIZE];
    memset(map,0, sizeof(map));

    /* set wall around the surface */
    int costWall;
    scanf("%d", &costWall);
    for(int i=1;i<=m;++i){
        map[i][1].set(WALL, 0, costWall);
        map[i][n].set(WALL, 0, costWall);
    }
    for(int i=1;i<=n;++i){
        map[1][i].set(WALL, 0, costWall);
        map[m][i].set(WALL, 0, costWall);
    }

    /* init bumper */
    int numBumper;
    scanf("%d", &numBumper);

    for(int i=0;i<numBumper;++i){
        int x,y,value,cost;
        scanf("%d %d %d %d", &x, &y, &value, &cost);
        map[y][x].set(BUMPER, value, cost);
    }

    /* start simulation */
    int x,y,direction,life;

    int totalPoint=0;
    //剩下每一行都代表一顆球 ( x, y, 方向, 生命值)
    while( scanf("%d%d%d%d", &x, &y, &direction, &life) == 4 ){

        int point = run(map,x,y,direction,life);
        printf("%d\n", point );

        totalPoint += point;
    }
    printf("%d\n", totalPoint);
    return 0;
}
