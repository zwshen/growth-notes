#include <stdio.h>
#include <math.h>
#include <vector>
using namespace std;

vector<double> nums;
double temp;

int main() {
	while (scanf("%lf", &temp)!=EOF)
		nums.push_back(temp);

	for (int i=nums.size()-1; i>=0; i--)
		printf("%.4lf\n", sqrt(nums[i]));

	return 0;
}
