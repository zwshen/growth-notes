/*
 * ACM 10137 (AC)
 * Author: chchwy
 * Last Modified: 2009.03.26
 */
#include<iostream>

/* read expense as cent.  ex. 1.23 dollar => 123 cent */
int getExpense(){
    int i=0;
    char c;
    char buf[16];
    while((c=getchar())!='\n'){
        if(c!='.')
            buf[i++]=c;
    }
    buf[i]=0;
    return atoi(buf);
}

int main(){

    #ifndef ONLINE_JUDGE
    freopen("10137.in","r",stdin);
    //freopen("10137.out","w",stdout);
    #endif

    int stu[1000]; //expense of each student
    int stuNum;    //number of students

    /* for each case */
    while(scanf("%d ",&stuNum)==1){

        if(stuNum==0) break;

        //compute the average 
        int sum=0;
        for(int i=0;i<stuNum;++i){
            stu[i] = getExpense();
            sum += stu[i];
        }
        int avg = ((double)sum/stuNum)+0.5;

        //compute the exchange amount
        int exchg1=0, exchg2=0;
        for(int i=0;i<stuNum;++i){
            if(stu[i]>avg)
                exchg1 += stu[i]-avg;
            else if(stu[i]<avg)
                exchg2 += avg - stu[i];
        }
        double rslt = (exchg1<exchg2)? exchg1:exchg2;
        rslt /= 100;
        printf("$%.2lf\n", rslt);
    }
    return 0;
}
