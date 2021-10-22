/*
	PROG: numgrid
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <algorithm>
#include <set>
#include <string>
#include <stdlib.h>
using namespace std;

typedef struct node Node;

struct node {
	char num;
	int numSons, i, j, level;
	Node* sons[4];
	Node* parent;
};

typedef struct tree {
	Node* root;
} Tree;

char grid[7][7];
set<string> results;
Tree possible;
char jumps[8];

Node* createNode(int y, int x, Node* par) {
	Node* newNode = new Node;

	newNode->num = grid[y][x];
	newNode->numSons=0;
	newNode->i=y;
	newNode->j=x;
	newNode->parent=par;
	
	if (par!=NULL)
		newNode->level=par->level+1;
	else
		newNode->level=0;

	for (int k=0; k<4; k++)
		newNode->sons[k]=NULL;
	
	return newNode;
}

void createTree(int i, int j) {
	possible.root = createNode(i, j, NULL);
}

void addNodes(Node* x) {
	if (x->level==5) return;

	int k=0;

	if ((x->i)>=1 && (x->i)<5) {
		x->numSons++;
		x->sons[k]=createNode((x->i)-1, x->j, x);
		k++;	
	}
	if (x->j>=1) {
		x->numSons++;
		x->sons[k]=createNode((x->i), (x->j)-1, x);
		k++;
	}
	if (((x->i)+1)<5) {
		x->numSons++;
		x->sons[k]=createNode((x->i)+1, x->j, x);
		k++;
	}
	if (((x->j)+1)<5) {
		x->numSons++;
		x->sons[k]=createNode((x->i), (x->j)+1, x);
		k++;
	}

	for (k=0; k<x->numSons; k++)
		addNodes(x->sons[k]);
}

void printNode(Node* x) {
	if (x!=NULL) {
		printf("{ %c", x->num);		

		for (int i=0; i<x->numSons; i++)
			printNode(x->sons[i]);
		
		printf("}");
	}
}

void printTree() {
	printNode(possible.root);
}

void destroyNode(Node* x) {
	for (int i=0; i<x->numSons; i++) 
		destroyNode(x->sons[i]);

	delete x;
}

void destroyTree() {
	destroyNode(possible.root);
}

void search(Node* x) {
	jumps[x->level]=x->num;

	if (x->numSons==0) {
		jumps[x->level+1]='\0';
		string temp(jumps);
		results.insert(temp);
	}
	else {
		for (int i=0; i<x->numSons; i++)
			search(x->sons[i]);
	}
}
	
void DFS() {
	search(possible.root);
}

int main() {
	FILE* fin = fopen("numgrid.in", "r");
	FILE* fout = fopen("numgrid.out", "w");

	if (fin==NULL)
		exit(1);

	for (int i=0; i<5; i++) {
		for (int j=0; j<5; j++)
			fscanf(fin, " %c", &grid[i][j]);
	}

	fclose(fin);

	/*	for (int i=0; i<5; i++) {
		for (int j=0; j<5; j++)
		printf("%c", grid[i][j]);

		printf("\n");
		} */

	for (int i=0; i<5; i++) {
		for (int j=0; j<5; j++) {
			createTree(i,j);
			addNodes(possible.root);
//			printTree();
			DFS();
			destroyTree();
		}
	}

/*	list<string>::iterator it=results.begin();

	for (it; it!=results.end(); it++)
		printf("%s\n", it->c_str()); */

	fprintf(fout, "%d\n", results.size());
	fclose(fout);

	return 0;
}

