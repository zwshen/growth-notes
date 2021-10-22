package volumeC0;
import java.math.BigInteger;

/**
 * 10070 Leap Year or Not Leap Year and ...: 大數運算 (最後一行不可以空白)
 * 測驗結果: 通過 0.350ms
 * 測驗日期: 2008-10-16
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10070 {

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
	
	public static BigInteger bi4   = new BigInteger("4");
	public static BigInteger bi100 = new BigInteger("100");
	public static BigInteger bi400 = new BigInteger("400");
	
	// 檢查是否為閏年
	public static boolean isLeapYear(BigInteger year) {
		if(year.mod(bi4).equals(BigInteger.ZERO)) {
			if(year.mod(bi100).equals(BigInteger.ZERO)&&!year.mod(bi400).equals(BigInteger.ZERO)) {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
	
	public static void main(String[] args) {
		String line = readLine();
		BigInteger year;
		BigInteger bi15 = new BigInteger("15");
		BigInteger bi55 = new BigInteger("55");
		boolean isleap;
		boolean ishulu;
		boolean isbulu;
	
		while(line!=null) {
			year = new BigInteger(line);
			isleap = false;
			ishulu = false;
			isbulu = false;
			
			ishulu = year.mod(bi15).equals(BigInteger.ZERO);
			isleap = isLeapYear(year);
			if(isleap) isbulu =year.mod(bi55).equals(BigInteger.ZERO);
			
			if(isleap) System.out.println("This is leap year.");
			if(ishulu) System.out.println("This is huluculu festival year.");
			if(isbulu) System.out.println("This is bulukulu festival year.");
			if(!isleap&&!ishulu&&!isbulu) System.out.println("This is an ordinary year.");

			line = readLine();
			if(line!=null) System.out.println();
		}
	}

}
