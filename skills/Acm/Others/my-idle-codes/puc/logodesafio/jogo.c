#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "jogo.h"



static int comp(const void* p1, const void* p2)
{
   char **s1 = (char**) p1;
   char **s2 = (char**) p2;
   
   return (strcmp(*s1,*s2));
}


char* nova_cadeia(char* cadeia)
{
	int i;

	char *nc = (char*) malloc((strlen(cadeia)+1)*sizeof(char));
	strcpy(nc,cadeia);

	for(i=0;i<strlen(nc);i++)
	{
		if((nc[i]>='a')&&(nc[i]<='z'))
			nc[i] = nc[i] - 'a' + 'A';
	}
	return nc;
}


int Carrega_jogo(char** letras, char** seq, char*** solucao)
{
	int n = 88;

	*letras = nova_cadeia("TLANUPISAA");
	*seq = nova_cadeia("LHA");
	*solucao =  (char**) malloc(n*sizeof(char*));

	(*solucao)[0] = nova_cadeia("alias");
	(*solucao)[1] = nova_cadeia("aluna");
	(*solucao)[2] = nova_cadeia("anais");
	(*solucao)[3] = nova_cadeia("ansia");
	(*solucao)[4] = nova_cadeia("anual");
	(*solucao)[5] = nova_cadeia("atlas");
	(*solucao)[6] = nova_cadeia("atual");
	(*solucao)[7] = nova_cadeia("ilusa");
	(*solucao)[8] = nova_cadeia("inata");
	(*solucao)[9] = nova_cadeia("lapis");
	(*solucao)[10] = nova_cadeia("lauta");
	(*solucao)[11] = nova_cadeia("lista");
	(*solucao)[12] = nova_cadeia("nasal");
	(*solucao)[13] = nova_cadeia("natal");
	(*solucao)[14] = nova_cadeia("nauta");
	(*solucao)[15] = nova_cadeia("paina");
	(*solucao)[16] = nova_cadeia("pasta");
	(*solucao)[17] = nova_cadeia("patua");
	(*solucao)[18] = nova_cadeia("pausa");
	(*solucao)[19] = nova_cadeia("pauta");
	(*solucao)[20] = nova_cadeia("pinta");
	(*solucao)[21] = nova_cadeia("pista");
	(*solucao)[22] = nova_cadeia("plana");
	(*solucao)[23] = nova_cadeia("santa");
	(*solucao)[24] = nova_cadeia("sauna");
	(*solucao)[25] = nova_cadeia("sinal");
	(*solucao)[26] = nova_cadeia("suina");
	(*solucao)[27] = nova_cadeia("sutia");
	(*solucao)[28] = nova_cadeia("sutil");
	(*solucao)[29] = nova_cadeia("usina");
	(*solucao)[30] = nova_cadeia("alpina");
	(*solucao)[31] = nova_cadeia("apatia");
	(*solucao)[32] = nova_cadeia("inapta");
	(*solucao)[33] = nova_cadeia("insula");
	(*solucao)[34] = nova_cadeia("latina");
	(*solucao)[35] = nova_cadeia("patina");
	(*solucao)[36] = nova_cadeia("plaina");
	(*solucao)[37] = nova_cadeia("planta");
	(*solucao)[38] = nova_cadeia("salina");
	(*solucao)[39] = nova_cadeia("sapata");
	(*solucao)[40] = nova_cadeia("sulina");
	(*solucao)[41] = nova_cadeia("tulipa");
	(*solucao)[42] = nova_cadeia("lituana");
	(*solucao)[43] = nova_cadeia("platina");
	(*solucao)[44] = nova_cadeia("sultana");
	(*solucao)[45] = nova_cadeia("lusitana");
	(*solucao)[46] = nova_cadeia("analista");
	(*solucao)[47] = nova_cadeia("paulista");
	(*solucao)[48] = nova_cadeia("paulatina");
	(*solucao)[49] = nova_cadeia("paulistana");
	(*solucao)[50] = nova_cadeia("ilha");
	(*solucao)[51] = nova_cadeia("palha");
	(*solucao)[52] = nova_cadeia("pastilha");
	(*solucao)[53] = nova_cadeia("pilha");
	(*solucao)[54] = nova_cadeia("planilha");
	(*solucao)[55] = nova_cadeia("pulha");
	(*solucao)[56] = nova_cadeia("sapatilha");
	(*solucao)[57] = nova_cadeia("talha");
	(*solucao)[58] = nova_cadeia("ala");
	(*solucao)[59] = nova_cadeia("apa");
	(*solucao)[60] = nova_cadeia("asa");
	(*solucao)[61] = nova_cadeia("ata");
	(*solucao)[62] = nova_cadeia("ita");
	(*solucao)[63] = nova_cadeia("lua");
	(*solucao)[64] = nova_cadeia("nau");
	(*solucao)[65] = nova_cadeia("nua");
	(*solucao)[66] = nova_cadeia("sua");
	(*solucao)[67] = nova_cadeia("pia");
	(*solucao)[68] = nova_cadeia("tia");
	(*solucao)[69] = nova_cadeia("tua");
	(*solucao)[70] = nova_cadeia("lapa");
	(*solucao)[71] = nova_cadeia("lisa");
	(*solucao)[72] = nova_cadeia("lusa");
	(*solucao)[73] = nova_cadeia("lupa");
	(*solucao)[74] = nova_cadeia("luta");
	(*solucao)[75] = nova_cadeia("napa");
	(*solucao)[76] = nova_cadeia("nata");
	(*solucao)[77] = nova_cadeia("pata");
	(*solucao)[78] = nova_cadeia("pati");
	(*solucao)[79] = nova_cadeia("pina");
	(*solucao)[80] = nova_cadeia("pitu");
	(*solucao)[81] = nova_cadeia("sala");
	(*solucao)[82] = nova_cadeia("sapa");
	(*solucao)[83] = nova_cadeia("sina");
	(*solucao)[84] = nova_cadeia("tala");
	(*solucao)[85] = nova_cadeia("tina");
	(*solucao)[86] = nova_cadeia("tupi");
	(*solucao)[87] = nova_cadeia("anis");

    qsort(*solucao, n, sizeof(char*), comp);

	return n;
}

void Mostra_quadro(char* quadro)
{
	int i;

	for(i=0; i<strlen(quadro);i++)
		printf("%c ", quadro[i]);

	printf("\n\n");
}

void Mostra_sequencia(char* seq)
{
	printf("%s\n\n", seq);
}

void Mostra_tam(char** sol, int n, int tam)
{
	int i;

	for(i=0; i<n; i++) {
		if(strlen(sol[i])==tam)
		   printf("%s\n", sol[i]);
	}

}

void Mostra_tudo(char** sol, int n)
{
	int i, k, cont, faltam;

	for(k=3;;k++) 
	{
		faltam = 0;

		for(i=0; i<n; i++) 
		{
			if(strlen(sol[i])==k)
				printf("%s\n", sol[i]);
			else if(strlen(sol[i])>k)
				faltam++;
		}
		if(faltam == 0)
			break;
	}
}


void Mostra_dica(char** sol, int n)
{
	int i, k, cont, faltam, total = 0;

	for(k=3;;k++) 
	{
		cont = 0;
		faltam = 0;

		for(i=0; i<n; i++) 
		{
			if(strlen(sol[i])==k)
				cont++;
			else if(strlen(sol[i])>k)
				faltam++;
		}
		total = total + cont;

		if(cont>1)
			printf("%d palavras de %d letras\n", cont, k);
		else if(cont==1)
			printf("1 palavra de %d letras\n", k);
		else
			printf("Nenhuma palavra de %d letras\n", k);
		if(faltam == 0)
			break;
	}
	printf("\nNum total de %d palavras.\n", total);

}