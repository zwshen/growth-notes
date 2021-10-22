package volume2;
/**
 * 272 TEX Quotes: 簡單 ^^
 * 測驗結果: 0.310 ms
 * 測驗日期: 2008-09-10
 * @author Raymond Wu (小璋丸)
 */
public class OJ_272 {

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
	
	public static void main(String[] args) {
		int begin;
		int offset;
		boolean isleft = true;
		String line = readLine();

		while(line!=null) {
			begin  = 0;
			offset = 0;
			while(offset!=-1) {
				offset = line.indexOf('"',offset);
				if(offset!=-1) {
					System.out.print(line.substring(begin,offset));
					if(isleft) {
						System.out.print("``");
					} else {
						System.out.print("''");
					} 
					isleft = !isleft;
					begin  = offset+1;
					offset++;
				}
			}
			if(begin<line.length()) System.out.print(line.substring(begin));
			System.out.println();
			line = readLine();
		}
	}

}
