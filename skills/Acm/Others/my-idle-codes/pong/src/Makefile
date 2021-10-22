##  Makefile for pong game!
CC = g++
PROG = ../pong
OBJS = main.o thing.o pad.o ball.o
CFLAGS = -Wall -g -pedantic

ifeq ($(shell uname), Darwin)
	LIBS = -framework GLUT -framework OpenGL
else
	LIBS = -lglut
endif

all : $(OBJS)
	$(CC) $(OBJS) $(LIBS) -o $(PROG) $(CFLAGS)
main.o : main.cpp pad.o thing.o ball.o
	$(CC) main.cpp $(LIBS) -c $(CFLAGS)
pad.o : thing.o pad.cpp pad.h
	$(CC) pad.cpp $(LIBS) -c $(CFLAGS)
ball.o : thing.o ball.cpp ball.h
	$(CC) ball.cpp $(LIBS) -c $(CFLAGS)
thing.o : thing.h thing.cpp
	$(CC) thing.cpp $(LIBS) -c $(CFLAGS)

clean :
	rm *.o
	rm ../pong
