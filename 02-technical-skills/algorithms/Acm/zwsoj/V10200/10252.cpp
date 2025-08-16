/* @JUDGE_ID: 13160xx 10252 C++ */
// 10252 - Common Permutation 
// 03/24/10 22:37:41

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <cstdio>

using namespace std;

int main()
{
	const int MAX_SIZE = 1005;
	char str1[MAX_SIZE];
	char str2[MAX_SIZE];
	int alpha1[26];
	int alpha2[26];
	
	while(gets(str1)!=0) {
		gets(str2);
		if(str1[0]==0 || str2[0]==0) {
			cout << endl;
			continue;
		}

		// initialize alpha tables
		for(int i=0;i<26;i++) {
			alpha1[i] = 0;
			alpha2[i] = 0;
		}
		
		// record the count of each alpha in str1
		for(int i=0;i<strlen(str1);i++)
			alpha1[ str1[i]-'a']++;

		// record the count of each alpha in str1
		for(int i=0;i<strlen(str2);i++)
			alpha2[ str2[i]-'a']++;
			
		// pick the min alpha (except 0 count)
		for(int i=0;i<26;i++) {
			if( alpha1[i]==0) continue;
			if( alpha2[i]==0) continue;
			
			int min = alpha1[i];
			if( min > alpha2[i]) min = alpha2[i];
			// the number of character i is min
			for(int j=0;j<min;j++)
				cout << (char)(i+'a');
		}
		cout << endl;
	}
	
	return 0;
}

