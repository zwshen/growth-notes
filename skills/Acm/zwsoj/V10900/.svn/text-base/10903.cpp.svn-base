/* @JUDGE_ID: 13160EW 10903 C++ */
// 02/07/06 23:12:08

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h>
#include <iostream>
#include <string>

using namespace std;

const int MAX_PLAYERS = 101;
const int WIN = 1;
const int LOSE = 2;
const int BALANCE = 3;

int win[MAX_PLAYERS];
int lose[MAX_PLAYERS];

void init() {
	for(int i=0;i<MAX_PLAYERS;i++)
		win[i] = lose[i] = 0;
}

int judge(string m1, string m2)
{
	if( m1 == "rock" ) {
		if( m2 == "scissors" ) return WIN;
		else if( m2 == "paper" ) return LOSE;
		return BALANCE;
	}
	if( m1 == "scissors" ) {
		if( m2 == "paper" ) return WIN;
		else if( m2 == "rock" ) return LOSE;
		return BALANCE;
	}
	if( m1 == "paper" ) {
		if( m2 == "rock" ) return WIN;
		else if( m2 == "scissors" ) return LOSE;
		return BALANCE;
	}
}

int main()
{
	int n,k;
	bool flag=false;
	while(1) {
		cin >> n;
		if( n == 0 ) return 0;

		// for newline
		if(flag) cout << endl;
		flag = true;

		cin >> k;
		init();
		int total = k*(n*(n-1)/2);
		int p1, p2;
		string m1,m2;
		for(int i=0;i<total;i++) {
			cin >> p1 >> m1 >> p2 >> m2;
			switch( judge(m1,m2) ) {
				case WIN:
					win[p1]++;
					lose[p2]++;
				break;
				case LOSE:
					lose[p1]++;
					win[p2]++;
				break;
				case BALANCE:
					// nothing to do
				break;
			}
		} // end for
		for(int i=1;i<=n;i++) {
			if( win[i] + lose[i] == 0 ) cout << "-" << endl;
			else printf("%.3f\n", (double)win[i]/(double)(win[i]+lose[i]) );
		}
	}

	return 0;
}