/**
 * UVa 10591 Happy Number (AC)
 * Author: chchwy
 * Last Modified: 2010.01.30
 */
#include<iostream>
#include<set>
using namespace std;

char happy[1000]={0};
enum {NO_IDEA=0,HAPPY,UNHAPPY};

void setTable( set<int>& path, int state ) {
    set<int>::iterator it;
    for (it=path.begin(); it!=path.end(); ++it)
        if ( *it < 1000 )
            happy[ *it ] = state;
}

inline int isHappy(int n) {
    if (n>=1000)
        return NO_IDEA;
    return happy[n];
}

//取n的各位數平方和
int toNext(int n) {
    int sum=0;
    while ( n!=0 ) {
        int tmp = n%10;
        sum += tmp*tmp;
        n /= 10;
    }
    return sum;
}

int runHappyProcess(int n) {

    set<int> seq;
    while ( n!=1 ) {

        /* n appears again, insertion failed */
        if ( !seq.insert(n).second ) {
            setTable( seq, UNHAPPY );
            return UNHAPPY;
        }

        /* look for table */
        int state = isHappy(n);
        switch (state) {
        case HAPPY:
            setTable( seq, HAPPY );
            return HAPPY;
        case UNHAPPY:
            setTable( seq, UNHAPPY );
            return UNHAPPY;
        case NO_IDEA:
            n  = toNext(n);
            break;
        }
    }
    return HAPPY;
}

int judge(int n) {
    int state = isHappy(n);
    if (state==NO_IDEA)
        return runHappyProcess(n);
    return state;
}

int main() {
#ifndef ONLINE_JUDGE
    freopen("10591.in","r",stdin);
#endif

    happy[1] = HAPPY; //1 is a happy number;

    int caseNum;
    scanf("%d", &caseNum );

    for (int i=1;i<=caseNum;++i) {

        int n;
        scanf("%d",&n );
        if ( judge(n)==HAPPY )
            printf("Case #%d: %d is a Happy number.\n",i,n);
        else
            printf("Case #%d: %d is an Unhappy number.\n",i,n);
    }
    return 0;
}
