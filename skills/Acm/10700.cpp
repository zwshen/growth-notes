/* @JUDGE_ID: 13160EW 10700 C++ */
// 04/17/07 11:52:53
// 10700 Problem E - Camel trading
//@BEGIN_OF_SOURCE_CODE 

#include <cstdlib>
#include <iostream>
#include <string>
#include <vector>
using namespace std;

#define PLUS 99
#define MULTI 100

// 20^12 belong to long long type
unsigned long long find_max(vector<int>& vs) {
	//plus first
	vector<unsigned long long> ss;
	
	int i = 1;
	int size = vs.size();
	unsigned long long result = vs[0];
	while(i < size) {
		int op = vs[i];		i++;
		int num = vs[i];	i++;

		if( op == PLUS) {
			result += num;
		}
		else {
			ss.push_back(result);
			result = num;
		}
	}
	ss.push_back(result);

	result = 1;
	for(i=0;i<ss.size();i++)
		result *= ss[i];

	return result;
}

unsigned long long find_min(vector<int>& vs) {
	// multi first
	vector<unsigned long long> ss;
	
	int i = 1;
	int size = vs.size();
	unsigned long long result = vs[0];
	while(i < size) {
		int op = vs[i];		i++;
		int num = vs[i];	i++;

		if( op == MULTI) {
			result *= num;
		}
		else {
			ss.push_back(result);
			result = num;
		}
	}

	ss.push_back(result);

	result = 0;
	for(i=0;i<ss.size();i++)
		result += ss[i];

	return result;
}

void parse_exp(vector<int>& vs, string exp)
{
	int idx =0;
	while( exp[idx] != 0 ) {

		//  remove incorrect char
		while( exp[idx] != 0 && !isdigit(exp[idx]) ) idx++;

		// find number
		int num = 0;
		while( exp[idx] != 0 && isdigit(exp[idx]) ) {
			num = num*10 + exp[idx]-'0';
			idx++;
		}
		if(num>0) vs.push_back(num);

		//  remove incorrect char
		while( exp[idx] != 0 && exp[idx] != '*' && exp[idx] != '+' ) idx++;

		// find operator
		if( exp[idx] != 0) {
			if( exp[idx] == '+' )
				vs.push_back(PLUS);
			else
				vs.push_back(MULTI);
			idx++;
		}

		//cout << num << "\t" << exp[idx-1] << "\t";
	}
}

void op(string exp)
{
	vector<int> vs;
	parse_exp(vs, exp);

	cout << "The maximum and minimum are " 
		<< find_max(vs) << " and " 
		<<  find_min(vs) 
		<< "." << endl;
}

int main()
{
	int n;
	string buf;
	cin >> n;
	getline(cin, buf); // elimate \n
	while(n-->0) {
		getline(cin, buf);
		op(buf);
	}
	return 0;
}
