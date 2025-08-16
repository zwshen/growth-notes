package volume3;
/**
 * 362 18,000 Seconds Remaining: 小心最後面必需要換兩行 =.=
 * 測驗結果: 通過 1.050ms
 * 測驗日期: 2008-09-16
 * @author Raymond Wu (小璋丸)
 */
public class OJ_362 {

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
		int num = 1;
		long total_size = parseLong(readLine());
		long packet_size, received_size, last5_size;
		long elapsed;
		StringBuffer sbuf = new StringBuffer();
		
		while(total_size!=0) {
			last5_size = 0;
			elapsed = 0;
			received_size = 0;
			
			sbuf.append("Output for data set ");
			sbuf.append(num);
			sbuf.append(", ");
			sbuf.append(total_size);
			sbuf.append(" bytes:\n");

			while(received_size<total_size) {
				packet_size = parseLong(readLine());
				last5_size += packet_size;
				received_size += packet_size;
				elapsed++;

				if(elapsed%5==0) {
					if(last5_size>0) {
						long remaining = (total_size-received_size)*5;
						if(remaining%last5_size==0) {
							remaining /= last5_size;
						} else {
							remaining = remaining/last5_size+1;
						}
						sbuf.append("   Time remaining: ");
						sbuf.append(remaining);
						sbuf.append(" seconds\n");
						last5_size = 0;
					} else {
						sbuf.append("   Time remaining: stalled\n");
					}
				}
			}
			
			sbuf.append("Total time: ");
			sbuf.append(elapsed);
			sbuf.append(" seconds\n\n");
			total_size = parseLong(readLine());
			num++;
		}

		System.out.print(sbuf);
	}

}
