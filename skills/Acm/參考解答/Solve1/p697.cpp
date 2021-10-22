/* @JUDGE_ID: xxxxxx 697 C++ */

#include <stdio.h>
#include <stdlib.h>
#include <assert.h>
#include <math.h>

double UP, D, L, B, P, DOWN, V;
double A = 32.2 * 12.0;
double MY_PI = 3.14159265358979323846;

int np = 0;
double time_required;
double volume_needed;
double current_level;

void print_value(char s1[], double a, char s2[]) {
  printf("     %-18s%8.2lf %-s\n", s1, a, s2);
}

void assert_pre(double a) {
  //assert(((int)(a * 10.0))/10.0 == a && a > 0.0 && a < 10000.0);
}

void print() {
  printf("Scenario %d:\n", ++np);
  print_value("up hill", UP, "sec");
  print_value("well diameter", D, "in");
  print_value("water level", L, "in");
  print_value("bucket volume", B, "cu ft");
  print_value("bucket ascent rate", P, "in/sec");
  print_value("down hill", DOWN, "sec");
  print_value("required volume", V, "cu ft");
  assert_pre(UP);
  assert_pre(D);
  assert_pre(L);
  assert_pre(B);
  assert_pre(P);
  assert_pre(DOWN);
  assert_pre(V);
  assert(time_required >= 0.0 && time_required < 100000.0);
  print_value("TIME REQUIRED", time_required, "sec");
  printf("\n");
}

/* d = a*t^2/2 */
double descend_time() {
  return sqrt((current_level * 2.0)/A);
}

double ascent_time() {
  return current_level / P;
}

int main() {
  double level_rate;
  double AREA;
  int times = 0;
  while (1) {
    assert(1 == scanf("%lf", &UP));
    if (UP < 1.0) break;
    assert(UP != 1.0);
    assert(1 == scanf("%lf", &D));
    assert(5 == scanf("%lf %lf %lf %lf %lf",
	       &L, &B, &P, &DOWN, &V));
    AREA = MY_PI * (D/2.0) * (D/2.0);
    volume_needed = V;
    time_required = 0.0;
    current_level = L;
    level_rate = (B * 1728.0)/AREA;
    while (volume_needed > 1e-7) {
      volume_needed -= B;
      time_required += UP + descend_time() + ascent_time() + DOWN;
      current_level += level_rate;
    }
    print();
  }
  return 0;
  
}
