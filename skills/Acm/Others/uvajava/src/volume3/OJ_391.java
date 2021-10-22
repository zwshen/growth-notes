package volume3;
/**
 * 391 Mark-Up: 注意 \s 的處理
 * 測驗結果: 0.070 ms
 * 測驗日期: 2008-10-02
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_391 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
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
	
	public static void main(String[] args) {
		int begin;
		int slash;
		boolean isliteral = false;
		
		String line = readLine();
		while(line!=null) {
			begin = 0;
			slash = isliteral ? line.indexOf("\\*",begin) : line.indexOf('\\',begin);
			
			while(slash>-1) {
				System.out.print(line.substring(begin,slash));
				begin = slash+2;

				if(isliteral) {
					isliteral = false;
				} else {
					char ch = line.charAt(slash+1);
					switch(ch) {
						case 'b': case 'i':
							break;
						case '*':
							isliteral = true;
							break;
						case 's':
							begin = slash+2;						
							while(begin<line.length()) {
								if(Character.isDigit(line.charAt(begin))) {
									begin++;
								} else {
									break;
								}
							}
							if(begin<line.length()) {
								if(line.charAt(begin)=='.') {
									begin++;
									while(begin<line.length()) {
										if(Character.isDigit(line.charAt(begin))) {
											begin++;
										} else {
											break;
										}
									}
								}
							}
							break;
						default:
							System.out.print(ch);
					}
				}
				
				slash = isliteral ? line.indexOf("\\*",begin) : line.indexOf('\\',begin);
			}
			if(begin<line.length()) System.out.print(line.substring(begin));
			System.out.println();
			
			line = readLine();
		}
	}

}
