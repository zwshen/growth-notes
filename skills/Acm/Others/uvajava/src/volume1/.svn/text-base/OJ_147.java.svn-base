package volume1;
/**
 * 147 Dollars: 問題分割+動態規劃+整數化運算 (!!不用動態規劃一定跑不完)
 * 測驗結果: 通過 1.430ms
 * 測驗日期: 2008-08-26
 *
 * @author Raymond Wu (小璋丸)
 */
public class OJ_147 {

	public static char[] cinbuf = new char[256];
	public static long[][] cache  = new long[6000][9]; // 用面額xx以下換錢的方法數

	// 紐幣面額表 (故意乘20,整數算比較快)
	public static final int[] COINS = {2000,1000,400,200,100,40,20,10,4,2,1}; 
	
	// 遞迴算換錢方法數
	public static long getMethodCount(int total, int selected_coin) {
		// 搞到用 5 分錢換一定就只有一種方法
		if(selected_coin==10) return 1L;
		
		// 快取過的話就傳回快取
		long methods;
		if(selected_coin>0) {
			methods = cache[total-1][selected_coin];
			if(methods!=0) return methods;
		}

		// 進行實際的計算
		int single = COINS[selected_coin-1];
		int remain = total;
		methods = 0;
		while(remain>0) {
			methods += getMethodCount(remain,selected_coin+1);
			remain  -= single;
		}
		if(remain==0) methods++; // 還沒用到5分錢卻剛剛好用完的話也是一種方法喔

		// 紀錄計算結果到快取
		cache[total-1][selected_coin-1] = methods;

		return methods;
	}
	
	// 讀取一行輸入
	public static String readLine() {
		int ch;
		int offset = 0;

		try {
			do {
				ch = System.in.read();
				if(ch>'\r') cinbuf[offset++] = (char)ch;
			} while(ch!='\n'&&ch!=-1);
			if(ch==-1&&offset==0) return null;
		} catch(Exception e) { 
			return null; 
		}

		return new String(cinbuf,0,offset);
	}

	public static void main(String[] args) {
		String line      = readLine();
		float  total     = Float.parseFloat(line);
		int    total_int = (int)(total*20);
		while(total>0) {
			System.out.printf("%6.2f%17d\n",total,getMethodCount(total_int,0));
			line      = readLine();
			total     = Float.parseFloat(line);
			total_int = (int)(total*20);
		}
	}

}
