/* Author: lmborba */
#include <stdlib.h>
#include <iostream>
#include <string>
using namespace std;

#define NCARDS 52
#define NSUITS 4

char values[] = "23456789TJQKA";
char suits[] = "CDSH";

int intcompare(const void *h, const void *k) {
  int i;
  int j;
  i = (int) *((int *) h);
  j = (int) *((int *) k);
  if (i > j) return (1);
  if (i < j) return (-1);
  return (0);
}

int rank_card(char value, char suit) {

  int i,j;
  for (i=0; i<(NCARDS/NSUITS); i++) {
    if (values[i]==value) {
      for (j=0; j<NSUITS; j++) {
	if (suits[j] == suit) {
	  return i*NSUITS + j + 1;
	};
      }
    }
  }
}

int main() {
  int k,h;
  int nc;
  int n;
  string card;
  int adam[26];
  int eve[26];
  int counter;
  
  std::cin >> nc;
  
  for (int i=0; i<nc; i++) {
    
    
    memset(adam, 0, 26*sizeof(int));
    memset(eve, 0, 26*sizeof(int));        
    
    std::cin >> n;
    
    
    for (int j=0; j<n; j++) {
      std::cin >> card;
      adam[j] = rank_card(card.c_str()[0],card.c_str()[1]);
    }       
    for (int j=0; j<n; j++) {
      std::cin >> card;
      eve[j] = rank_card(card.c_str()[0],card.c_str()[1]);
    }
    
    
    qsort(adam, 26, sizeof(int), intcompare);
    qsort(eve, 26, sizeof(int), intcompare);
    
    k = 0;
    h = 0;
    counter = 0;
    
    while (h < 26) {
      if (eve[h] == 0) {
	h++;
	k++;
      } else {
	if (eve[h] > adam[k]) {
	  counter++;
	  h++;
	  k++;
	} else {
	  h++;
	};
      };
    };

    cout << counter << endl;
    
  }
  
}