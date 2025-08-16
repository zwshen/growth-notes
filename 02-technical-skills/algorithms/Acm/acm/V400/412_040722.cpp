/* @JUDGE_ID: 13160EW 412 C++ */
// 07/22/04 23:11:50

//@BEGIN_OF_SOURCE_CODE 

#include <stdio.h> 
#include <math.h>
#include <stdlib.h>

int set[60];

bool IsRel(int m,int n) 
{
	int t;
	do {	
		t = m%n;
		m = n;
		n = t;
	} while(t!=0);

	return m==1;
}


// set中互質的個數
int CountRel(int n,long& tot) 
{
	int ct =0,i,j;
	for(i=0;i<n-1;i++)
		for(j=i+1;j<n;j++,tot++)
			if( IsRel( set[i] , set[j] ) ) ct++;
	return ct;
}

int mycomp(const void* v1,const void* v2) 
{
	int e1=*(int*)v1,e2=*(int*)v2;
	return e1>=e2;
}

int main()
{
	int i,n,ct;
	long tot;
	while( scanf("%d",&n)==1 ) {
		if( n==0 ) break;
		// read n number
		for(i=0;i<n;i++)
			scanf("%d",&set[i]);
		qsort(set , n,sizeof(int), mycomp);
		tot = 0;
		ct = CountRel(n,tot);
		if( ct==0) 
			printf("No estimate for this data set.\n");
		else
			printf( "%.6f\n" , sqrt((6.0/ct)*tot) );

	}


	return 0;
}