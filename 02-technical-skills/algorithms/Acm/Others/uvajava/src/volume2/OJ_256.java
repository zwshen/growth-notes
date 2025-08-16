package volume2;
/**
 * 256 Quirksome Squares: 將問題轉換成1元2次方程式, 判別式檢查是否為完全平方
 * 測驗結果: 0.140 ms
 * 測驗日期: 2008-09-11
 * 
 * n = 2, (x+y)^2 = 10x+y
 *        y^2 + (2x-1)y + (x^2-10x) = 0
 *        x,y<10
 * n = 4, (x+y)^2 = 100x+y 
 *        y^2 + (2x-1)y + (x^2-100x) = 0
 *        x,y<100
 * n = 6, (x+y)^2 = 1000x+y 
 *        y^2 + (2x-1)y + (x^2-1000x) = 0
 *        x,y<1000
 * n = 8, (x+y)^2 = 10000x+y 
 *        y^2 + (2x-1)y + (x^2-10000x) = 0
 *        x,y<10000
 *
 * 先循序代入 a 再求1元2次方程式就可以形成sqrt(n)的時間複雜度        
 *        
 * @author Raymond Wu (小璋丸)
 */
public class OJ_256 {

	public static char[] cinbuf = new char[256];

	public static String readLine() {
		int ch, offset = 0;

		try {
			do {
				ch = System.in.read();
				if(ch!='\r'&&ch!='\n'&&ch!=-1) {
					cinbuf[offset++] = (char)ch;
				}
			} while(ch!='\n'&&ch!=-1);
			if(ch==-1&&offset==0) return null;
		} catch(Exception e) { 
			return null; 
		}

		return new String(cinbuf,0,offset);
	}
	
	// 檢查是不是完全平方數, 是的話就傳回平方根, 否則傳回 -1
	public static int isSquare(int n) {
		if(n<0) return -1;
		double root = Math.sqrt(n);
		if(root!=Math.floor(root)) {
			return -1; 
		} else {
			return (int)root;
		}
	}
	
	public static void main(String[] args) {
		int x,y;
		int b,c; // 2元1次方程式的係數
		int crt; // 判別式的平方根
		int max,half;
		String format;
		String line = readLine();

		while(line!=null) {
			half = Integer.parseInt(line)/2;
			max = (int)Math.pow(10,half);
			format = "%0"+half+"d";  
			for(x=0;x<max;x++) {
				// 計算係數與判別式
				b = 2*x-1;     // 1次項係數
				c = x*(x-max); // 0次項係數
				crt = isSquare(b*b-4*c);
				if(crt>=0) {
					if(crt==0) {
						y = b*b/2;
						System.out.printf(format,x);
						System.out.printf(format,y);
						System.out.println();
					} else {
						y = (int)(-1*(b+crt))/2;
						if(y>=0&&y<max) {
							System.out.printf(format,x);
							System.out.printf(format,y);
							System.out.println();
						}
						y = (int)(crt-b)/2;
						if(y<max) {
							System.out.printf(format,x);
							System.out.printf(format,y);
							System.out.println();
						}
					}
				}
			}
			line = readLine();
		}
	}

}
