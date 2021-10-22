package volume2;
/**
 * 278 Chess: 國王和騎士排看看然後導公式就可以了
 * 測驗結果: 0.100 ms
 * 測驗日期: 2008-09-30
 * 
 * 國王最高密度排法
 * oxoxoxo
 * xxxxxxx
 * oxoxoxo
 * xxxxxxx
 * m 為偶數 n 為偶數 m/2 * n/2
 * m 為奇數 n 為偶數 m/2+1 * n/2
 * m 為偶數 n 為奇數 m/2 * n/2+1
 * m 為奇數 n 為奇數 m/2+1 * n/2+1
 * 程式實際算法 ((m+1)/2)*((n+1)/2)
 * 
 * 騎士最高密度排法
 * oxoxo
 * xoxox
 * oxoxo
 * xoxox
 * oxoxo
 * m*n 為偶數 m*n/2
 * m*n 為奇數 m*n/2+1
 * 程式實際算法 (m*n+1)/2
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_278 {
	
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
	
	// 計算最密的排法
	public static int maxchess(char chess, int m, int n) {
		int count = 0;
		
		switch(chess) {
			case 'r': case 'Q':
				count = Math.min(m,n);
				break;
			case 'k':
				count = (m*n+1)/2;
				break;
			case 'K':
				count = ((m+1)/2)*((n+1)/2);
		}
		
		return count;
	}
	
	public static void main(String[] args) {
		char chess;
		int m;
		int n;
		int num = parseInt(readToken());

		for(int i=0;i<num;i++) {
			chess = readToken().charAt(0);
			m = parseInt(readToken());
			n = parseInt(readToken());
			System.out.println(maxchess(chess,m,n));
		}
	}

}
