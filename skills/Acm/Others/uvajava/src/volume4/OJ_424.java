package volume4;
import java.math.BigInteger;

/**
 * 424 Integer Inquiry: 用內建的大數 API @@"
 * 測驗結果: 0.140 ms
 * 測驗日期: 2008-09-12
 * @author Raymond Wu (小璋丸)
 */
public class OJ_424 {

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
		BigInteger n = new BigInteger(readLine());
		BigInteger sum = BigInteger.ZERO;
		
		while(!n.equals(BigInteger.ZERO)) {
			sum = sum.add(n);
			n = new BigInteger(readLine());
		}

		System.out.println(sum);
	}

}
