package volume1;
import java.util.Stack;

/**
 * 111 History Grading: Largest Common String (要仔細閱讀題目喔, 不然會搞不懂 input)
 * 測驗結果: 通過 0.500 ms
 * 測驗日期: 2008-10-22
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_111 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");

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
	
	public static int[] std;
	public static int[] ans;
	
	// 循序搜尋元素在陣列的位置
	public static int seqSearch(int[] data, int item) {
		for(int i=0;i<data.length;i++) {
			if(data[i]==item) return i; 
		}
		return -1;
	}
	
	public static int score(Stack<Integer> stack) {
		int i;
		int next;      // 下一個答案
		int prev;      // 上一個答案
		int stdoff;    // 標準答案的已選取位置
		int ansoff;    // 學生答案的已選取位置
		int maxscore;  // 最高分
		int testscore; // 測試的分數
		int pridict;   // 預測最大可能得分
		
		prev   = stack.size()==0 ? -1 : stack.peek();
		stdoff = seqSearch(std,prev);
		ansoff = seqSearch(ans,prev);
		maxscore = stack.size();
		
		// 選取後面可以選的項目
		for(i=ansoff+1;i<ans.length;i++) {
			// 如果最大的得分可能性不會超出已計算結果就不玩了
			pridict = stack.size() + (ans.length-i);
			if(pridict<=maxscore) break;
			
			// 向下搜尋最大得分
			next = ans[i];
			if(seqSearch(std,next)>stdoff) {
				stack.push(next);
				testscore = score(stack);
				stack.pop();
				if(testscore>maxscore) maxscore = testscore;
			}
		}

		return maxscore;
	}
	
	public static void main(String[] args) {
		int i;
		int off;
		int n = parseInt(readToken());
		
		std = new int[n];
		ans = new int[n];

		// 讀取標準答案
		for(i=1;i<=n;i++) {
			off = parseInt(readToken())-1;
			std[off] = i;
		}
		
		Stack<Integer> stack = new Stack<Integer>();
		String token = readToken();
		while(token!=null) {
			off = parseInt(token)-1;
			ans[off] = 1;
			for(i=2;i<=n;i++) {
				off = parseInt(readToken())-1;
				ans[off] = i;
			}
			stack.clear();
			System.out.println(score(stack));
			token = readToken();
		}
	}

}
