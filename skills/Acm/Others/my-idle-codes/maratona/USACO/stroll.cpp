/*
	PROG: stroll
	LANG: C++
	ID: luiza1
*/

#include <stdio.h>
#include <algorithm>
using namespace std;

typedef struct node Node;

struct node {
	int num; short level;
	Node* sons[2];
	Node* parent;
};

typedef struct tree {
	Node* root;
} Tree;

int nodes[1010][3];
int p;
int maxLev=0;
Tree ways;

Node* createNode(int num, Node* par) {
	Node* a = new Node;

	a->num=num;
	a->parent=par;

	a->sons[0]=NULL;
	a->sons[1]=NULL;

	if (par==NULL)
		a->level=0;
	else
		a->level=par->level+1;

	if (maxLev<a->level && num)
		maxLev=a->level;

	return a;
}

void addNodes(Node* x) {
	int i;

	if (!x->num) return;

	for (i=0; i<(p-1); i++)
		if (x->num == nodes[i][0])
			break;

	x->sons[0] = createNode(nodes[i][1], x);
	x->sons[1] = createNode(nodes[i][2], x); 	

	addNodes(x->sons[0]);
	addNodes(x->sons[1]);
}

void createTree() {
	ways.root = createNode(1, NULL);
	
	addNodes(ways.root);
}

void printNode(Node* x) {
	if (x!=NULL) {
		printf("{ %d", x->num);
		
		printNode(x->sons[0]);
		printNode(x->sons[1]);

		printf("}\n");
	}
}

void printTree() {
	printNode(ways.root);
}

int main() {
	FILE* fin = fopen("stroll.in", "r");
	FILE* fout = fopen("stroll.out", "w");

	fscanf(fin, "%d", &p);

	for (int i=0; i<(p-1); i++) {
		for (int j=0; j<3; j++)
			fscanf(fin, "%d", &nodes[i][j]);
	}		

/*	for (int i=0; i<(p-1); i++) {
		for (int j=0; j<3; j++)
			fprintf(stdout, "%d", nodes[i][j]);

		printf("\n");
	} */	
	
	createTree();
//	printTree();

	fprintf(fout, "%d\n", maxLev+1);

	return 0;
}
