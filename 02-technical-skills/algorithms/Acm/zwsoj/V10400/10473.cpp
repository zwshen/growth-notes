/* @JUDGE_ID: 13160EW 10473 C++ */
// 02/07/06 16:01:19

//@BEGIN_OF_SOURCE_CODE 

#include <iostream>
#include <iomanip>
	
using namespace std;
	
int atoi(char * str, int BASE=10){
	 int length, value , base ;
	 int idx;

	 if(!str) return 0;
	 
	 length = strlen(str);
	 if(length <= 0) return 0;
	 base = 1;
	 value = 0;
	 for(idx = length-1; idx>0 ; idx--){
	 	 if( str[idx] >= 'A' && str[idx] <='Z' )
			  value+= (str[idx] - 'A'+10) * base; 
		 else if( str[idx] >= 'a' && str[idx] <='z' )
			  value+= (str[idx] - 'a'+10) * base; 
		 else
			  value+= (str[idx] - '0') * base; 
		
	  base *= BASE;
	 }
	 if(str[0] == '-'){
		value = -value;
	 }else{
	 	 if( str[idx] >= 'A' && str[idx] <='Z' )
			  value+= (str[idx] - 'A'+10) * base; 
		 else if( str[idx] >= 'a' && str[idx] <='z' )
			  value+= (str[idx] - 'a'+10) * base; 
		 else
			  value+= (str[idx] - '0') * base; 
	 }
	 return value;
}

int main()
{
	char buf[100];
	cout.setf(ios::uppercase);
	while(1) {
		cin >> buf;
		if( buf[0] == '-' ) break;

		if( buf[0] == '0' )  {
			cout << setbase(10) << atoi( buf+2, 16) << endl;
		}
		else {
			cout << "0x" << setbase(16) << atoi(buf, 10) << endl;
		}
	}

	return 0;
}