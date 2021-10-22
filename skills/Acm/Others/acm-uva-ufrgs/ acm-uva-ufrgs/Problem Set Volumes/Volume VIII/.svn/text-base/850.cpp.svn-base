#include <cstdlib>
#include <iostream>
#include <sstream>

const char ckey[43] = { 't','h','e',' ','q','u','i','c','k',' ','b','r','o','w','n',' ','f','o','x',' ','j','u','m','p','s',
                        ' ','o','v','e','r',' ','t','h','e',' ','l','a','z','y',' ','d','o','g' };

using namespace std;

int main(int argc, char *argv[])
{
    int cases = 0;
    int cont = 0;
    char change[26];
    string line;
    ostringstream o;
        
    // read case number
    scanf("%d", &cases);
    //read blank line
    scanf("\n");
    for (int i = 0; i < cases; i++) {
        if (i > 0) {
           o << endl;
           cont++;
        }
        string text[110]; // input texts
        int text_num = -1;
        bool keyf = false;
        while(getline(cin, line)){
            if (line.size() == 0) // next case, if exists
                break;
            text_num++;
            cont++;
            // check if it is the key
            if (line.size() == 43 && keyf == false) { // same size as the quick....
                char key[43];
                strcpy(key,line.c_str());
                // sum ascii codes
                int sum = 0;
                for (int j = 0; j < 43; j++) {
                    sum += key[j];   
                    if (key[j]-97 >=0 && key[j]-97 < 26) {
                        change[key[j]-97] = ckey[j];  
                    }
                }
                sum -= (key[5] + key[15] + key[17] + key[26] + key[28] + key[29] + key[31] + key[32] + key[33] + key[41]);
                // 3071 is the correct sum
                if (sum == 3071) {
                   keyf = true;
                }
            }
            text[text_num] = line;
        }
        // check if any key was found
        if(keyf) {
            for (int j = 0; j <= text_num; j++) {
                // create a char vector
                char output[text[j].size()];
                strcpy(output,text[j].c_str());
                // print correct text
                for (int k = 0; k < strlen(output); k++) {
                    if ((int)output[k]-97 >= 0 && (int)output[k]-97 <  26) {
                       o << change[(int)output[k]-97];
                    } else {
                       o << output[k];    
                    }
                }
                o << endl;    
            }
        } else {
            o << "No solution." << endl;
        }
    }
    // output result
        cout << o.str();
    
    return EXIT_SUCCESS;
}
