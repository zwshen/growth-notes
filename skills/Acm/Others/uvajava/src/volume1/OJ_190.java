package volume1;

/**
 * 190 Circle Through Three Points: 解二元一次聯立方程式
 * 測驗結果: 通過 0.110ms
 * 測驗日期: 2009-04-21
 * 
 * !!注意英文敘述
 * Print a single blank line "after" each equation pair.
 * Print a single blank line "between" each equation pair.
 * 如果是 after, 答案最後面也要一行空白行
 * 如果是 between, 答案最後面不要有空白行
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_190 {

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

	public static double xa,ya,xb,yb,xc,yc;
	public static StringBuffer sbuf = new StringBuffer();
	
	public static String formatDouble(double d) {
		String s = String.format("%.3f",d);
		return s.charAt(0)=='-' ? s.substring(1) : s;		
	} 
	
	public static void calc() {
		double t1,t2;
		
		// 算出 A-B, A-C 兩條垂直平分線 L1,L2
		// L1:   a1x + b1y + c1 = 0
		//     = 2(xb-xa)x + 2(yb-ya)y + (xa^2+ya^2-xb^2-yb^2) = 0
		// L2:   a2x + b2y + c2 = 0
		//     = 2(xc-xa)x + 2(yc-ya)y + (xa^2+ya^2-xc^2-yc^2) = 0
		t1 = xa*xa+ya*ya;
		double a1 = 2*(xb-xa);
		double b1 = 2*(yb-ya);
		double c1 = t1-xb*xb-yb*yb;
		double a2 = 2*(xc-xa);
		double b2 = 2*(yc-ya);
		double c2 = t1-xc*xc-yc*yc;
		
		// 計算垂直平分線的交點 (外心)
		//       b1c2 - b2c1          a2c1 - a1c2
		// xr = ------------- , yr = -------------
		//       a1b2 - a2b1          a1b2 - b2b1
		t1 = a1*b2-a2*b1;
		double xr = (b1*c2-b2*c1)/t1;
		double yr = (a2*c1-a1*c2)/t1;
		
		// 計算半徑
		// [(xa-xr)^2+(ya-yr)^2]^0.5
		t1 = xa-xr;
		t2 = ya-yr;
		double rq = t1*t1+t2*t2;
		double r  = Math.sqrt(rq);
		
		// (x - xr)^2 + (y - yr)^2 = r^2
		// x^2 + y^2 - 2*xr*x - 2*yr*y + (xr^2+yr^2-r^2) = 0
		String sgx = xr<0 ? "+ " : "- ";
		String sgy = yr<0 ? "+ " : "- ";
		double c = xr*xr+yr*yr-rq;
		
		sbuf.append("(x ");
		sbuf.append(sgx).append(formatDouble(xr));
		sbuf.append(")^2 + (y ");
		sbuf.append(sgy).append(formatDouble(yr));
		sbuf.append(")^2 = ");
		sbuf.append(formatDouble(r));
		sbuf.append("^2\nx^2 + y^2 ");
		sbuf.append(sgx).append(formatDouble(2*xr));
		sbuf.append("x ");
		sbuf.append(sgy).append(formatDouble(2*yr));
		sbuf.append("y ");
		sbuf.append(c>0 ? "+ " : "- ").append(formatDouble(c));
		sbuf.append(" = 0\n\n");
	}

	public static void main(String[] args) {
		String token = readToken();
		
		while(token!=null) {
			xa = Double.parseDouble(token);
			ya = Double.parseDouble(readToken());
			xb = Double.parseDouble(readToken());
			yb = Double.parseDouble(readToken());
			xc = Double.parseDouble(readToken());
			yc = Double.parseDouble(readToken());
			calc();
			token = readToken();
		}
		
		System.out.print(sbuf);
	}

}
