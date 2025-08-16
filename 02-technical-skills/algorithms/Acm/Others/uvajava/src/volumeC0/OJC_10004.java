package volumeC0;
/**
 * 10004 Bicoloring: 無向圖, 不斷打掉無法形成多邊形的邊, 跑 19701 次之內就可以解
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10004 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	public static boolean[][] graph = new boolean[199][199];

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
	
	// 檢查有沒有 3,5,7,9,11,... 邊形
	public static boolean existPolygon(int begin, int maxedge) {
		int i;
		for(i=3;i<=maxedge;i+=2) {
			
		}
		return false;
	}
	
	public static void main(String[] args) {
		int i;
		int n; // 1<n<200
		int l; // 邊個數
		//int v1, v2;
		
		n = parseInt(readToken());
		while(n>0) {
			l = parseInt(readToken());
			
			for(i=0;i<l;i++) {
				
			}
			
			n = parseInt(readToken());
		}
	}

}
