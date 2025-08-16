/**
 * UVa 10267 (AC)
 * Author: chchwy
 * Last Modified: 2009.04.07
 */
#include<iostream>

enum{MAXSIZE=250};

class Queue {
    enum{MAX=40000};
    int data[MAX][2];
    int front, rear;
public:
    Queue(){ front=0; rear=0; }
    void add(int x, int y){
        if(!full()){
            rear=(rear+1)%MAX;
            data[rear][0]=x;
            data[rear][1]=y;
        }
    }
    void pop(int &x, int &y){
        if( !empty() ){
            front = (front+1)%MAX;
            x = data[front][0];
            y = data[front][1];
        }
    }
    int full(){ return ((rear+1)%MAX==front)?1:0; }
    int empty(){ return (front==rear)?1:0; }
};

void swap(int &a,int &b){
    int temp = a;
    a = b;
    b = temp;
}

class Graph{
    char buffer[MAXSIZE+2][MAXSIZE+2];
    int width, height;
public:
    void createGraph(int width, int height); //I
    void clear(); //C
    void drawPixel(int x,int y, int color); //L
    void drawVertical(int x, int yBeg, int yEnd, int color); //V
    void drawHorizontal(int y, int xBeg, int xEnd, int color); //H
    void fillRect(int x1, int y1, int x2, int y2, int color);//K
    void fillRegion(int x, int y, int color); //F
    void saveFile(char filename[16]); //S
};

void Graph::createGraph(int w, int h){
    width = w;
    height = h;
    clear();
    for(int i=0;i<=height+1;++i){
        buffer[i][width+1]=0;
        buffer[i][0]=0;
    }
    for(int i=0;i<=width+1;++i){
        buffer[0][i]=0;
        buffer[height+1][i]=0;
    }
}
void Graph::clear(){
    for(int i=0;i<=height;++i)
        for(int j=0;j<=width;++j)
            buffer[i][j]='O';
}
void Graph::drawPixel(int x,int y, int color){
    buffer[y][x] = color;
}
void Graph::drawVertical(int x, int yBeg, int yEnd, int color){
    if(yBeg>yEnd)
        swap(yBeg, yEnd);

    for(int i=yBeg;i<=yEnd;++i)
        buffer[i][x]=color;
}
void Graph::drawHorizontal(int xBeg, int xEnd, int y, int color){
    if(xBeg>xEnd)
        swap(xBeg, xEnd);

    for(int i=xBeg;i<=xEnd;++i)
        buffer[y][i]=color;
}
void Graph::fillRect(int x1, int y1, int x2, int y2, int color){
    for(int i=y1;i<=y2;++i)
        for(int j=x1;j<=x2;++j)
            buffer[i][j] = color;
}
void Graph::fillRegion(int x0, int y0, int color){
    int origColor = buffer[y0][x0];
    if(origColor==color)
        return;

    int i=1000;
    //BFS
    Queue q;
    q.add(x0,y0);
    buffer[y0][x0] = color;

    while(!q.empty()){
        int x,y;
        q.pop(x,y);

        if(buffer[y-1][x]==origColor){
            buffer[y-1][x] = color;
            q.add(x,y-1);
        }
        if(buffer[y][x+1]==origColor){
            buffer[y][x+1] = color;
            q.add(x+1,y);
        }
        if(buffer[y+1][x]==origColor){
            buffer[y+1][x]=color;
            q.add(x,y+1);
        }
        if(buffer[y][x-1]==origColor){
            buffer[y][x-1]=color;
            q.add(x-1,y);
        }
    }
}
void Graph::saveFile(char filename[16]){
    printf("%s\n", filename);
    for(int i=1;i<=height;++i)
        printf("%s\n",buffer[i]+1); //第一個char不輸出
}

void parseCommand(char command[32], char par[6][16]){
    int i=0;
    char *p = strtok(command," \n");
    while(p){
        strcpy(par[i++], p);
        p = strtok(NULL, " \n");
    }
}


int main(){
    #ifndef ONLINE_JUDGE
    freopen("10267.in","r",stdin);
    #endif

    Graph g;
    char command[64];

    while( fgets(command, 64, stdin) ){
        char par[6][16];

        parseCommand(command, par);

        int op = par[0][0];

        int x,y,color,xBeg,xEnd,yBeg,yEnd,x1,x2,y1,y2;

        switch(op){
            case 'I':
                x=atoi(par[1]);  y=atoi(par[2]);
                g.createGraph(x,y);
                break;
            case 'C':
                g.clear();
                break;
            case 'L':
                x=atoi(par[1]);  y=atoi(par[2]); color=par[3][0];
                g.drawPixel(x,y,color);
                break;
            case 'V':
                x=atoi(par[1]); yBeg=atoi(par[2]); yEnd=atoi(par[3]);   
                color=par[4][0];
                g.drawVertical(x, yBeg, yEnd, color);
                break;
            case 'H':
                xBeg=atoi(par[1]); xEnd=atoi(par[2]); y=atoi(par[3]); 
                color=par[4][0];
                g.drawHorizontal(xBeg, xEnd, y, color);
                break;
            case 'K':
                x1=atoi(par[1]); y1=atoi(par[2]);
                x2=atoi(par[3]); y2=atoi(par[4]);
                color=par[5][0];
                g.fillRect(x1,y1,x2,y2,color);
                break;
            case 'F':
                x=atoi(par[1]); y=atoi(par[2]); color=par[3][0];
                g.fillRegion(x,y,color);
                break;
            case 'S':
                g.saveFile(par[1]);
                break;
            case 'X':
                return 0;
        };
    }
    return 0;
}
