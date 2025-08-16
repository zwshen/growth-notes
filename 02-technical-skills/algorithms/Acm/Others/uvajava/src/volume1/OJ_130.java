package volume1;
/**
 * 130 Roman Roulette: LinkedList (收屍手續很麻煩要小心)
 * 測驗結果: 通過 0.100 ms
 * 測驗日期: 2008-10-15
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_130 {

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
	
	// 繞圈圈結構
	public static class Person {
		int id;
		Person left;
		public Person(int id) {
			this.id = id;
		}
	}
	
	// 計算從第一個人算起最後誰被殺
	public static int findSurviver(int n, int k) {
		int i;
		Person first;
		Person curr;
		Person prev;
		Person killed;
		Person kright;
		
		// 產生 n 個人
		first = new Person(1);
		prev = first;
		for(i=2;i<=n;i++) {
			curr = new Person(i);
			prev.left = curr;
			prev = curr;
		}
		prev.left = first;
		
		// 殺人囉
		curr = first;
		while(curr.left!=curr) {
			// 尋找被害者
			for(i=1;i<k;i++) {
				prev = curr;
				curr = curr.left;
			}
			kright = prev; // 記憶被害者右邊的人
			killed = curr; // 記憶被害者
			//System.out.println("殺了"+curr.id);
			
			// 尋找收屍者
			curr = curr.left;
			for(i=1;i<k;i++) {
				prev = curr;
				curr = curr.left;
				if(curr==killed) curr = curr.left;
			}
			
			if(curr==kright||curr==killed.left) {
				// 收屍者如果在被害者旁邊要特殊處理
				if(curr==kright) {
					curr.left = killed.left;
				} else {
					kright.left = curr;
				}
			} else {
				// 不在旁邊的話 ...
				prev.left = curr.left;
				curr.left = killed.left;
				kright.left = curr;
			}
			
			// 從下一個開始算
			prev = curr;
			curr = curr.left;
		}
		
		return curr.id;
	}
	
	public static void main(String[] args) {
		int s;
		int i;
		int n = parseInt(readToken());
		int k = parseInt(readToken());
		
		while(n>0&&k>0) {
			// 計算從第一個人算起誰能活下來
			s = findSurviver(n,k);
			// 類推應該從誰開始殺
			i = (s==1) ? 1 : n-s+2;
			System.out.println(i);
			n = parseInt(readToken());
			k = parseInt(readToken());
		}
	}

}
