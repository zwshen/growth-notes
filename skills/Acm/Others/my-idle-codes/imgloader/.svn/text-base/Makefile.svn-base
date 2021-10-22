CC = g++
SCR = main.cpp imagehanlder.cpp
CFLAGS = -Wall
PROG = teste

all : main.o imagehandler.o
	$(CC) -o $(PROG) main.o imagehandler.o $(CFLAGS)

main.o : main.cpp imagehandler.h
	$(CC) -c main.cpp $(CFLAGS)

imagehandler.o : imagehandler.cpp imagehandler.h
	$(CC) -c imagehandler.cpp $(CFLAGS)
