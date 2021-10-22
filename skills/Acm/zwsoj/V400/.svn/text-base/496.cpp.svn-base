/* @JUDGE_ID: 13160EW 496 C++ */
// 06/08/03 11:10:27
// Q496: Simply Subsets
//@BEGIN_OF_SOURCE_CODE

#include <stdlib.h>
#include <stdio.h>
#include <iostream>
#include <string>
#include <vector>

using namespace std;

void Generate( vector<int>& rSet , string& rStr) 
{
	int lpos,npos;
	int value;
	int i,size;
	lpos = npos = 0;
	while( (npos = rStr.find_first_of(" ",npos))!=string::npos ) {
		value = atoi(rStr.substr( lpos , npos-lpos+1 ).c_str());
		size = rSet.size();
		for(i=0;i<size && rSet[i]!=value;i++);
		if( i == size ) rSet.push_back(value);
		npos++;
		npos = rStr.find_first_not_of(" ",npos);
		lpos = npos;
	}
	value = atoi(rStr.substr( lpos , npos-lpos+1 ).c_str());
	size = rSet.size();
	for( i = 0 ; i < size && rSet[i]!=value ; i++);
	if( i == size ) rSet.push_back(value);
}

int main()
{ 
	string str;
	char buf[10000];
	int i,j,ct;
	vector<int> set1,set2;
	int size1 , size2;
	while( gets(buf) ) {
		str = buf;
		set1.clear();
		set2.clear();

		Generate( set1 , str );
		
		gets( buf );
		str = buf;
		Generate (set2 , str);
		
		size1 = set1.size();
		size2 = set2.size();
		ct = 0;
		for(i=0;i<size1;i++) 
			for(j=0;j<size2;j++) 
				if( set1[i] == set2[j] ) ct++;

		if( size1 == size2 ) {
			if( ct == size1 ) 
				cout << "A equals B" << endl;
			else if(ct==0)
				cout << "A and B are disjoint" << endl;
			else 
				cout << "I'm confused!" << endl;
		} else  {
			if( ct==0)
				cout << "A and B are disjoint" << endl;
			else if( ct == size1 ) {
				cout << "A is a proper subset of B" << endl;
			} else if(ct == size2 ) {
				cout << "B is a proper subset of A" << endl;
			} else 
				cout << "I'm confused!" << endl;
		}
	} // end while


	return 0;
}

//@END_OF_SOURCE_CODE
