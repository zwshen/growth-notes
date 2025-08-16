/* @JUDGE_ID: xxxxxx 450 C++ "Don't use qsort" */

#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <assert.h>

#define MAX 500000

typedef struct T_Person {
  char *title;
  char *first_name;
  char *last_name;
  char *address;
  char *home_phone;
  char *work_phone;
  char *campus_mailbox;
  char *department;
} T_Person;

char *department;
T_Person people[MAX];
int n;
int nd;

void sort() {
  int i, j, min;
  T_Person p;
  for (i = 0; i < n; i++) {
    min = i;
    for (j = i + 1; j < n; j++)
      if (strcmp(people[j].last_name, people[min].last_name) < 0)
         min = j;
    p = people[min];
    people[min] = people[i];
    people[i] = p;
  //  printf("People %d: %s\n", i, people[i].last_name);
  }
}

char *clone_string(const char *s) {
  char *p = (char *)malloc(strlen(s) + 1);
  strcpy(p, s);
  return p;
}

int add_person(char *line) {
  char *p;
  p = strtok(line, ",\n");
  assert(p != NULL);
  people[n].title = clone_string(p);
  p = strtok(NULL, ",\n");
  assert(p != NULL);
  people[n].first_name = clone_string(p);
  p = strtok(NULL, ",\n");
  assert(p != NULL);
  people[n].last_name = clone_string(p);
  p = strtok(NULL, ",\n");
  assert(p != NULL);
  people[n].address = clone_string(p);
  p = strtok(NULL, ",\n");
  assert(p != NULL);
  people[n].home_phone = clone_string(p);
  p = strtok(NULL, ",\n");
  assert(p != NULL);
  people[n].work_phone = clone_string(p);
  p = strtok(NULL, ",\n");
  assert(p != NULL);
  people[n].campus_mailbox = clone_string(p);
  assert(department != NULL);
  people[n].department = clone_string(department);
  n++;
  assert(n <= MAX);
}

void free_people() {
  int i;
  for (i = 0; i < n; i++) {
    free(people[n].title);
    free(people[n].first_name);
    free(people[n].last_name);
    free(people[n].address);
    free(people[n].home_phone);
    free(people[n].work_phone);
    free(people[n].campus_mailbox);
    free(people[n].department);
  }
}

int gets_line(char s[]) {
  int i = 0;
  char ch; 
  s[0] = '\0';
  if (1 != scanf("%c", &ch)) return -1;
  while (ch != '\n') {
    if (ch != '\r') s[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  s[i] = '\0';
  return i;
}

int cmp_people(const void *a, const void *b) {
  T_Person *p1 = (T_Person *)a;
  T_Person *p2 = (T_Person *)b;
  return (strcmp(p1->last_name, p2->last_name));
}

int main() {
  int i, dummy; 
  char line[1000000];
  gets_line(line);
  dummy = sscanf(line, "%d", &nd);
  assert(dummy == 1);
  assert(nd >= 2 && nd <= 12);
  n = 0;  
  for (i = 1; i <= nd; i++) {
    dummy = gets_line(line);
    assert(dummy > 0);
    department = clone_string(line);
    dummy = gets_line(line);
    while (dummy > 0) {
      add_person(line);
      dummy = gets_line(line);
    }
  }
  /* sort */
  //sort(people, n, sizeof(T_Person), cmp_people);
  sort();
  /* print */
  for (i = 0; i < n; i++) {
    printf("----------------------------------------\n");
    printf("%s %s %s\n", people[i].title, people[i].first_name, people[i].last_name);
    printf("%s\n", people[i].address);
    printf("Department: %s\n", people[i].department);
    printf("Home Phone: %s\n", people[i].home_phone);
    printf("Work Phone: %s\n", people[i].work_phone);
    printf("Campus Box: %s\n", people[i].campus_mailbox);

  }  
  dummy = gets_line(line);
  assert(dummy == -1);
  return 0;
}
