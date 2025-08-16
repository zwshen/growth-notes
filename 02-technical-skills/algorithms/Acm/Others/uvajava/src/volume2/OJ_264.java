package volume2;
/**
 * 264 Count on Cantor: Easy ^^
 * 測驗結果: 0.410 ms
 * 測驗日期: 2008-09-29
 * 
 * 先假設斜線是右上到左下
 * 第 n 條斜線會有 n 個元素
 * 第 n 條斜線的分子分母相加為 n+1
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_264 {

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
	
	public static void main(String[] args) {
		int s; // 分子
		int m; // 第幾條斜線
		int n; // 第幾項
		String token = readToken();
		
		while(token!=null) {
			n = parseInt(token);
			s = n;
			m = 1;
			while(s>m) {
				s-=m;
				m++;
			}
			if((m&1)==1) s = m+1-s;
			System.out.printf("TERM %d IS %d/%d\n",n,s,m+1-s);
			token = readToken();
		}
	}

}
