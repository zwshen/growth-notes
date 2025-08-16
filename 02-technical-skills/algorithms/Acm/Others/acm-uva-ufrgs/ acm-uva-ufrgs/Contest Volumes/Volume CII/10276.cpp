/* 
 * A solution for the "Shoemaker" problem.
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/102/10276.html
 *
 * Author: Guilherme Frisoni
 * UVa ID: 10276
 */
#include <cstdlib>
#include <iostream>
#include <math.h>

using namespace std;

int main(int argc, char *argv[]) {

    // Pré-calcula o vetor dos pesos
    int pesos[52];
    pesos[0] = 1;
    pesos[1] = 2;
    for (int i = 2; i < 52; i = i+2) {
        pesos[i] = i+2;
        pesos[i+1] = i+2;
    }
    // Pré-calcula o vetor de bolas
    int bolas[52];
    bolas[0] = 1;
    for (int i = 1; i < 52; i++) {
        bolas[i] = bolas[i-1]+pesos[i-1];
    }
    int cases = 0;
    
    // Le a quantidade de testes
    cin >> cases;
    
    for (int i = 0; i < cases; i++) {
        int n = 0;
        // Le o numero de pegs
        cin >> n;
        // BUsca o valor no array pré-calculado
        cout << bolas[n]-1 << endl;
    }

    system("PAUSE");
    return EXIT_SUCCESS;
}