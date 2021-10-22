/* @JUDGE_ID: 13160xx 10703 C++ */
// 04/17/07 15:41:42
// 10703 Problem H - Free spots
//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;
#define SIZE 500+1
bool board[SIZE][SIZE];
int bw, bh;	// board width and height
int spots;	// free spots

void init(int w, int h) {
	bw = w;
	bh = h;
	spots = bw*bh;
	for(int i=1;i<=bw;i++)
		for(int j=1;j<=bh;j++)
			board[i][j] = true;

}
void free_spots(int x1,int y1, int x2, int y2) {
	if(x1>x2) x1^=x2^=x1^=x2;
	if(y1>y2) y1^=y2^=y1^=y2;

		for(int i=x1;i<=x2;i++)
			for(int j=y1;j<=y2;j++)
				if(board[i][j] == true) {
					// coverd one spot
					board[i][j] = false;	
					spots --;
				}
}

int main()
{
	int w,h,n;
	while(cin >> w >> h >> n) {
		if(w ==0 && h == 0 && n == 0 )
			break;// finish
			init(w,h);
			int x1,x2,y1,y2;
			while(n-->0) {
				cin >> x1 >> y1 >> x2 >> y2;
				free_spots(x1,y1,x2,y2);
			}

			// output free spots
			if(spots == 0)
				cout << "There is no empty spots." << endl;
			else if(spots == 1)
				cout << "There is one empty spot." << endl;
			else
				cout << "There are " << spots << " empty spots." << endl;
		
	}

	return 0;
}

