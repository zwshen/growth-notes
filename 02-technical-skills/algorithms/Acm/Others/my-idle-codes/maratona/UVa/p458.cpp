#include <stdio.h>
#include <stdlib.h>

int main() {
	char c;

	while (scanf("%c", &c)!=EOF) {
		if (c!='\n')
			c -= 7;

		printf("%c", c);
	}

	return 0;
}
