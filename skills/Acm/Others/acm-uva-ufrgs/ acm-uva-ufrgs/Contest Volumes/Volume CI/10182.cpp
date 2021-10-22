/* 
 * A solution for the "Bee Maja" problem.
 * UVa ID: 10182
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/101/10182.html
 *
 * @author Joana M. F. da Trindade
 * @date 2008.06.15
 */
#include <iostream>

#define NHONEYCOMB 100000

using namespace std;

int maja_x, maja_y;  /* maja system coordinates */
int step; /* current step */
int comb_x[NHONEYCOMB+1]; /* honey comb x coordinates */
int comb_y[NHONEYCOMB+1]; /* honey comb y coordinates */

void walk() {
    comb_x[step] = maja_x;
    comb_y[step] = maja_y;
    step++;
}

void walk_south(int rows) {
    while (rows--) {
        maja_y++;
        walk();
    }
   
}

void walk_north(int rows) {
    while (rows--) {
        maja_y--;
        walk();
    }
}

void walk_southeast(int rows) {
    while (rows--) {
        maja_x++;
        walk();
    }
}

void walk_southwest(int rows) {
    while (rows--) {
        maja_x--;
        maja_y++;
        walk();
    }
}

void walk_northwest(int rows) {
    while (rows--) {
        maja_x--;
        walk();
    }
}

void walk_northeast(int rows) {
    while (rows--) {
        maja_x++;
        maja_y--;
        walk();
    }
}

int main() {
    int honeycomb;
    step = 1;
    maja_x = 0;
    maja_y = -1;

    /* pre-calculate */
    walk_south(2);
    for (int i=1; step<NHONEYCOMB/10; i++) {
        walk_northwest(i);
        walk_north(i);
        walk_northeast(i);
        walk_southeast(i);
        walk_south(i+1);
        walk_southwest(i);
    }

    while (cin >> honeycomb) {
        cout << comb_x[honeycomb] << " " << comb_y[honeycomb] << endl;
    }

}
