/* @JUDGE_ID: 13160EW 847 C++ */
// 2004/04/13
// Q902 Password Search
//@BEGIN_OF_SOURCE_CODE
// TIP: const time sub-string

#include <iostream>
#include <string>
#include <vector>
#include <map>

using namespace std;

//#define PRIME 13881
#define PRIME 99991

//unsigned int joaat_hash(int n, char* key)
unsigned int hash(int n, char* key)
{
     unsigned int hash = 0;
     for (int i = 0; i < n; i++) {
         hash += key[i];
         hash += (hash << 10);
         hash ^= (hash >> 6);
     }
     hash += (hash << 3);
     hash ^= (hash >> 11);
     hash += (hash << 15);
     return hash % PRIME;
 }
 
 /*

long hash(int n, char* str)
{
   long key1 = 0;
//   int len = min<int>(5, n);
   long t = 1;
   for(int i = 0; i < n ; i++)
   {
       t = (i<<1);
       key1 += (((int)(str[i])-'a'))<<t;
   }
   
   return key1%PRIME;
}

*/

/*
inline long long toValue(int n, char* str) {
	long long result = 0;
	
	for(int i=0;i<n;i++)
		result = result*26 + (str[i] -'a'+1);
	return result;
}
*/

// customized Hash function
string search(const int n, string pwd) {
	vector<unsigned int> vs = vector<unsigned int>(PRIME + 1,0);
	char *r = &pwd[0];
    vs[ hash(n, r) ] = 1;
    long rv = 1; 
    long len = pwd.size()-n+1;
    long rpos = 0;
    
    for(long pos=1;pos<len;pos++) {
        char *buf = &pwd[pos];
        
        unsigned int cur_pw = hash(n, buf);
        vs[cur_pw]++;
        
        long new_rv = vs[cur_pw]; 
        if( new_rv > rv ) {
             rpos = pos;
             r = &pwd[rpos];
             rv = new_rv;
       }
    }

	pwd[rpos + n] = 0;
    return r;
}

/* STL map
string search(const int n, string pwd) {
    map<long long, long> vs;
	char *r = &pwd[0];
    vs[ toValue(n, r) ] = 1;
    long rv = 1; 
    long len = pwd.size()-n+1;
    long rpos = 0;
    for(long pos=1;pos<len;pos++) {
        char *buf = &pwd[pos];
        long long cur_pw = toValue(n, buf);
        if( vs.find(cur_pw) == vs.end() )
            vs[cur_pw] = 1;	// put in map
        else {
        	// counter + 1
            vs[cur_pw]++;
            long new_rv = vs[cur_pw]; 
            if( new_rv > rv )
                rpos = pos;
                r = &pwd[rpos];
                rv = new_rv;

//                char c = pwd[rpos+n]; 
//                pwd[rpos+n] = 0;
//                cout << r << "\t" << rpos << "\t" << c << endl;
//                pwd[rpos+n] = c;
        }
    }

	pwd[rpos + n] = 0;
    return r;
}
*/
int main()
{
    int n;
    string pwd;
    while( cin >> n >> pwd ) {
//        clock_t start,finish;
//        start=clock();
        cout << search(n, pwd) << endl;
//        finish=clock();
//        double totaltime = (double)(finish-start)/CLOCKS_PER_SEC;
//        cout<< totaltime << " seconds"<<endl;
    }
}

//@END_OF_SOURCE_CODE
