package volume1;
import java.util.Stack;

/**
 * 110 Meta-Loopless Sorts: 最佳化氣泡排序法(矩陣+遞迴), 注意語法排版限制!
 * 測驗結果: 通過 0.470
 * 測驗日期: 2009-02-04
 * 
 * @author Raymond Wu (小璋丸)
 */

public class OJ_110 {

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
	
	// 縮排寬度
	public static final String[] IDENTS = new String[8];
	// 對應字元
	public static final char[] SYMBOLS = {'a','b','c','d','e','f','g','h'};
	// 變數個數
	public static int varcount;
	// 目前排列
	public static int[] current = {0,1,2,3,4,5,6,7};
	// 比對過標記矩陣
	public static boolean[][] compared = new boolean[8][8];
	// 輸出緩衝
	public static StringBuffer sbuf = new StringBuffer();
	// 交換過程回溯堆疊
	public static Stack<Integer> stack = new Stack<Integer>();

	/**
	 * 項目交換
	 * @param loc 交換的位置
	 */
	public static void swap(int loc) {
		int temp = current[loc];
		current[loc] = current[loc+1];
		current[loc+1] = temp;
	}
	
	/**
	 * 解除比較配對的鎖定
	 */
	public static void unlockPair() {
		int i = stack.pop();
		int lsymbol = current[i];
		int rsymbol = current[i+1];
		compared[lsymbol][rsymbol] = false;
		compared[rsymbol][lsymbol] = false;
		swap(i);
	}
	
	/**
	 * 搜尋並且鎖定比較配對
	 * @return 配對出現位置
	 */
	public static int lockPair() {
		int i;
		int lsymbol;
		int rsymbol;
		int limit = varcount-1;
		
		for(i=0;i<limit;i++) {
			lsymbol = current[i];
			rsymbol = current[i+1];
			if(!compared[lsymbol][rsymbol]) {
				compared[lsymbol][rsymbol] = true;
				compared[rsymbol][lsymbol] = true;
				break;
			}
		}
		
		stack.push(i);
		return i;
	}
	
	/**
	 * 建立分支
	 * @param depth 深度
	 */
	public static void branch(int depth) {
		int i;
		int last = depth+1;
		int breadth = depth+2;
		int pairloc = -1;
		char lvar;
		char rvar;
		
		if(breadth>varcount) {
			sbuf.append(IDENTS[depth]);
			sbuf.append("writeln(");
			sbuf.append(SYMBOLS[current[0]]);
			for(i=1;i<varcount;i++) sbuf.append(',').append(SYMBOLS[current[i]]);
			sbuf.append(")\n");
		} else {
			for(i=0;i<breadth;i++) {
				sbuf.append(IDENTS[depth]);
				if(i<last) {
					if(i>0) {
						swap(pairloc);
						sbuf.append("else ");
					}
					pairloc = lockPair();
					lvar = SYMBOLS[current[pairloc]];
					rvar = SYMBOLS[current[pairloc+1]];
					sbuf.append("if ").append(lvar).append(" < ").append(rvar).append(" then\n");
				} else {
					swap(pairloc);
					sbuf.append("else\n");
				}
				branch(depth+1);
			}
			
			// 每 breadth 分支會產生 breadth-1 個比較項
			// 迴圈結束要還原這些比較項
			for(i=1;i<breadth;i++) unlockPair();
		}
	}
	
	public static void main(String[] args) {
		int i,j;
		int casecount = parseInt(readToken());
		
		// 設定縮排寬度
		IDENTS[0] = "  ";
		for(i=1;i<8;i++) IDENTS[i] = IDENTS[i-1]+"  ";
		
		for(i=0;i<casecount;i++) {
			varcount = parseInt(readToken());
			
			// 程式開頭
			if(i>0) sbuf.append('\n');
			sbuf.append("program sort(input,output);\nvar\na");
			for(j=1;j<varcount;j++) sbuf.append(',').append(SYMBOLS[j]);
			sbuf.append(" : integer;\nbegin\n  readln(a");
			for(j=1;j<varcount;j++) sbuf.append(',').append(SYMBOLS[j]);
			sbuf.append(");\n");
			
			// 處理排序分支樹
			branch(0);
			
			// 程式結尾
			sbuf.append("end.\n");
		}
		
		System.out.print(sbuf);
	}

}
