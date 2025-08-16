/* @JUDGE_ID: xxxxxx 727 C++ */

#include <stdio.h>
#include <string.h>
#include <assert.h>

#define MAX 1000000
char stack[MAX];
int top;

void push(char ch) {
  stack[top++] = ch;
  assert(top < MAX);
}

char pop() {
  assert(top > 0);
  return stack[--top];
}

char peek() {
  assert(top > 0);
  return stack[top - 1];
}

int empty() {
  return top == 0;
}

int pre(char ch, char ch2) {
  if (ch == '*' || ch == '/') {
    if (ch2 == '+' || ch2 == '-') 
      return 1;
  }
  else {
    if (ch2 == '*' || ch2 == '/') 
      return -1;
  }
  return 0;
}

int gets_line(char s[]) {
  int i = 0; char ch;
  s[0] = '\0';
  if (1 != scanf("%c", &ch)) return 0;
  while (ch != '\n') {
    if (ch != '\r') s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  assert(i < 50);
  s[i] = '\0';
  return i;
}      

void add_ch(char ch) {
  if (ch >= '0' && ch <= '9')
    printf("%c", ch);
  else {
    if (ch == ')') {
      ch = pop();
      while (ch != '(') {
        printf("%c", ch); 
        ch = pop();
      }
    }
    else if (empty() || peek() == '(') push(ch);
    else if (ch == '(') push(ch);
    else if (pre(ch, peek()) > 0) 
      push(ch);
    else if (pre(ch, peek()) == 0) {
       printf("%c", pop());
       add_ch(ch);
    }
    else if (pre(ch, peek()) < 0) { 
       printf("%c", pop());
       add_ch(ch);
    }
  }
}

int main() {
  int i, pn;
  char line[1000], token[100];
  gets_line(line);
  sscanf(line, "%d", &pn);
  gets_line(line);
  for (i = 1; i <= pn; i++) {
    top = 0;
    if (i > 1) printf("\n");
    while (gets_line(line)) {
      if (1 != sscanf(line, "%s", token)) break;
      assert(strlen(token) == 1);
      add_ch(token[0]); 
    }
    while (!empty()) printf("%c", pop());
    printf("\n");
  }
  return 0;  
}
