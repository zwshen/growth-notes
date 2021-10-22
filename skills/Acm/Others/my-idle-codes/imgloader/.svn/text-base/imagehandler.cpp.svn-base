#include <stdio.h>
#include <stdlib.h>
#include "imagehandler.h"

//Getters
char* Image::Pixels() {
	return pixels;
}

int Image::Width() {
	return width;
}

int Image::Height() {
	return height;
}

int Image::Type() {
	return type;
}

//Setters
void Image::Pixels(char* px) {
	pixels = px;
}
	
void Image::Width(int w) {
	width = w;
}

void Image::Height(int h) {
	height = h;
}

void Image::Type(int tp) {
	type = tp;
}

//Constructor
Image::Image(char* filename) {
	FILE * inputimage=NULL;
	char header[54];
		
	inputimage = fopen(filename, "rb");
		
	if (inputimage==NULL) {
		printf("Error in input");
		exit(1);
	}
	
	fread(header, sizeof(char), 50, inputimage);
	
	if ((header[0]=='B')&&(header[1]=='M'))
		type = bmp;
	else
		printf("File type not supported");
	
	fclose(inputimage);
}

//Destructor
Image::~Image() {
	delete pixels;
}
