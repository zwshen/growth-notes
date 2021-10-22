// The Trip

#include <stdio.h>
#include <vector>
#include <algorithm>
#include <math.h>
using namespace std;

#define EPS 0.01

int cmp(double a, double b, double tol=EPS) {
	if (fabs(a-b)<tol)
		return 0;
	else if ((a-b)>tol)
		return 1;
	else
		return -1;
}

double newFloor(double a, double tol=EPS) {
	a/=tol;
	a=floor(a);
	a*=tol;
	return a;
}

int main() {
	int n; // number of students
	double total;
	vector<double> money;

	scanf("%d", &n);

	while (n) {
		double avg;
		double total=0;
		double totalExchange1=0;
		double totalExchange2=0;
		
		money.clear();

		for (int i=0; i<n; i++) {
			double temp;
			scanf("%lf", &temp);
			total+=temp;
			money.push_back(temp);
		}

		avg=total/(double)n;

		for (int i=0; i<n; i++) {
			if (cmp(avg, money[i])==1)
				totalExchange1+=newFloor(avg-money[i]);
			else if (cmp(avg, money[i])==-1)
				totalExchange2+=newFloor(money[i]-avg);
		}

		printf("$%.2lf\n", max(totalExchange1, totalExchange2) );

		scanf("%d", &n);
	}

	return 0;
}
