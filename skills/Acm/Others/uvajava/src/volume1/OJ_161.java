package volume1;
/**
 * 161 Traffic Light: 暴力法
 * 測驗結果: 0.210 ms
 * 測驗日期: 2008-09-29
 * 
 * 黃=5, 綠=k-5, 紅=k, 整體週期 2k
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_161 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];

	// 讀取一個單字 (英文姓名包含空白時請不要用)
	public static String readToken() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 略過非單字的字元 '\t','\n','\r',' '
			bytedata = System.in.read();
			while(bytedata==9||bytedata==10||bytedata==13||bytedata==32) {
				bytedata = System.in.read();
			}

			// 載入單字的字元
			while(bytedata!=-1) {
				if(bytedata==9||bytedata==10||bytedata==13||bytedata==32) {
					break;
				} else {
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}
		
		if(offset+bytedata==-1) return null; // 串流結束
		return new String(cinbuf,0,offset);
	}
	
	// 轉成 int 型態 (比 Integer.parseInt() 快)
	public static int parseInt(String s) {
		int i;
		int mul = 10;
		int value = s.charAt(s.length()-1)-48;
		
		for(i=s.length()-2;i>=0;i--) {
			value += (s.charAt(i)-48)*mul;
			mul *= 10;
		}
		
		return value;
	}
	
	// 第 n 秒的時候, 是否所有燈號都為綠燈
	public static boolean isGreen(int seconds) {
		int light;
		for(light=0;light<light_count;light++) {
			if(seconds%period[light]>=green[light]) break;
		}
		return light==light_count;
	}
	
	public static int light_count;
	public static int[] green  = new int[100];
	public static int[] period = new int[100];
	
	public static void main(String[] args) {
		final int LIMIT = 18000;
		int min;
		int secs;
		
		while(true) {
			// 讀取紅綠燈週期
			light_count = 0;
			min = Integer.MAX_VALUE;
			secs = parseInt(readToken());
			if(secs==0) break;
			
			while(secs>0) {
				green[light_count]  = secs-5;  // 綠燈為 k-5
				period[light_count] = secs<<1; // 週期為 2k
				if(period[light_count]<min) min = period[light_count];
				light_count++;
				secs = parseInt(readToken());
			}
			
			// 取得全綠燈的秒數
			for(secs=min;secs<=LIMIT;secs++) { 
				if(isGreen(secs)) break;
			}
	
			// 輸出
			if(secs<=LIMIT) {
				int ss = secs%60; secs /= 60;
				int mm = secs%60;
				int hh = secs/60;
				System.out.printf("%02d:%02d:%02d\n",hh,mm,ss);
			} else {
				System.out.println("Signals fail to synchronise in 5 hours");
			}
		}
	}

}
