// Check the check

#include <stdio.h>

int checkPawn(char letter, char board[10][10], int x, int y) {
	int check=0;

	if (letter>='a' && letter<='z') { //black
		if ((x+1)<8 && (y-1)>=0)
			if (board[x+1][y-1]=='K') check=-1;
		if ((x+1)<8 && (y+1)<8)
			if (board[x+1][y+1]=='K') check=-1;
	}
	else { //white
		if ((x-1)>=0 && (y-1)>=0)
			if (board[x-1][y-1]=='k') check=1;
		if ((x+1)>=0 && (y+1)<8)
			if (board[x-1][y+1]=='k') check=1;
	}

	return check;
}

int checkKnight(char letter, char board[10][10], int x, int y) {
	int check=0;
	char king;

	if (letter>='a' && letter<='z')
		king='K';
	else
		king='k';

	if ((x-1)>=0 && (y-2)>=0)
		if (board[x-1][y-2]==king) check=1;
	if ((x+1)<8 && (y-2)>=0)
		if (board[x+1][y-2]==king) check=1;
	if ((x-1)>=0 && (y+2)<8)
		if (board[x-1][y+2]==king) check=1;
	if ((x+1)<8 && (y+2)<8)
		if (board[x+1][y+2]==king) check=1;
	if ((x+2)<8 && (y-1)>=0)
		if (board[x+2][y-1]==king) check=1;
	if ((x+2)<8 && (y+1)<8)
		if (board[x+2][y+1]==king) check=1;
	if ((x-2)>=0 && (y-1)>=0)
		if (board[x-2][y-1]==king) check=1;
	if ((x-2)>=0 && (y+1)<8)
		if (board[x-2][y+1]==king) check=1;

	if (check)
		return (king=='K')? -1:1;
	else
		return 0;
}

int checkRook(char letter, char board[10][10], int x, int y) {
	char king;

	if (letter>='a' && letter<='z')
		king='K';
	else
		king='k';

	for (int i=x-1; i>=0; i--) {
		if (board[i][y]==king)
			return (king=='K')? -1:1;
		else if (board[i][y]!='.')
			break;
	} 
	
	for (int i=x+1; i<8; i++) {
		if (board[i][y]==king)
			return (king=='K')? -1:1;
		else if (board[i][y]!='.')
			break;
	}

	for (int j=y-1; j>=0; j--) {
		if (board[x][j]==king)
			return (king=='K')? -1:1;
		else if (board[x][j]!='.')
			break;
	}

	for (int j=y+1; j<8; j++) {
		if (board[x][j]==king)
			return (king=='K')? -1:1;
		else if (board[x][j]!='.')
			break;
	}

	return 0;
}

int checkBishop(char letter, char board[10][10], int x, int y) {
	char king;

	if (letter>='a' && letter<='z')
		king='K';
	else
		king='k';

	for (int i=x-1, j=y-1; i>=0 && j>=0; i--, j--) {
		if (board[i][j]==king)
			return (king=='K')? -1:1;
		else if (board[i][j]!='.')
			break;
	} 
	
	for (int i=x+1, j=y-1; i<8 && j>=0; i++, j--) {
		if (board[i][j]==king)
			return (king=='K')? -1:1;
		else if (board[i][j]!='.')
			break;
	}

	for (int j=y+1, i=x-1; j<8 && i>=0; j++, i--) {
		if (board[i][j]==king)
			return (king=='K')? -1:1;
		else if (board[i][j]!='.')
			break;
	}

	for (int j=y+1, i=x+1; j<8 && i<8; j++, i++) {
		if (board[i][j]==king)
			return (king=='K')? -1:1;
		else if (board[i][j]!='.')
			break;
	}

	return 0;
}

int checkQueen(char letter, char board[10][10], int x, int y) {
	int check = checkRook(letter, board, x, y);

	if (check)
		return check;

	check = checkBishop(letter, board, x, y);
	
	if (check)
		return check;

	return 0;
}

int main() {
	char board[10][10];
	char noEnd=1;
	int cases=1;

	while (noEnd) {
		noEnd=0;
		int check=0;

		for (int i=0; i<8; i++) {
			for (int j=0; j<8; j++) {
				scanf("%c", &board[i][j]);
				if (board[i][j]!='.') noEnd=1;
			}
			
			scanf("\n");
		}

		if (!noEnd)
			break;
		/* 
			break;
			for (int j=0; j<8; j++)
				printf("%c", board[i][j]);

			printf("\n");
		} */

		for (int i=0; i<8; i++) {
			for (int j=0; j<8; j++) {
				switch (board[i][j]) {
					case 'p':
					case 'P':
						check=checkPawn(board[i][j], board, i, j);
						break;
					case 'r':
					case 'R':
						check=checkRook(board[i][j], board, i, j);
						break;
					case 'b':
					case 'B':
						check=checkBishop(board[i][j], board, i, j);
						break;
					case 'q':
					case 'Q':
						check=checkQueen(board[i][j], board, i, j);
						break;
					case 'n':
					case 'N':
						check=checkKnight(board[i][j], board, i, j);
						break;
				}
				
				if (check)
					break;
			}
			
			if (check)
				break;
		}

		printf("Game #%d: ", cases++);

		if (check==1)
			printf("black king is in check.");
		else if (check==-1)
			printf("white king is in check.");
		else
			printf("no king is in check.");

		printf("\n");

	}

	return 0;
}
