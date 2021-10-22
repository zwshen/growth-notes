#ifndef _BALL_H
#define _BALL_H

#define BALL_W 4
#define BALL_H 4
#define V_MODULUS 3

#include <vector>
using namespace std;

class thing;
class pad;

class ball : public thing {
	private:
	short immune;

	public:
	ball();
	int bounceOnWalls(short, short);
	void move(short, short, vector<pad>&);
	void bounceOnPads(vector<pad>&);
};

#endif /* _BALL_H */
