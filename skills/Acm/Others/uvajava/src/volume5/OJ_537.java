package volume5;
/**
 * 537 Artificial Intelligence?: Java 的 %.2f 會四捨五入要額外處理, 也要避免 -0.00
 * 測驗結果: 0.090 ms
 * 測驗日期: 2008-10-07
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_537 {

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

	public static double p; // 功率 mW
	public static double u; // 電壓 mV
	public static double i; // 電流 mI
	
	public static void getValue(String line, int eqpos) {
		// 決定要使用的單位字元
		char unit = ' ';
		switch(line.charAt(eqpos-1)) {
			case 'P': unit = 'W'; break;
			case 'U': unit = 'V'; break;
			case 'I': unit = 'A';
		}
		
		// 取得單位字元的位置
		int unitpos = line.indexOf(unit,eqpos);
		double multiple;
		switch(line.charAt(unitpos-1)) {
			case 'm':
				multiple = 0.001;
				unitpos--;
				break;
			case 'k':
				multiple = 1000;
				unitpos--;
				break;
			case 'M':
				multiple = 1000000;
				unitpos--;
				break;
			default:
				multiple = 1;
		}
		
		// 取出數值的部份
		String numstr = line.substring(eqpos+1,unitpos);
		double number = Double.parseDouble(numstr)*multiple;
		
		// 儲存數值
		switch(line.charAt(eqpos-1)) {
			case 'P': p = number; break;
			case 'U': u = number; break;
			case 'I': i = number;
		}
	}
	
	public static void main(String[] args) {
		int j;
		int num = parseInt(readLine());
		int eqpos;
		String line;
		
		for(j=1;j<=num;j++) {
			p = -1;
			u = -1;
			i = -1;
			
			line = readLine();
			eqpos = line.indexOf('=');
			if(eqpos==-1) {
				System.out.println(line);
				System.exit(0);
			}
			getValue(line,eqpos);
			eqpos = line.indexOf('=',eqpos+1);
			getValue(line,eqpos);

			System.out.print("Problem #");
			System.out.println(j);
			if(p==-1) { // 求 P, P=U*I
				p = Math.max(u*i-0.005,0.0);
				System.out.printf("P=%.2fW\n",p);
			}
			if(i==-1) { // 求 I, I=P/U
				i = Math.max(p/u-0.005,0.0);
				System.out.printf("I=%.2fA\n",i);
			}
			if(u==-1) { // 求 U, U=P/I
				u = Math.max(p/i-0.005,0.0);
				System.out.printf("U=%.2fV\n",u);
			}
			System.out.println();
		}
	}

}
