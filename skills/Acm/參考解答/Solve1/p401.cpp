/* @JUDGE_ID:   xxxxxx   401   C++   ""   */ 

#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int Rev[200];

int palindrome(char A[]) {
  int i, j = 0;	
  for (i = 0; A[i] != '\0'; i++);
  i--;
  while (j <= i) 
    if (A[j++] != A[i--])
      return 0;
   return 1;
}

int mirrored(char A[]) {
  int i, j = 0;	
  for (i = 0; A[i] != '\0'; i++);
  i--;
  while (j <= i) 
    if (Rev[A[j]] == 0)
      return 0;
    else if (Rev[A[j++]] != A[i--])
	return 0;
  return 1;
}


int main() {
  char string[25];
  int palin, mirror;
  Rev['A'] = 'A'; Rev['B'] =   0; Rev['C'] =   0; Rev['D'] =   0;
  Rev['E'] = '3'; Rev['F'] =   0; Rev['G'] =   0; Rev['H'] = 'H';
  Rev['I'] = 'I'; Rev['J'] = 'L'; Rev['K'] =   0; Rev['L'] = 'J';
  Rev['M'] = 'M'; Rev['N'] =   0; Rev['O'] = 'O'; Rev['P'] =   0;
  Rev['Q'] =   0; Rev['R'] =   0; Rev['S'] = 0; Rev['T'] = 'T';
  Rev['U'] = 'U'; Rev['V'] = 'V'; Rev['W'] = 'W'; Rev['X'] = 'X';
  Rev['Y'] = 'Y'; Rev['Z'] = '5'; Rev['1'] = '1'; Rev['2'] = 'S';
  Rev['3'] = 'E'; Rev['4'] =   0; Rev['5'] = 'Z'; Rev['6'] =   0;
  Rev['7'] =   0; Rev['8'] = '8'; Rev['9'] =   0;
  
  while (1 == scanf("%s", string)) {
    palin = palindrome(string);
    mirror = mirrored(string);
    if (palin) 
      if (!mirror) 
        printf("%s -- is a palindrome.\n\n", string);
	else printf("%s -- is a mirrored palindrome.\n\n", string);
    else if (!mirror)     
      printf("%s -- is not a palindrome.\n\n", string);
    else  printf("%s -- is a mirrored string.\n\n", string);
  }
  return 0;
}
