/* 
 * A solution for "The Trip" problem.
 * UVa ID: 10137
 * 
 * Problem description:
 * http://icpcres.ecs.baylor.edu/onlinejudge/external/101/10137.html
 *
 * @author Joana M. F. da Trindade
 * @date 2008.03.09
 */
#include <stdio.h>

int main (int argc, const char * argv[]) {
	/* number of students in the trip */
	long numOfStudents;
	
	/* the total sum of money spent */
	double total;
	
	/* the total amount of money to exchange in order to equalize */
	double exchange;
	
	/* the equalized trip amount to be payed by each student */
	double equalizedAmount;
	
	/* difference between the equalized amount and the amount spent */
	double diff;
	
	/* sum of all negative differences */
	double negativeSum;
	
	/* sum of all positive differences */
	double positiveSum;
	
	/* iterator */
	int i;
	
	while(scanf("%ld", &numOfStudents) != EOF) {
				
		/* 0, ends the program */
		if (!numOfStudents) {
			return 0;
		}
		
		/* keeps the amount of money spent by each student */
		double amountSpent[numOfStudents];		
		
		/* clean */
		total = 0;
		negativeSum = 0;
		positiveSum = 0;
				
		for (i = 0; i < numOfStudents; i++) {
			scanf("%lf\n", &amountSpent[i]);
			total += amountSpent[i];
		}
				
		equalizedAmount = total / numOfStudents;
		
		for (i = 0; i < numOfStudents; i++) {
			/* to ensure 0.01 precision */
			diff = (double) (long) ((amountSpent[i] - equalizedAmount) * 100) / 100.0;
			
			if (diff < 0) {
				negativeSum += diff;
			} else { 
				positiveSum += diff;
			}
		}

		/* when the total amount is even, these sums do not differ. otherwise, they differ in one cent */
		exchange = (-negativeSum > positiveSum) ? -negativeSum : positiveSum;
						
		/* output result */
		printf("$%.2lf\n", exchange);
	}

    return 0;
}