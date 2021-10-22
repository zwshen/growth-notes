package volume1;
import java.util.Collections;
import java.util.Iterator;
import java.util.StringTokenizer;
import java.util.TreeMap;
import java.util.Vector;

/**
 * 123 Searching Quickly: 二元樹+二分搜尋 (用 JCF API 可輕鬆解決)
 * 測驗結果: 0.190 ms
 * 測驗日期: 2008-10-13
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_123 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");

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
					// 這一行的目的是為了判斷測試資料是否故意提供非 ASCII 字元
					// 上傳後得到 Runtime Error 就知道要改用 Binary I/O 解題
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		
		// Windows 環境上要再忽略一個 \r, Linux 則把 \r 當一般字元來用
		// 也可以上傳前拿掉這一行
		if(WINDOWS && cinbuf[offset-1]=='\r') offset--;

		return new String(cinbuf,0,offset);
	}

	// 索引集
	public static TreeMap<String,Vector<String>> results = new TreeMap<String,Vector<String>>(); 

	// 忽略字集
	public static Vector<String> ignore = new Vector<String>();
	
	public static void main(String[] args) {
		int i,j;
		String key;
		String line = readLine();
		String[] tokens;
		StringTokenizer st;
		StringBuffer sbuf = new StringBuffer();
		Vector<String> v;
		
		// 讀取忽略字清單
		while(!line.equals("::")) {
			ignore.add(line.toUpperCase());
			line = readLine();
		}
		Collections.sort(ignore);
		
		// 讀取句子
		line = readLine();
		while(line!=null) {
			// 分解所有單字
			st = new StringTokenizer(line);
			tokens = new String[st.countTokens()];
			for(i=0;i<tokens.length;i++) {
				tokens[i] = st.nextToken();
			}
			
			// 記憶到索引樹裡面
			for(i=0;i<tokens.length;i++) {
				key = tokens[i].toUpperCase();
				if(Collections.binarySearch(ignore,key)<0) {
					// 產生查詢結果字串
					for(j=0;j<tokens.length;j++) {
						if(j>0) sbuf.append(' ');
						if(j==i) {
							sbuf.append(key);
						} else {
							sbuf.append(tokens[j].toLowerCase());
						}
					}

					// 放到結果集
					v = results.get(key);
					if(v==null) {
						v = new Vector<String>();
						v.add(sbuf.toString());
						results.put(key,v);
					} else {
						v.add(sbuf.toString());
					}
					
					sbuf.delete(0,sbuf.length());
				}
			}		
			line = readLine();
		}
		
		// 列出查詢結果
		Iterator<String> keys = results.keySet().iterator();
		while(keys.hasNext()) {
			key = keys.next();
			v = results.get(key);
			for(i=0;i<v.size();i++) {
				System.out.println(v.get(i));
			}
		}
	}

}
