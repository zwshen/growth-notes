#include <stdio.h>
#include <set>
#include <math.h>
using namespace std;

set<int> set1;

int main() {
int n=4;
unsigned int a;

scanf("%d", &a);

while (a!=0) {
set1.clear();
int set1Size=0;
set1.insert(a);

while (set1.size()>set1Size) {
set1Size = set1.size();
a = (unsigned int) pow((double)a, 2);
a/=100;
a%=10000;
set1.insert(a);
}

printf("%d\n", set1.size());
scanf("%d", &a);
}

}

