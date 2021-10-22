/* @JUDGE_ID: 13160EW 122 C++ */
// 06/30/03 23:10:36
// Q122: Trees on the level
// �H�u����G����v�[���Ӷ�C�@�Ӹ`�I
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

#define size 65536
int tree[size];
bool tree_f[size] = { 0 };

// �p����|
int cnt_path(char* path)
{
	int i,len = strlen(path)-1;
	int ct = 1;
	for( i = 0 ; i < len ; i++) 
		if( path[i]=='L' ) ct = 2*ct;	// ����
		else ct = 2*ct+1;	// ���k
	return ct;
}

int main()
{ 
	char node[100],buf[100];
	int v;
	bool itisok = false;
	int max_path = 0 , path,i,j;
	// input the tree node
	while( scanf("%s",node )==1 ) { 
		if( node[1]==')' ) {
			// ��J����
			if( itisok ) 
				printf("not complete\n");
			else  {
				// ���ˬd�C��node�O�_���T
				for( i = max_path ; i > 0 ; i--) 
				{
					//  �����@�`�I
					if( !tree_f[i] ) continue;
					// ���`�I�T�w���^��root ��path
					j = i;
					while( j>0 && tree_f[j]==true ) j/=2;
					if( j != 0) {
						printf("not complete\n");
						itisok = true;
						break;
					}
				}
				if(!itisok) {
					// �ˬd�L�~�A�~�ӧ���G�����X  - level by lvel
					for( i = 1 ; i <= max_path ; i++ )
						if( tree_f[i] ) printf("%d ",tree[i] );
					printf("\n");
				}
			}
			// �O���M��
			memset( tree_f , false , size*sizeof(bool) );
			max_path = 0;
			itisok = false;
		} else {
			if( itisok ) continue;
			sscanf(node,"(%d,%s", &v, buf);
			path = cnt_path( buf );
			// ��s�̤j���I
			if( max_path < path ) max_path = path;
			if( tree_f[path] ) {
				// ���Ъ��I
				itisok = true;	
			} else	{
				tree_f[path] = true;
				tree[path] = v;
			}
		}
	} 


	return 0;
}

//@END_OF_SOURCE_CODE

