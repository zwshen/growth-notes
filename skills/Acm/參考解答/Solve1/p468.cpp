/* @JUDGE_ID: xxxxxx 468 C++ */

#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <assert.h>


typedef struct letter {
  char letter;
  int frequency;
} letter;

void error() { int um = 1, zero = 0; um = um / zero; }

int getCode(char ch) {
  if (ch >= 'a' && ch <= 'z') return ch - 'a';
  if (ch >= 'A' && ch <= 'Z') return ch - 'A' + 26;
  printf("ch = %c nao pode\n", ch);
  return 0;
}

letter m[2][52];
char map[52];

void count(int k, char message[]) {
  int i;
  int len = strlen(message);
  for (i = 0; i < 52; i++) {
    m[k][i].frequency = 0;
    if (i < 26)
      m[k][i].letter = i + 'a';
    else   m[k][i].letter = i + 'A' - 26;
  }
  for (i = 0; i < len; i++)
    m[k][getCode(message[i])].frequency++;
}

int cmp(const void *a, const void *b) {
  letter *c = (letter *)a;
  letter *d = (letter *)b;
  if (c->frequency > d->frequency) return -1;
  else if (c->frequency < d->frequency) return +1;
  return 0;
}

int getsLine(char line[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    line[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  line[i] = '\0';
  return i;
}


int main() {
  int i, j, len, dummy, n, p;
  char temp[1000], line[30000];
  getsLine(line);
  dummy = sscanf(line, "%d", &n);
  assert(dummy == 1);
  getsLine(line);
  printf("\n");
  for (p = 1; p <= n; p++) {
    dummy = getsLine(line);
    assert(dummy > 0);
    count(0, line);
    dummy = getsLine(line);
    assert(dummy > 0);
    count(1, line);
    qsort(m[0], 52, sizeof(letter), cmp);
    qsort(m[1], 52, sizeof(letter), cmp);
    for (i = 1; i < 52; i++) {
      assert(m[0][i].frequency == 0
	     || m[0][i].frequency < m[0][i - 1].frequency);
     assert(m[1][i].frequency == 0 ||
	    m[1][i].frequency < m[1][i - 1].frequency);
    }
    for (i = 0; i < 52; i++)
      map[i] = '0';
    for (i = 0; i < 52; i++) {
      if (m[0][i].frequency == 0 || m[1][i].frequency == 0) break;
      map[getCode(m[1][i].letter)] = m[0][i].letter;
    }
    len = strlen(line);
    for (i = 0; i < len; i++) {
      j = getCode(line[i]);
      assert(map[j] != '0');
      printf("%c", map[j]);
    }
    printf("\n\n");
    getsLine(line);
  }
  return 0;
}
