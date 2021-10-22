/* @JUDGE_ID: xxxxxx 698 C++ */

#include <stdio.h>
#include <stdlib.h>
#include <assert.h>
#include <string.h>
#include <ctype.h>

#define MAX_WORDS 200
#define MAXC 10
#define MAX_LINE 100000
#define MAX_LINE_NUM 10000

typedef struct line {
  int next;
  int start;
  int end;
} line;

typedef struct t_lines {
  int first;
  int last;
} t_lines;

typedef struct WordNode {
  char w[MAXC + 1];
  int valid;
  t_lines l;
} WordNode;

int num, new_line;
char current_line[MAX_LINE];
int nlines;
int nwords;
WordNode words[MAX_WORDS];
line lines[MAX_LINE_NUM];

int cmp(const void *a, const void *b) {
  const WordNode *c = (WordNode *)a;
  const WordNode *d = (WordNode *)b;
  return strcmp(c->w, d->w);
}

int isPossible(char ch){
  return ((ch<='z' && ch>='a') || (ch<='Z' && ch>='A') || (ch >='0'&& ch<='9'));
}
   
void add_line(int i, int num) {
  if (words[i].l.first == -1) {
    words[i].l.first = nlines;
    lines[words[i].l.first].start = num;
    lines[words[i].l.first].end = num;
    lines[words[i].l.first].next = -1;
    words[i].l.last = words[i].l.first;
    nlines++;
    assert(nlines < MAX_LINE_NUM);
  }
  else if (lines[words[i].l.last].end != num) {
    if (lines[words[i].l.last].end + 1 == num) 
      lines[words[i].l.last].end++;
    else {
      lines[words[i].l.last].next = nlines;
      words[i].l.last = nlines;
      lines[words[i].l.last].start = num;
      lines[words[i].l.last].end = num;
      lines[words[i].l.last].next = -1;
      nlines++;
      assert(nlines < MAX_LINE_NUM);
    }
  }
}

void strupper(char w[]) {
  int i;
  int len = strlen(w);
  for (i = 0; i < len; i++)
    w[i] = toupper(w[i]);
  for (i = 0; i < len; i++)
    assert(w[i] >= 'A' && w[i] <= 'Z' || w[i] >= '0' && w[i] <= '9');
}

unsigned hash(char s[]) {
  unsigned h = 0;
  int i;
  int len = strlen(s);
  for (i = 0; i < len; i++)
    h = (37 * h + s[i]) % MAX_WORDS;
  return h;
}

int add_word(char line[]) {
  int x;
  char w[100];
  sscanf(line, "%s", w);
  if (strlen(w) <= 0) return 0;
  assert(strlen(w) <= 10);
  strupper(w);
  x = hash(w);
  while (words[x].valid) {
    if (strcmp(w, words[x].w) == 0) {
      words[x].valid++;
      return 1;
    }
    x = (x + 1) % MAX_WORDS;
  }
  strcpy(words[x].w, w);
  words[x].valid = 1;
  words[x].l.first = -1;
  words[x].l.last = -1;
  nwords++;
  assert(nwords + nwords < MAX_WORDS);
  return 1;
}

void init() {
  int i;
  num = 1;
  nwords = 0;
  for (i = 0; i < MAX_WORDS; i++)
    words[i].valid = 0;
  nlines = 0;
  new_line = 0;
}

void print_word(int i) {
  int count = 0;
  int current = words[i].l.first;
  if (current == -1) return;
  printf("%s", words[i].w);
  while (current != -1) {
    if (count > 0) printf(", ");
    else printf(" ");
    count++;
    if (lines[current].start != lines[current].end)
      printf("%d-%d", lines[current].start, lines[current].end);
    else printf("%d", lines[current].start);
    current = lines[current].next;
  }
  printf("\n");
}

void print_words() {
  int i, j = 0;
  for (i = 0; i < MAX_WORDS; i++) 
    if (words[i].valid) 
      words[j++]= words[i];
  qsort(words, nwords, sizeof(WordNode), cmp);
  nwords = j;
  for (i = 0; i < nwords; i++) 
    for (j = 0; j < words[i].valid; j++) 
      print_word(i);
}

void search_word(char w[]) {
  int x;
 // assert(strlen(w) <= 10);
  if (strlen(w) > 10) {
    return;
  }
  strupper(w);
  x = hash(w);
  while (words[x].valid) {
    if (strcmp(w, words[x].w) == 0) {
      add_line(x, num); 	  	 
      return;
    }
    x = (x + 1) % MAX_WORDS;
  }
}

void process_line(char line[]) {
  int j = 0, i = 0, len = strlen(line);
  while (i < len){
    if (isPossible(line[i])) {
      current_line[j] = line[i];
      i++;
      j++;
    }
    else {
      i++;
      current_line[j] = '\0';
      if (j > 0)
        search_word(current_line);
      j = 0;
    }
  }
  if (j > 0){
    current_line[j]= '\0';
    search_word(current_line);
  }
}

int gets_line() {
  char ch;
  int i = 0;
  current_line[i] = '\0';
  if (1 != scanf("%c", &ch)) return -1;
  while (ch != '\n') {
    if (ch != '\r') current_line[i++] = ch;
    assert(i - 1 < MAX_LINE);
    if (1 != scanf("%c", &ch)) break;
  }
  current_line[i] = '\0';
  return i;
}

int main() {
  int k, np = 0;
  while (gets_line() >= 0) {
    init();
    while (add_word(current_line)) 
      if (gets_line() <= 0) break;
    if (nwords == 0) break;
    num = 0;
    while (gets_line() > 0) {
      ++num;
      process_line(current_line);
    }
    if (np > 0) printf("\n");
    printf("Case %d\n", ++np);
    print_words();
  }
  return 0;
}
