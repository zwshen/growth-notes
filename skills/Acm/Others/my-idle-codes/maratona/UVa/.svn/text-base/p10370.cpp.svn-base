#include <stdio.h>
#include <vector>
#include <math.h>
using namespace std;

vector<int> grades;
float round(float);

int main() {
	int c, n, sum=0, counterAboveAv=0;
	float average, percent;

	scanf("%d", &c);

	for (int i=0; i<c; i++) {
		sum=0;
		counterAboveAv=0;
		grades.clear();

		scanf("%d", &n);

		for (int j=0; j<n; j++) {
			int t;
			scanf("%d", &t);
			grades.push_back(t);
		}

		for (int j=0; j<grades.size(); j++)
			sum+=grades[j];
		average = sum/(int)grades.size();

		for (int j=0; j<grades.size(); j++) {
			if (grades[j]>average)
				counterAboveAv++;
		}


		//Percentage

		percent = ((float)counterAboveAv/(float)grades.size())*100;
		percent = round(percent);
		printf("%.3f%%\n", percent);
	}

	return 0;

}

float round(float num) {
	num*=1000;
	int numInt=(int) num;

	float decimal = num - numInt;

	if(decimal>=0.5)
		return (ceil(num)/1000);
	else
		return (floor(num)/1000);

}
