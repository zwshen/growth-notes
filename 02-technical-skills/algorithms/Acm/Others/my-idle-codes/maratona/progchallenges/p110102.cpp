//Minesweeper

#include <stdio.h>

int main() {
	char field[105][105];
	int n, m;
	int times=1;

	scanf("%d %d", &n, &m);

	while (n || m) {
		for (int i=0; i<n; i++) 
			for (int j=0; j<m; j++) {
				scanf("%c", &field[i][j]);
			
				if (field[i][j]=='\n')
					scanf("%c", &field[i][j]);

				if (field[i][j] == '.')
					field[i][j] = '0';
			}	
		
		for (int i=0; i<n; i++) 
			for (int j=0; j<m; j++) {
				if (field[i][j] == '*')
					continue;

				if ((i-1)>=0 && field[i-1][j]=='*')
					field[i][j]+=1;
				if ((j-1)>=0 && field[i][j-1]=='*')
					field[i][j]+=1;	
				if ((i+1)<n && field[i+1][j] == '*')
					field[i][j]+=1;
				if ((j+1)<m && field[i][j+1] == '*')
					field[i][j]+=1;
				if ((i-1)>=0 && (j-1)>=0 && field[i-1][j-1] == '*')
					field[i][j]+=1;
				if ((i+1)<n && (j-1)>=0 && field[i+1][j-1] == '*')
					field[i][j]+=1;
				if ((i-1)>=0 && (j+1)<m && field[i-1][j+1] == '*')
					field[i][j]+=1;
				if ((i+1)<n && (j+1)<m && field[i+1][j+1] == '*')
					field[i][j]+=1;
			}
	
		printf("Field #%d:\n", times++);		
	
		for (int i=0; i<n; i++) {
			for (int j=0; j<m; j++)
				printf("%c", field[i][j]);
			
			printf("\n");
		}
		
		scanf("%d %d", &n, &m);
		
		if (n || m)
			printf("\n");
	}

	return 0;
}
