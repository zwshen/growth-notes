/* 
 * A solution for the "Ant on a Chessboard" problem.
 * UVa ID: 10161
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/101/10161.html
 *
 * @author Joana M. F. da Trindade
 * @date 2008.06.15
 */

#include <iostream>
#include <math.h>

using namespace std;

int main() {
    long time;     /* amount of seconds */
    int x, y;      /* coordinates */
    long square;   /* closest square */
    int dist;      /* distance from closest square */

    while ((cin >> time) && (time != 0)) {
        square = floor(sqrt(time));
        dist = time - square*square;
        
        if (dist == 0) {
            x = 1;
            y = square;
        } else if (dist <= (square + 1)) {
            x = dist;
            y = square + 1;
        } else {
            x = square + 1;
            y = (2 * square) + 2 - dist;
        }

        /* change direction */
        if ((square % 2) == 0) {
            int tmp = x;
            x = y;
            y = tmp;
        }

        cout << x << " " << y << endl;
    }
}
