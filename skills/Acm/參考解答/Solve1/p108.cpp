/* @JUDGE_ID: xxxxxx 108 C++ */

#define MAX_N 150

int table[MAX_N + 1][MAX_N + 1];

#define dif(i,j,h) (table[i + h][j] - table[i][j])

int main() {
  int n, i, j, k, t, max;

  /* Read table size. */
  scanf("%d", &n);

  /* Initialize */
  for (j = 0; j < n; j++)
    table[0][j] = 0;

  /* Read input */
  for (i = 1; i <= n; i++)
    for (j = 0; j< n; j++)
      scanf("%d", &table[i][j]);

  for (j = 0; j < n; j++)
    for (i = 1; i <= n; i++)
      table[i][j] = table[i - 1][j] + table[i][j];

  max = table[1][0]; 
 
  /* Compute max using Dynamic Programming */
  for (k = 1; k <= n; k++)
    for (i = 0; i <= n - k; i++)
      for (t = 0, j = 0; j < n; j++) {
        if (t >= 0) t += dif(i,j,k);
        else t = dif(i,j,k);
        if (t > max) max = t;
      }

  /* Print output */
  printf("%d\n", max);
  return 0;
}

