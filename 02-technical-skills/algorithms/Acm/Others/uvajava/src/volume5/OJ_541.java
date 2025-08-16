package volume5;
/**
 * 541 Error Correction: 兩個陣列就搞定了
 * 測驗結果: 0.240 ms
 * 測驗日期: 2008-10-04
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_541 {

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
	
	public static int[] rowsum = new int[99];
	public static int[] colsum = new int[99];
	
	public static void main(String[] args) {
		int i,j;
		int entry;
		int oddcol;
		int oddrow;
		int oddcc;
		int oddrc;
		int n = parseInt(readToken());
		
		while(n>0) {
			// 清除列/欄和
			for(i=0;i<n;i++) {
				rowsum[i] = 0;
				colsum[i] = 0;
			}
			
			// 計算列/欄和
			for(i=0;i<n;i++) {
				for(j=0;j<n;j++) {
					entry = parseInt(readToken());
					rowsum[i] += entry;
					colsum[j] += entry;
				}
			}
			
			// 計算奇數和列個數與出現位置
			oddrow = 0;
			oddcol = 0;
			oddrc = 0;
			oddcc = 0;
			for(i=0;i<n;i++) {
				if((rowsum[i]&1)==1) {
					oddrow = i;
					oddrc++;
				}
				if((colsum[i]&1)==1) {
					oddcol = i;
					oddcc++;
				}
			}
			
			if(oddrc==0&&oddcc==0) {
				System.out.println("OK");
			} else {
				if(oddrc==1&&oddcc==1) {
					System.out.printf("Change bit (%d,%d)\n",oddrow+1,oddcol+1);
				} else {
					System.out.println("Corrupt");
				}
			}
			
			n = parseInt(readToken());
		}
	}

}
