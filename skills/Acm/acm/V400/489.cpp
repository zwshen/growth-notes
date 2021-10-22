// Q489: Hangman Judge
// 2003/06/13
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

bool alpha[256];

int main()
{
	int round;
	char ans[1000],guess[1000];
	int hangman;
	int ans_len,ans_ct,prev_ct;
	bool round_ok;
	int i,j;
	while(1) {
		scanf("%d",&round);
		if( round == -1 ) break;
		
		scanf("%s",ans);
		scanf("%s",guess);

		ans_ct = ans_len = strlen(ans);
		memset( alpha, true , 256);
		hangman = 7;
		i = 0;
		round_ok = true;
		printf("Round %d\n",round);
		while( guess[i]!=0 ) {
			if( alpha[ guess[i] ] ) {
				alpha[ guess[i] ] = false;

				prev_ct = ans_ct;
				for(j=0;j<ans_len && ans_ct > 0; j++)
					if( ans[j] == guess[i] ) ans_ct--;
				
				if( ans_ct == 0) {
					printf("You Win.\n");
					round_ok = false;
					break;
				}
				if( prev_ct == ans_ct ) {
					hangman --;
					if(hangman==0)  {
						printf("You lose.\n");
						round_ok = false;
						break;
					}

				}
			} // end if guess[i]
			i++;
		}   // end while guess
		if( round_ok ) printf("You chickened out.\n");
	}
	return 0;
}
