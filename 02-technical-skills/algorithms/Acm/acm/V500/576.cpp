/* @JUDGE_ID: 13160EW 576 C++ */
// 06/08/03 22:35:41
// Q576: Hiaku Review

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

char alpha[256] = { 0 };

int main()
{ 
	// 母音
	alpha['a'] = alpha['e'] = alpha['i'] = alpha['o'] = alpha['u'] = alpha['y'] = 1;
	char buf[210];
	int len;
	int i,j,ct;
	while(1) {
		gets( buf );
		len = strlen(buf);
		if( len== 5 && strcmp(buf , "e/o/i")==0 ) break; // 結束
		// 1 5 音節
		ct = 0;
		i = 0;
		while( buf[i]!='/' ) {
			// 為母音
			if( alpha[ buf[i] ] ) {
				while( buf[i]!='/' && alpha[buf[i]] ) i++;
				ct++;
			}
			// 去掉非母音
			while( buf[i]!='/' && !alpha[buf[i]] ) i++;
		}
		if( ct!=5) {
			printf("1\n");
			continue;
		}
		ct = 0;
		i++;
		// 2 7 音節
		while( buf[i]!='/' ) {
			// 為母音
			if( alpha[ buf[i] ] ) {
				while( buf[i]!='/' && alpha[buf[i]] ) i++;
				ct++;
			}
			// 去掉非母音
			while( buf[i]!='/' && !alpha[buf[i]] ) i++;
		}
		if( ct!=7 ) {
			printf("2\n");
			continue;
		}
		ct = 0;
		i++;
		// 3 5 音節
		while( buf[i]!=0 ) {
			// 為母音
			if( alpha[ buf[i] ] ) {
				while( buf[i]!=0 && alpha[buf[i]] ) i++;
				ct++;
			}
			// 去掉非母音
			while( buf[i]!=0 && !alpha[buf[i]] ) i++;
		}
		if( ct!=5) {
			printf("3\n");
			continue;
		}
		
		printf("Y\n");
	}


	return 0;
}

//@END_OF_SOURCE_CODE

