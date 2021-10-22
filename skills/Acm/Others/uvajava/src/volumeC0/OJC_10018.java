package volumeC0;
/**
 * 10018 Reverse and Add: 字元碼運算法
 * 測驗結果: 0.430 ms
 * 測驗日期: 2008-09-01
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10018 {
	
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

	// 檢查是否為一組對稱數字
	public static boolean isSymmetrical(char[] digits) {
		int half = digits.length/2;
		int head,tail;
		for(head=0;head<half;head++) {
			tail = digits.length-head-1;
			if(digits[head]!=digits[tail]) return false;
		}
		return true;
	}
	
	public static void main(String[] args) {
		int i,j;
		int n = Integer.parseInt(readLine());
		int op,temp,carry;
		char[] curr;
		char[] next;

		for(i=0;i<n;i++) {
			curr  = readLine().toCharArray();
			op = 0;
			carry = 0;
			while(!isSymmetrical(curr)) {
				op++;
				carry = 0;
				next = new char[curr.length+1];
				for(j=0;j<curr.length;j++) {
					temp = carry+curr[j]+curr[curr.length-j-1]-'0'-'0';
					if(temp>=10) {
						carry = 1;
						next[next.length-j-1] = (char)(temp-10+'0');
					} else {
						carry = 0;
						next[next.length-j-1] = (char)(temp+'0');
					}
				}
				if(carry==1) {
					next[0] = '1';
					curr = next;
				} else {
					System.arraycopy(next,1,curr,0,curr.length);
				}
			}
			System.out.printf("%d %s\n",op,new String(curr));
		}
	}
}
