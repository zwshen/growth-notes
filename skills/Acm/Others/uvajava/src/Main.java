/**
 * ### 解你老木: 狗屁演算法 (測資很機車)
 * 測驗結果: x.xx0 ms
 * 測驗日期: 200y-mm-dd
 * 
 * @author Raymond Wu (小璋丸)
 */
public class Main {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// readLine() 時是否要丟棄 \r (解碼題目必須設為 false)
	public static final boolean IGNORE_R = true;

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
					// 避免 readToken(), readLine() 交錯使用時發生問題
					if(bytedata==13) System.in.read();
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
					// 出現非 ASCII 字元故意 RE, 以便改採 Binary I/O
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(IGNORE_R && cinbuf[offset-1]=='\r') offset--;
		
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
		int a;
		int b;
		double c;
		
		a = parseInt(readToken());
		b = parseInt(readToken());
		System.out.println((int)Math.pow(a,b));
		
		a = parseInt(readToken());
		c = Math.sqrt(a);
		if(c>0.0005) c-=0.0005;
		System.out.printf("%.3f\n",c);
		
		a = parseInt(readToken());
		System.out.println(Math.abs(a));
		
		a = parseInt(readToken());
		b = parseInt(readToken());
		System.out.println((a+b)/2);
	}

}
