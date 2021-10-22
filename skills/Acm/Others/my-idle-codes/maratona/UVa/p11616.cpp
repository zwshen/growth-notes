#include <string>
#include <stdio.h>
#include <map>
using namespace std;

int main() {
	char buffer[30];
	string romanDigits("IVXLCDM");
	
	while (scanf("%s", buffer)!=EOF) {
		if (buffer[0]>='0' && buffer[0]<='9') {
			int arabic;
			string roman;
			sscanf(buffer, "%d", &arabic);
			
			for (int i=0; i<4 && arabic!=0; i++) {
				int temp = arabic%10;

				if (temp==9) {
					roman.insert(roman.begin(), romanDigits[2*i+2]);
					roman.insert(roman.begin(), romanDigits[2*i]);
				}				
				else if (temp>=5) {
					while (temp>5) { 
						roman.insert(roman.begin(), romanDigits[2*i]);
						temp--;
					}
					
					roman.insert(roman.begin(), romanDigits[2*i+1]);
				}
				else if (temp==4) {
					roman.insert(roman.begin(), romanDigits[2*i+1]);
					roman.insert(roman.begin(), romanDigits[2*i]);
				}
				else {
					while (temp>0) {
						roman.insert(roman.begin(), romanDigits[2*i]);
						temp--;
					}	
				}

				arabic/=10;
			}
			
			printf("%s\n", roman.c_str());
		}
		else {
			map<char, int> value;
			value['I']=1;
			value['V']=5;
			value['X']=10;
			value['L']=50;
			value['C']=100;
			value['D']=500;
			value['M']=1000;
			
			string roman(buffer);
			int arabic=0;
			int lastInd=-1;

			for (int i=roman.size()-1; i>=0; i--) {
				int index=romanDigits.find(roman[i]);
				
				if (index>=lastInd)
					arabic+=value[roman[i]];
				else
					arabic-=value[roman[i]];

				lastInd=index;
			}	

			printf("%d\n", arabic);	
		}
	}

	return 0;
}
