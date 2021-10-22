package volume1;
import java.math.BigDecimal;

/**
 * 113 Power of Cryptography: 自然對數 (暴力法危險,因式分解大數連除過多必死)
 * 測驗結果: 0.430 ms
 * 測驗日期: 2008-09-15
 * @author Raymond Wu (小璋丸)
 */
public class OJ_113 {
	
	// 緩衝區
	public static int cinoff;                            // 緩衝區資料的開始位置
	public static int cinend;                            // 緩衝區資料的結束位置
	public static final int CINBUF_SIZE = 4096;          // 緩衝區容量
	public static byte[] cinbuf = new byte[CINBUF_SIZE]; // 緩衝區記憶體

	// int 型態最大值的大數, 用來檢查是否可轉換為 int 運算
	public static final BigDecimal DOUBLEMAX = new BigDecimal(Double.MAX_VALUE);
	public static double lndmax = Math.log(Double.MAX_VALUE);

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

	public static int root(BigDecimal p, int n) {
		// k^n = p
		// ln(k^n) = ln(p)
		// n*ln(k) = ln(p)
		// ln(k) = ln(p)/n
		// k = e^(ln(p)/n)
		//
		// 過程中要算很多 double 一定不會精確, 但是最後四捨五入一定 ok
		// 因為答案必定為整數, 所以這可以這樣搞

		int i;
		double exp;
		
		i = 0;
		while(p.compareTo(DOUBLEMAX)==1) {
			p = p.divide(DOUBLEMAX,BigDecimal.ROUND_HALF_UP);
			i++;
		}
		exp = (Math.log(p.doubleValue())+lndmax*i)/n;

		return (int)Math.round(Math.pow(Math.E,exp));
	}
	
	public static void main(String[] args) {
		// 讀取輸入資料
		BigDecimal value;
		int exponent;
		String line = readLine();
		while(line!=null) {
			exponent = Integer.parseInt(line);
			value = new BigDecimal(readLine());
			System.out.println(root(value,exponent));
			line  = readLine();
		}
	}

}
