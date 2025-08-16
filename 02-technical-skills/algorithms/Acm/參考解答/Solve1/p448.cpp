/* @JUDGE_ID: xxxxxx 448 C++ */

#include <stdio.h>
#include <stdlib.h>
#include <assert.h>
#include <string.h>

#define NONE 0
#define REGISTER 1
#define ADDRESS 2
#define NUMBER 4
#define OP_REGISTER 0
#define OP_ABSOLUTE 1
#define OP_PC_RELATIVE 2
#define OP_CONSTANT 3
//#define GENERATE_TEST
char line[100];
int iline;
int len;
int end;
int countParam[16] = {2, 2, 2, 2, 2, 1, 1, 1,
		      1, 1, 1, 1, 3, 3, 3, 1};
int iprint;

char instructionName[16][10] = {
 "ADD", "SUB", "MUL", "DIV",
 "MOV",  "BREQ", "BRLE", "BRLS",
 "BRGE", "BRGR", "BRNE", "BR",
 "AND", "OR", "XOR", "NOT"};


int paramType[16][3] = {
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS, NONE},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS, NONE},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS, NONE},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS, NONE},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS, NONE},
  {ADDRESS, NONE, NONE},
  {ADDRESS, NONE, NONE},
  {ADDRESS, NONE, NONE},
  {ADDRESS, NONE, NONE},
  {ADDRESS, NONE, NONE},
  {ADDRESS, NONE, NONE},
  {ADDRESS, NONE, NONE},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS},
  {REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS + NUMBER, REGISTER + ADDRESS},
  {REGISTER + ADDRESS, NONE, NONE}
};

int nextLine(char line[]) {
  char ch; int i = 0;
  if (1 != scanf("%c", &ch)) {
    end = 1;
    return 0;
  }
  while (ch != '\n') {
    if ((ch >= '0' && ch <= '9')||(ch >= 'A' && ch <= 'Z'))
      line[i++] = ch;
    else assert(ch == '\r');
    if (1 != scanf("%c", &ch)) {
      end = 1;
      line[i] = '\0';
      assert(strlen(line) <= 30);
      return i;
    }
  }
  line[i] = '\0';
  assert(strlen(line) <= 30);
  if (strlen(line) < 30) {
    end = 1;
    while (1 == scanf("%c", &ch))
      assert(ch == '\n' || ch == '\r' || ch == '\t' || ch == ' ');
  }
  return i;
}

int next4bits() {
  char ch;
  if (iline < len)
    ch = line[iline++];
  else {
    if (end) return -1;
    len = nextLine(line);
    iline = 0;
    if (iline < len) ch = line[iline++];
    else return -1;
  }
  if (ch >= '0' && ch <= '9') return ch - '0';
  else return ch - 'A' + 10;
}

int printInstruction() {
  int opcode = next4bits();
  int params[3];
  int mode[3];
  int count;
  int bits, i, j;
  if (opcode < 0) return 0;
  count = countParam[opcode];
  for (i = 0; i < count; i++) {
    params[i] = 0;
    for (j = 0; j < 4; j++) {
      params[i] *= 16;
      bits = next4bits();
      assert(bits >= 0 && bits <= 15);
      params[i] += bits;
    }
    mode[i] = (params[i] >> 14) & 0x0003;
    params[i] = (params[i] & 0x3FFF);
    assert((mode[i] == OP_REGISTER && (paramType[opcode][i] & 0x1))
	  || (mode[i] == OP_ABSOLUTE && (paramType[opcode][i] & 0x2))
	  || (mode[i] == OP_PC_RELATIVE && (paramType[opcode][i] & 0x2))
	  || (mode[i] == OP_CONSTANT && (paramType[opcode][i] & 0x4)));
  }
  printf("%s ", instructionName[opcode]);
  for (i = 0; i < count; i++) {
    if (i > 0) printf(",");
    switch (mode[i]) {
      case OP_REGISTER: assert(params[i] >= 0 && params[i] <= 1023);
			printf("R%d", params[i]);
			break;
      case OP_ABSOLUTE: assert(params[i] >= 0 && params[i] <= 16383);
			printf("$%d", params[i]);
			break;
      case OP_PC_RELATIVE: assert(params[i] >= 0 && params[i] <= 16363);
			printf("PC+%d", params[i]);
			break;
      case OP_CONSTANT: assert(params[i] >= 0 && params[i] <= 16383);
			printf("%d", params[i]);
			break;
    }
  }
  printf("\n");
  return 1;
}

void printDigit(int k) {
  if (iprint >= 30) {
    printf("\n");
    iprint = 0;
  }
  if (k >= 0 && k <= 9)
    printf("%d", k);
  else printf("%c", k - 10 + 'A');
  iprint++;
}

void printOperand(unsigned int mode, unsigned int value) {
  int i;
  value += mode << 14;
  for (i = 0; i < 4; i++) {
    printDigit((value >> 12) & 0x000F);
    value = value << 4;
  }
}

void permute(int opcode, int modes[], int k) {
  int j, i;
  if (k < countParam[opcode]) {
    if (paramType[opcode][k] & 0x1) {
      modes[k] = OP_REGISTER;
      permute(opcode, modes, k + 1);
    }
    if (paramType[opcode][k] & 0x2) {
      modes[k] = OP_ABSOLUTE;
      permute(opcode, modes, k + 1);
      modes[k] = OP_PC_RELATIVE;
      permute(opcode, modes, k + 1);
    }
    if (paramType[opcode][k] & 0x4) {
      modes[k] = OP_CONSTANT;
      permute(opcode, modes, k + 1);
    }
  }
  else {
    for (j = 0; j < 10; j++) {
      printDigit(opcode);
      for (i = 0; i < countParam[opcode]; i++)
	switch (modes[i]) {
	  case OP_REGISTER: printOperand(modes[i], rand() % 1024);
			    break;
	  case OP_ABSOLUTE: printOperand(modes[i], rand() % 16384);
			    break;
	  case OP_PC_RELATIVE: printOperand(modes[i], rand() % 13364);
			    break;
	  case OP_CONSTANT: printOperand(modes[i], rand() % 16384);
			    break;
	}
    }
  }
}

void gererateInstructions() {
  int i;
  int modes[3];
  iprint = 0;
  for (i = 0; i < 16; i++)
    permute(i, modes, 0);
}

int main() {
  #ifdef GENERATE_TEST
    gererateInstructions();
  #else
    end = 0;
    while (printInstruction());
  #endif
  return 0;
}
