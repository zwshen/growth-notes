/* @JUDGE_ID: 13160xx 102 C++ */
//  Ecological Bin Packing 
// 03/25/10 23:48:57

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>

using namespace std;

const int MAX_BOTTLES = 3;
long b[MAX_BOTTLES], g[MAX_BOTTLES], c[MAX_BOTTLES];

const int BCG = 1;
const int BGC = 2;
const int CBG = 3;
const int CGB = 4;
const int GBC = 5;
const int GCB = 6;

long move(int pattern) {
	switch( pattern) {
		case BCG:
			return g[0] + c[0] + b[1] + g[1] + b[2] + c[2];
		case BGC:
			return g[0] + c[0] + b[1] + c[1] + b[2] + g[2];
		case CBG:
			return b[0] + g[0] + c[1] + g[1] + c[2] + b[2];
		case CGB:
			return g[0] + b[0] + c[1] + b[1] + c[2] + g[2];
		case GBC:
			return b[0] + c[0] + g[1] + c[1] + g[2] + b[2];
		case GCB:
			return c[0] + b[0] + g[1] + b[1] + g[2] + c[2];
	}
	return 0;
}

void checkAnswer() {
	int select = BCG;
	long r = move(BCG);
	long am;
	
	am = move(BGC);	if(r>am) { r = am; select = BGC; }
	am = move(CBG);	if(r>am) { r = am; select = CBG; }
	am = move(CGB);	if(r>am) { r = am; select = CGB; }
	am = move(GBC);	if(r>am) { r = am; select = GBC; }
	am = move(GCB);	if(r>am) { r = am; select = GCB; }

	
	if(select==BCG) cout << "BCG " << r << endl;
	if(select==BGC) cout << "BGC " << r << endl;
	if(select==CBG) cout << "CBG " << r << endl;
	if(select==CGB) cout << "CGB " << r << endl;
	if(select==GCB) cout << "GCB " << r << endl;
	if(select==GBC) cout << "GBC " << r << endl;
}

int main()
{
	
	while(
		cin >> b[0] >> g[0] >> c[0]
			>> b[1] >> g[1] >> c[1]
			>> b[2] >> g[2] >> c[2]) {
			
			checkAnswer();	
		
	}
	return 0;
}

