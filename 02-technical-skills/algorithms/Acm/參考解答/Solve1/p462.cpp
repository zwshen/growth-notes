/* @JUDGE_ID:  xxxxxx  462  C++  */

#include <stdio.h>
#include <string.h>
int stop[4];
int count[4];
char suits[4] = {'S', 'H', 'D', 'C'};
int cards[4][14];
int score;
int s_stop, max;
void stopped() {
  int i, j;
  s_stop = 1;
  max = 0;
  for (i = 0; i < 4; i++) {
    count[i] = 0;
    for (j = 1; j <= 13; j++)
      if (cards[i][j]) count[i]++;
    stop[i] = 0;
    if (cards[i][1]) stop[i] = 1;
    else if (cards[i][13] && count[i] > 1) stop[i] = 1;
    else if (cards[i][12] && count[i] > 2) stop[i] = 1;
    s_stop = s_stop && stop[i];
    if (count[i] > count[max]) max = i;
  }
}

void put(char s[]) {
  int suit, i;
  for (i = 0; i < 4; i++)
    if (s[1] == suits[i]) {
      suit = i;
      break;
    }
  if (s[0] >= '2' && s[0] <= '9')
    cards[suit][s[0] - '0'] = 1;
  else if (s[0] == 'A')
    cards[suit][1] = 1;
  else if (s[0] == 'T')
    cards[suit][10] = 1;
  else if (s[0] == 'J')
    cards[suit][11] = 1;
  else if (s[0] == 'Q')
    cards[suit][12] = 1;
  else if (s[0] == 'K')
    cards[suit][13] = 1;
}

int main() {
  char card[10];
  int i, j;
  while (1 == scanf("%s", card)) {
    for (i = 0; i < 4; i++)
      for (j = 1; j <= 13; j++)
	cards[i][j] = 0;
    put(card);
    for (i = 2; i <= 13; i++) {
      scanf("%s", card);
      put(card);
    }
    stopped();
    score = 0;
    // rule 1, 2, 3, 4
    for (i = 0; i < 4; i++) {
      if (cards[i][1]) score += 4;
      if (cards[i][13]) {
	score += 3;
	if (count[i] <= 1) score--;
      }
      if (cards[i][12]) {
	score += 2;
	if (count[i] <= 2) score--;
      }
      if (cards[i][11]) {
	score += 1;
	if (count[i] <= 3) score--;
      }
    }
    if (score >= 16 && s_stop) {
      printf("BID NO-TRUMP\n");
    }
    else {
      for (i = 0; i < 4; i++) {
	if (count[i] == 0 || count[i] == 1) score += 2;
	else if (count[i] == 2) score += 1;
      }
      if (score < 14)
	printf("PASS\n");
      else printf("BID %c\n", suits[max]);
    }
  }
  return 0;
}
