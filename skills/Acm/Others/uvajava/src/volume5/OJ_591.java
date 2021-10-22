package volume5;
/**
 * 591 Box of Bricks: 平均 (最後一筆也要空兩行)
 * 測驗結果: 0.110 ms
 * 測驗日期: 2008-10-06
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_591 {

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
	
	public static void main(String[] args) {
		int i;
		int n = parseInt(readToken());
		int num = 1;
		int avg;
		int move;
		int[] height = new int[50];
		StringBuffer sbuf = new StringBuffer();
		
		while(n>0) {
			avg = 0;
			for(i=0;i<n;i++) {
				height[i] = parseInt(readToken());
				avg += height[i];
			}
			
			avg /= n;
			move = 0;
			
			for(i=0;i<n;i++) {
				if(height[i]>avg) move += height[i]-avg;
			}
			
			sbuf.append("Set #");
			sbuf.append(num++);
			sbuf.append('\n');
			sbuf.append("The minimum number of moves is ");
			sbuf.append(move);
			sbuf.append(".\n");
			System.out.println(sbuf);
			sbuf.delete(0,sbuf.length());
			
			n = parseInt(readToken());
		}
	}

}
