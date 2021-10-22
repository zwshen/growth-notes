package volumeC6;
/**
 * 10696 f91: 不要真得用遞迴 =.= (Java 如果沒用 StringBuffer 必死, 症狀和 10055 類似)
 * 測驗結果: 0.630ms
 * 測驗日期: 2008-09-15
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10696 {
	
	public static int cinoff;                            // 緩衝區資料的開始位置
	public static int cinend;                            // 緩衝區資料的結束位置
	public static final int CINBUF_SIZE = 4096;          // 緩衝區容量
	public static byte[] cinbuf = new byte[CINBUF_SIZE]; // 緩衝區記憶體

	// 讀取一行
	public static String readLine() {
		byte b = 0;
		int begin = -1;
		int tklen = 0;
		
		try {
			// 離開上一次的 \r\n
			if(cinoff!=cinend) {
				if(cinbuf[cinoff]==13) cinoff++;
				if(cinbuf[cinoff]==10) cinoff++;
			}

			// 尋找起始點
			if(cinoff==cinend) {
				cinoff = 0;
				cinend = System.in.read(cinbuf);
			}
			if(cinend!=-1) begin = cinoff;

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

		if(tklen==0&&cinend==-1) return null;
		return new String(cinbuf,begin,tklen);
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
		int f91;
		int n = parseInt(readLine());
		StringBuffer sbuf = new StringBuffer();

		while(n>0) {
			f91 = n>101 ? n-10 : 91;
			sbuf.append("f91(").append(n).append(") = ").append(f91).append('\n');
			n = parseInt(readLine());
		}
		
		System.out.print(sbuf);
	}

}
