// Interpreter

#include <stdio.h>
#include <string.h>

void set(int reg[], int d, int n) {
	reg[d]=n;
}

void add(int reg[12],int d, int n) {
	reg[d]=(reg[d]+n)%1000;
}

void multiply(int reg[12], int d, int n) {
	reg[d]=(reg[d]*n)%1000;
}

int main() {
	char RAM[1010][5];
	int regist[12];
	int cases;

	scanf("%d\n\n", &cases);

	while (cases--) {
		int instr=0;
		int arg;

		for (int i=0; i<1000; i++) {
			RAM[i][0]='0';
			RAM[i][1]='0';
			RAM[i][2]='0';
		}

		for (int i=0; i<10; i++)
			regist[i]=0;

		for (arg=0; fgets(RAM[arg], 5, stdin); arg++) 
			if (!strcmp(RAM[arg], "\n")) break;

		for (int j=0; RAM[j][0]!='1'; j++) {
			instr++;
			int d, n, s, a, value;

			switch (RAM[j][0]) {
				case '2':
					d=RAM[j][1]-'0';
					n=RAM[j][2]-'0';
					set(regist, d, n);
					break;
				case '3':
					d=RAM[j][1]-'0';
					n=RAM[j][2]-'0';
					add(regist, d, n);	
					break;
				case '4':
					d=RAM[j][1]-'0';
					n=RAM[j][2]-'0';
					multiply(regist, d, n);	
					break;
				case '5':
					d=RAM[j][1]-'0';
					s=RAM[j][2]-'0';
					set(regist, d, regist[s]);	
					break;
				case '6':
					d=RAM[j][1]-'0';
					s=RAM[j][2]-'0';
					add(regist, d, regist[s]);	
					break;
				case '7':
					d=RAM[j][1]-'0';
					s=RAM[j][2]-'0';
					multiply(regist, d, regist[s]);	
					break;
				case '8':
					d=RAM[j][1]-'0';
					a=RAM[j][2]-'0';
					sscanf(RAM[regist[a]], "%d", &value);
					set(regist, d, value);
					break;
				case '9':
					s=RAM[j][1]-'0';
					a=RAM[j][2]-'0';
					sprintf(RAM[regist[a]], "%d", regist[s]);
					break;
				case '0':
					d=RAM[j][1]-'0';
					s=RAM[j][2]-'0';
					if (regist[s]!=0) {
						j=regist[d];
						j--;
					}	
					break;			
			}	
		}

		instr++; //Counts the halt

		printf("%d\n", instr);
		
		if (cases)
			printf("\n");
	}

	return 0;
}
