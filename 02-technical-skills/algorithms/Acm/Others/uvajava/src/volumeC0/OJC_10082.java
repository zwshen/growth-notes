package volumeC0;
/**
 * 10082 WERTYU: 雜湊表+字元當數字用
 * 測驗結果: 通過 0.100ms
 * 測驗日期: 2008-09-04
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10082 {

	public static char[] restore = new char[127]; 
	public static char[] cinbuf = new char[256];

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

	public static String restore(String typing) {
		int i;
		char[] chs = typing.toCharArray();
		char[] result = new char[chs.length];
		
		for(i=0;i<chs.length;i++) {
			result[i] = chs[i]==' ' ? ' ' : restore[chs[i]];
		}
		
		return new String(result);
	}
	
	public static void main(String[] args) {
		int i;
		char[] line1 = {'`','1','2','3','4','5','6','7','8','9','0','-','='};
		char[] line2 = {'Q','W','E','R','T','Y','U','I','O','P','[',']','\\'};
		char[] line3 = {'A','S','D','F','G','H','J','K','L',';','\''};
		char[] line4 = {'Z','X','C','V','B','N','M',',','.','/'};
		for(i=1;i<line1.length;i++) restore[line1[i]] = line1[i-1];
		for(i=1;i<line2.length;i++) restore[line2[i]] = line2[i-1];
		for(i=1;i<line3.length;i++) restore[line3[i]] = line3[i-1];
		for(i=1;i<line4.length;i++) restore[line4[i]] = line4[i-1];
		
		String line = readLine();
		while(line!=null) {
			System.out.println(restore(line));
			line = readLine();
		}
	}

}
