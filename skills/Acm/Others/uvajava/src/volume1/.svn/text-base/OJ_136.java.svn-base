package volume1;
/**
 * 136 Ugly Numbers: 採取動態規劃法, 用舊資料取樣加篩選算出新資料
 * 測驗結果: 0.170ms
 * 測驗日期: 2008-08-22
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_136 {

	public static void main(String[] args) {
		int m2,m3,m5;
		int selected;
		int[] ugly = new int[1500]; 
		ugly[0] = 1;
		
		for(int i=1;i<1500;i++) {
			// 求 ugly[i]
			// 從 ugly[0]~ugly[i-1] 每一項分別乘上 2,3,5
			// 看看哪一個能超過 ugly[i-1], 超過且最小者就是 ugly[i]
			selected = Integer.MAX_VALUE;
			for(int j=0;j<i;j++) {
				m2 = ugly[j]*2;
				m3 = ugly[j]*3;
				m5 = ugly[j]*5;
				if(m2>ugly[i-1]&&m2<selected) selected = m2;
				if(m3>ugly[i-1]&&m3<selected) selected = m3;
				if(m5>ugly[i-1]&&m5<selected) selected = m5;
			}
			ugly[i] = selected;
		}
		
		System.out.printf("The 1500'th ugly number is %d.\n",ugly[1499]);
	}

}
