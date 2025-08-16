#include <stdio.h>
#include <list>
#include <algorithm>
using namespace std;

class player {
	public:
	int points;
	int id;
	player(int id) {points=1; this->id=id;};
};

bool cmp(player a, player b) {
	if (a.points!=b.points)
		return (a.points>b.points);

	return (a.id<b.id);
}

int main() {
	int m, n;
	
	scanf("%d%d", &n, &m);

	while (m!=0 || n!=0) {
		list<player> rank;
		int temp;
		list<player>::iterator it=rank.begin();

		for (int i=0; i<n; i++) {
			for (int j=0; j<m; j++) {
				scanf("%d", &temp);
				
				for (it=rank.begin(); it!=rank.end(); it++) {
					if (it->id > temp) {
						rank.insert(it, player(temp));
						break;
					}
					else if (it->id == temp) {
						it->points++;
						break;
					}
				}

				if (it==rank.end()) 
					rank.insert(it, player(temp));
			}
		}

		rank.sort(cmp);
		int notTooBig, big;

		it=rank.begin();
		big=it->points;

		for (it; it!=rank.end(); it++) {
			if (it->points < big)
				break;
		}

		notTooBig=it->points;

		while (notTooBig == it->points && it!=rank.end()) {
			printf("%d ", it->id);
			it++;
		}

		printf("\n");
		
		scanf("%d%d", &n, &m);
	}

	return 0;
}
