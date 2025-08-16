package volumeC0;
/**
 * 10010 Waldorf: 修正型暴力法 (單字長的時候有些區域無解)
 * 測驗結果: 通過 0.200ms
 * 測驗日期: 2008-10-16
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10010 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");

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
					if(WINDOWS&&bytedata==13) bytedata = System.in.read();
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
		int value = s.charAt(s.length()-1)-48;
		
		for(i=s.length()-2;i>=0;i--) {
			value += (s.charAt(i)-48)*mul;
			mul *= 10;
		}
		
		return value;
	}
	
	// 文字矩陣
	public static int m, n;
	public static int mx_row, mx_col;
	public static byte[][] matrix = new byte[50][];
	
	public static boolean match(char[] chs, int row, int col, int rowinc, int colinc) {
		int i;
		for(i=1;i<chs.length;i++) {
			row += rowinc;
			col += colinc;
			if(chs[i]!=matrix[row][col]) break;
		}
		return (i==chs.length);
	}

	public static void wardorf(String word) {
		char[] chs = word.toCharArray();
		int row=0, col=0;
		boolean uflag,dflag,lflag,rflag;
		int dblen = chs.length<<1;
		int ns_top=-1, ns_height=0;
		int ns_left=-1, ns_right=0;

		// 字數很多就可以採取邊框尋找, 先計算出無解區域的數值
		if(dblen>m) {
			ns_height = dblen-m-2;
			ns_top    = m-chs.length+1;
			ns_left   = n-chs.length+1;
			ns_right  = chs.length-2;
		}
		
		// 如果字數太少也只能暴力解
		for(col=0;col<n;col++) {
			lflag = (col+1>=chs.length);
			rflag = (n-col>=chs.length);

			for(row=0;row<m;row++) {
				// 進入無解區域時就跳過
				if(row==ns_top) {
					if(col>=ns_left&&col<=ns_right) {
						row += ns_height-1;
						continue;
					}
				}

				if(chs[0]==matrix[row][col]) {
					uflag = (row+1>=chs.length);
					dflag = (m-row>=chs.length);
					if(uflag) if(match(chs,row,col,-1,0)) break; // 往上找
					if(dflag) if(match(chs,row,col,1,0))  break; // 往下找
					if(lflag) if(match(chs,row,col,0,-1)) break; // 往左找
					if(rflag) if(match(chs,row,col,0,1))  break; // 往右找
					if(lflag&&uflag) if(match(chs,row,col,-1,-1)) break; // 左上
					if(lflag&&dflag) if(match(chs,row,col,1,-1))  break; // 左下
					if(rflag&&uflag) if(match(chs,row,col,-1,1))  break; // 右上
					if(rflag&&dflag) if(match(chs,row,col,1,1))   break; // 右下
				}
			}
			if(row<m) break;
		}
		
		mx_row = row+1;
		mx_col = col+1;
	}
	
	public static void main(String[] args) {
		int i,j;		
		int word_count;
		int case_count = parseInt(readLine());

		StringBuffer sbuf = new StringBuffer();
		for(i=0;i<case_count;i++) {
			readLine();
			m = parseInt(readToken());
			n = parseInt(readToken());
			for(j=0;j<m;j++) matrix[j] = readLine().toUpperCase().getBytes();

			if(i>0) sbuf.append('\n');
			word_count = parseInt(readLine());
			for(j=0;j<word_count;j++) {
				wardorf(readLine().toUpperCase());
				sbuf.append(mx_row);
				sbuf.append(' ');
				sbuf.append(mx_col);
				sbuf.append('\n');
			}
			System.out.print(sbuf);
			sbuf.delete(0,sbuf.length());
		}
	}

}
