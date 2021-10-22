package volume6;
/**
 * 686 Goldbach's Conjecture (II): 質數表
 * 測驗結果: 0.100 ms
 * 測驗日期: 2008-10-06
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_686 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");
	
	// 讀取一行
	public static String readLine() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 載入整行
			bytedata = System.in.read();
			while(bytedata!=-1) {
				if(bytedata==10) {
					break;
				} else {
					// 這一行的目的是為了判斷測試資料是否故意提供非 ASCII 字元
					// 上傳後得到 Runtime Error 就知道要改用 Binary I/O 解題
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		
		// Windows 環境上要再忽略一個 \r, Linux 則把 \r 當一般字元來用
		// 也可以上傳前拿掉這一行
		if(WINDOWS && cinbuf[offset-1]=='\r') offset--;

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
	
	public static int[] primetable = new int[3512];
	public static boolean[] isprime = new boolean[32768];
	
	public static void main(String[] args) {
		// 4 <= n < 32768
		int i,j;
		int p1,p2,pc;
		double limit;
		
		// 建立質數表
		pc = 1;
		isprime[2] = true;
		primetable[0] = 2;
		for(i=3;i<32768;i+=2) {
			j = 0;
			p1 = primetable[j++];
			limit = Math.sqrt(i);
			
			while(p1<=limit) {
				if(i%p1==0) break;
				p1 = primetable[j++];
			}
			
			if(p1>limit) {
				primetable[pc++] = i;
				isprime[i] = true;
			}
		}
		
		int n = parseInt(readLine());
		int pair;

		while(n>0) {
			pc = 0;
			p1 = primetable[pc++];
			pair = 0;
			limit = n/2;
			
			while(p1<=limit) {
				p2 = n-p1;
				if(isprime[p2]) pair++; 
				p1 = primetable[pc++];
			}
			
			System.out.println(pair);
			n = parseInt(readLine());
		}
	}

}
