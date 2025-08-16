/* @JUDGE_ID: 13160EW 10222 C++ */
// Q10222 Decode the Mad man 
// 2003/06/03

//@BEGIN_OF_SOURCE_CODE
#include <stdio.h>

char alpha[256];
int main()
{
	int i;
	//////////////////////////////////
	for(i=0;i<256;i++)	alpha[i] = i;
	alpha['A']=alpha['a']=';';   alpha['B']=alpha['b']='c';
	alpha['C']=alpha['c']='z';   alpha['D']=alpha['d']='a';
	alpha['E']=alpha['e']='q';   alpha['F']=alpha['f']='s';
	alpha['G']=alpha['g']='d';   alpha['H']=alpha['h']='f';
	alpha['I']=alpha['i']='y';   alpha['J']=alpha['j']='g';
	alpha['K']=alpha['k']='h';   alpha['L']=alpha['l']='j';
	alpha['M']=alpha['m']='b';   alpha['N']=alpha['n']='v'; 
	alpha['O']=alpha['o']='u';   alpha['P']=alpha['p']='i';  
	alpha['Q']=alpha['q']='[';   alpha['R']=alpha['r']='w';
	alpha['S']=alpha['s']='\'';  alpha['T']=alpha['t']='e';
	alpha['U']=alpha['u']='t';   alpha['V']=alpha['v']='x';
	alpha['W']=alpha['w']=']';   alpha['X']=alpha['x']='/';
	alpha['Y']=alpha['y'] = 'r';    alpha['Z'] = alpha['z']='.';
	alpha['0']=alpha[')'] = '8';	alpha['1'] = alpha['!']= '=';
    alpha['2']=alpha['@'] = '`';	alpha['3'] = alpha['#'] = '1';
    alpha['4']=alpha['$'] = '2';    alpha['5'] = alpha['%'] = '3';
	alpha['6']=alpha['^'] = '4';    alpha['7'] = alpha['&'] = '5';
    alpha['8']=alpha['*']='6';	    alpha['9'] = alpha['('] = '7';
	alpha['['] = alpha['{'] = 'o';	alpha[']'] = alpha['}'] = 'p';
	alpha[';'] = alpha[':'] = 'k';	alpha['\''] = alpha['"'] = 'l';	
	alpha['.'] = alpha['>'] = 'm';	alpha['/'] = alpha['?'] = ',';	
	alpha[','] = alpha['<'] = 'n';	alpha['\\'] = alpha['|'] = '/';
	alpha['='] = alpha['+'] = '0';	alpha['-'] = alpha['_'] = '9';
	alpha['`'] = alpha['~'] = '-';
	//////////////////////////////////
	char buf[1000000];
	char* p;
	while( gets(buf) ) {
		p = buf;
		while( *p != 0 ) {
			printf("%c",alpha[ *p ] );
			p++;
		}
		printf("\n");
	}
	return 0;
}
//@END_OF_SOURCE_CODE
