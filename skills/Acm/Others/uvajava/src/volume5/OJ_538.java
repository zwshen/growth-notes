package volume5;
import java.util.HashMap;
import java.util.Map;

/**
 * 538 Balancing Bank Accounts: Greedy (最凱的給最窮的, 最後要多一行否則會 PE =.=)
 * 測驗結果: 0.930 ms
 * 測驗日期: 2008-09-18
 * @author Raymond Wu (小璋丸)
 */
public class OJ_538 {

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
	
	public static int p_count;
	public static int[] balance = new int[20];
	public static String[] names = new String[20];
	public static Map<String,Integer> id = new HashMap<String,Integer>();
	
	public static int findRich() {
		int id = -1;
		int max = 0;
		
		for(int i=0;i<p_count;i++) {
			if(balance[i]>max) {
				max = balance[i];
				id = i;
			}
		}
		
		return id;
	}
	
	public static int findPoor() {
		int id = -1;
		int min = 0;
		
		for(int i=0;i<p_count;i++) {
			if(balance[i]<min) {
				min = balance[i];
				id = i;
			}
		}
		
		return id;
	}
	
	public static void main(String[] args) {
		int i;
		int num = 1;
		
		p_count = parseInt(readToken());
		int t_count = parseInt(readToken());
		int dollars;
		int id_poor, id_rich;
		
		while(p_count!=0||t_count!=0) {			
			for(i=0;i<p_count;i++) {
				balance[i] = 0;
				names[i] = readToken(); 
				id.put(names[i],i);
			}
			
			for(i=0;i<t_count;i++) {
				id_poor = id.get(readToken());
				id_rich  = id.get(readToken());
				dollars = parseInt(readToken());
				balance[id_poor] -= dollars;
				balance[id_rich] += dollars;
			}
			
			System.out.print("Case #");
			System.out.println(num);
			id_rich = findRich();
			while(id_rich!=-1) {
				id_poor = findPoor();
				dollars = Math.min(balance[id_rich],~balance[id_poor]+1);
				balance[id_rich] -= dollars;
				balance[id_poor] += dollars;
				System.out.print(names[id_rich]);
				System.out.print(' ');
				System.out.print(names[id_poor]);
				System.out.print(' ');
				System.out.println(dollars);
				id_rich = findRich();
			}
			
			p_count = parseInt(readToken());
			t_count = parseInt(readToken());
			num++;
			
			System.out.println();
		}
	}

}
