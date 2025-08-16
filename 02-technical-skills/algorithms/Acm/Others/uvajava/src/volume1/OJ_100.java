package volume1;
import java.util.Stack;
import java.util.StringTokenizer;

/**
 * 100 The 3n+1 problem: 動態規劃+有限快取 (UVa新系統暴力法必死!!)
 * 測驗結果: 通過 0.410ms
 * 測驗日期: 2008-08-12
 * 
 * @author Raymond Wu
 */
public class OJ_100 {

	public static char[] cinbuf = new char[256];
	private static final int CACHE_LIMIT = 5000000;
	private static int[] cl_cache;
	private static Stack<Long> cl_items;

	public static int cycleLength(long n) {
		int cl = 0;
		int cl_known = 0;

		do {
			if(n<CACHE_LIMIT) cl_known = cl_cache[(int)n];
			if(cl_known!=0) {
				cl = cl_known;
				while(cl_items.size()!=0) {
					long prev = cl_items.pop();
					cl++;
					if(prev<CACHE_LIMIT) cl_cache[(int)prev] = cl;
				}
			} else {
				cl_items.add(n);
				if(n%2==0) {
					n = n>>1;
				} else {
					n = 3*n+1;
				}
			}
		} while(cl==0);

		return cl;
	}

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
			if(ch==-1&&offset==0) return null; // 輸入結束且最後一行沒資料
		} catch(Exception e) { 
			return null; 
		}

		return new String(cinbuf,0,offset);
	}
	
	public static void main(String[] args) throws Exception {
		cl_cache = new int[CACHE_LIMIT];
		cl_items = new Stack<Long>();
		cl_cache[1] = 1;

		String line;
		do {
			line = readLine();
			if(line!=null) {
				StringTokenizer st = new StringTokenizer(line);
				long from = Long.parseLong(st.nextToken());
				long to   = Long.parseLong(st.nextToken());
				long min  = Math.min(from,to);
				long max  = Math.max(from,to);
				int cl, maxcl = 0;			
				for(long i=min;i<=max;i++) {
					cl = cycleLength(i);
					if(cl>maxcl) maxcl = cl;
				}
				System.out.printf("%d %d %d\n",from,to,maxcl);
			}
		} while(line!=null);
	}

}
