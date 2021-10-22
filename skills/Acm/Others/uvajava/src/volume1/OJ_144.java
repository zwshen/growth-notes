package volume1;
/**
 * 144 Student Grants: 模擬
 * 測驗結果: 通過 0.110 ms
 * 測驗日期: 2008-10-14
 * 
 * @author Raymond Wu (小璋丸)
 */

public class OJ_144 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");

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
		int value;
		
		if(s.charAt(0)=='-') {
			value = 48-s.charAt(s.length()-1);
			for(i=s.length()-2;i>=1;i--) {
				value -= (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		} else {
			value = s.charAt(s.length()-1)-48;
			for(i=s.length()-2;i>=0;i--) {
				value += (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		}
		
		return value;
	}
	
	public static void main(String[] args) {
		int i;
		int n = parseInt(readToken());
		int k = parseInt(readToken());
		int coins;
		int leave;
		int remain;
		int student;
		int[] amount = new int[25];
		StringBuffer sbuf = new StringBuffer();

		while(n>0||k>0) {
			coins = 1;
			leave = 0;
			remain = 0;
			student = -1;
			for(i=0;i<n;i++) amount[i] = 0;
			
			while(leave<n) {
				// 換人
				do {
					student = (student+1)%n;
				} while(amount[student]>=40);
				
				// 吐錢
				if(remain>0) {
					// 有剩下的錢就吐剩下的錢
					amount[student] += remain;
				} else {
					// 沒有剩餘的錢就依序吐錢 (1,2,3,...,k,1,2,3,...)
					amount[student] += coins;
					coins = (coins%k)+1;
				}
				
				// 計算剩下的錢
				if(amount[student]>=40) {
					remain = amount[student] - 40;
					leave++;
					sbuf.append(String.format("%3d",student+1));
				} else {
					remain = 0;
				}
			}
			
			System.out.println(sbuf);
			sbuf.delete(0,sbuf.length());
			
			n = parseInt(readToken());
			k = parseInt(readToken());
		} 
	}

}
