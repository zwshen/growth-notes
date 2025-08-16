package volume1;
import java.math.BigInteger;

/**
 * 128 Software CRC: 大數運算 (輸入值非常多, 最好加上 StringBuffer)
 * 測驗結果: 0.700 ms
 * 測驗日期: 2008-10-11
 * 
 * @author Raymond Wu
 */
public class OJ_128 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[2048];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");
	
	// 讀取一行
	public static byte[] readLineBytes() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 載入整行
			bytedata = System.in.read();
			while(bytedata!=-1) {
				if(bytedata==10) {
					break;
				} else {
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(WINDOWS&&bytedata>-1) offset--;    // Windows 要少算一個字元

		byte[] bytes = new byte[offset];
		System.arraycopy(cinbuf,0,bytes,0,offset);
		return bytes;
	}
	
	// 16 進位數字表
	public static char[] hexdigit = {
		'0','1','2','3','4','5','6','7',
		'8','9','A','B','C','D','E','F'
	};
	
	// 查表法取16進位字串 (避免TLE!!)
	public static String parseHex(int value) {
		int digit;
		char[] chs = new char[5];
		chs[2] = ' ';
		digit = (value&0xF000)>>12;
		chs[0] = hexdigit[digit];
		digit = (value&0xF00)>>8;
		chs[1] = hexdigit[digit];
		digit = (value&0xF0)>>4;
		chs[3] = hexdigit[digit];
		digit = (value&0xF);
		chs[4] = hexdigit[digit];
		return new String(chs);
	}
	
	public static void main(String[] args) {
		int crc;
		BigInteger bint;
		BigInteger bdiv = new BigInteger("34943");
		boolean finish = false;
		byte[] bytes = readLineBytes();
		StringBuffer sbuf = new StringBuffer();
		
		while(!finish) {
			if(bytes.length>0) {
				bint = new BigInteger(bytes);
				bint = bint.shiftLeft(16);
				crc  = 34943-bint.mod(bdiv).intValue();
				sbuf.append(parseHex(crc)).append('\n');
			} else {
				sbuf.append("00 00\n");
			}
			bytes = readLineBytes();
			if(bytes.length==1) finish = (bytes[0]=='#');
		}
		System.out.print(sbuf);
	}

}
