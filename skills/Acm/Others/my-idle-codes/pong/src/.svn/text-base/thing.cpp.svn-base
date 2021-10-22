#include <stdio.h>
#include <stdlib.h>

#ifdef __APPLE__
	#include <OpenGL/OpenGL.h>
	#include <GLUT/glut.h>
#else
	#include <GL/gl.h>
	#include <GL/glut.h>
#endif

#include "thing.h"

#define EPSILON 0.1

//****************************************//
//          Auxiliar class rect           //
//****************************************//

//----------Default Constructor-----------//
rect::rect() {
	this->center[X] = 0;
	this->center[Y] = 0;
	this->width = 0;
	this->height = 0;
}

//--------Overloaded constructors---------//
rect::rect(short x, short y, short w, short h) {
	this->center[X] = x;
	this->center[Y] = y;
	this->width = w;
	this->height = h;
}

rect::rect(short point[2], short w, short h) {
	this->center[X] = point[0];
	this->center[Y] = point[1];
	this->width = w;
	this->height = h;	
}

bool rect::intersection(rect* other) {
	bool inX = false, inY = false;
	int xDif = abs(this->center[X]-other->center[X])-(this->width/2+other->width/2);
	int yDif = abs(this->center[Y]-other->center[Y])-(this->height/2+other->height/2);
	
	if (xDif<=EPSILON) 
		inX=true;

	if (yDif<=EPSILON)
		inY=true;

	return (inX && inY);
}

//****************************************//
//		class thing               //
//****************************************//

//----------Constructor-----------//
thing::thing(short x, short y, short w, short h) : figure(x, y, w, h) {
	this->speed[X] = 0;
	this->speed[Y] = 0;
}

//---------Methods-------//
void thing::render() {
	glMatrixMode(GL_MODELVIEW);
	glLoadIdentity();
	glTranslatef(this->figure.center[X], this->figure.center[Y], 0);

	glMatrixMode(GL_PROJECTION);

	glPushMatrix();
	glBegin(GL_QUADS);
		glVertex2i(this->figure.width/2, this->figure.height/2);
		glVertex2i(-this->figure.width/2, this->figure.height/2);
		glVertex2i(-this->figure.width/2, -this->figure.height/2);
		glVertex2i(this->figure.width/2, -this->figure.height/2);
	glEnd();
	glPopMatrix();

	glFlush();
}

void thing::move(short w, short h) {
	this->bounceOnWalls(w, h);
	this->figure.center[X]+=speed[X];
	this->figure.center[Y]+=speed[Y];
}
