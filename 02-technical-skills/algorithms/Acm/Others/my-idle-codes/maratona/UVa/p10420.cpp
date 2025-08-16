#include <stdio.h>
#include <string>
#include <iostream>
#include <map>
#include <vector>
#include <algorithm>
using namespace std;

int main() {
	int n; char c;
	map<string, int> nCountry;
	vector<string> country;

	scanf("%d", &n);
	scanf("%c", &c);
	
	while (n--) {
		string temp;
		getline(cin, temp);

		int space = temp.find_first_of(' ');
		temp = temp.substr(0, space);

		if (find(country.begin(), country.end(), temp) == country.end()) {
			nCountry[temp]=1;
			country.push_back(temp);
		}
		else 
			nCountry[temp]++; 
	}	

	sort(country.begin(), country.end()); 

	for (int i=0; i<country.size(); i++)
		printf("%s %d\n", country[i].c_str(), nCountry[country[i]]);	
	
	return 0;
}
