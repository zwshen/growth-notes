#include<iostream>

int main(){
    int c;
    int inQuotes=0;

    while((c=getchar())!=EOF){
        if(c=='"'){
            if(inQuotes){ //close quotes
                putchar('\'');
                putchar('\'');
            }else{ //start quotes
                putchar('`');
                putchar('`');
            }
            inQuotes=!inQuotes;
        }else{
            putchar(c);
        }
    }
    return 0;
}
