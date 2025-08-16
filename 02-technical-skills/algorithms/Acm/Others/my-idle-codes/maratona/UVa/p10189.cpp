#include <stdio.h>
#include <vector>
using namespace std;

int main() {
	char grid[110][110];
	int m, n, cases=1;

	scanf("%d%d\n", &n, &m);

	while (n || m) {
		vector< pair<int, int> > bombs;
		char c;

		for (int i=0; i<n; i++) {
			for (int j=0; j<m; j++) {
				scanf("%c", &grid[i][j]);
				
				if (grid[i][j] == '*')
					bombs.push_back(pair<int, int>(i, j));
				else if (grid[i][j] == '.')
					grid[i][j]='0';
			}

			scanf("%c", &c);
		}

		for (int i=0; i<bombs.size(); i++) {
			int r = bombs[i].first;
			int c = bombs[i].second;
			int num;
		
			if ((r-1)>=0 && grid[r-1][c]!='*') {
				num = (grid[r-1][c] - '0');
				num++;
				grid[r-1][c]=(char) (num+'0');
			}
			
			if ((r+1)<n && grid[r+1][c]!='*') {
				num = (grid[r+1][c] - '0');
				num++;
				grid[r+1][c]=(char) (num+'0');
			}	
			
			if ((c+1)<m && grid[r][c+1]!='*') {
				num = (grid[r][c+1] - '0');
				num++;
				grid[r][c+1]=(char) (num+'0');
			}
			
			if ((c-1)>=0 && grid[r][c-1]!='*') {
				num = (grid[r][c-1] - '0');
				num++;
				grid[r][c-1]=(char) (num+'0');
			}

			if ((c-1)>=0 && (r-1)>=0 && grid[r-1][c-1]!='*') {
				num = (grid[r-1][c-1] - '0');
				num++;
				grid[r-1][c-1]=(char) (num+'0');
			}
			if ((c+1)<m && (r-1)>=0 && grid[r-1][c+1]!='*') {
				num = (grid[r-1][c+1] - '0');
				num++;
				grid[r-1][c+1]=(char) (num+'0');
			}
			
			if ((c+1)<m && (r+1)<n && grid[r+1][c+1]!='*') {
				num = (grid[r+1][c+1] - '0');
				num++;
				grid[r+1][c+1]=(char) (num+'0');
			}
			
			if ((c-1)>=0 && (r+1)<n && grid[r+1][c-1]!='*') {
				num = (grid[r+1][c-1] - '0');
				num++;
				grid[r+1][c-1]=(char) (num+'0');
			}
		}
	

		printf("Field #%d:\n", cases);
		for (int i=0; i<n; i++) {
			for (int j=0; j<m; j++)
				printf("%c", grid[i][j]);
			
			printf("\n");
		}


		scanf("%d%d\n", &n, &m);
		if (m || n){
			printf("\n");					
			cases++;
		}
	}

	return 0;
}
