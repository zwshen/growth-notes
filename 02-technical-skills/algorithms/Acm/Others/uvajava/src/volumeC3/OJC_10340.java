package volumeC3;
/**
 * 10340 All in All: 這一題記憶體要配置夠大不然一定 RE
 * 測驗結果: 0.160 ms
 * 測驗日期: 2008-09-24
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10340 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[200000];

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
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(cinbuf[offset-1]=='\r') offset--; // window 要去除 '\r' 字元
		return new String(cinbuf,0,offset);
	}
	
	// 檢查 s 是否為 t 的子集合
	public static boolean isSubsequence(String s, String t) {
		int si, ti = 0;
		
		for(si=0;si<s.length();si++) {
			ti = t.indexOf(s.charAt(si),ti);
			if(ti!=-1) {
				ti++;
			} else {
				return false;
			}
		}
		
		return true;
	}
	
	public static void main(String[] args) {
		int spoff;
		String s;
		String t;
		String line = readLine();
		
		while(line!=null) {
			spoff = line.indexOf(' ');
			s = line.substring(0,spoff);
			t = line.substring(spoff+1);
			System.out.println(isSubsequence(s,t) ? "Yes" : "No");
			line = readLine();
		}
	}

}
