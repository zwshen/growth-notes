/*
 * UVa 109
 * Author: chchwy
 * Last Modified: 2008.12.14
 */

#include<iostream>

enum{MAX_POINT=100};

class Point{
public:
   int x,y;
   Point operator=(const Point &in){
       x=in.x;
       y=in.y;
       return *this;
   }
};

Point base;

int distance(Point &a, Point &b){
   return (b.x-a.x)*(b.x-a.x) + (b.y-a.y)*(b.y-a.y);
}

//ca cross cb
int cross(Point &c, Point &a, Point &b){
   return (a.x-c.x)*(b.y-c.y) - (a.y-c.y)*(b.x-c.x);
}

bool cmp(Point a, Point b){
   int c = cross(base,a,b);
   if(c>0)
       return 1;
   else if(c==0 && distance(base,a)<distance(base,b) )
       return 1;
   return 0;
}

void convexHull(Point *seq, int &len){
   //find min point
   for(int i=0;i<len;++i){
       if(seq[i].y<seq[0].y || (seq[i].y==seq[0].y && seq[i].x<seq[0].x)){
           Point tmp = seq[0];
           seq[0] = seq[i];
           seq[i] = tmp;
       }
   }

   //sort by angle
   base = seq[0];
   std::sort(seq+1, seq+len, cmp);

   seq[len++] = seq[0];

   Point ch[MAX_POINT];
   ch[0] = seq[0];
   ch[1] = seq[1];
   int chLen = 2;

   for(int i=2;i<len;++i){
       while( chLen>=2 && cross(seq[i], ch[chLen-2], ch[chLen-1])<=0 )
           chLen--;
       ch[chLen++]=seq[i];
   }

   for(int i=1;i<chLen;++i)
       seq[i]=ch[i];
   len=chLen;
}


class Kingdom{
public:
   Point house[MAX_POINT+1];
   int numHouse;
   int isDestroyed;

   //func
   Kingdom(){ isDestroyed=0; }
   void addHouse(int x,int y);
   void doConvexHull();
   double getArea();
   int isInside(int x,int y);
};

void Kingdom::addHouse(int x,int y){
   house[numHouse].x = x;
   house[numHouse].y = y;
   numHouse++;
}

void Kingdom::doConvexHull(){
   convexHull(house, numHouse);
}

int Kingdom::isInside(int x,int y){
   Point target;
   target.x=x;
   target.y=y;

   for(int i=1;i<numHouse;++i){
       if(cross(target, house[i-1], house[i])<0) //outside
           return 0;
   }
   return 1;
}

double Kingdom::getArea(){
   double area=0.0;
   for(int i=1;i<numHouse;++i)
       area+=(house[i-1].x * house[i].y)-(house[i].x * house[i-1].y);
   return area/2;
}

int main(){

   Kingdom k[20];
   int numKingdom=0;

   //Input data
   int numHouse;
   while(scanf("%d",&numHouse)==1){
       if(numHouse==-1)
           break;

       for(int i=0;i<numHouse;++i){
           int x,y;
           scanf("%d %d", &x, &y);
           k[numKingdom].addHouse(x,y);
       }
       numKingdom++;
   }

   //do convexHull for each Kingdom
   for(int i=0;i<numKingdom;++i)
       k[i].doConvexHull();

   //SCUD missiles attack
   double totalArea=0.0; //the total area of destroyed kingdoms
   int x,y;
   while(scanf("%d %d", &x, &y)==2){
       for(int i=0;i<numKingdom;++i){
           if(!k[i].isDestroyed && k[i].isInside(x,y)){
               totalArea += k[i].getArea();
               k[i].isDestroyed = 1;
               break;
           }
       }
   }
   printf("%.2lf\n", totalArea);

   return 0;
}

