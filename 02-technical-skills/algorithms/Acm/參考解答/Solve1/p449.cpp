/* @JUDGE_ID: xxxxxx 449 C++ */
#include <stdio.h>
#include <string.h>
#include <assert.h>

char notes[12][2][10] = {{"C ", "B#"}, {"Db", "C#"}, {"D ", "D "}, 
{"Eb", "D#"}, {"E ", "Fb"}, {"F ", "E#"},   {"Gb", "F#"}, {"G ", "G "},
{"Ab", "G#"}, {"A ", "A "}, {"Bb", "A#"}, {"B ", "Cb"}};

char valid[30][8][5];
int nvalid;
char distance[7][10] = 
  {"SECOND", "THIRD", "FOURTH", "FIFTH", "SIXTH", "SEVENTH",
  "OCTAVE"};

int get_distance(char s[], char dir[]) {
  int i;
  for (i = 0; i < 7; i++)
     if (strcmp(s, distance[i]) == 0) {
       if (strcmp(dir, "UP") == 0) return i + 1;
       else return -(i + 1);
     }
  assert(0);
}

int inc[7] = {2, 2, 1, 2, 2, 2, 1};
char current[8][5];
char temp_note[100];

void gen_start(int k, int v) {
  int i, new_k;
  if (v == 7) {
    strcpy(current[7], current[0]);
    for (i = 0; i < 8; i++) {
      strcpy(valid[nvalid][i], current[i]);
   //   printf("%5s", valid[nvalid][i]);
    }
   // printf("\n");
    nvalid++;
  } 
  else {
    new_k = (k + inc[v]) % 12;
    if (notes[k][0][1] == '#' || notes[k][0][1] == 'b') {
      i = 0;
      for (i = 0; i < v; i++) {
        if (current[i][1] != ' ' && current[i][1] !=
            notes[k][0][1]) break;
        if (notes[k][0][0] == current[i][0]) break;
      }
      if (i == v) {
        strcpy(current[v], notes[k][0]);
        gen_start(new_k, v + 1);
      } 
    }
    else {
      for (i = 0; i < v; i++) {
        if (notes[k][0][0] == current[i][0]) break;
      }
      if (i == v) {
        strcpy(current[v], notes[k][0]);
        gen_start(new_k, v + 1);
      }
    }
    if (notes[k][1][1] == '#' || notes[k][1][1] == 'b') {
      for (i = 0; i < v; i++) {
        if (current[i][1] != ' ' && current[i][1] !=
            notes[k][1][1]) break;
        if (notes[k][1][0] == current[i][0]) break;
      }
      if (i == v) {
        strcpy(current[v], notes[k][1]);
        gen_start(new_k, v + 1);
      } 
    }
  }
}

int get_index(char s[]) {
  int i;
  char temp[100];
  strcpy(temp, s);
  if (strlen(temp) == 1) {
    temp[2] = '\0';
    temp[1] = ' ';
  }
  for (i = 0; i < nvalid; i++)
    if (strcmp(temp, valid[i][0]) == 0) return i;
  return -1;
}

int get_pos(int k, char s[]) {
  int i;
  char temp[100];
  strcpy(temp, s);
  assert(k < nvalid);
  if (strlen(temp) == 1) {
    temp[2] = '\0';
    temp[1] = ' ';
  }
  for (i = 0; i < 8; i++)
    if (strcmp(valid[k][i], temp) == 0) return i;
  return -1;
}

void generate() {
  int i, j;
  for (i = 0; i < 12; i++)
    gen_start(i, 0);
}

char *get_note(int k, int k2) {
  assert(k < nvalid);
  assert(k2 < 7);
  strcpy(temp_note, valid[k][k2]);
  if (temp_note[1] == ' ')
    temp_note[1] = '\0';
  return temp_note;
}

int gets_line(char line[]) {
  int i = 0; char ch;
  line[0] = '\0';
  if (1 != scanf("%c", &ch)) return -1;
  while (ch != '\n') {
    if (ch != '\r') line[i++] = ch;
    if (1 != scanf("%c", &ch)) break;
  }
  line[i] = '\0';
  return i;
}

int main() {
  int invalid = 0;
  int index1, index2;
  char line[100000], from[100], start[100];
  char d[100], dist[100];
  int count = 0, off;
  char *p;
  nvalid = 0;
  generate();

  while (gets_line(line)) {
    if (1 != sscanf(line, "%s", from)) break;
    index1 = get_index(from); 
    assert(index1 >= 0);
    gets_line(line);
    if (count > 0) printf("\n");
    count++;
    printf("Key of %s\n", from);
    p = strtok(line, " ;\n\r\b\t");
    while (p  != NULL) {
      strcpy(start, p);
      p = strtok(NULL, " ;\n\r\b\t");
      assert(p != NULL);
      strcpy(d, p);
      p = strtok(NULL, " ;\n\r\b\t");
      assert(p != NULL);
      strcpy(dist, p);
      p = strtok(NULL, " ;\n\r\b\t");
      index2 = get_pos(index1, start);
      if (index2 >= 0) {
        off = get_distance(dist, d);
        index2 = (index2 + 7 + off) % 7;
        printf("%s: %s %s > %s\n", start, d, dist, get_note(index1, index2));
      }
      else {
        printf("%s: invalid note for this key\n", start);
      }
    }
  }
  return 0;
}

