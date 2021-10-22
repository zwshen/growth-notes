/* @JUDGE_ID: xxxxxx 446 C++ */

#include <stdio.h>
#include <string.h>
int N;
char number1[100];
char number2[100];
char op[100];
int result[100];
unsigned int n1, n2, r;

unsigned int toDec(char s[]) {
  unsigned int k = 0;
  int i;
  for (i = 0; i < strlen(s); i++) {
    k = k << 4;
    if (s[i] >= '0' && s[i] <= '9')
      k += s[i] - '0';
    else if (s[i] >= 'A' && s[i] <= 'F')
      k += s[i] - 'A' + 10;
    else if (s[i] >= 'a' && s[i] <= 'f')
      k += s[i] - 'a' + 10;
  }
  return k;
}

void printBinary(unsigned int n) {
  int i;
  for (i = 0; i <= 12; i++) {
    result[i] = n % 2;
    n = n >> 1;
  }
  for (i = 12; i >= 0; i--)
    printf("%d", result[i]);
}

int main() {
  int i;
  scanf("%d", &N);
  for (i = 0; i < N; i++) {
    scanf("%s %s %s", number1, op, number2);
    n1 = toDec(number1);
    n2 = toDec(number2);
    if (op[0] == '+') r = n1 + n2;
    else r = n1 - n2;
    printBinary(n1);
    printf(" %s ", op);
    printBinary(n2);
    printf(" = %d\n", r);
  }
  return 0;
}
