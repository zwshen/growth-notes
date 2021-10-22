package volume1;
import java.util.StringTokenizer;

/**
 * 120 Stacks of Flapjacks: Greedy
 * 測驗結果: 通過 0.200 ms
 * 測驗日期: 2008-10-11
 * 
 * 1. 先找出最大值
 * 2. 若最大值在底部, 不需翻面
 *    若最大值在頂部, 整疊倒翻
 *    若最大值在中間, 先翻到頂再翻到底
 * 3. 重複n次
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_120 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");
	
	// 讀取一行
	public static String readLine() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 載入整行
			bytedata = System.in.read();
			while(bytedata!=-1) {
				if(bytedata==10) {
					break;
				} else {
					// 這一行的目的是為了判斷測試資料是否故意提供非 ASCII 字元
					// 上傳後得到 Runtime Error 就知道要改用 Binary I/O 解題
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		
		// Windows 環境上要再忽略一個 \r, Linux 則把 \r 當一般字元來用
		// 也可以上傳前拿掉這一行
		if(WINDOWS && cinbuf[offset-1]=='\r') offset--;

		return new String(cinbuf,0,offset);
	}
	
	// 轉成 int 型態 (比 Integer.parseInt() 快)
	public static int parseInt(String s) {
		int i;
		int mul = 10;
		int value;
		
		if(s.charAt(0)=='-') {
			value = 48-s.charAt(s.length()-1);
			for(i=s.length()-2;i>=1;i--) {
				value -= (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		} else {
			value = s.charAt(s.length()-1)-48;
			for(i=s.length()-2;i>=0;i--) {
				value += (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		}
		
		return value;
	}
	
	public static int cakecount;
	public static int[] pancakes = new int[30];
	
	// 翻面
	public static void flip(int bottom) {
		int up = 0;
		int down = bottom;
		int temp;
		
		while(up<down) {
			temp = pancakes[up];
			pancakes[up] = pancakes[down];
			pancakes[down] = temp;
			up++;
			down--;
		}
	}

	// 找出最大的薄餅
	public static int maxpos(int bottom) {
		int max = pancakes[bottom];
		int pos = bottom;
		
		for(int i=0;i<bottom;i++) {
			if(pancakes[i]>max) {
				max = pancakes[i];
				pos = i;
			}
		}
		
		return pos;
	}
	
	public static void main(String[] args) {
		int bottom;
		int cutpos;
		int maxpos;
		String line = readLine();
		StringTokenizer st;
		StringBuffer sbuf = new StringBuffer();
		
		while(line!=null) {
			sbuf.append(line).append('\n');
			cakecount = 0;
			st = new StringTokenizer(line);
			while(st.hasMoreTokens()) pancakes[cakecount++] = parseInt(st.nextToken());
			bottom = cakecount-1;
			
			while(bottom>0) {
				// 找出最大的薄餅
				maxpos = maxpos(bottom);
				if(maxpos<bottom) {
					if(maxpos==0) {
						cutpos = cakecount-bottom;
						sbuf.append(cutpos).append(' ');
						flip(bottom);
					} else {
						cutpos = cakecount-maxpos;
						sbuf.append(cutpos).append(' ');
						flip(maxpos);
						cutpos = cakecount-bottom;
						sbuf.append(cutpos).append(' ');
						flip(bottom);
					}
				}
				bottom--;
			}
			
			sbuf.append(0);
			System.out.println(sbuf);
			sbuf.delete(0,sbuf.length());
			line = readLine();
		} 
	}

}
