package volume1;
import java.util.HashMap;
import java.util.Map;

/**
 * 115 Climbing Trees: 尋根樹 (注意兄弟姊妹的判別, 兩個都 0th 才是喔)
 * 測驗結果: 0.130 ms
 * 測驗日期: 2009-02-09
 * 
 * @author Raymond Wu (小璋丸)
 */

class Person {
	private Person parent;
	
	/**
	 * 設定祖先
	 * @param parent
	 */
	public void setParent(Person parent) {
		this.parent = parent;
	}
	
	/**
	 * 取得祖先
	 * @return
	 */
	public Person getParent() {
		return parent;
	}
	
	/**
	 * 檢查某人是否為自己的祖先
	 * @param ancestor 祖先
	 * @return 輩份差
	 */
	public int isAncestor(Person ancestor) {
		int bf = 1;
		Person ath = parent;
		while(ath!=null) {
			if(ath==ancestor) return bf;
			bf++;
			ath = ath.getParent();
		}
		return 0;
	}
}

public class OJ_115 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// readLine() 時是否要丟棄 \r (解碼題目必須設為 false)
	public static final boolean IGNORE_R = true;
	
	// 讀取一行
	public static String readLine() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 載入整行
			bytedata = System.in.read();
			while(bytedata!=-1) {
				if(bytedata==10) {
					break;
				} else {
					// 出現非 ASCII 字元故意 RE, 以便改採 Binary I/O
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(IGNORE_R && cinbuf[offset-1]=='\r') offset--;
		
		return new String(cinbuf,0,offset);
	}

	public static Map<String,Person> people = new HashMap<String,Person>();
	public static StringBuffer sbuf = new StringBuffer();

	/**
	 * 查出兩人的親屬關係
	 * @param p1 路人甲
	 * @param p2 路人乙
	 * @return 查詢結果
	 */
	public static String findRelation(Person p1, Person p2) {
		int i;
		int dist;
		sbuf.delete(0,sbuf.length());
		
		if(p1!=null&&p2!=null) {
			// p1 是 p2 的子孫
			dist = p1.isAncestor(p2);
			if(dist>0) {
				for(i=3;i<=dist;i++) sbuf.append("great ");
				if(dist>1) sbuf.append("grand ");
				sbuf.append("child");				
				return sbuf.toString();
			}

			// p1 是 p2 的祖先
			dist = p2.isAncestor(p1);
			if(dist>0) {
				for(i=3;i<=dist;i++) sbuf.append("great ");
				if(dist>1) sbuf.append("grand ");
				sbuf.append("parent");				
				return sbuf.toString();
			}
			
			// 追溯源頭
			int th = 1;
			Person ath = p1.getParent();
			while(ath!=null) {
				dist = p2.isAncestor(ath);
				if(dist>0) {
					// 兄弟姊妹
					if(th==1&&dist==1) return "sibling";
					
					// 遠親
					int level = Math.min(th,dist)-1;
					int removed = Math.abs(th-dist);
					sbuf.append(level).append(" cousin");
					if(removed>0) sbuf.append(" removed ").append(removed);
					return sbuf.toString();
				}
				th++;
				ath = ath.getParent();
			}
		}
	
		return "no relation";
	}
	
	public static void main(String[] args) {
		final String INPUT_DIV = "no.child no.parent";
		
		int sploc;
		String line;
		Person p;
		Person q;
		String pname;
		String qname;
		
		line = readLine();
		while(!line.equals(INPUT_DIV)) {
			sploc = line.indexOf(' ');
			pname = line.substring(0,sploc);
			qname = line.substring(sploc+1);
			p = people.get(pname);
			q = people.get(qname);
			if(p==null) {
				p = new Person();
				people.put(pname,p);
			}			
			if(q==null) {
				q = new Person();
				people.put(qname,q);
			}
			p.setParent(q);
			line = readLine();
		}
		
		line = readLine();
		while(line!=null) {
			sploc = line.indexOf(' ');
			pname = line.substring(0,sploc);
			qname = line.substring(sploc+1);
			p = people.get(pname);
			q = people.get(qname);
			System.out.println(findRelation(p,q));
			line = readLine();
		}
	}

}
