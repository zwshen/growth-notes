#include <stdio.h>
#include <stdlib.h>
#include <time.h>
#include <math.h>

#ifdef __APPLE__
	#include <OpenGL/OpenGL.h>
	#include <GLUT/glut.h>
#else
	#include <GL/gl.h>
	#include <GL/glut.h>
#endif

#include "thing.h"
#include "pad.h"
#include "ball.h"

ball::ball() : thing(0, 0, BALL_W, BALL_H) {
	this->immune = 0;

	time_t curtime; int random;

	do {
		time(&curtime);

		srand(curtime);
		random = rand()%V_MODULUS*100 + 20;
		random/=100;

		this->speed[X] = sqrt(pow(V_MODULUS, 2) - pow(random, 2));
		this->speed[Y] = random;

	} while (speed[X]==0 || speed[Y]==0);

	//Sign determination
	time(&curtime);

	srand(curtime);
	random = rand()%100;

	if (random%2 != 0)
		this->speed[X]= -(this->speed[X]);

	time(&curtime);

	srand(curtime);
	random = rand()%100;

	if (random%2 != 0)
		this->speed[Y]= -(this->speed[Y]);
}

void ball::move(short w, short h, vector<pad>& vect) {
	this->thing::move(w, h);
	this->bounceOnPads(vect);
}

int ball::bounceOnWalls(short w, short h) {
	int top = (this->figure.center[X] + (this->figure.width)/2);  
	int bottom = (this->figure.center[X] - (this->figure.width)/2);
	int right = (this->figure.center[Y] + (this->figure.height)/2); 
	int left = (this->figure.center[Y] - (this->figure.height)/2);

	if (top >= (w/2))
		this->speed[X]=-(this->speed[X]);
	if (bottom <= (-w/2))
		this->speed[X]=-(this->speed[X]);
	if (right >= (h/2))
		this->speed[Y]=-(this->speed[Y]);
	if (left <= (-h/2))
		this->speed[Y]=-(this->speed[Y]);
	
	return 0;
}

void ball::bounceOnPads(vector<pad>& vect) {
	rect* r;

	for (int i=0; i<vect.size(); i++) {
		bool intersect;
		r = vect[i].returnRect();
		intersect = this->figure.intersection(r);

		if (!intersect) {
			free(r);
			continue;
		}		

		if (!(this->immune)) {		
			if (abs(this->figure.center[X]-r->center[X])>(r->width/2))
				this->speed[X]=-(this->speed[X]);
			else  {
				this->speed[Y]=-(this->speed[Y]);
				immune=1;
			}
		}

		free(r);
	}

	if (this->immune)
		immune=(++immune)%10;

}
