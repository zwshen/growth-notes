package volumeC0;
/**
 * 10055 Hashmat the brave warrior: I/O改良 + 轉型改良 + 字串緩衝 (測試資料非常多,用內建API容易TLE)
 * 測驗結果: 通過 0.400ms, 不用字串緩衝 2.870ms
 * 測驗日期: 2008-9-13
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10055 {

	public static int cinoff;                            // 緩衝區資料的開始位置
	public static int cinend;                            // 緩衝區資料的結束位置
	public static final int CINBUF_SIZE = 4096;          // 緩衝區容量
	public static byte[] cinbuf = new byte[CINBUF_SIZE]; // 緩衝區記憶體

	// 讀取一個單字
	public static String readToken() {
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
					if(b!=32&&b!=13&&b!=10) {
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
						if(b==32||b==13||b==10) {
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

	// 轉成 long 型態 (比 Long.parseLong() 快)
	public static long parseLong(String s) {
		int i;
		long mul = 10;
		long value = s.charAt(s.length()-1)-48;
		
		for(i=s.length()-2;i>=0;i--) {
			value += (s.charAt(i)-48)*mul;
			mul *= 10;
		}
		
		return value;
	}
	
	public static void main(String[] args) {
		String token = readToken();
		StringBuffer sbuf = new StringBuffer();

		while(token!=null) {
			long a = parseLong(token);
			long b = parseLong(readToken());
			sbuf.append(Math.abs(a-b)).append('\n');
			token = readToken();
		}
		System.out.print(sbuf);
	}

}
