package volumeC0;
/**
 * 10019 Funny Encryption Method: 位元運算+高速16進位轉型
 * 測驗結果: 0.090ms
 * 測驗日期: 2008-09-23
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10019 {
	
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
	
	// 轉成 int 型態 (比 Integer.parseInt() 快)
	public static int parseHexInt(String s) {
		int i;
		int mul = 16;
		int value = s.charAt(s.length()-1)-48;
		
		for(i=s.length()-2;i>=0;i--) {
			value += (s.charAt(i)-48)*mul;
			mul <<= 4;
		}
		
		return value;
	}
	
	// 計算2進位中1的個數
	public static int countOnes(int value) {
		int count = 0;
		int mask  = 1;
		while(mask<=value) {
			if((value&mask)!=0) count++;
			mask <<= 1;
		}
		return count;
	}
	
	public static void main(String[] args) {
		int n = parseInt(readToken());
		int b1,b2;
		String number;
		
		for(int i=0;i<n;i++) {
			number = readToken();
			b1 = countOnes(parseInt(number));
			b2 = countOnes(parseHexInt(number));
			System.out.println(b1+" "+b2);
		}
	}

}
