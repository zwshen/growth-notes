/* @JUDGE_ID: 13160EW 107 C++ "log" */

//@BEGIN_OF_SOURCE_CODE
#include <iostream>
#include <cmath>

using namespace std;

int main()
{
	unsigned long w,h,n,x,temp,tot_no,tot_hi;
	while(1) 
	{
		cin >> w >> h;
		if( w==0 && h==0) break;
		n = 1;
		x = 0;
		while(1) {
			temp =pow(n+1,x);
			if( temp == w ) {
				if( h == pow(n,x) )	break; // find it
				else x++;
			}
			else if(temp > w) {
				n++;
				x = 0;
			}
			else x++;
		} // end while
//		cout << n << ":" << x << endl;
		tot_no = 0;
		tot_hi  = 0;
		if( w==1) temp = h;
		else temp = 1;
		while( w > 1 ) {
		//	cout << w << ":" << temp << endl;
			tot_no += temp;
			tot_hi += temp*w;
			temp*=n;
			w/=(n+1);
		}
		//tot_no += w;
		tot_hi += temp;
		cout << tot_no << " " << tot_hi << endl;	
	}
	return 0;
}
//@END_OF_SOURCE_CODE
