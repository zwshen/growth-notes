#include <stdio.h>
#include <stdlib.h>
#include <vector>

#ifdef __APPLE__
	#include <OpenGL/OpenGL.h>
	#include <GLUT/glut.h>
#else
	#include <GL/gl.h>
	#include <GL/glut.h>
#endif

#define GAME_W 640
#define GAME_H 480

#include "thing.h"
#include "pad.h"
#include "ball.h"
using namespace std;

vector<pad> pads;
ball* square;

//Function prototypes
void resize(int, int);
void update(int);
void render();
void init();
void keyboard(unsigned char, int, int);
void specialKey(int, int, int);
void specialKeyRelease(int, int, int);

int main(int argc, char** argv) {
	pads.push_back(pad((short)50));
	pads.push_back(pad((short)-50));
	square = new ball;

	glutInit(&argc, argv);
	glutInitDisplayMode(GLUT_RGB | GLUT_DOUBLE);
	glutInitWindowSize(GAME_W, GAME_H);
	glutCreateWindow("Pong Train 2");

	glutDisplayFunc(render);
	init();

	glutReshapeFunc(resize);
	glutKeyboardFunc(keyboard);
	glutSpecialFunc(specialKey);
	glutSpecialUpFunc(specialKeyRelease);

	glutTimerFunc(20, update, 0);

	glutMainLoop();
	return 0;
}

void init() {
	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();
	gluOrtho2D(-GAME_W/10, GAME_W/10, -GAME_H/10, GAME_H/10);
	glPushMatrix();
}

void resize(int w, int h) {
	glViewport(0, 0, w, h);
	glMatrixMode(GL_PROJECTION);
	glLoadIdentity();
	gluOrtho2D(-w/10, w/10, -h/10, h/10);
}

void render() {
	glClearColor(0.0f, 0.0f, 0.0f, 0.0f);
	glClear(GL_COLOR_BUFFER_BIT);
	
	for (int i=0; i<pads.size(); i++)
		pads[i].render();	

	square->render();	

	glutSwapBuffers();
}

void keyboard(unsigned char key, int x, int y) {
		switch (key) {
			case 27:
				//delete a;
				//delete square;
				exit(0);
				break;
			default:
				break;
		}
}

void specialKey(int key, int x, int y) {
		switch (key) {
			case GLUT_KEY_UP:
				pads[0].changeDir(up);
				break;
			case GLUT_KEY_DOWN:
				pads[0].changeDir(down);
				break;
			default:
				break;
		}
}

void specialKeyRelease(int key, int x, int y) {
	switch (key) {
		case GLUT_KEY_UP:
			pads[0].changeDir(stop);
			break;
		case GLUT_KEY_DOWN:
			pads[0].changeDir(stop);
			break;
		default:
			break;
	}
}

void update(int num) {
	square->move(GAME_W/5, GAME_H/5, pads);
	
	for (int i=0; i<pads.size(); i++)
		pads[i].move(GAME_W/5, GAME_H/5);
	
	glutPostRedisplay();
	glutTimerFunc(20, update, 0);
}
