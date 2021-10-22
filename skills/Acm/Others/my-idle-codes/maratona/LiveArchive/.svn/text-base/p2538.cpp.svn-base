#include <stdio.h>
#include <list>
#include <algorithm>
using namespace std;

int main() {
	int beds;

	scanf("%d", &beds);

	while (beds) {
		list<char> customers;
		list<char> walkAway;
		char c; int count=0;

		scanf("%c", &c);
		
		while (c!='\n') {
			if (find(customers.begin(), customers.end(), c)==customers.end() && beds>=customers.size()) 
				customers.push_back(c);
			else if (find(customers.begin(), customers.end(), c)==customers.end()) {
				if (find(walkAway.begin(), walkAway.end(), c)==walkAway.end()) {
					count++;
					walkAway.push_back(c);
				}
			}
			else
				customers.remove(c);

//			list<char>::iterator it=customers.begin();
//			for (it; it!=customers.end(); it++)
//				printf("%c", *it);

//			printf("\n");

			scanf("%c", &c); 	
		}
		
		if (count==0)
			printf("All customers tanned successfully.\n");
		else
			printf("%d customer(s) walked away.\n", count);

		scanf("%d", &beds);
	}

	return 0;
}
