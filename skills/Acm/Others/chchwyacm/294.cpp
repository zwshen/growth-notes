/**
 * UVa 294 Divisors (AC)
 * Author: chchwy
 * Last Modified: 2010.01.27
 */
#include<cstdio>
#include<cmath>
#include<vector>
using namespace std;

enum {MAX=1000000000, SQRT_MAX=31622}; //sqrt(1000000000) = 31622

char isPrime[SQRT_MAX] = {0};
vector<int> primeNum;

int shieve() {

    isPrime[0] = 0;
    isPrime[1] = 0;
    isPrime[2] = 1;

    for (int i=3;i<SQRT_MAX;++i)
        isPrime[i] = i%2;

    //shieve
    int sqrt_n = sqrt((int)SQRT_MAX);
    for (int i=3;i<sqrt_n;i+=2) {
        if (isPrime[i]==0) continue;

        for (int j=i*i;j<SQRT_MAX;j+=i)
            isPrime[j]=0;
    }

    //push all prime number into vector "primeNum"
    for (int i=2;i<SQRT_MAX;++i)
        if (isPrime[i])
            primeNum.push_back(i);
}

//回傳 num 總共有幾個divisor
int getDivisorNumber(int n) {

    if ( n==1 ) return 1;
    if ( n<SQRT_MAX && isPrime[n] ) return 2;

    int total = 1;

    int tmp = n;
    for (int i=0 ; i<primeNum.size() && primeNum[i]*primeNum[i]<=n; ++i) {

        int div = primeNum[i];

        int exp=1; //算這個因數總共有幾個
        for ( ; tmp%div==0 ; exp++ ){
            tmp /= div;
        }
        total *= exp;

        if ( tmp==1 ) return total;
    }
    if(total!=1) return total*2; //還剩下一個大於sqrt(n)的因數
    return 2;
}

int main() {

    #ifndef ONLINE_JUDGE
    freopen("294.in", "r", stdin );
    #endif

    shieve(); //build the prime table

    int numCase;
    scanf("%d", &numCase);

    while (numCase--) {
        int a, b;
        scanf("%d %d",&a,&b);

        int maxi=0, maxDiv=0;
        for ( int i=a;i<=b;++i) {
            int curDiv = getDivisorNumber(i);

            if ( curDiv > maxDiv ) {
                maxi = i;
                maxDiv = curDiv;
            }
        }
        printf("Between %d and %d, %d has a maximum of %d divisors.\n", a,b,maxi,maxDiv);
    }
    return 0;
}
