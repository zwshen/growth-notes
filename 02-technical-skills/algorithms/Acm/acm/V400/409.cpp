/* @JUDGE_ID: 13160EW 409 C++ */
// 06/05/03 23:45:51
// Q409: Excuses, Excuses!

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>
#include <ctype.h>

char keyword[20][30];
char excuese[20][80];
int exc_power[20];
int mystricmp(char* s1 , char*s2 ) 
{
	int i;
	int l1 = strlen(s1);
	int l2 = strlen(s2);
	if( l1 != l2 ) return 1;
	char c2;
	for( i = 0 ; i < l1 ; i++) {
		if( s2[i]>='A' && s2[i] <='Z' )
			c2 = s2[i] + 32;
		else
			c2 = s2[i];
		if( s1[i] != c2 ) return 1;
	}
	return 0;
}
int main()
{ 
	int k,e;
	int i,ii,j,fi,len;
	int m;
	int ct = 1;
	bool newline = false;
	char temp[100];
	while( scanf("%d %d",&k,&e )==2 ) {
		if(newline) printf("\n");
		else newline = true;
		printf("Excuse Set #%d\n",ct);
		ct++;
		m = 0;
		gets( keyword[0] );
		
		for(i=0;i<k;i++) gets( keyword[i] );

		for(i=0;i<e;i++) {
			exc_power[i] = 0;
			gets( excuese[i] );
			
			len = strlen( excuese[i] );
			strcpy(temp , excuese[i] );

			j = fi = 0;
			while( j < len ) {
				fi = j;
				while( j<len && isalpha( temp[j] ) ) j++;
				temp[j] = 0;
				for(ii=0;ii<k;ii++) {
				//	if( stricmp( keyword[ii] , temp + fi  ) == 0) {
					if( mystricmp( keyword[ii] , temp + fi  ) == 0) 
					{
						exc_power[i]++;
						break;
					}
				}
				while( j<len && !isalpha(temp[j]) ) j++;
			} // end while
			if( exc_power[i] > exc_power[m] )
				m = i;
		} // end for
		for(i=0;i<e;i++) {
			if( exc_power[i] == exc_power[m] )
				printf("%s\n",excuese[i] );
		}
	}
	return 0;
}

//@END_OF_SOURCE_CODE
