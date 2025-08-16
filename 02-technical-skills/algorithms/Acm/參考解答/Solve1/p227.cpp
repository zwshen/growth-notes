/* @JUDGE_ID: xxxxxx 227 C++ */
#include <stdio.h>
#include <string.h>
#include <assert.h>

#define MAX 10000
char puzzle[10][10];
int r, c;
int invalid;
int n;
int first = 1;

void printPuzzle() {
  int i, j;
  if (first) first = 0;
  else printf("\n");
  printf("Puzzle #%d:\n", n);
  if (invalid) {
    printf("   This puzzle has no final configuration.\n");
  }
  else {
    for (i = 0; i < 5; i++) {
      printf("  ");
      for (j = 0; j < 5; j++)
	printf(" %c", puzzle[i][j]);
      printf("\n");
    }
  }
}


int move(char m) {
  if (m == '0') return 0;
  if (m == ' ' || m == '\t' || m == '\r' || m == '\n' || m == '\b')
    return 1;
  if (invalid) return 1;
  switch (m) {
    case 'A':
      if (r <= 0) invalid = 1;
      else {
	puzzle[r][c] = puzzle[r - 1][c];
	puzzle[r - 1][c] = ' ';
      }
      r--;
      break;
    case 'B':
      if (r >= 4) invalid = 1;
      else {
	puzzle[r][c] = puzzle[r + 1][c];
	puzzle[r + 1][c] = ' ';
      }
      r++;
      break;
    case 'R':
      if (c >= 4) invalid = 1;
      else {
	puzzle[r][c] = puzzle[r][c + 1];
	puzzle[r][c + 1] = ' ';
      }
      c++;
      break;
    case 'L':
      if (c <= 0) invalid = 1;
      else {
	puzzle[r][c] = puzzle[r][c - 1];
	puzzle[r][c - 1] = ' ';
      }
      c--;
      break;
    default:
      invalid = 1;
      break;
  }
  //printPuzzle();
  return 1;
}

int getsLine(char s[]) {
  int i = 0;
  char ch;
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    assert(i < MAX);
    s[i++] = ch;
    if (1 != scanf("%c", &ch)) {
      s[i] = '\0';
      return i;
    }
  }
  s[i] = '\0';
  return 1;
}

int main() {
  char line[MAX];
  int i, j;
  char ch;
  n = 0;
  while (getsLine(line)) {
    n++;
    for (i = 0; i < strlen(line); i++)
      if (line[i] >= 'A' && line[i] <= 'Z') break;
    if (i < strlen(line) && line[i] == 'Z') break;
    invalid = 0;
    r = -1;
    c = -1;
    for (i = 0; i < 5; i++) {
      for (j = 0; j < 5 && j < strlen(line); j++) {
	if (line[j] == ' ') {
	  assert (r == -1 || c == -1);
	  r = i;
	  c = j;
	}
	puzzle[i][j] = line[j];
      }
      if (strlen(line) == 4) {
	  assert (r == -1 || c == -1);
	r = i;
	c = 4;
	puzzle[i][4] = ' ';
      }
      else assert (strlen(line) >= 4);
      getsLine(line);
    }
    i = 0;
    while (1) {
      if (i >= strlen(line)) {
	getsLine(line);
	i = 0;
      }
      if (!move(line[i])) break;
      i++;
    }
    printPuzzle();
  }
  return 0;
}
