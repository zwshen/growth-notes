/*
 * UVa 10315
 * Author: chchwy
 * Last Modified: 2009.11.3
 */
#include <iostream>

class Card{
    friend class PokerHand;
    int  value, suit;
    int  convert(char);
    void setValue(char c){ value=convert(c); }
    static bool cmp(const Card &left, const Card &right) {return (left.value<right.value);}
};

/* 將牌的文字點數換成整數值 */
int Card::convert(char c){
    if(c<='9') return c-'0';
    if(c=='T') return 10;
    if(c=='J') return 11;
    if(c=='Q') return 12;
    if(c=='K') return 13;
    if(c=='A') return 14;
}

enum HANDRANK {
    HIGH_CARD, PAIR, TWO_PAIR, THREE_KIND,
    STRAIGHT, FLUSH, FULL_HOUSE, FOUR_KIND,
    STRAIGHT_FLUSH
};

/* 一組五張牌 */
class PokerHand{
    Card card[5];
    HANDRANK rank;
public:
    void fetchCard(char*);
    HANDRANK  getRank();
    int  isStraight();
    int  isFlush();
    int  is4Kind();
    int  is3Kind();
    int  numPairs();
    int  compareTo(PokerHand&); //win>0, lose<0, tie==0
    void fetchRankValues(int[5]);
};

int PokerHand::isStraight(){
    for(int i=0;i<4;++i){
        if( card[i].value+1 != card[i+1].value )
            return false;
    }
    return true;
}

int PokerHand::isFlush(){
    int curSuit = card[0].suit;
    for(int i=1;i<5;++i)
        if( card[i].suit != curSuit)
            return false;
    return true;
}

int PokerHand::is4Kind(){
    if(card[0].value==card[3].value ||
       card[1].value==card[3].value)
            return true;
    return false;
}

int PokerHand::is3Kind(){
    for(int i=0;i<3;++i)
        if(card[i].value==card[i+2].value)
            return true;
    return false;
}

int PokerHand::numPairs(){
    int counter=0;
    for(int i=0;i<4;++i){
        if(card[i].value==card[i+1].value)
            counter++, i++;
    }
    return counter;
}

void PokerHand::fetchCard(char *buf){

    int bufIndex=0;
    for(int i=0;i<5;++i){
        card[i].setValue( buf[bufIndex++] );
        card[i].suit = buf[bufIndex++];
        bufIndex++; //空白跳過
    }
    std::sort(card, card+5, Card::cmp);
    rank = getRank();
}

HANDRANK PokerHand::getRank(){

    int st = isStraight();
    int fl = isFlush();

    if(st && fl) //同花順
        return  STRAIGHT_FLUSH;
    else if(st) //順子
        return STRAIGHT;
    else if(fl) //同花
        return FLUSH;

    if( is4Kind() ) //鐵支
        return FOUR_KIND;

    int three = is3Kind();
    int pair = numPairs();

    if( three && pair==2 ) //葫蘆
        return FULL_HOUSE;
    if(three) //三條
        return THREE_KIND;
    if(pair==2) //吐胚
        return TWO_PAIR;
    if(pair==1) //胚
        return PAIR;

    return HIGH_CARD;
}

void PokerHand::fetchRankValues(int rankValues[5]){
    memset(rankValues, 0, sizeof(int)*5);
    switch(rank){
        case STRAIGHT_FLUSH:
        case STRAIGHT:
            rankValues[0] = card[4].value;
            break;
        case FLUSH:
        case HIGH_CARD:
            for(int i=0;i<5;++i)
                rankValues[i] = card[4-i].value;
            break;
        case FULL_HOUSE:
        case FOUR_KIND:
        case THREE_KIND:
            rankValues[0] = card[2].value;
            break;
        case TWO_PAIR:
            //落單的一張只有三種位子 0 2 4
            if(card[0].value!=card[1].value){ //ex. 2 33 44
                rankValues[0]=card[4].value;
                rankValues[1]=card[2].value;
                rankValues[2]=card[0].value;
            }else if(card[2].value!=card[3].value){ //ex.33 4 55
                rankValues[0]=card[4].value;
                rankValues[1]=card[0].value;
                rankValues[2]=card[2].value;
            }else{ //ex.55 66 7
                rankValues[0]=card[2].value;
                rankValues[1]=card[0].value;
                rankValues[2]=card[4].value;
            }
            break;
        case PAIR:
            int pairValue;
            for(int i=0;i<=3;++i) //search pair
                if(card[i].value==card[i+1].value){
                    pairValue = card[i].value;
                    break;
                }
            rankValues[0] = pairValue;
            for(int i=4,r=1 ;i>=0; --i){ //i for card, r for rankValues
                if(card[i].value==pairValue)
                    continue;
                rankValues[r++] = card[i].value;
            }
            break;
    }
}

/* 比較兩個牌組 */
int PokerHand::compareTo( PokerHand &op ){

    //先比Rank
    if( rank > op.rank )
        return 1;
    if( rank < op.rank )
        return -1;

    //Rank相等 要比點數
    int myRank[5], opRank[5];
    fetchRankValues(myRank) , op.fetchRankValues(opRank);

    for(int i=0;i<5;++i){
        if(myRank[i]>opRank[i])
            return 1; // i win.
        if(myRank[i]<opRank[i])
            return -1;//op win.
    }
    return 0; //tie
}

int main(){

    #ifndef ONLINE_JUDGE
    freopen("10315.in","r",stdin);
    #endif

    char buf[64];

    while( fgets(buf, sizeof(buf), stdin)!=NULL ){

        PokerHand black, white;

        black.fetchCard(buf);
        white.fetchCard(buf+15);

        int win = black.compareTo(white);

        if(win>0)
            puts("Black wins.");
        else if(win<0)
            puts("White wins.");
        else
            puts("Tie.");
    }
    return 0;
}
