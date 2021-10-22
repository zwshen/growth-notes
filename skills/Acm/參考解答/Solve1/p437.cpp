/*   @JUDGE_ID:   xxxxxx   437   C++   */

#include <stdio.h>
#define maxInt 2000000000
typedef struct block {
	int x;
	int y;
	int z;
} block;

typedef struct dimension {
	int x;
	int y;
} dimension;
int maxH[100];
int top;
dimension stack[1000];
int used[100];
block blocks[100];
int height, max;
int x, y, z, n;
int id;
	

void put(int x, int y) {
	stack[top].x = x;
    stack[top].y = y;
    top++;
}

      
void sort() {
	int i, j, min;
	block temp;
	for (i = 1; i < n; i++) {
      min = i;
      for (j = i + 1; j <= n; j++) 
		  if (blocks[j].x > blocks[min].x)
			  min = j;
		  else if (blocks[j].x == blocks[min].x)
			      if (blocks[j].y > blocks[min].y)
			         min = j;
     temp = blocks[min];
	 blocks[min] = blocks[i];
	 blocks[i] = temp;
   }

}

		  

void remove() {
	top--;
}

void printResult() {
	printf("Case %d: maximum height = %d\n", id, max);
}

void find(int num) {
	int i;
    int bx, by, bz;
	if (num <= n) {
		for (i = num; i <= n; i++) {
	 	  bx = blocks[i].x;
	      by = blocks[i].y;
	      bz = blocks[i].z;
	      if ((bx < stack[top - 1].x)&&(by < stack[top - 1].y)) {
		     height += bz;
		     if (height > max) max = height;
		     if ((maxH[i] + height) > max) {
   			    put(bx, by);
		        find(i + 1);
				remove();
			 }
             height -= bz;
	     }
	   }

  }
}
	     
int main() {
	int i, count, j, bx, by; 
	id = 0;
	int temp;
	while (1 == scanf("%d", &n)) {
      if (n == 0) break;
	  id++;
	  max = 0;
	  height = 0;
	  top = 0;
	  x = maxInt; y = maxInt; z = maxInt;
	  put(x, y);
      count = 0;
	  for (i = 1; i <= n; i++) 
	    if (3 != scanf("%d %d %d", &x, &y, &z)) {
	   	   printf("Erro\n");
		   return 1;
	    }
	    else {
			   if (x == z) { temp = z; z = y; y = temp; }
			   if (y == z) { temp = x; x = z; z = temp; }
			   if (x == y) {
				  if (x == z) {
				  	  blocks[++count].x = x;
					  blocks[count].y = y;
					  blocks[count].z = z;
				  }
				  else {
                   	     blocks[++count].x = x;
					     blocks[count].y = y;
					     blocks[count].z = z;
				   	     if (x > z) {
					      blocks[++count].x = x;
					      blocks[count].y = z;
					     }
					     else {
                                blocks[++count].x = z;
					            blocks[count].y = x;
					     }
					     blocks[count].z = x;
				  }
			   }
               else {
                        if (x > y) {
                           blocks[++count].x = x;
					       blocks[count].y = y;
						}
						else {
							    blocks[++count].x = y;
					            blocks[count].y = x;
						}
	  					blocks[count].z = z;
                        if (x > z) {
                           blocks[++count].x = x;
					       blocks[count].y = z;
						}
						else {
							    blocks[++count].x = z;
					            blocks[count].y = x;
						}
						blocks[count].z = y;
                        
						if (y > z) {
                           blocks[++count].x = y;
					       blocks[count].y = z;
						}
						else {
							    blocks[++count].x = z;
					            blocks[count].y = y;
						}
						blocks[count].z = x;
			   }
		}
      n = count;
	  sort();
	  maxH[n+1] = 0;
	  for (i = 1; i <= n; i++) {
		  maxH[i] = 0;
          bx = blocks[i].x;
          by = blocks[i].y;
          for (j = i + 1; j <= n; j++) 
		    if ((blocks[j].x < bx) && (blocks[j].y < by))
			    maxH[i] += blocks[j].z;
	  }
 	  find(1);
	  printResult();
	}
    return 0;
 }
