package volume4;
/**
 * 492 Pig-Latin: 小心 readLine() 要把 \r 也印出來, 不能採取 windows 模式
 * 測驗結果: 0.470 ms
 * 測驗日期: 2008-10-03
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_492 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[2048000];
	
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
					// Java 專用檢查碼
					// (如果解題遇到 RE 表示這一題必須以 Binary I/O 解題)
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
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
	
	public static boolean isVowel(char ch) {
		char low = Character.toLowerCase(ch);
		boolean result = false;

		switch(low) {
			case 'a': case 'e': case 'i': case 'o': case 'u':
				result = true;
		}
		
		return result;
	}
	
	public static void main(String[] args) {
		String line = readLine();
		StringBuffer sbuf = new StringBuffer();
		boolean word_mode = false;
		char ch;
		int i;
		int word_begin = 0;
		
		while(line!=null) {			
			for(i=0;i<line.length();i++) {
				ch = line.charAt(i);
				if(word_mode) {
					if(!Character.isLetter(ch)) {
						ch = line.charAt(word_begin);
						if(isVowel(ch)) {
							sbuf.append(line.substring(word_begin,i));
						} else {
							sbuf.append(line.substring(word_begin+1,i));
							sbuf.append(ch);
						}
						sbuf.append("ay");
						sbuf.append(line.charAt(i));
						word_mode = false;
					}
				} else {
					if(Character.isLetter(ch)) {
						word_begin = i;
						word_mode = true;
					} else {
						sbuf.append(ch);
					}
				}
			}
			
			if(word_mode) {
				ch = line.charAt(word_begin);
				if(isVowel(ch)) {
					sbuf.append(line.substring(word_begin,i));
				} else {
					sbuf.append(line.substring(word_begin+1,i));
					sbuf.append(ch);
				}
				sbuf.append("ay");
				word_mode = false;
			}
			
			System.out.println(sbuf.toString());			
			sbuf.delete(0,sbuf.length());
			line = readLine();
		}
	}

}
