package volume5;
/**
 * 543 Goldbach's Conjecture: 查表法 (記憶體灌爆用查表, 不要二分搜尋)
 * 測驗結果: 1.950 ms
 * 測驗日期: 2008-10-04
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_543 {

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
	
	public static int[] primetable = new int[78498];
	public static boolean[] isprime = new boolean[999998];
	
	public static void main(String[] args) {
		int i,j;
		int p1,p2,pc;
		double limit;
		StringBuffer sbuf = new StringBuffer();

		// 建立質數表
		pc = 1;
		primetable[0] = 2;
		for(i=3;i<999999;i+=2) {
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
		
		p2 = 0;
		i = parseInt(readLine());
		while(i>0) {
			j = 1;
			limit = i/2;
			p1 = primetable[j++];
			
			while(p1<=limit) {
				p2 = i - p1;
				if(isprime[p2]) break;
				p1 = primetable[j++];
			}
			
			sbuf.append(i).append(" = ").append(p1).append(" + ").append(p2);
			System.out.println(sbuf);
			sbuf.delete(0,sbuf.length());
			i = parseInt(readLine());
		}
	}

}
