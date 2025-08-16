package volume3;
/**
 * 344 Roman Digititis: 簡單的
 * 測驗結果: 0.150 ms
 * 測驗日期: 2008-09-30
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_344 {

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
	
	public static class RomanDigit {
		public int i; // 1   個數
		public int v; // 5   個數
		public int x; // 10  個數
		public int l; // 50  個數
		public int c; // 100 個數
		
		public RomanDigit(int number) {
			// 判斷百位數
			if(number==100) c = 1;
			
			// 判斷十位數
			int ten = number/10;
			switch(ten) {
				case 9:                  // 90 xc
					x = 1; c = 1; break;
				case 8: case 7: case 6: // 60~80 lx~lxxx
					l = 1; x = ten%5; break;
				case 5:                  // 50 l
					l = 1; break;
				case 4:                  // 40 xl
					l = 1; x = 1; break;
				case 3: case 2: case 1: // 10~30 x~xxx
					x = ten%5;
			}			
			
			// 判斷個位數
			int one = number%10;
			switch(one) {
				case 9:                  // 9 ix
					i = 1; x++; break;
				case 8: case 7: case 6: // 6~8 vi~viii
					v = 1; i = one%5; break;
				case 5:                  // 5 v
					v = 1; break;
				case 4:                  // 4 iv
					i = 1; v = 1; break;
				case 3: case 2: case 1: // 1~3 i~iii
					i = one%5;
			}
		}
	}
	
	public static void main(String[] args) {
		int number;
		int curr, prev;
		int[] i = new int[100];
		int[] v = new int[100];
		int[] x = new int[100];
		int[] l = new int[100];
		int[] c = new int[100];
		
		// 答案全部先算出來
		RomanDigit rd = new RomanDigit(1);
		i[0] = rd.i;
		v[0] = rd.v;
		x[0] = rd.x;
		l[0] = rd.l;
		c[0] = rd.c;
		
		for(int j=2;j<=100;j++) {
			rd = new RomanDigit(j);
			curr = j-1;
			prev = j-2;
			i[curr] = rd.i + i[prev];
			v[curr] = rd.v + v[prev];
			x[curr] = rd.x + x[prev];
			l[curr] = rd.l + l[prev];
			c[curr] = rd.c + c[prev];
		}
		
		number = parseInt(readToken());
		while(number>0) {
			curr = number-1;
			System.out.printf("%d: %d i, %d v, %d x, %d l, %d c\n",number,i[curr],v[curr],x[curr],l[curr],c[curr]);
			number = parseInt(readToken());
		}
	}

}
