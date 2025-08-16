/********************************************************************/
/*                          logodesafio.c                           */
/********************************************************************/


#include <stdio.h>
#include <stdlib.h>
#include "jogo.h"
#include "desafio.h"

int main(void)
{
	char *quadro, *seq, *palavra;
	char **solucao, **respostas=NULL;
	int n, continua, k=0, valor, total = 0;

	n =  Carrega_jogo(&quadro, &seq, &solucao);

	printf("Forme palavras com 3 letras ou mais com os caracteres:\n\n");

	Mostra_quadro(quadro);

	printf("Ou com 4 letras ou mais e contendo tambem a sequencia:\n\n");

	Mostra_sequencia(seq);

	printf("Uma dica, voce pode formar:\n\n");

	Mostra_dica(solucao, n);

	while(1)
	{
		printf("\nDigite uma palavra com 3 ou mais letras, ou um unico caractere e ENTER para terminar...\n");		

		palavra = Le_palavra();

		if((palavra==NULL)||(palavra[1]=='\0'))
			break;

		if(strlen(palavra)<3)
		{
			printf("\nA palavra deve ter mais de 3 letras, tente outra vez...\n");
			free(palavra);
		}
		else
		{
			valor = 0;

			if(Palavra_principal(quadro, palavra))
				valor = 15;
			else if(Palavra_comum(quadro, palavra))
				valor = 5;
			else if(Palavra_sequencia(quadro, seq, palavra))
			    valor = 10;

			if(valor==0)
			{
				printf("\nEssa palavra nao e valida, tente outra...\n");
				free(palavra);
			}
			else
			{
				if(Verifica(palavra, respostas, k))
				{
					printf("\nEssa palavra e repetida, tente outra...\n");
					free(palavra);
				}
				else 
				{
					if(Verifica(palavra, solucao, n))
					{
						respostas = Registra(palavra, respostas, k);
						total = total + valor;
						printf("\nParabéns, vc ganhou mais %d pontos, totalizando %d pontos...\n", valor, total);
						
						k++;
						if(k==n)
							break;
					}
					else
					{
						printf("\nEssa palavra nao existe, tente outra...\n");
						free(palavra);
					}
				}
			}
		}
	}
	printf("\nVc encontrou %d palavras e acumulou %d pontos...\n\n", k, total);

	printf("As palavras que que poderiam ser formadas sao:\n\n");

	Mostra_tudo(solucao, n);
}
