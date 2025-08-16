/* @JUDGE_ID: 13160EW 573 C++ */
// 06/08/03 21:53:32
// Q573: The Snail
//@BEGIN_OF_SOURCE_CODE

#include <stdio.h>

int main()
{ 
	int h,u,d,f;
	int day;
	float now;
	float down;
	while(1) {
		scanf("%d %d %d %d",&h,&u,&d,&f);
		if( h == 0 ) break; // ����
		down = u*f*0.01;
		if( u > h ) {
			// �Ĥ@�ѴNsuccess
			printf("success on day 1\n");
			continue;
		}
		if( u-d < 0 ) {
			// �Ĥ@�ѴNfailure
			printf("failure on day 1\n");
			continue;
		}
		// �ĤG�Ѷ}�l
		day = 1;		
		now = u-d; // �ĤG�Ѷ}�l������	
		while(1) {
			day++;
//			printf("[ day:%d ]\t%f + ",day,now);
			if( (float)u - down*(day-1) > 0)
				now += (float)u - down*(day-1);
//			printf("( %f ) %f ",(float)u - down*(day-1),now);
			if( now > h ) {
				// success
				printf("success on day %d\n",day);
				break;
			}		
			// �ߤW�U��
			now -= d;
			if( now < 0 ) {
				// success
				printf("failure on day %d\n",day);
				break;
			}		
		}
	} // end while
		

	return 0;
}

//@END_OF_SOURCE_CODE
