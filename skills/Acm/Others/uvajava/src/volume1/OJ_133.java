package volume1;
/**
 * 133 The Dole Queue: 雙向 LinkedList
 * 測驗結果: 0.130 ms
 * 測驗日期: 2008-10-16
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_133 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");

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

	// 圍圈圈用的 Linkedlist
	public static class Person {
		int id;
		Person left;
		Person right;
		public Person(int id) { this.id = id; }
	}
	
	public static void main(String[] args) {
		int i;
		int n,k,m;
		int remain;
		Person p1,p2;
		StringBuffer sbuf = new StringBuffer();
		
		// 先做出 19 人備用
		Person[] ps = new Person[19];
		for(i=0;i<19;i++) ps[i] = new Person(i+1);
		
		n = parseInt(readToken());
		while(n>0) {
			// 載入 k,m
			k = parseInt(readToken());
			m = parseInt(readToken());
			remain = n;
			
			// 圍圈圈
			for(i=0;i<n;i++) {
				if(i<n-1) ps[i].right = ps[i+1];
				if(i>0)   ps[i].left  = ps[i-1];
			}
			ps[0].left = ps[n-1];
			ps[n-1].right = ps[0];
			p1 = ps[0];
			p2 = ps[n-1];
			
			// 開始挑人
			while(remain>0) {
				for(i=1;i<k;i++) p1 = p1.right;
				for(i=1;i<m;i++) p2 = p2.left;
				if(p1==p2) {
					sbuf.append(String.format("%3d",p1.id));
					p1 = p1.right;
					p2 = p2.left;
					p1.left = p2;
					p2.right = p1;
					remain--;
				} else {
					sbuf.append(String.format("%3d",p1.id));
					sbuf.append(String.format("%3d",p2.id));
					p1.right.left = p1.left;
					p1.left.right = p1.right;
					p1 = p1.right;
					if(p1==p2) p1 = p1.right;
					p2.right.left = p2.left;
					p2.left.right = p2.right;
					p2 = p2.left;
					remain-=2;
				}
				if(remain>0) sbuf.append(',');
			}
			System.out.println(sbuf);
			sbuf.delete(0,sbuf.length());
			
			// 載入下次的 n
			n = parseInt(readToken());
		}
	}

}
