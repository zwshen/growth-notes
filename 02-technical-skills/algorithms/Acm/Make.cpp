/* @JUDGE_ID: 13160EW 108 C++ */
// 06/17/03 22:31:36
// Q108: Maximum Sum
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <time.h>

int main()
{
	int n,p;
	char buf[100];
	
	printf("1. C\n2. CPP\n============================\n->");
	scanf( "%d" , &n );

	printf("Problem: ");
	scanf("%d" , &p);

	sprintf(buf ,"%d.cpp", p);
	FILE* fp = fopen( buf , "w" );
	if(n==1) { // c 
		sprintf( buf , "/* @JUDGE_ID: 13160xx %d C++ */\n", p);
		fprintf( fp , buf );
		fprintf( fp , "// " );
		_strdate( buf );
		fprintf( fp , buf );
		_strtime( buf );
		fprintf( fp , " " );
		fprintf( fp , buf );
		fprintf( fp , "\n\n//@BEGIN_OF_SOURCE_CODE \n\n");
		// c include
		fprintf( fp , "#include <stdio.h> \n\n");
	} else { // c++
		sprintf( buf , "/* @JUDGE_ID: 13160xx %d C++ */\n", p);
		fprintf( fp , buf );
		fprintf( fp , "// " );
		_strdate( buf );
		fprintf( fp , buf );
		_strtime( buf );
		fprintf( fp , " " );
		fprintf( fp , buf );
		fprintf( fp , "\n\n//@BEGIN_OF_SOURCE_CODE \n\n");
		// c include
		fprintf( fp , "#include <iostream>\n\nusing namespace std;\n\n");
	}

	// int main
	fprintf( fp , "int main()\n{\n\n\n\treturn 0;\n}\n\n" );

	fclose(fp);

	return 0;
}