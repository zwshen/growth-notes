package volume1;

/**
 * 191 Intersection: 簡單的比大小, 如果線完全被矩形包著也算交錯 T_T, 容易誤以為要和四個邊交錯
 * 測驗結果: 通過 0.084ms
 * 測驗日期: 2009-06-03
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_191 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
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
					// 避免 readToken(), readLine() 交錯使用時發生問題
					if(bytedata==13) System.in.read();
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
	
	public static int lx1,ly1,lx2,ly2;
	public static int rx1,ry1,rx2,ry2;
	
	// 檢查線段和矩形是否交錯
	public static boolean isIntersect() {
		// 檢查線段的兩個端點是否在矩形之內
		int rl = Math.min(rx1,rx2);
		int rr = Math.max(rx1,rx2);
		int rt = Math.max(ry1,ry2);
		int rb = Math.min(ry1,ry2);

		// 在矩形內直接回傳 true
		if(lx1>=rl && lx1<=rr && ly1>=rb && ly1<=rt) return true;
		if(lx2>=rl && lx2<=rr && ly2>=rb && ly2<=rt) return true;
		
		// 如果兩端點在矩形之外
		// 就求二元一次方程式的解檢查是否有貫穿點
		// 方程式: ax + by = c
		int a = ly1-ly2;
		int b = lx2-lx1;
		int ll = Math.min(lx1,lx2);
		int lr = Math.max(lx1,lx2);
		int lb = Math.min(ly1,ly2);
		int lt = Math.max(ly1,ly2);
		
		if(a==0||b==0) {
			// 水平線 y=ly1
			if(a==0&&b!=0) {
				if(ly1>=rb&&ly1<=rt) {
					if(ll<rl && lr>rr) return true;
				}
			}
			// 垂直線 x=lx1
			if(b==0&&a!=0) {
				if(lx1>=rl&&lx1<=rr) {
					if(lb<rb && lt>rt) return true;
				}
			}
		} else {
			// 斜線
			int c = a*lx1+b*ly1;
			float ix,iy;
			
			// 與上邊交錯
			ix = (float)(c-rt*b)/a;
			if(ix>=ll&&ix<=lr&&ix>=rl&&ix<=rr) return true;
			
			// 與下邊交錯
			ix = (float)(c-rb*b)/a;
			if(ix>=ll&&ix<=lr&&ix>=rl&&ix<=rr) return true;
			
			// 與左邊交錯
			iy = (float)(c-rl*a)/b;
			if(iy>=lb&&iy<=lt&&iy>=rb&&iy<=rt) return true;
			
			// 與右邊交錯
			iy = (float)(c-rr*a)/b;
			if(iy>=lb&&iy<=lt&&iy>=rb&&iy<=rt) return true;
		}
		
		return false;
	}
	
	public static void main(String[] args) {
		int n = parseInt(readToken());
		for(int i=0;i<n;i++) {
			lx1 = parseInt(readToken());
			ly1 = parseInt(readToken());
			lx2 = parseInt(readToken());
			ly2 = parseInt(readToken());
			rx1 = parseInt(readToken());
			ry1 = parseInt(readToken());
			rx2 = parseInt(readToken());
			ry2 = parseInt(readToken());
			System.out.println(isIntersect() ? 'T' : 'F');
		}
	}

}
