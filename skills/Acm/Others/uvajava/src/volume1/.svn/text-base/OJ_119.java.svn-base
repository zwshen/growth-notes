package volume1;
import java.util.HashMap;
import java.util.Map;
import java.util.StringTokenizer;

/**
 * 119 Greedy Gift Givers: 不需要演算法 (姓名以陣列+Hash雙向處理)
 * 測驗結果: 0.100 ms
 * 測驗日期: 2008-09-09
 * @author Raymond Wu (小璋丸)
 */
public class OJ_119 {

	public static char[] cinbuf = new char[256];
	public static int[] remain = new int[10];
	public static String[] names = new String[10];
	public static Map<String,Integer> ids = new HashMap<String,Integer>();

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

	public static void main(String[] args) {
		int i, id;
		int pcount, gcount;
		int price, avg;
		String from, to;
		String line = readLine();
		
		while(line!=null) {
			pcount = Integer.parseInt(line);
			for(i=0;i<pcount;i++) remain[i] = 0;

			// 紀錄姓名
			StringTokenizer st = new StringTokenizer(readLine());
			for(i=0;i<pcount;i++) {
				names[i] = st.nextToken();
				ids.put(names[i],i);
			}

			// 讀取收禮狀況
			line = readLine();
			while(line!=null) {
				if(line.charAt(0)<'A') break;
				st = new StringTokenizer(line);
				from  = st.nextToken();
				price = Integer.parseInt(st.nextToken());
				gcount = Integer.parseInt(st.nextToken());
				if(gcount>0) {
					id = ids.get(from);
					remain[id] -= price;
					remain[id] += price%gcount; // 零頭自己收下
					avg = price/gcount;
					for(i=0;i<gcount;i++) {
						to = st.nextToken();
						id = ids.get(to);
						remain[id] += avg;
					}
				}
				line = readLine();
			}
			
			// 顯示計算結果
			for(i=0;i<pcount;i++) {
				System.out.printf("%s %d\n",names[i],remain[i]);
			}
			if(line!=null) System.out.println();
		}
	}

}
