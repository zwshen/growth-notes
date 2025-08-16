/********************************************************************/
/*                             jogo.h                               */
/********************************************************************/


/********************************************************************/
/*                                                                  */
/*  Carrega_jogo – Carrega as informacoes necessarias para um       */
/*  jogo.                                                           */
/*                                                                  */
/*  Entradas:                                                       */
/*  letras - ponteiro para receber o endereco da cadeia de          */
/*           caracteres contendo as letras do quadro principal.     */
/*                                                                  */
/*  seq - ponteiro para receber o endereco da cadeia de caracteres  */
/*        contendo a sequencia do quadro menor.                     */
/*                                                                  */
/*  sol - ponteiro para receber o endereco do vetor de ponteiros    */
/*        para cadeias de caracteres, que contem a solucao          */
/*        do jogo.                                                  */
/*                                                                  */
/*  Saída: inteiro com numero de elementos do vetor solucao.        */
/*                                                                  */
/********************************************************************/

int Carrega_jogo(char** letras, char** seq, char*** sol);



/********************************************************************/
/*                                                                  */
/*  Mostra_tudo – Mostra na tela todas as palavras que se pode      */
/*  formar em um jogo.                                              */
/*                                                                  */
/*  Entradas:                                                       */
/*  sol - ponteiro para o vetor de palavras validas no jogo.        */
/*                                                                  */
/*  n – tamanho do vetor.                                           */
/*                                                                  */
/********************************************************************/

void Mostra_tudo(char** sol, int n);



/********************************************************************/
/*                                                                  */
/*  Mostra_tam – Mostra na tela as palavras que se pode formar      */
/*  em um jogo com o tamanho definido como parametro.               */
/*                                                                  */
/*  Entradas:                                                       */
/*  sol - ponteiro para o vetor de palavras validas no jogo.        */
/*                                                                  */
/*  n – tamanho do vetor.                                           */
/*                                                                  */
/*  tam – numero de caracteres.                                     */
/*                                                                  */
/********************************************************************/

void Mostra_tam(char** sol, int n, int tam);



/********************************************************************/
/*                                                                  */
/*  Mostra_dica – Mostra na tela uma dica sobre a quantidade de     */
/*  palavras que e possivel formar em um jogo.                      */
/*                                                                  */
/*  Entradas:                                                       */
/*  sol - ponteiro para o vetor de palavras validas no jogo.        */
/*                                                                  */
/*  n – tamanho do vetor.                                           */
/*                                                                  */
/*                                                                  */
/********************************************************************/

void Mostra_dica(char** sol, int n);



/********************************************************************/
/*                                                                  */
/*  Mostra_quadro – Mostra na tela os caracteres validos para       */
/*  formar uma palavra do jogo.                                     */
/*                                                                  */
/*  Entradas:                                                       */
/*  quadro - ponteiro para a cadeia de caracteres contendo a        */
/*           as letras validas.                                     */
/*                                                                  */
/********************************************************************/

void Mostra_quadro(char* quadro);



/********************************************************************/
/*                                                                  */
/*  Mostra_sequencia – Mostra na tela a sequencia de caracteres     */
/*  valida de um jogo.                                              */
/*                                                                  */
/*  Entradas:                                                       */
/*  seq - ponteiro para a cadeia de caracteres contendo a           */
/*        sequencia.                                                */
/*                                                                  */
/********************************************************************/

void Mostra_sequencia(char* seq);
