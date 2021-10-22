#include<iostream>
using namespace std;

enum{ MAX=20 };

//transfer the rank to real sequence
void trans(int seq[MAX], int rank[MAX], int n){
    for (int i=0;i<n;++i)
        seq[rank[i]-1] = i;
}

int main(){
    int n;
    int rank[MAX];

    //read the correct answer
    scanf("%d", &n);
    for (int i=0;i<n;++i)
        scanf("%d", &rank[i]);

    //trans the answer rank to answer seq
    int correct[MAX];
    trans(correct,rank,n);

    //build mapping
    int map[MAX];
    for (int i=0;i<n;++i)
        map[correct[i]] = i;

    while (scanf("%d", &rank[0])==1)
    {
        //read student's ans
        for (int i=1;i<n;++i)
            scanf("%d",&rank[i]);

        int seq[MAX], seq2[MAX];
        trans(seq,rank,n);
        for (int i=0;i<n;++i){
            seq2[i] = map[seq[i]];
        }

        //lis
        int best[MAX];
        int length = 1; //length of best
        best[0] = seq2[0];

        for (int i=1;i<n;++i) {
            for (int j=0;j<length;++j) {
                if (seq2[i]<best[j]) {
                    best[j] = seq2[i];
                    break;
                }
            }
            if (seq2[i]>best[length-1]){
                best[length++] = seq2[i];
            }
        }
        printf("%d\n",length);
    }
    return 0;
}
