package volume1;
import java.util.Arrays;

/**
 * 146 ID Codes: 交換及排序
 * 測驗結果: 通過 0.090ms
 * 測驗日期: 2008-09-29 
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_146 {

	public static byte[] cinbuf = new byte[1024];
	
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
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(cinbuf[offset-1]=='\r') offset--; // window 要去除 '\r' 字元
		return new String(cinbuf,0,offset);
	}
	
	// 進行排列
	public static String nextId(String previd) {
		int li,ri;
		char temp;
		char[] chars = previd.toCharArray();
		String result = null;
		
		for(ri=chars.length-1;ri>=1;ri--) {
			for(li=ri-1;li>=0;li--) {
				if(chars[li]<chars[ri]) {
					temp = chars[li];
					chars[li] = chars[ri];
					chars[ri] = temp;
					Arrays.sort(chars,li+1,chars.length);
					result = new String(chars);
					break;
				}
			}
			if(result!=null) break;
		}
		
		
		return result;
	}

	public static void main(String[] args) {
		String id;
		String line = readLine();
		
		while(!line.equals("#")) {
			id = nextId(line); 
			if(id!=null) {
				System.out.println(id);
			} else {
				System.out.println("No Successor");
			}
			line = readLine();
		}
	}

}
