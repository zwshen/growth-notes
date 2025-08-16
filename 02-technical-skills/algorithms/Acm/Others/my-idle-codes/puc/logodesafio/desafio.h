/********************************************************************/
/*                            desafio.h                             */
/********************************************************************/



/********************************************************************/
/*                                                                  */
/*  Função Palavra_principal – Verifica se uma palavra pode ser a   */
/*  palavra principal, ou seja, contem todas as letras do           */
/*  quadro grande, sem repeticao.                                   */
/*                                                                  */
/*  Entradas:                                                       */
/*  quadro - ponteiro para a cadeia de caracteres quadro            */
/*  palavra - ponteiro para a cadeia de caracteres contendo a       */
/*            palavra a ser verificada.                             */
/*                                                                  */
/*  Saída: inteiro com valor 1 se a palavra eh a principal, ou 0,   */
/*         caso contrario.                                          */
/*                                                                  */
/********************************************************************/

int Palavra_principal(char* quadro, char* palavra);



/********************************************************************/
/*                                                                  */
/*  Função Palavra_comum – Verifica se uma palavra contem           */
/*  apenas caracteres nao repetidos do quadro grande e tamanho      */
/*  maior ou igual a tres.                                          */
/*                                                                  */
/*  Entradas:                                                       */
/*  quadro - ponteiro para a cadeia de caracteres quadro            */
/*  palavra - ponteiro para a cadeia de caracteres contendo a       */
/*            palavra a ser verificada.                             */
/*                                                                  */
/*  Saída: inteiro com valor 1 se a palavra eh valida, ou 0,        */
/*         caso contrario.                                          */
/*                                                                  */
/********************************************************************/

int Palavra_comum(char* quadro, char* palavra);



/********************************************************************/
/*                                                                  */
/*  Função Palavra_sequencia – Verifica se uma palavra contem       */
/*  a sequencia fornecida como parametro e caracteres nao           */
/*  repetidos do quadro grande e tamanho maior ou igual a quatro.   */

/*                                                                  */
/*  Entradas:                                                       */
/*  quadro - ponteiro para a cadeia de caracteres quadro            */
/*  sequencia - ponteiro para a cadeia de caracteres contendo uma   */
/*              sequencia.                                          */
/*  palavra - ponteiro para a cadeia de caracteres contendo a       */
/*            palavra a ser verificada.                             */
/*                                                                  */
/*  Saída: inteiro com valor 1 se a palavra eh valida, ou 0,        */
/*         caso contrario.                                          */
/*                                                                  */
/********************************************************************/

int Palavra_sequencia(char* quadro, char* sequencia, char* palavra);



/********************************************************************/
/*                                                                  */
/*  Função Le_palavra – Le uma palavra do teclado com tamanho       */
/*  maximo 20 e armazena em uma cadeia de caracteres alocada        */
/*  dinamicamente, apos converter todos os caracteres para          */
/*  maiusculas.                                                     */
/*                                                                  */
/*  Saída: Ponteiro para nova string alocada dinamicamente ou       */
/*         NULL, se nao for possivel alocar a nova cadeia.          */
/*                                                                  */
/********************************************************************/

char* Le_palavra(void);



/********************************************************************/
/*                                                                  */
/*  Função Verifica – Verifica se uma palavra esta em um vetor de   */
/*  palavras registradas.                                           */
/*                                                                  */
/*  Entradas:                                                       */
/*  palavra - ponteiro para a cadeia de caracteres contendo a       */
/*            palavra a ser verificada.                             */
/*                                                                  */
/*  lista - ponteiro para o vetor de palavras registradas.          */
/*                                                                  */
/*  n – tamanho da lista.                                           */
/*                                                                  */
/*  Saída: inteiro com valor 1 se a palavra esta no vetor, ou 0,    */
/*         caso contrario.                                          */
/*                                                                  */
/********************************************************************/

int Verifica(char* palavra, char** lista, int n);



/********************************************************************/
/*                                                                  */
/*  Função Registra – Copia um vetor de palavras registradas de     */
/*  tamanho n recebido como parametro para um novo vetor alocado    */
/*  dinamicamente com tamanho n+1. Na ultima posicao do novo vetor  */
/*  deve ser colocado o ponteiro para a cadeia de caracteres        */
/*  contendo a palavra a ser registrada, recebido como parametro.   */
/*  Se nao for vazio, o vetor original deve ser liberado.           */
/*                                                                  */
/*  Entradas:                                                       */
/*  palavra - ponteiro para a cadeia de caracteres contendo a       */
/*            palavra a ser registrada.                             */
/*                                                                  */
/*  lista - ponteiro para o vetor de palavras registradas.          */
/*                                                                  */
/*  n – tamanho da lista.                                           */
/*                                                                  */
/*  Saída: ponteiro para o novo vetor, ou NULL, caso nao consiga    */
/*         alocar memoria                                           */
/*                                                                  */
/********************************************************************/

char** Registra(char* palavra, char** lista, int n);