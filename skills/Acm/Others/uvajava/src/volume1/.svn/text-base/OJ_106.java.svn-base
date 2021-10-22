package volume1;
import java.util.Vector;

/**
 * 106 Fermat vs. Pythagoras: 必須採用必殺數學公式, 這題的關鍵是外圈開根號降低 BigO (不用公式必死!!)
 * 測驗結果: 通過 1.960ms
 * 測驗日期: 2008-08-18
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_106 {

	public static final double ROOT2 = Math.sqrt(2);

	public static Vector<Byte> input_buf = new Vector<Byte>();

	public static String readLine() {
		int ch_code;
		boolean end_flag = false;
		final int EOF = -1;

		try {
			do {
				ch_code = System.in.read();
				if(ch_code==EOF||ch_code=='\n') {
					end_flag = true;
				} else {
					if(ch_code!='\r') input_buf.add((byte)ch_code);
				}
			} while(!end_flag);
		} catch(Exception e) {
			return null;
		}

		if(ch_code==EOF&&input_buf.size()==0) return null;
		byte[] bytes = new byte[input_buf.size()];
		for(int i=0;i<input_buf.size();i++) bytes[i] = input_buf.get(i);
		input_buf.clear();

		return new String(bytes);
	}
	
	public static int gcd(int a, int b) {
		do {
			if(a>b) {
				a = a%b;
			} else {
				b = b%a;
			}
		} while(a>0&&b>0);
		return Math.max(a,b);
	}

	public static boolean isRelativePrime(int x, int y, int z) {
		int gcd_xy = gcd(x,y);
		if(gcd_xy==1) return true;
		int gcd_yz = gcd(y,z);
		if(gcd_yz==1) return true;
		if(gcd(gcd_xy,gcd_yz)==1) return true;
		return false;
	}
	
	public static void main(String[] args) {
		int n;
		boolean[] used;
		int notused,solution;
		String line;
		
		do {
			line = readLine();
			if(line!=null) {
				n = Integer.parseInt(line);
				notused = 0;
				solution = 0;
				used = new boolean[n+1];

				//------------------------------------------------
				// (r^2-s^2)^2 + (2*r*s)^2 = (r^2+s^2)^2
				//------------------------------------------------
				// x = r^2-s^2 = (r+s)(r-s)
				// y = 2rs
				// z = r^2+s^2 = (r+s)^2-2rs
				// -----------------------------------------------
				// 2 < r < sqrt(n)
				// 1 < s < r
				// -----------------------------------------------
				// r = {2,3,4,...,sqrt(n)}
				// s = {1},{1,2},{1,2,3},...,{1,2,3,...,sqrt(n)-1}
				// So Time(n) = (sqrt(n)-1)[1+(sqrt(n)-1)]/2
				//            = sqrt(n)(sqrt(n)-1)/2
				//            = (n-sqrt(n))/2
				// BigO(n) is n
				// -----------------------------------------------
				int root_n = (int)Math.floor(Math.sqrt(n));
				for(int r=2;r<=root_n;r++) {
					for(int s=1;s<=r;s++) {
						if(s==r) continue;
						int rs_add = r+s;
						int x = rs_add*(r-s);
						int y = 2*r*s;
						int z = rs_add*rs_add-y;
						if(z<=n) {
							if(isRelativePrime(x,y,z)) {
								solution++;
								used[x] = true;
								used[y] = true;
								used[z] = true;
								int m=2;
								int mx,my,mz=2*z;
								while(mz<=n) {
									mx = m*x;
									my = m*y;
									used[mx] = true;
									used[my] = true;
									used[mz] = true;
									m++;
									mz = m*z;
								}
							}
						} else {
							break;
						}
					}
				}
		
				for(int i=1;i<=n;i++) {
					if(!used[i]) notused++;
				}
				System.out.println(solution+" "+notused);
			}
		} while(line!=null);
	}

}
