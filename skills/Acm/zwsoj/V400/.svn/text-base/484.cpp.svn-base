/* @JUDGE_ID: 13160EW 484 C++ */
// Q484:The Department of Redundancy Department 
// 給一堆數字，計算每個數字出現的頻率

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <list>

using namespace std;

typedef struct sNode {
	long key;
	long k;
} node;

int main()
{
	node p;
	list<node> li;
	list<node>::iterator begin;
	list<node>::iterator end;
	while( cin >> p.key ) {
		begin = li.begin();
		end = li.end();
		p.k=1;
		while( begin!=end && begin->key!=p.key ) begin++;
		if(begin==end) li.push_back( p );
		else begin->k++;		
	}
	begin = li.begin();
	end = li.end();
	while( begin!=end ) {
		cout << begin->key << " " << begin->k << endl;
		begin++;
	}
	
	return 0;
}
//@END_OF_SOURCE_CODE
