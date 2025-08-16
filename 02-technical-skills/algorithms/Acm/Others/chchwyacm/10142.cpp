/*
 * ACM 10142 (AC)
 * Author: chchwy
 * Last Modified: 2009.04.02
 */
#include<iostream>

enum{ MAX_CAND=20, NEED_ELIMINATE, ALL_TIED, ELECTED };

class Candidate{
public:
   int elim;
   int vote;
   char name[80+1];
   Candidate();
};

Candidate::Candidate(){
   elim=0;
   vote=0;
}

class Ballots{
   int ballot[1000][MAX_CAND+1];

public:
   int numCand;
   int numVoter;
   //func
   Ballots();
   void read();
   int judge(Candidate cand[], int &flag);
   void eliminate(Candidate cand[]);
   void getFirstChoice(Candidate cand[]);
};

Ballots::Ballots(){
   memset(ballot,0,sizeof(ballot));
}

void Ballots::read(){
   char buf[1024];
   numVoter=0;
   while(fgets(buf, 1024, stdin)!=NULL && buf[0]!='\r' && buf[0]!='\n'){
       char *p = strtok(buf, " \t");
       for(int i=0;i<numCand;++i){
           ballot[numVoter][i] = atoi(p);
           p = strtok(NULL," ");
       }
       numVoter++;
   }
}

void Ballots::getFirstChoice(Candidate cand[]){
   for(int i=1;i<=numCand;++i)
       cand[i].vote=0;
   for(int i=0;i<numVoter;++i){
       int rank=0;
       while( cand[ ballot[i][rank] ].elim ) ++rank; //if cand is eliminate, find next cand
       ++cand[ ballot[i][rank] ].vote;
   }
}

void Ballots::eliminate(Candidate cand[]){
   int min=0;
   cand[0].vote=INT_MAX;
   for(int i=1;i<=numCand;++i){
       if(!cand[i].elim && cand[i].vote < cand[min].vote )
           min = i;
   }
   int minVote = cand[min].vote;

   for(int i=1;i<=numCand;++i)
       if(!cand[i].elim && cand[i].vote==minVote)
           cand[i].elim=1;
}

int Ballots::judge(Candidate cand[], int &flag){
   //find winner
   int half = numVoter/2;
   for(int i=1;i<=numCand;++i){
    if(cand[i].vote > half){
           flag = ELECTED;
           return i;
       }
   }
   //check all tied
   int key=0;
   for(int i=1;i<=numCand;++i){
       if(!cand[i].elim){
           if(key==0)
               key=i;
           else if(cand[key].vote != cand[i].vote){
               flag=NEED_ELIMINATE;
               return 0;
           }
       }
   }
   flag=ALL_TIED;
   return 0;
}

void readCandName(Candidate cand[MAX_CAND], int numCand){
   for(int i=1;i<=numCand;i++)
       fgets(cand[i].name, 80+1, stdin);
}

int main(){

   #ifndef ONLINE_JUDGE
   freopen("10142.in","r",stdin);
   #endif

   int numCase;
   scanf("%d ", &numCase);

   while(numCase--){

       Ballots blt;
       Candidate cand[MAX_CAND+1];

       scanf("%d ", &blt.numCand);

       readCandName(cand, blt.numCand); //read candidates' name
       blt.read();    //read ballots data

       //count the ballots
       int winner, flag=NEED_ELIMINATE;

       blt.getFirstChoice(cand);
       winner = blt.judge(cand, flag);
       while(flag==NEED_ELIMINATE){
           blt.eliminate(cand);   //eliminate the lowest candidate

           blt.getFirstChoice(cand);
           winner = blt.judge(cand, flag);
       }

       //output
       if(flag==ELECTED){
           printf("%s",cand[winner].name);
       }else{ //ALL_TIED
           for(int i=1;i<=blt.numCand;++i)
               if(!cand[i].elim)
                   printf("%s",cand[i].name);
       }
       if(numCase>0) printf("\n"); //blank line between cases
   }
   return 0;
}
