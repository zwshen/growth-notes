#ifndef _THING_H
#define _THING_H

//Defines for working with vectors in a more intuitive way
#define X 0
#define Y 1


//A rectangle is defined by the center point and its dimensions 
class rect {
	public:
	short width, height;
	short center[2];

	rect();
	rect(short, short, short, short);	
	rect(short*, short, short);
	bool intersection(rect*);
};

// Thing, in this 
class thing {
	protected:
	short speed[2];
	rect figure;
	
	public:
	thing(short, short, short, short);
	void render();
	virtual void move(short w, short h);
	virtual int bounceOnWalls(short w, short h) = 0;
};

#endif /* _THING_H */
	
