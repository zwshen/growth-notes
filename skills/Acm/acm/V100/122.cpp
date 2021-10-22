/* @JUDGE_ID: 13160EW 122 C++ */
// 06/30/03 23:10:36
// Q122: Trees on the level
// 以「完整二元樹」觀念來填每一個節點
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>
#include <string.h>

#define size 65536
int tree[size];
bool tree_f[size] = { 0 };

// 計算路徑
int cnt_path(char* path)
{
	int i,len = strlen(path)-1;
	int ct = 1;
	for( i = 0 ; i < len ; i++) 
		if( path[i]=='L' ) ct = 2*ct;	// 往左
		else ct = 2*ct+1;	// 往右
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
			// 輸入結束
			if( itisok ) 
				printf("not complete\n");
			else  {
				// 先檢查每個node是否正確
				for( i = max_path ; i > 0 ; i--) 
				{
					//  先找到一節點
					if( !tree_f[i] ) continue;
					// 此節點確定有回到root 的path
					j = i;
					while( j>0 && tree_f[j]==true ) j/=2;
					if( j != 0) {
						printf("not complete\n");
						itisok = true;
						break;
					}
				}
				if(!itisok) {
					// 檢查無誤，才照完整二元樹輸出  - level by lvel
					for( i = 1 ; i <= max_path ; i++ )
						if( tree_f[i] ) printf("%d ",tree[i] );
					printf("\n");
				}
			}
			// 記錄清除
			memset( tree_f , false , size*sizeof(bool) );
			max_path = 0;
			itisok = false;
		} else {
			if( itisok ) continue;
			sscanf(node,"(%d,%s", &v, buf);
			path = cnt_path( buf );
			// 更新最大的點
			if( max_path < path ) max_path = path;
			if( tree_f[path] ) {
				// 重覆的點
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

