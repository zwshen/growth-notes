#ifndef _PAD_H
#define _PAD_H

#define SPEED 2
#define PAD_W 3
#define PAD_H 15

class thing;

enum direction {
	up=0, down, stop
};

enum side {
	top, bottom, left, right
};

class pad : public thing {
	public:
	pad(short);
	void changeDir(direction);
	int bounceOnWalls(short w, short h);
	void move(short w, short h);
	void absorbImpact(short fspeed);
	rect* returnRect();
};

#endif /* _PAD_H */
