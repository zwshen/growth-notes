package volume1;
import java.util.Stack;

/**
 * 112 Tree Summing: Stack (小心負數, 用括號操作堆疊避免Empty)
 * 測驗結果: 0.410 ms
 * 測驗日期: 2008-10-28
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_112 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 讀取一個單字 (英文姓名包含空白時請不要用)
	public static String readToken() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 略過非單字的字元 '\t','\n','\r',' '
			bytedata = System.in.read();
			while(bytedata==9||bytedata==10||bytedata==13||bytedata==32) {
				bytedata = System.in.read();
			}

			// 載入單字的字元
			while(bytedata!=-1) {
				if(bytedata==9||bytedata==10||bytedata==13||bytedata==32) {
					// 避免 readToken(), readLine() 交錯使用時發生問題
					if(bytedata==13) System.in.read();
					break;
				} else {
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
		int value;
		
		if(s.charAt(0)=='-') {
			value = 48-s.charAt(s.length()-1);
			for(i=s.length()-2;i>=1;i--) {
				value -= (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		} else {
			value = s.charAt(s.length()-1)-48;
			for(i=s.length()-2;i>=0;i--) {
				value += (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		}
		
		return value;
	}
	
	public static Stack<Integer> stack = new Stack<Integer>();
	
	public static boolean existsSumLeaf(int sum, String sexp) {
		char ch;
		int ptr = 0;
		int currsum = 0;
		int num_begin;
		String leafchk;
		
		stack.clear();
		
		while(ptr<sexp.length()-1) {
			ch = sexp.charAt(ptr);
			switch(ch) {
				case '(':  // 左括號, 先檢查是否為葉子節點
					leafchk = ptr+4 <= sexp.length() ? sexp.substring(ptr,ptr+4) : "";
					if(leafchk.equals("()()")) {
						if(currsum==sum) return true;
						ptr+=4;
					} else {
						stack.push(currsum);
						ptr++;
					}
					break;
				case ')':  // 右括號, 返回父節點
					currsum = stack.pop();
					ptr++;
					break;
				default:   // 數字, 讀取節點加總, 要用 do while 避免負號錯誤
					num_begin = ptr;
					do {
						ch = sexp.charAt(++ptr);
					} while(Character.isDigit(ch)); 
					currsum += parseInt(sexp.substring(num_begin,ptr));
			}
		}
		
		return false;
	}
	
	public static void main(String[] args) {
		int i;
		int n;
		int lb; // 左括號個數
		int rb; // 右括號個數
		char ch;
		String token = readToken();
		StringBuffer sexp = new StringBuffer();
		
		while(token!=null) {
			lb = 0;
			rb = 0;
			n = parseInt(token);
			sexp.delete(0,sexp.length());
			
			do {
				token = readToken();
				for(i=0;i<token.length();i++) {
					ch = token.charAt(i);
					if(ch=='(') lb++;
					if(ch==')') rb++;
				}
				sexp.append(token);
			} while(lb>rb);
			
			System.out.println(existsSumLeaf(n,sexp.toString())?"yes":"no");
			
			token = readToken();
		}
	}

}
