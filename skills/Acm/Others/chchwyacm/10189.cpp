#include<iostream>

enum{MAX=100};

int main(){

    int row, col;
    int map[MAX+5][MAX+5];
    int drct[8][2] = { {-1,-1}, {-1,0}, {-1,1}, {0,-1}, {0,1}, {1,-1}, {1,0}, {1,1} };
    int field =1;

    while(scanf(" %d %d",&row,&col)==2){
        if(row==0 && col==0)
            break;

        if(field!=1) //blank line between cases
            printf("\n");

        //input
        for(int i=0;i<=row+1;++i)
            for(int j=0;j<=col+1;++j)
                map[i][j]=0;

        char buf[100+2];
        fgets(buf,3,stdin); //eat \n
        for(int i=1;i<=row;++i){
            fgets(buf,sizeof(buf),stdin);
            for(int j=1;j<=col;++j)
                map[i][j] = buf[j-1];
        }

        //mine sweeper
        printf("Field #%d:\n",field++);

        for(int i=1;i<=row;++i){
            for(int j=1;j<=col;++j){
                if(map[i][j]=='*')
                    printf("%c",'*');
                else {
                    int numMine=0;
                    for(int k=0;k<8;++k)
                        if(map[ i+drct[k][0] ][ j+drct[k][1] ]=='*')
                            numMine++;
                    printf("%d",numMine);
                }
            }
            printf("\n");
        }
    }
    return 0;
}

