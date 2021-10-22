#include <cstdlib>
#include <iostream>

using namespace std;

struct Pair {
    int x;
    int y;
};

// GCD function
int gcd(int a, int b) { 
    return ( b != 0 ? gcd(b, a % b) : a ); 
}

Pair extended_gcd(int a, int b) {
    Pair result;
    if (a % b == 0) {
        result.x = 0;
        result.y = 1;
        return result;
    } else {
        result = extended_gcd(b, a % b);
        int aux = result.x;
        result.x = result.y;
        result.y = aux-(result.x*(a/b));
        return result;
    }
}

int main(int argc, char *argv[]) {

    string line;
    int a, b, d, x, y;

    while (true) {
          getline(cin, line);
          if (line.size() == 0) break;

          sscanf(line.c_str(), "%d %d", &a, &b);

          // find GCD
          d = gcd(a, b);
          Pair result = extended_gcd(a, b);

          cout << result.x << " " << result.y << " " << d << endl;

    }

    return EXIT_SUCCESS;
}
