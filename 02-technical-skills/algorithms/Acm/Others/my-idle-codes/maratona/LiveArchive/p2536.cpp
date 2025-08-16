#include <stdio.h>
#include <string>
#include <string.h>
#include <vector>
#include <algorithm>
#include <math.h>
#include <list>
using namespace std;

int  main() {
	int target; vector<char> letters;;
	list<string> solutions; char c;

	scanf("%d", &target);
	scanf("%c", &c);

//	printf("como assim?");

	while (c!='\n') {
		letters.push_back(c);
		scanf("%c", &c);
	}

	while (target!=0 && letters[0]!='E' && letters[1]!='N' && letters[2]!='D') {
		unsigned long long int sol;
		solutions.clear();
		sort(letters.begin(), letters.end());
		
//		printf("ae!!\n");

		for (int i=0; i<letters.size(); i++) {
			for (int j=0; j<letters.size(); j++) {

				if (j!=i) {
					for (int k=0; k<letters.size(); k++) {

						if (k!=j && k!=i) {
							for (int l=0; l<letters.size(); l++) {

								if (l!=k && l!=j && l!=i) {
									for (int m=0; m<letters.size(); m++) {
									//	printf("%c%c%c%c%c\n", letters[i], letters[j], letters[k], letters[l], letters[m]);
 
										if (m!=l && m!=k && m!=j && m!=i) {
											sol = (letters[m]-'A'+1) - pow(letters[l]-'A'+1, 2) +pow(letters[k]-'A'+1, 3) - pow(letters[j]-'A'+1, 4) +pow(letters[i]-'A'+1, 5);
											if ((unsigned long long int)target==sol) {
					//							printf("ae!\n");
												string temp;

												temp.insert(temp.end(),letters[m]);
												temp.insert(temp.end(),letters[l]);
												temp.insert(temp.end(),letters[k]);
												temp.insert(temp.end(),letters[j]);
												temp.insert(temp.end(),letters[i]);

												solutions.push_back(temp);
											}
										}
									}	
								}
							}
						}
					}
				}
			}
		}								

		if (solutions.size()!=0) {
			solutions.sort();
			list<string>::iterator it=solutions.begin();

			advance(it, solutions.size()-1);
			printf("%s\n", it->c_str());
		}
		else
			printf("no solution\n");

		scanf("%d", &target);

		letters.clear();		
		scanf("%c", &c);

		while (c!='\n') {
			letters.push_back(c);
			scanf("%c", &c);
		}
	}

	return 0;
}
