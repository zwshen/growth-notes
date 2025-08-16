#ifndef INC_IMGHANDLER_H
#define INC_IMGHANDLER_H

#include <stdio.h>
#include <stdlib.h>

enum {bmp, png, jpg};

class Image {
	private:
	char* pixels;
	int width;
	int height;
	int type;

	public:
	//Getters
	char* Pixels();
	int Width();
	int Height();
	int Type();

	//Setters
	void Pixels(char*);
	void Width(int);
	void Height(int);
	void Type(int);
	
	//Constructor & Destructor
	Image(char*);
	~Image();
};

#endif /*INC_IMGHANDLER_H*/
