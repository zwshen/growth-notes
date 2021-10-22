/* 
 * A solution for "The Grand Dinner" problem.
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/102/10249.html
 * 
 * Author: Joana Matos Fonseca da Trindade
 * Date: 2008.06.01
 * UVa ID: 10249
 */
#include <iostream>

#define NTEAMS 70
#define NTABLES 50
#define NSAMETABLE 1

using namespace std;

typedef struct {
    int id;       /* team id */
    int nmembers; /* number of members */
} team;

typedef struct {
    int id;      /* table id */
    int nseats;  /* seat capacity */
} table;


/* sort team members decreasingly */
int compare (const void *a, const void *b) {
    team x = *(team*) a;
    team y = *(team*) b;

    if (x.nmembers > y.nmembers) {
        return -1;
    } else {
        return 1;
    }
}

/* arrange seats for each member. returns true if a valid configuration is possible
 * and false otherwise */
bool arrange_seats(int nteams, int ntables, team a_team[NTEAMS], table a_table[NTABLES], int seats[][NTABLES]) {
    int is_valid = true;

    for (int i=0; i<nteams; i++) {
        for (int j=0; j<ntables; j++) {
            if ((a_table[j].nseats > 0) && (a_team[i].nmembers > 0)) {
                a_team[i].nmembers--;
                a_table[j].nseats--;
                seats[a_team[i].id][a_table[j].id]++;

                /* 
                 * check whether the maximum number of team members 
                 * that may be seated on the same table has been reached 
                 */
                if (seats[a_team[i].id][a_table[j].id] > NSAMETABLE) {
                    return false;
                }
            } else if (a_team[i].nmembers > 0) {
                continue;
            } else {
                break;
            }
        }
        /* more members than tables */  
        if (a_team[i].nmembers > 0) {
            return false;
        }
    }
    
    return is_valid;
}


/* main */
int main() {
    int nteams;    /* number of teams */
    int ntables;   /* number of tables */

    team a_team[NTEAMS];         /* array of teams */
    table a_table[NTABLES];      /* array of tables */
    int seats[NTEAMS][NTABLES];  /* seat configuration  */
    bool is_valid;	         /* is it a valid seat configuration? */

    while (cin >> nteams >> ntables) {
        if ((nteams == 0) && (ntables == 0)) {
            break;
        }
        
        /* read teams */
        for (int m=0; m<nteams; m++) {
            a_team[m].id = m;
            cin >> a_team[m].nmembers;
        }
        
        /* read tables */
        for (int n=0; n<ntables; n++) {
            a_table[n].id = n;
            cin >> a_table[n].nseats;
        }

        qsort(a_team, nteams, sizeof(team), compare);

        /* init seats */
        for (int i=0; i<nteams; i++) {
            for (int j=0; j<ntables; j++) {
                seats[i][j] = 0;
            }
        }

        is_valid = arrange_seats(nteams, ntables, a_team, a_table, seats);

        if (is_valid) {
            cout << "1" << endl;

            /* output configuration */
            for (int i=0; i<nteams; i++) {
                for (int j=0; j<ntables; j++) {
                    if (seats[i][j] > 0) {
                        cout << j+1 << " ";
                    } 
                }
                cout << endl;
            }   
        } else {
            cout << "0" << endl;
        }
    }
}
