package volume1;
/**
 * 151 Power Crisis: 很簡單的呢, 題目比較難懂而已
 * 測驗結果: 0.060 ms
 * 測驗日期: 2008-09-09
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_151 {
	
	public static boolean[] turnoff = new boolean[100];
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

	public static int showStop(int n, int m) {
		int visit = 0;
		int off_count = 1;
		int rnd_count;
	
		for(int i=1;i<n;i++) turnoff[i] = false;
		
		do {
			rnd_count = 0;
			while(rnd_count<m) {
				visit = (visit+1)%n;
				if(!turnoff[visit]) rnd_count++;
			}
			turnoff[visit] = true;
			off_count++;
		} while(off_count<n);

		return (visit+1);
	}
	
	public static void main(String[] args) {
		turnoff[0] = true;
		int n = Integer.parseInt(readLine());
		int m; 
		
		while(n!=0) {
			m = 1;
			while(showStop(n,m)!=13) m++;
			System.out.println(m);
			n = Integer.parseInt(readLine());
		}
	}

}
