/* @JUDGE_ID: 13160EW 350 C++ "table" */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <vector>

using namespace std;
unsigned long z,i,m,l;

inline unsigned long rnd(unsigned long l)
{
	return (z*l+i) % m;
}

void find_cir()
{
	long loc = 0;
	vector<unsigned long>  vc(m,0);
	while(1) {
		//cout << l << endl;
		if( vc[l]!=0 ) {
			cout << loc - vc[l] << endl;
			break;
		}
		vc[l] = loc++;
		l = rnd(l);
	}
}

int main()
{
	int ct =0;
	while(1)
	{
		cin >> z >> i >> m >> l;
		if( z == 0 && i == 0 && m == 0 && l==0 ) break;
		ct++;
		cout << "Case " << ct << ": ";
		find_cir();
	}
	return 0;
}

//@END_OF_SOURCE_CODE
