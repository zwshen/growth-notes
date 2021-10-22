#include <stdio.h>
#include <utility>
using namespace std;

int main() {
	pair<int, int> init, final;

	scanf("%d%d%d%d", &init.first, &init.second, &final.first, &final.second);

	while (init!=make_pair(0,0) || final!=make_pair(0,0)) {
		if (init==final) 
			printf("0\n");
		else if (init.first==final.first || init.second==final.second)
			printf("1\n");
		else if ((init.first-init.second)==(final.first-final.second))
			printf("1\n");
		else if ((init.first+init.second)==(final.first+final.second))
			printf("1\n");
		else
			printf("2\n");
		
		scanf("%d%d%d%d", &init.first, &init.second, &final.first, &final.second);
	}

	return 0;
}
