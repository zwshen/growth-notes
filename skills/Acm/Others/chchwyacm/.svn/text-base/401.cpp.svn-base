/*
 *  UVa 401 (AC)
 *  Author: chchwy
 *  Last Modified: 2009.04.22
 */
#include <iostream>

char mirror[128] ={
    0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
    0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'1',
    'S','E',0,'Z',0,0,'8',0,0,0,0,0,0,0,0,'A',0,0,0,'3',
    0,0,'H','I','L',0,'J','M',0,'O',0,0,0,'2','T','U','V',
    'W','X','Y','5',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
    0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0
};

bool palindrome(char str[], int len){

    for(int i=0;i<len/2;++i)
        if(str[i]!=str[len-1-i])
            return false;
    return true;
}

int mirrored(char str[], int len){

    for(int i=0;i<=len/2;++i)
        if(str[i]!=mirror[ str[len-1-i] ] )
            return false;
    return true;
}

int main(){
    #ifndef ONLINE_JUDGE
    freopen("401.in","r",stdin);
    #endif

    char str[30+1];

    while( fgets(str,sizeof(str),stdin) ){

        int len = strlen(str);
        if( str[len-1]=='\n' ){ //overwrite '\n';
            str[len-1]=0;
            len--;
        }

        bool isPalindrome = palindrome(str, len);
        bool isMirrored = mirrored(str, len);

        if(isPalindrome && isMirrored)
            printf("%s -- is a mirrored palindrome.\n\n", str);
        else if(isPalindrome)
            printf("%s -- is a regular palindrome.\n\n", str);
        else if(isMirrored)
            printf("%s -- is a mirrored string.\n\n", str);
        else
            printf("%s -- is not a palindrome.\n\n", str);
    }

    return 0;
}
