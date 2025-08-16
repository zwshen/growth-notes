#include<iostream>
using namespace std;

class BigInt{
//private:
public:
    enum{MAX=61};
    int dig[MAX];
    int size;

    BigInt();
    BigInt operator+(const BigInt &b);
    BigInt operator=(const BigInt &right);
    BigInt operator=(const char* input);
    void print();
};

BigInt::BigInt(){
    size = 0;
    memset(dig,0,sizeof(dig));
}

BigInt BigInt::operator+(const BigInt &b){
    BigInt sum;
    sum.size = 
      ( size>b.size )? size : b.size;
    for(int i=0;i<MAX;i++){
        sum.dig[i] += dig[i] + b.dig[i];
        if(sum.dig[i]>9){
            sum.dig[i] -= 10;
            sum.dig[i+1]++;
        }
    }
    if(sum.dig[sum.size]!=0) ++sum.size;
    return sum;
}

BigInt BigInt::operator=(const BigInt &right){
    size = right.size;

    if( &right != this){
        for(int i=0;i<MAX;i++){
            dig[i] = right.dig[i];
        }
    }
    return *this;
}

BigInt BigInt::operator=(const char* input){
    size = strlen(input);
    for(int i=0;i<size;i++){
        dig[i] = input[size-i-1] - '0';
    }
    return *this;
}

void BigInt::print(){
    for(int i=size-1;i>=0;i--){
        printf("%d",dig[i]);
    }
}

int main(){
    enum{ ROW_MAX=300 };

    BigInt row[2][ROW_MAX];
    int currentLength;
    int currentRow,nextRow;

    cout << "1\n";
    cout << "1 1\n";

    //initial row1
    currentRow = 0;
    nextRow=1;
    row[currentRow][0] = "1";
    row[currentRow][1] = "1";
    currentLength = 2;

    do{
        row[nextRow][0] = "1";
        row[nextRow][currentLength] = "1";

        cout << "1 ";
        for(int i=1;i<currentLength;i++){
            row[nextRow][i] = row[currentRow][i-1] + row[currentRow][i];
            row[nextRow][i].print();
            cout << " ";
        }
        cout << "1\n";

        int temp = currentRow;
        currentRow = nextRow;
        nextRow = temp;

        currentLength++;
    } while(row[currentRow][currentLength/2].size <61);
    //10的60次方是61位數
    return 0;
}

