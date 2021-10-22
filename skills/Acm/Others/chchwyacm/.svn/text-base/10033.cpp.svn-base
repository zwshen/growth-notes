/*
* ACM 10033 (AC)
* Author: chchwy
* Last Modified: 2009.3.25
*/
#include<iostream>

enum{
   HALT=1, MOVi=2, ADDi=3,
   MULi=4, MOVr=5, ADDr=6,
   MULr=7, LDW=8,  STW=9,
   BE=0, RAM_MAX=1000
};

int main(){

   #ifndef ONLINE_JUDGE
   freopen("10033.in","r",stdin);
   #endif

   int numCase;
   scanf("%d ", &numCase);

   while(numCase--){ //for each case

       int reg[10] = {0};    //content of register
       int mem[1000] = {0};  //instructions

       //read instruction
       int mp=0;
       char buf[8];
       while(fgets(buf,5,stdin)!=NULL && buf[0]!='\n' )
           mem[mp++] = atoi(buf);

       //interpret
       int halt=0; //flag
       int pc=0;

       int instCounter = 0;

       while(halt==0){
           
           instCounter++;

           //inst fetch
           int op,rd,rs;
           op = mem[pc]/100;
           rd = (mem[pc]%100)/10;
           rs = mem[pc]%10;
           pc++;

           /* inst execute */
           switch(op) {
               case HALT:  //100 halt
                   halt=1;
                   break;
               case MOVi:  //2dn Movi d,n
                   reg[rd] = rs;
                   break;
               case ADDi:  //3dn Addi d,n
                   reg[rd] = (reg[rd] + rs) % RAM_MAX;
                   break;
               case MULi:  //4dn Muli d,n
                   reg[rd] = (reg[rd] * rs) % RAM_MAX;
                   break;
               case MOVr:  //5ds Mov d,s
                   reg[rd] = reg[rs];
                   break;
               case ADDr:  //6ds Add d,s
                   reg[rd] = (reg[rd] + reg[rs]) % RAM_MAX;
                   break;
               case MULr:  //7ds Mul d,s
                   reg[rd] = (reg[rd] * reg[rs]) % RAM_MAX;
                   break;
               case LDW:   // 8da Load d, [a]
                   reg[rd] = mem[reg[rs]];
                   break;
               case STW:   //9sa Store [s],a
                   mem[reg[rs]] = reg[rd];
                   break;
               case BE:    //0ds BE s,d
                   if(reg[rs]!=0)
                       pc=reg[rd];
                   break;
           };
       }
       printf("%d\n", instCounter);
       if(numCase!=0) printf("\n");

   }//for each case
   return 0;
}
