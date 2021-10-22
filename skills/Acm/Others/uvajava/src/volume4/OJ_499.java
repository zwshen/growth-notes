package volume4;
/**
 * 499 What's The Frequency, Kenneth?: Easy ^^
 * 測驗結果: 0.150 ms
 * 測驗日期: 2008-10-03
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_499 {

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
	
	public static int charindex(char ch) {
		if(ch>='A'&&ch<='Z') return ch-65;
		if(ch>='a'&&ch<='z') return ch-71;
		return -1;
	}
	
	public static void main(String[] args) {
		int i;
		int index;
		int maxcount;
		int[] wcount = new int[52]; 
		
		String line = readLine();
		StringBuffer sbuf = new StringBuffer();
		
		while(line!=null) {
			maxcount = 0;
			for(i=0;i<52;i++) wcount[i] = 0;
			
			for(i=0;i<line.length();i++) {
				index = charindex(line.charAt(i));
				if(index!=-1) {
					wcount[index]++;
					if(wcount[index]>maxcount) maxcount = wcount[index];
				}
			}
			
			for(i=0;i<26;i++) {
				if(wcount[i]==maxcount) {
					char ch = (char)(i+65);
					System.out.print(ch);
				}
			}

			for(i=26;i<52;i++) {
				if(wcount[i]==maxcount) {
					char ch = (char)(i+71);
					System.out.print(ch);
				}
			}
			
			sbuf.append(' ');
			sbuf.append(maxcount);
			System.out.println(sbuf);
			
			sbuf.delete(0,sbuf.length());
			line = readLine();
		}
	}

}
