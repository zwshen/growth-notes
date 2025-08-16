#include<cstdio>

#define N 100;

void add(int *a, int *b, int *c) {
    int i, carry = 0;

    for(i = N - 1; i >= 0; i--) {
        c[i] = a[i] + b[i] + carry;
        if(c[i] < 10000)
            carry = 0;
        else { // 進位
            c[i] = c[i] - 10000;
            carry = 1;
        }
    }
}

void subtract(int *a, int *b, int *c) {
    int i, borrow = 0;

    for(i = N - 1; i >= 0; i--) {
        c[i] = a[i] - b[i] - borrow;
        if(c[i] >= 0)
            borrow = 0;
        else { // 借位
            c[i] = c[i] + 10000;
            borrow = 1;
        }
    }
}

void multiply(int *a, int b, int *c) { // b 為乘數
    int i, tmp, carry = 0;

    for(i = N - 1; i >=0; i--) {
        tmp = a[i] * b + carry;
        c[i] = tmp % 10000;
        carry = tmp / 10000;
    }
}

void divide(int *a, int b, int *c) {  // b 為除數
    int i, tmp, remain = 0;

    for(i = 0; i < N; i++) {
        tmp = a[i] + remain;
        c[i] = tmp / b;
        remain = (tmp % b) * 10000;
    }
}

int main() {

    string s1 = "20000099";
    string s2 = "2";

    string s="1235";
    reverse (s.begin(), s.end());
    cout<<s<<endl;
    return 0;
}
