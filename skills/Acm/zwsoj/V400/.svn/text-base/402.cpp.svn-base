// 402 MASH
// 10 2 3 5 4 3 2 9 6 10 10 6 2 6 7 3 4 7 4 5 3 2
// 47 6 11 2 7 3 4 8 5 10 7 8 3 7 4 2 3 9 10 2 5 3
#include <stdio.h>

struct sNode {
	int num;
	int next;
} lists[100];
int head;
#define EOL -1

void init(int n)
{
	int i;
	for( i = 0 ; i < n ; i++) {
		lists[i].num = i+1;
		lists[i].next = i+1;
	}
	lists[i-1].next = EOL;
	head = 0;
}

int main()
{
	int n,x,i;
	int poker[20],pi;
	int prev , now ;
	int ct;
	int casenum = 1;
	bool newline = false;
	while( scanf("%d",&n)==1) {
		if( newline) printf("\n");
		else newline = true;
		printf("Selection #%d\n",casenum);
		casenum++;
		scanf("%d",&x);
		for(i=0;i<20;i++)
			scanf("%d",&poker[i] );
		//////////////////////////////////////////
		init( n );
		pi = 0;
		while( n > x ) {
			/*
			printf("---------------------------------------\n");
			printf("step %d\n",poker[pi] );
			int test = 1;
			for( now = head ; now != -1 ; now = lists[now].next )
				printf("[%3d:%3d]\t", test++, lists[now].num );
			printf("\n");
			*/
			prev = EOL;
			now = head;
			while( n>x && now != EOL ) {
				ct = 1;	
				while( ct < poker[pi] && now != EOL  && n > x ) {
					prev = now;
					now = lists[now].next ;
					ct++;
				}
				// killed 
				if( now != EOL ) {
				/*
					printf("killed:%d [%d]\n",now,lists[now].num );
			*/
					if(prev==EOL)
						head = lists[now].next;
					else
						lists[prev].next = lists[now].next;
					
					n--;
					now = lists[now].next;
				}
			}
			//pi = (pi+1)%20;
			pi++;
			if(pi==20) break;
		}
		//////////////////////////////////////////
		for( now = head ; now != EOL ; now = lists[now].next )
			printf("%d ",lists[now].num );
		printf("\n");
	}



	return 0;
}
