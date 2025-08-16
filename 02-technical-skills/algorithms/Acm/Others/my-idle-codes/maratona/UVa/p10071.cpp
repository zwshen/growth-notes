#include <stdio.h>
#include <stdlib.h>

int main() {
	int speed;
	unsigned int time;

	while (scanf("%d%u", &speed, &time)!=EOF)
		printf("%d\n", speed*2*time);

	return 0;
}
