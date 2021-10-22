/* @JUDGE_ID: 13160EW 406 C++ */
// 06/05/03 21:44:51

//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int prime[1001];

void doPre()
{
prime[0] = 1; prime[1] = 2;
prime[  2]=   3;prime[  3]=   5;prime[  4]=   7;prime[  5]=  11;prime[  6]=  13;
prime[  7]=  17;prime[  8]=  19;prime[  9]=  23;prime[ 10]=  29;prime[ 11]=  31;
prime[ 12]=  37;prime[ 13]=  41;prime[ 14]=  43;prime[ 15]=  47;prime[ 16]=  53;
prime[ 17]=  59;prime[ 18]=  61;prime[ 19]=  67;prime[ 20]=  71;prime[ 21]=  73;
prime[ 22]=  79;prime[ 23]=  83;prime[ 24]=  89;prime[ 25]=  97;prime[ 26]= 101;
prime[ 27]= 103;prime[ 28]= 107;prime[ 29]= 109;prime[ 30]= 113;prime[ 31]= 127;
prime[ 32]= 131;prime[ 33]= 137;prime[ 34]= 139;prime[ 35]= 149;prime[ 36]= 151;
prime[ 37]= 157;prime[ 38]= 163;prime[ 39]= 167;prime[ 40]= 173;prime[ 41]= 179;
prime[ 42]= 181;prime[ 43]= 191;prime[ 44]= 193;prime[ 45]= 197;prime[ 46]= 199;
prime[ 47]= 211;prime[ 48]= 223;prime[ 49]= 227;prime[ 50]= 229;prime[ 51]= 233;
prime[ 52]= 239;prime[ 53]= 241;prime[ 54]= 251;prime[ 55]= 257;prime[ 56]= 263;
prime[ 57]= 269;prime[ 58]= 271;prime[ 59]= 277;prime[ 60]= 281;prime[ 61]= 283;
prime[ 62]= 293;prime[ 63]= 307;prime[ 64]= 311;prime[ 65]= 313;prime[ 66]= 317;
prime[ 67]= 331;prime[ 68]= 337;prime[ 69]= 347;prime[ 70]= 349;prime[ 71]= 353;
prime[ 72]= 359;prime[ 73]= 367;prime[ 74]= 373;prime[ 75]= 379;prime[ 76]= 383;
prime[ 77]= 389;prime[ 78]= 397;prime[ 79]= 401;prime[ 80]= 409;prime[ 81]= 419;
prime[ 82]= 421;prime[ 83]= 431;prime[ 84]= 433;prime[ 85]= 439;prime[ 86]= 443;
prime[ 87]= 449;prime[ 88]= 457;prime[ 89]= 461;prime[ 90]= 463;prime[ 91]= 467;
prime[ 92]= 479;prime[ 93]= 487;prime[ 94]= 491;prime[ 95]= 499;prime[ 96]= 503;
prime[ 97]= 509;prime[ 98]= 521;prime[ 99]= 523;prime[100]= 541;prime[101]= 547;
prime[102]= 557;prime[103]= 563;prime[104]= 569;prime[105]= 571;prime[106]= 577;
prime[107]= 587;prime[108]= 593;prime[109]= 599;prime[110]= 601;prime[111]= 607;
prime[112]= 613;prime[113]= 617;prime[114]= 619;prime[115]= 631;prime[116]= 641;
prime[117]= 643;prime[118]= 647;prime[119]= 653;prime[120]= 659;prime[121]= 661;
prime[122]= 673;prime[123]= 677;prime[124]= 683;prime[125]= 691;prime[126]= 701;
prime[127]= 709;prime[128]= 719;prime[129]= 727;prime[130]= 733;prime[131]= 739;
prime[132]= 743;prime[133]= 751;prime[134]= 757;prime[135]= 761;prime[136]= 769;
prime[137]= 773;prime[138]= 787;prime[139]= 797;prime[140]= 809;prime[141]= 811;
prime[142]= 821;prime[143]= 823;prime[144]= 827;prime[145]= 829;prime[146]= 839;
prime[147]= 853;prime[148]= 857;prime[149]= 859;prime[150]= 863;prime[151]= 877;
prime[152]= 881;prime[153]= 883;prime[154]= 887;prime[155]= 907;prime[156]= 911;
prime[157]= 919;prime[158]= 929;prime[159]= 937;prime[160]= 941;prime[161]= 947;
prime[162]= 953;prime[163]= 967;prime[164]= 971;prime[165]= 977;prime[166]= 983;
prime[167]= 991;prime[168]= 997;prime[169]=1009;prime[170]=1013;prime[171]=1019;
}

int main()
{ 
	doPre();
	int n,c,k;
	int i , left;
	bool newline = false;
	while( scanf("%d %d",&n,&c)==2 ) {
		if( newline ) printf("\n");
		else newline = true;
		k=0;
		while( prime[k] <= n ) k++ ;
		printf("%d %d:",n,c);
		if( k%2 ) {
			// ©_¼Æ k
			left = (k-2*c-1)/2;
			c = c*2-1;
			if( c >= k) {
				for( i = 0; i < k ; i++)
					printf(" %d",prime[i] );
				printf("\n");
			} else {
				for( i = left+1 ; i<=left+c ; i++)
					printf(" %d",prime[i] );
				printf("\n");
			} // end if
		} else {
			// °¸¼Æ k
			left = (k-2*c)/2;
			c = c*2;
			if( c >= k) {
				for( i = 0; i < k ; i++)
					printf(" %d",prime[i] );
				printf("\n");
			} else {
				for( i = left ; i<left+c;i++)
					printf(" %d",prime[i] );
				printf("\n");
			} // end if
		}

	}
	return 0;
}

//@END_OF_SOURCE_CODE
