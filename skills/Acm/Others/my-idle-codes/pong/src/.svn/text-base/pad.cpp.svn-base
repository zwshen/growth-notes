#include "thing.h"
#include "pad.h"
#include <stdio.h>

pad::pad(short x): thing(x, 0, PAD_W, PAD_H) {}

void pad::changeDir(direction dir) {
	if (dir == up)
		this->speed[Y] = SPEED;
	else if (dir == down)
		this->speed[Y] = -SPEED;
	else if (dir == stop)
		this->speed[Y]=0;
}

int pad::bounceOnWalls(short w, short h) {
	int top = (this->figure.center[Y] + (this->figure.height)/2);  
	int bottom = (this->figure.center[Y] - (this->figure.height)/2);
	
	if (top >= h/2)
		return 1;
	else if (bottom <= -h/2)
		return -1;
	
	return 0;
}

void pad::move(short w, short h) {
	int bounce = this->bounceOnWalls(w, h);
	
	if (!bounce)
		this->figure.center[Y]+=this->speed[Y];
	else if (bounce==1 && this->speed[Y]<0)
		this->figure.center[Y]+=this->speed[Y];
	else if (bounce==-1 && this->speed[Y]>0)
		this->figure.center[Y]+=this->speed[Y];
}

void pad::absorbImpact(short fspeed) {
	if (fspeed*(this->speed[Y])>0) //Have the same signal
		this->speed[Y]=0;
}

rect* pad::returnRect() {
	rect* r = new rect(this->figure.center, this->figure.width, this->figure.height);
	return r;
}
