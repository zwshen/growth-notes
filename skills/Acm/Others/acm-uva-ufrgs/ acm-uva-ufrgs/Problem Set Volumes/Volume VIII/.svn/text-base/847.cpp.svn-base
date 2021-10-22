#include <cstdlib>
#include <iostream>

using namespace std;

int main(int argc, char *argv[])
{
    int i;
    string line;
    while(getline(cin, line)) {
        if (line.size() == 0) break;
        unsigned int n = 0;
        sscanf(line.c_str(), "%d", &n);
        long long p = 1;
        bool stan = true;
        int multiplier = 9;
        while (p < n) {
              p = p * multiplier;
              if (stan) {
                  stan = false;
              } else {
                  stan = true;
              }
              if (multiplier == 9) multiplier = 2; else multiplier = 9;
        } 
        if (!stan) {
            cout << "Stan wins." << endl;
        } else {
            cout << "Ollie wins." << endl;
        }
    }
    system("PAUSE");
    return EXIT_SUCCESS;
}
