package volume1;
/**
 * 195 Anagram: 交換及排序 (當有重複字元的時候N!遞迴必死, 特別注意測資 aabbcc)
 * 測驗結果: 通過 2.440ms
 * 測驗日期: 2008-09-12  
 * 
 * 修正版: 查表, 迴圈精簡, StringBuffer
 * 測驗結果: 通過 0.240ms
 * 測驗日期: 2008-10-08
 * 
 * @author Raymond Wu
 */
public class OJ_195 {

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

	public static int[] weight = new int['z'+1]; // 字元權重值
	public static char[] chars;                   // 字串序列
	
	// 比字元大小
	public static int charCompare(char c1, char c2) {
		if(c1==c2) return 0;
		int w1 = weight[c1];
		int w2 = weight[c2];
		return w1>w2 ? 1 : -1;
	}

	// 交換
	public static void swap(int i1, int i2) {
		char temp = chars[i1];
		chars[i1] = chars[i2];
		chars[i2] = temp;
	}
	
	// 字元排序 (由小到大)
	public static void sort(int from, int to) {
		int i,j;
		for(i=from;i<to-1;i++) {
			for(j=i+1;j<to;j++) {
				if(charCompare(chars[i],chars[j])==1) swap(i,j);
			}
		}
	}
	
	// 進行排列
	public static void perm() {
		int li = 0;
		int ri = 0;
		char maxch;
		StringBuffer sbuf = new StringBuffer();
		
		// 記憶第一組
		sbuf.append(chars).append('\n');
		
		while(li>-1) {
			// 從右向左搜尋, 若有一個元素大於目前元素則
			// 1. 搜尋比目前小且位於最右邊的字母
			// 2. 與目前字母替換
			// 3. 目前字母之後的字母進行排序
			maxch = 'A';
			for(li=chars.length-2;li>=0;li--) {
				// 記憶右側最小的字母
				if(charCompare(chars[li+1],maxch)==1) maxch = chars[li+1];
				
				// 尋找是否有可替換字母
				if(charCompare(chars[li],maxch)==-1) {
					for(ri=chars.length-1;ri>li;ri--) {
						if(charCompare(chars[li],chars[ri])==-1) {
							// 交換+排序
							swap(li,ri);
							sort(li+1,chars.length);
							// 記憶可用的排列
							sbuf.append(chars).append('\n');
							break;
						}
					}
					break;
				}
			}
		}
		
		System.out.print(sbuf);
	}

	public static void main(String[] args) {
		int i;
		String line = readLine();
		int n = parseInt(line);
		
		// 計算所有字母的權重值
		for(i='A';i<='Z';i++) weight[i] = (i-'A')<<1;
		for(i='a';i<='z';i++) weight[i] = ((i-'a')<<1)+1;
		
		// 執行 anagram
		for(i=0;i<n;i++) { 
			line = readLine();
			chars = line.toCharArray();
			sort(0,chars.length);
			perm();
		}
	}

}
