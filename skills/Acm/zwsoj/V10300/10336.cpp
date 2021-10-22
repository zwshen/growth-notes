/* @JUDGE_ID: 13160EW 572 C++ */
// 06/13/03 08:20:02
// Q10336: Rank the Languages
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <stdlib.h>

typedef struct sAlpha {
	char key;
	int num;
} Alpha;

Alpha alpha[26];

int alpha_comp(const void* e1,const void* e2) 
{
	Alpha a1 = *(Alpha*)e1;
	Alpha a2 = *(Alpha*)e2;
	if( a1.num == a2.num )
		return a1.key - a2.key;
	return a2.num - a1.num;
}

int m,n;
char world[1000][1000];
void mark(int x,int y,char c) 
{
	if( x < 0 || x >= m ) return;
	if( y < 0 || y >= n ) return;
	if( world[x][y] == c ) {
		world[x][y] = 0;
		mark(x,y-1,c);
		mark(x,y+1,c);
		mark(x-1,y,c);
		mark(x+1,y,c);
	}
}

int main()
{ 
	int tot;
	int i,j,ct;
	int world_num = 1;
	scanf("%d" , &tot);
	while( tot-- > 0 ) {
		scanf("%d %d",&m,&n);
		for(i=0;i<26;i++) {
			alpha[i].key = 'a'+i;
			alpha[i].num = 0;
		}
		for(i=0;i<m;i++)
			scanf("%s", world[i] );
		ct = 0;
		for(i=0;i<m;i++) {
			for(j=0;j<n;j++) {
				if( world[i][j] != 0 ) {
					alpha[ world[i][j]-'a' ].num++;
					mark( i , j , world[i][j] );
				}
			}
		}
		qsort( alpha , 26, sizeof(Alpha), alpha_comp );
		printf("World #%d\n",world_num );
		for( i = 0 ; i<26 && alpha[i].num!=0 ; i++)
	//	for( i = 0 ; i<26 ; i++)
			printf("%c: %d\n" , alpha[i].key , alpha[i].num );
		world_num++;
	}

	return 0;
}

//@END_OF_SOURCE_CODE
