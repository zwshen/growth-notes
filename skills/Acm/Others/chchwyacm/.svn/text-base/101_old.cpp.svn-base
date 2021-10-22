/* 2008/7/31 
*  chchwy
*/
#include <iostream>
#include <cstdio>
using namespace std;


//double linked list
class block{
    int num;
    block* next;
    block* last;

    block(int num){ this->num=num; next=0; last=0;}
    friend class blockWorld;
};

//blockWorld: to control blocks
class blockWorld{
    block** blockMap; //紀錄整個block world的排列狀況
    block** getBlockAddr; //紀錄每個block的addr
    int n; //the number of blocks

public:
    blockWorld(int n);
    void print();
    void addTail(int x, int y);
    void clearTail(int x);
    int isTheSameStack(int x, int y);
};


/* constuctor */
blockWorld::blockWorld(int n){
    this->n = n;
    blockMap = new block*[n];
    getBlockAddr= new block*[n];
    for(int i=0;i<n;i++){
        blockMap[i] = new block(i);
        getBlockAddr[i] = blockMap[i];
    }
}


void blockWorld::print(){
    block* p;
    for(int i=0;i<n;i++){
        printf("%d:",i);

        p = blockMap[i];
        while(p){
            printf(" %d",p->num);
            p=p->next;
        }
        printf("\n");
    }
}

//把block x 接到 block y那串list尾巴
void blockWorld::addTail(int x, int y){
    block* p = getBlockAddr[y];
    block* px = getBlockAddr[x];
    while(p->next){
        p=p->next;
    }
    p->next = px;
    if(px->last) px->last->next = 0;
    else blockMap[px->num] = 0;
    px->last = p;
}

//把block x後的block都放回原處
void blockWorld::clearTail(int x){

    block* px = getBlockAddr[x];
    block* p = px->next;
    px->next=0;

    while(p){
        int num = p->num;
        if(blockMap[num]){
            block* w=blockMap[num];
            while(w->next)
                w = w->next;
            w->next=p;
            p->last=w;
        }else{ //list is empty
            blockMap[num] = p;
            p->last=0;
        }

        block* q = p->next;
        p->next = 0;
        p=q;
    }
}

int blockWorld::isTheSameStack(int x,int y){
    block* p = getBlockAddr[x]->next;
    while(p){
        if(y == p->num) return 1;
        p=p->next;
    }

    p = getBlockAddr[x]->last;
    while(p){
        if(y==p->num)  return 1;
        p=p->last;
    }
    return 0;
}

/* main */
int main()
{
    char command1[10], command2[10];
    int a,b;
    int n; //the number of blocks
    cin>>n;

    blockWorld bw(n);

    /* read commands */
    while(1){

        /*  命令格式 [move/pile] a [onto/over] b    */
        cin >> command1;
        if(strcmp(command1,"quit")==0) break;
        cin >> a;
        cin >> command2;
        cin >> b;

        //illegal command
        if(a==b) continue;
        if(bw.isTheSameStack(a,b)==1) continue;

        /* move a: 把a上面的都搬回原處&#65292;再移動a */
        if(strcmp(command1,"move")==0)
            bw.clearTail(a);

        /* onto b: 把b上面的都搬走&#65292;再放在b */
        if(strcmp(command2,"onto")==0)
            bw.clearTail(b);

        bw.addTail(a,b);
    }
    bw.print();
    return 0;
}
