package volume4;
import java.math.BigInteger;

/**
 * 495 Fibonacci Freeze: I/O改良 + 轉型改良 + 字串緩衝 (測試資料非常多,用內建API容易TLE)
 * 測驗結果: 通過 1.590ms, 不用字串緩衝 2.070ms
 * 測驗日期: 2008-09-13
 * @author Raymond Wu (小璋丸)
 */
public class OJ_495 {

	public static int cinoff;                            // 緩衝區資料的開始位置
	public static int cinend;                            // 緩衝區資料的結束位置
	public static final int CINBUF_SIZE = 4096;          // 緩衝區容量
	public static byte[] cinbuf = new byte[CINBUF_SIZE]; // 緩衝區記憶體

	public static String[] febs = new String[5001];
	
	public static String readLine() {
		byte b;
		int begin = -1;
		int tklen = 0;
		
		try {
			// 尋找起始點
			while(begin==-1) {
				// 無資料時讀取新資料
				if(cinoff==cinend) {
					cinoff = 0;
					cinend = System.in.read(cinbuf);
					if(cinend==-1) break;
				}
				
				while(cinoff<cinend) {
					b = cinbuf[cinoff++];
					if(b!=13&&b!=10) {
						begin = cinoff-1;
						break;
					}
				}
			}

			// 尋找結束點
			if(begin!=-1) {
				while(tklen==0) {
					// 無資料時讀取新資料
					if(cinoff==cinend) {
						if(cinoff==CINBUF_SIZE) {
							cinoff = cinend-begin;
							System.arraycopy(cinbuf,begin,cinbuf,0,cinoff);							
							begin = 0;
						}
						cinend = cinoff+System.in.read(cinbuf,cinoff,CINBUF_SIZE-cinoff);
					}

					while(cinoff<cinend) {
						b = cinbuf[cinoff++];
						if(b==13||b==10) {
							tklen = cinoff-begin-1;
							break;
						}
					}
				}
			}
		} catch(Exception e) {
			return null;
		}

		if(tklen==0||cinend==-1) return null;
		return new String(cinbuf,begin,tklen);
	}
	
	// 轉成 int 型態
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
		int i,n;
		BigInteger curr;
		BigInteger prev2 = BigInteger.ZERO;
		BigInteger prev1 = BigInteger.ONE;
		for(i=2;i<=5000;i++) {
			curr = prev2.add(prev1);
			febs[i] = curr.toString();
			prev2 = prev1;
			prev1 = curr;
		}

		febs[0] = "0";
		febs[1] = "1";
		String token = readLine();
		StringBuffer sbuf = new StringBuffer();
		while(token!=null) {
			n = parseInt(token);
			sbuf.append("The Fibonacci number for ")
			    .append(n)
			    .append(" is ")
			    .append(febs[n])
			    .append('\n');
			token = readLine();
		}
		System.out.print(sbuf);
	}

}
