package volume3;
/**
 * 356 Square Pegs And Round Holes: 計算圓內外點的個數 (0<x,y<n, 據說這題有公式解)
 * 測驗結果: 0.300 ms
 * 測驗日期: 2008-09-15
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_356 {

	public static int cinoff;                            // 緩衝區資料的開始位置
	public static int cinend;                            // 緩衝區資料的結束位置
	public static final int CINBUF_SIZE = 4096;          // 緩衝區容量
	public static byte[] cinbuf = new byte[CINBUF_SIZE]; // 緩衝區記憶體

	// 讀取一行
	public static String readLine() {
		byte b = 0;
		int begin = -1;
		int tklen = -1;
		
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
				while(tklen==-1) {
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

		if(tklen<=0&&cinend==-1) return null;
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
		int n;
		int x,y,d;
		int cpl,out,seg;
		double round_sq;
		String line = readLine();
		
		while(line!=null) {
			n = parseInt(line);
			round_sq = n-0.5;
			round_sq *= round_sq;
			cpl = 0;
			out = 0;

			for(x=1;x<n;x++) {
				for(y=1;y<n;y++) {
					d = x*x+y*y;
					if(d<round_sq) cpl++;
					if(d>round_sq) {
						out += (n-y);
						break;
					}
				}
			}

			seg = (n*n-cpl-out) << 2;
			cpl <<= 2;
			System.out.printf("In the case n = %d, %d cells contain segments of the circle.\n",n,seg);
			System.out.printf("There are %d cells completely contained in the circle.\n",cpl);
			
			line = readLine();
			if(line!=null) System.out.println();
		}
	}

}
