package volume3;
/**
 * 382 Perfection: 平方根 (1是陷阱)
 * 測驗結果: 0.130 ms
 * 測驗日期: 2008-09-29
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_382 {

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
	
	// 因數和
	public static int sof(int value) {
		if(value==1) return 0;
		
		int sum = 1;
		double root = Math.sqrt(value);
		
		for(int i=2;i<root;i++) {
			if(value%i==0) {
				sum += i;
				sum += value/i;
			}
		}
		
		if(root==Math.floor(root)&&value%root==0) sum += root;
		
		return sum;
	}
	
	public static void main(String[] args) {
		int sum;
		int n = parseInt(readToken());

		System.out.println("PERFECTION OUTPUT");
		while(n!=0) {
			sum = sof(n);
			System.out.printf("%5d",n);
			
			if(n==sum) {
				System.out.println("  PERFECT");
			} else {
				if(n>sum) {
					System.out.println("  DEFICIENT");
				} else {
					System.out.println("  ABUNDANT");
				}
			}
			
			n = parseInt(readToken());
		}
		System.out.println("END OF OUTPUT");
	}

}
