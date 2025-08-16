/* @JUDGE_ID: 13160EW 128 C++ */

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>
#include <string.h>

bool dead[51][51] = { false };

int maxX,maxY;
int x,y;
char d;

char rr() 
{
	switch(d) {
		case 'N': return 'E';
		case 'E': return 'S';
		case 'S': return 'W';
		case 'W': return 'N';
	}
	return 0;
}

char ll() 
{
	switch(d) {
		case 'N': return 'W';
		case 'E': return 'N';
		case 'S': return 'E';
		case 'W': return 'S';
	}
	return 0;
}

int move()
{
	int old_x = x;
	int old_y = y;
	switch(d) {
		case 'N': 
			y+=1;
			break;
		case 'E': 
			x+=1;
			break;
		case 'S': 
			y-=1;
			break;
		case 'W':
			x-=1;
		break;
	}
	if( ( x<0||y<0 || x>maxX || y>maxY) ) {
		x = old_x;
		y = old_y;
		if( !dead[old_x][old_y] ) {
			dead[x][y] = true;
			return 1;	
		}
	}	
	return 0;
}
int walk(char* p)
{
	while( *p ) {
		switch(*p) {
		case 'R':
			d = rr();
			break;
		case 'L':
			d = ll();
			break;
		case 'F':
			if( move() ) return 0;
			break;
		}
		p++;
	}
	return 1;
}

int main()
{
	scanf("%d %d", &maxX , &maxY );
	char buf[200];
	while( scanf("%d %d %c",&x,&y,&d)!=EOF ) {
		scanf("%s",buf);
		if( walk(buf)==1 ) 
			printf("%d %d %c\n",x,y,d);
		else
			printf("%d %d %c LOST\n",x,y,d);

	}
	return 0;
}
//@END_OF_SOURCE_CODE
