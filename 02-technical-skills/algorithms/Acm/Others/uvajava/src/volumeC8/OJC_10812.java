package volumeC8;
import java.util.StringTokenizer;

/**
 * 10812 Beat the Spread!: 數學式導一導就好
 * 測驗結果: 通過 0.140ms
 * 測驗日期: 2008-09-01
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10812 {

	public static char[] cinbuf = new char[256];

	public static String readLine() {
		int ch;
		int offset = 0;

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

	public static void main(String[] args) {
		int n = Integer.parseInt(readLine());
		int s,d;
		int sds,sdd;
		
		for(int i=0;i<n;i++) {
			StringTokenizer st = new StringTokenizer(readLine());
			s = Integer.parseInt(st.nextToken());
			d = Integer.parseInt(st.nextToken());
			sds = s+d;
			sdd = s-d;
			if((sds&1)==0&&(sdd&1)==0&&sdd>=0) {
				sds >>= 1;
				sdd >>= 1;
				System.out.printf("%d %d\n",Math.max(sds,sdd),Math.min(sds,sdd));
			} else {
				System.out.println("impossible");
			}
		}
	}

}
