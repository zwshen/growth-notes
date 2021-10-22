#include <fstream>
#include <iostream>
#include <cstring>

using namespace std;

int main()
{
	int n;
	cout << " Problem #: " ;
	cin >> n;
	char buf[100];
	sprintf( buf , "%d.bat" , n);
	cout << buf << endl;
	ofstream fout( buf );
	fout << n << " < " << n << "in.txt > " << n << "out.txt " << endl;
	fout.close();
	return 0;
}