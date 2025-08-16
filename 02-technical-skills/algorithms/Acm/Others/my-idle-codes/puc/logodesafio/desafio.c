#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

int cmp (const void* a, const void* b) {
	return ( *(char*)a - *(char*) b );
}	

int Palavra_principal(char* quadro, char* palavra) {
	char* str1, * str2;
	
	if (strlen(quadro)!=strlen(palavra))
		return 0;

	str1 = (char*) malloc(sizeof(char)*(strlen(palavra)+1));
	str2 = (char*) malloc(sizeof(char)*(strlen(quadro)+1));
	
	strcpy(str1, palavra);
	strcpy(str2, quadro);
	
	qsort(str1, strlen(str1), sizeof(char), cmp);
	qsort(str2, strlen(str2), sizeof(char), cmp); 
	
	if (!strcmp(str1, str2)) {
		free(str1);
		free(str2);
		return 1;
	}
	else {
		free(str1);
		free(str2);
		return 0;
	}
}

int Palavra_comum(char* quadro, char* palavra) {
	char* str1, * str2;
	int i, j;
	
	if (strlen(quadro)<=strlen(palavra)) /*caso palavra principal ja foi verificado*/
		return 0;

	str1 = (char*) malloc(sizeof(char)*(strlen(palavra)+1));
	str2 = (char*) malloc(sizeof(char)*(strlen(quadro)+1));
	
	strcpy(str1, palavra);
	strcpy(str2, quadro);
	
	qsort(str1, strlen(str1), sizeof(char), cmp);
	qsort(str2, strlen(str2), sizeof(char), cmp); 
	
	for (i=0, j=0; str1[i]!='\0' && str2[j]!='\0'; ) {
		if (str1[i]==str2[j]) {
			i++; 
			j++;
		}
		else if (str1[i]>str2[j])
			j++;
		else {
			free(str1);
			free(str2);
			return 0;
		}
	}

	free(str1);
	free(str2);
	return 1;
}

int Palavra_sequencia(char* quadro, char* sequencia, char* palavra) {
	char* str1, *str2; 
	int i, j;
	
	if (strstr(palavra, sequencia)==NULL)
		return 0;

	str1 = (char*) malloc(sizeof(char)*(strlen(palavra)+1));
	str2 = (char*) malloc(sizeof(char)*(strlen(quadro)+strlen(sequencia)+1));
	
	strcpy(str1, palavra);
	strcpy(str2, quadro);
	strcat(str2, sequencia);	

	qsort(str1, strlen(str1), sizeof(char), cmp);
	qsort(str2, strlen(str2), sizeof(char), cmp);
	 
	for (i=0, j=0; str1[i]!='\0' && str2[j]!='\0'; ) {
		if (str1[i]==str2[j]) {
			i++; 
			j++;
		}
		else if (str1[i]>str2[j])
			j++;
		else {
			free(str1);
			free(str2);
			return 0;
		}
	}

	free(str1);
	free(str2);
	return 1;	
}

char* Le_palavra(void) {
	int i;
	char* pWord = (char*) malloc(sizeof(char)*20);	
	scanf("%s", pWord);

	if (pWord==NULL)
		return NULL;	

	for (i=0; pWord[i]!='\0'; i++) {
		if (pWord[i]>='a' && pWord[i]<='z')
			pWord[i] = toupper(pWord[i]);
	}

	return pWord;
}

int Verifica(char* palavra, char** lista, int n) {
	int i;

	for (i=0; i<n; i++) {
		if (!strcmp(lista[i], palavra))
			return 1;
	}
	
	return 0;
}

char** Registra(char* palavra, char** lista, int n) { 
	char ** out = realloc(lista, sizeof(char*)*(n+1));
	out[n] = palavra;
	return out;
}
