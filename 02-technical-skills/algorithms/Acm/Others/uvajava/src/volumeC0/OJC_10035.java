package volumeC0;
import java.util.StringTokenizer;

/**
 * 10035 Primary Arithmetic: 字元碼運算法
 * 測驗結果: 0.800 ms
 * 測驗日期: 2008-09-01
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10035 {

	public static char[] cinbuf = new char[256];

	public static String readLine() {
		int ch;
		int offset = 0;

		try {
			do {
				ch = System.in.read();
				if(ch!='\r'&&ch!='\n'&&ch!=-1) {
					cinbuf[offset++] = (char)ch;
				}
			} while(ch!='\n'&&ch!=-1);
			if(ch==-1&&offset==0) return null; // 輸入結束且最後一行沒資料
		} catch(Exception e) { 
			return null; 
		}

		return new String(cinbuf,0,offset);
	}

	public static int getDigit(String str, int pos) {
		int offset = str.length()-pos-1;
		if(offset<0) return 0;
		return str.charAt(offset)-'0';
	}

	public static void main(String[] args) {
		String a,b;
		int i,len;
		int carry,carry_count;
		boolean finished = false;
		
		do {
			StringTokenizer st = new StringTokenizer(readLine());
			a = st.nextToken();
			b = st.nextToken();
			finished = a.equals("0")&&b.equals("0");
			if(!finished) {
				len = Math.max(a.length(),b.length());

				// 計算個位數
				carry = (getDigit(a,0)+getDigit(b,0))>=10 ? 1 : 0;
				carry_count = carry;

				// 計算十位數以上
				for(i=1;i<len;i++) {
					carry = (carry+getDigit(a,i)+getDigit(b,i))>=10 ? 1 : 0;
					if(carry==1) carry_count++;
				}
				
				// 輸出結果
				switch(carry_count) {
					case 0:
						System.out.println("No carry operation."); break;
					case 1:
						System.out.println("1 carry operation."); break;
					default:
						System.out.printf("%d carry operations.\n",carry_count);
				}
			}
		} while(!finished);
	}

}
