#include <stdio.h>
#include <vector>
using namespace std;

class node {
	bool numeric;
	int value;
	int depth;

	node* right;
	node* left;
	node* parent;

	public:
	friend class sTree;
};

class sTree {
	node* root;

	private:
	void print(node*);
	void destroyTree(node*);
	void insert(int, int, bool, node*);
	bool findEmptyAndInsert(int, node*, int);

	public:
	sTree();
	~sTree();
	void insert(int, int, bool);
	void print();
	int readEntry(vector<int>&);
};

int main() {
	int depth, stree=1;

	scanf("%d", &depth);

	while (depth) {
		printf("S-Tree #%d:\n", stree);
		sTree* t=new sTree; int i;

		for (i=0; i<depth; i++) {
			char temp[4]; int iTemp;
			scanf("%s", temp);
			sscanf(temp, "x%d", &iTemp);
			
			t->insert(iTemp, i, false);
		}

		int test; char c;
		scanf("%c", &c); //gets '\n' at the end of second line
		scanf("%c", &c);

		while (c!='\n') {
			test = c - '0';
			t->insert(test, i, true);
			scanf("%c", &c);
		}	
	
		int nCase;
		scanf("%d", &nCase); 
		scanf("%c", &c);

		for (i=0; i<nCase; i++) {
			vector<int> entry;
			
			for (int j=0; j<depth; j++) {
				scanf("%c", &c);
				test= c - '0';
				entry.push_back(test);
			}
		
			scanf("%c", &c);

			int answer = t->readEntry(entry);
			printf("%d", answer);
		}

		printf("\n\n");

		//t->print();
		delete t;
		scanf("%d", &depth);;
		stree++;	
	}	

	return 0;
}

sTree::sTree() {
	root=NULL;
}

sTree::~sTree() {
	destroyTree(root);
}

void sTree::destroyTree(node* leaf) {
	if (leaf!=NULL) {
		destroyTree(leaf->left);
		destroyTree(leaf->right);
		delete leaf;
	}
}

void sTree::print(node* leaf) {
	if (leaf!=NULL) {
		printf(" < ");

		if (leaf->numeric)
			printf("%d", leaf->value);
		else
			printf("x%d", leaf->value);

		print(leaf->left);
		print(leaf->right);

		printf(" > ");
	}
}

void sTree::print() {
	print(root);
}

void sTree::insert(int key, int dep, bool num) {
	if (dep!=0 && root!=NULL)
		insert(key, dep, num, root);
	else {
		root=new node;
		root->left=NULL;
		root->right=NULL;
		root->value=key;
		root->numeric=num;
		root->depth=dep;
		root->parent=NULL;
	}
}

void sTree::insert(int key, int dep, bool num, node* a) {
	if (dep==(a->depth +1) && num==false) {
		a->right=new node;
		a->right->right=NULL;
		a->right->left=NULL;
		a->right->value=key;
		a->right->numeric=num;
		a->right->depth=dep;
		a->right->parent=a;
	
		a->left=new node;
		a->left->right=NULL;
		a->left->left=NULL;
		a->left->value=key;
		a->left->numeric=num;
		a->left->depth=dep;
		a->left->parent=a;
	}
	else if (dep!=(a->depth +1) && num==false){
		insert(key, dep, num, a->left);
		insert(key, dep, num, a->right);	
	}
	
	else if (num==true) {
		findEmptyAndInsert(dep, a, key);
	}
}

bool sTree::findEmptyAndInsert(int dep, node* a, int key) {
	if (dep==(a->depth +1) && a!=NULL) {
		if (a->left==NULL) {
			a->left=new node;
			a->left->right=NULL;
			a->left->left=NULL;
			a->left->value=key;
			a->left->numeric=true;
			a->left->depth=dep;
			a->left->parent=a;

			return true;
		}		
		else if (a->right==NULL) {
			a->right=new node;
			a->right->right=NULL;
			a->right->left=NULL;
			a->right->value=key;
			a->right->numeric=true;
			a->right->depth=dep;
			a->right->parent=a;

			return true;
		}
		else {
			node* temp=a->parent;

			while (temp->right==a) { 
				a=temp;
				temp=temp->parent;

				if (temp==NULL)
					return false;
			}

			findEmptyAndInsert(dep, temp->right, key);		
		}
	}
	else if (dep!=(a->depth +1)) {
		bool insert;
		insert = findEmptyAndInsert(dep, a->left, key);
	}
}

int sTree::readEntry(vector<int> &entry) {
	node* temp=root;

	for (int i=0; i<entry.size(); i++) {
		int iTemp=entry[temp->value -1];

		if (iTemp==0)
			temp=temp->left;
		else if (iTemp==1)
			temp=temp->right;
	}

	return temp->value;
}

