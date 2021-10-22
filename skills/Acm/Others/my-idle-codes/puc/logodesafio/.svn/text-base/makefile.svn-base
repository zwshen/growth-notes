CC = gcc
PROG = logodesafio
CFLAGS = -Wall -ansi

all : jogo.o logodesafio.o desafio.o
	$(CC) jogo.o logodesafio.o desafio.o -o $(PROG) $(CFLAGS)

jogo.o : jogo.c jogo.h
	$(CC) jogo.c -c $(CFLAGS)

logodesafio.o : logodesafio.c desafio.h jogo.h
	$(CC) logodesafio.c -c $(CFLAGS)

desafio.o : desafio.c desafio.h
	$(CC) desafio.c -c $(CFLAGS)
