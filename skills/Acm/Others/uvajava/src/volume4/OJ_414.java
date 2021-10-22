package volume4;
/**
 * 414 Mechined Surface: 想像成俄羅斯方塊拼起來
 * 測驗結果: 0.100 ms
 * 測驗日期: 2008-10-02
 * 
 * 所有空白數 - 最小單列空白數*n
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_414 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
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
		int i,j;
		int n = parseInt(readLine());
		int sp_min;
		int sp_total;
		int sp_count;
		String line;

		while(n>0) {
			sp_min = 25;
			sp_total = 0;
			
			for(i=0;i<n;i++) {
				j = 1;
				sp_count = 0;
				line = readLine();
				
				// 跳過左側的 X
				while(j<25) {
					if(line.charAt(j)=='X') {
						j++;
					} else {
						break;
					}
				}
				
				// 計算 space 個數
				if(j<24) {
					while(line.charAt(j)==' ') {
						j++;
						sp_count++;
					}
				}
				
				// 檢查 space 個數是否為相對小的值
				if(sp_count<sp_min) sp_min = sp_count;
				sp_total += sp_count;
			}
			
			System.out.println(sp_total-sp_min*n);
			n = parseInt(readLine());
		}
	}

}
