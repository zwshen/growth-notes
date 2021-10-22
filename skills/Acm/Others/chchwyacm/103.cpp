/**
 * UVa 103 Stacking Boxes
 * Author: chchwy
 * Last Modified: 2009.12.04
 */
#include <iostream>
#include <algorithm>
using namespace std;

enum {MAX_DIMENSION=10, MAX_NUMBOX=30};

class Box {
public:
    static int dimension;
    int no;
    int edge[MAX_DIMENSION];
    //func
    void sortEdges();
    Box operator=(const Box &right);
    bool operator<=(const Box &right);
    bool operator<(const Box &right) const ;
};

int Box::dimension;

void Box::sortEdges() {
    sort(edge, edge+dimension);
}

Box Box::operator=(const Box &right) {
    no = right.no;
    for (int i=0;i<dimension;++i)
        edge[i] = right.edge[i];
    return *this;
}

bool Box::operator<(const Box &right) const {
    for (int i=0;i<dimension;++i) {
        if (edge[i]<right.edge[i]) continue;
        else return false;
    }
    return true;
}

bool Box::operator<=(const Box &right) {
    for (int i=0;i<dimension;++i) {
        if (edge[i]<=right.edge[i]) continue;
        else return false;
    }
    return true;
}

int main() {

    int numBox, dimension;
    Box box[MAX_NUMBOX];


    while (scanf("%d %d",&numBox,&dimension)==2) {
        //=====read data============
        box[0].dimension = dimension;
        for (int i=0;i<numBox;++i) {
            for (int j=0;j<dimension;++j) {
                scanf("%d",&box[i].edge[j]);
            }
            box[i].no = i+1;
            box[i].sortEdges();
        }

        //sort boxes
        for (int j=1;j<numBox;++j) {
            Box key = box[j];
            int i=j-1;
            while (i>=0 && key <= box[i]) {
                box[i+1] = box[i];
                --i;
            }
            box[i+1] = key;
        }
        //std::sort(box, box+numBox);

        //build partial order relation by graph representation
        int graph[MAX_NUMBOX][MAX_NUMBOX];
        for (int i=0;i<numBox;++i) {
            for (int j=0;j<numBox;++j) {
                if (box[i] < box[j])
                    graph[i][j] = 1;
                else
                    graph[i][j] = 0;
            }
        }

        //DP- build route
        int level[MAX_NUMBOX];
        int prev[MAX_NUMBOX];  //for backtracking
        for (int i=0;i<numBox;++i) {
            level[i] = 0;
            prev[i] = -1;
        }

        for (int i=0;i<numBox;++i) {
            for (int j=0;j<numBox;++j) {
                if (i==j) continue;

                if (graph[i][j] && level[i]+1 > level[j]) {
                    level[j] = level[i]+1;
                    prev[j] = i;
                }
            }
        }

        //find the longest length
        int maxBox=0 ;
        for (int i=1;i<numBox;++i) {
            if (level[i]>level[maxBox])
                maxBox = i;
        }
        int maxLength = level[maxBox]+1;

        int boxSeq[MAX_NUMBOX];
        int index = maxBox;
        for (int i=maxLength-1;i>=0;--i) {
            boxSeq[i] = index;
            index = prev[index];
        }

        printf("%d\n",maxLength);
        int i;
        for (i=0;i<maxLength-1;++i)
            printf("%d ",box[boxSeq[i]].no);
        printf("%d\n",box[boxSeq[i]].no);

    }
    return 0;
}

