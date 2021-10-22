/* Author: lmborba */
#include <stdio.h>
#include <stdlib.h>

typedef struct TURTLE {
  int nt;
  char nome[256];
} turtle;

typedef struct LIST {
  turtle * turtl;
  struct LIST * next;
} lturtle;  

void inserelista(turtle ** turt, lturtle ** lturt) {
  lturtle * aux;
  aux = (lturtle *) malloc(sizeof(lturtle));
  aux->turtl = *turt;
  aux->next = *(lturt);
  *(lturt) = aux;
  return (void) 0;
};

void limpalista(lturtle ** lturt, int b) {
  lturtle * aux, * aux2;
  aux = *(lturt);
  while (aux != NULL) {
    aux2 = aux;
    aux = aux->next;
    if (b) {
      free(aux2->turtl);
    };
    free(aux2);
  };
  *lturt = NULL;
};

void deleteitem(lturtle * anterior) {
  lturtle * aux;
  aux = anterior->next;
  anterior->next = (anterior->next)->next;
  free(aux);
};

turtle ** procurastr(char a[256],lturtle * lturt) {
  lturtle * aux;
  int i;
  for (aux = lturt;aux != NULL;aux = aux->next) {
    for (i=0;((a[i] == ((aux->turtl)->nome)[i]) && (a[i] != 0) && (((aux->turtl)->nome)[i] != 0));i++);
    if ((a[i] == 0) && (((aux->turtl)->nome)[i] == 0)) {
      return &(aux->turtl);
    };
  };
  return NULL;
};

int main() {
  int i,j;
  int n,d;
  lturtle * aux2, * aux3;
  turtle * aux;
  lturtle * lista;
  lturtle * lista2;
  lturtle * lista3;
  lturtle * ant;
  lista = NULL;
  lista2 = NULL;
  lista3 = NULL;
  char str[256];
  scanf("%d",&n);
  for (i=0;i<n;i++) {
    scanf("%d",&d);
    limpalista(&lista,1);
    limpalista(&lista2,0);
    fgets(str,256,stdin);
    for (j=0;j<d;j++) {
      aux = (turtle *) malloc(sizeof(turtle));
      aux->nt = 0;
      fgets(aux->nome,256,stdin);
      inserelista(&aux,&(lista));
    };
    for (j=0;j<d;j++) {
      fgets(str,256,stdin);
      inserelista(procurastr(str,lista),&lista2);
      (lista2->turtl)->nt = j;
    };

    aux2 = lista;
    aux3 = lista2;
    ant = NULL;

    while (aux2 != NULL) {
      if (aux3->turtl == aux2->turtl) {
	aux3 = aux3->next;
      };
      aux2 = aux2->next;
    };

    while(aux3 != NULL) {
      printf("%s",(aux3->turtl)->nome);
      aux3 = aux3->next;
    };
    printf("\n");
  };

  return 0;
};