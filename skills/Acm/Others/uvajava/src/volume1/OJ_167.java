package volume1;
import java.util.Stack;
import java.util.StringTokenizer;

/**
 * 167 The Sultan's Successors: 先用模擬遞迴求8后所有解, 再把輸入值代入所有解求最大值
 * 測驗結果: 通過 0.410ms
 * 測驗日期: 2008-08-12
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_167 {

	public static int[][] chess = new int[8][8];
	public static int[][] solution = new int[92][8]; // 8皇后有92組解 (先偷算一下嘿嘿)

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
	
	public static void buildQueenSolution() {
		int limit = 8;
		int prev_child = -1;
		int tail_child = 7;
		int si = 0;
		Stack<Integer> stack = new Stack<Integer>();

		do {
			if(stack.size()==8) {
				// 記憶8皇后的解
				for(int i=0;i<limit;i++) solution[si][i] = stack.get(i);
				prev_child = stack.pop();
				si++;
			} else {
				if(prev_child==tail_child) {
					prev_child = stack.pop();
				} else {
					int col = stack.size();
					int row = prev_child+1;
					boolean face = false;

					// 檢查皇后是否相撞
					for(int i=0;i<stack.size();i++) {
						int col1 = i;
						int row1 = stack.get(i);
						if(row==row1) {
							face = true; break;
						}
						if(col-col1==Math.abs(row-row1)) {
							face = true; break;
						}
					}					

					if(face) {
						// 如果皇后相撞就試試下一個
						prev_child++;
					} else {
						// 如果皇后沒相撞就繼續偵測
						stack.push(prev_child+1);
						prev_child = -1;
					}
				}
			}
		} while(stack.size()!=0||prev_child!=tail_child);
	}
	
	public static int getMaxQueenSum() {
		int qs, maxqs = 0;
		int row, col;
		int si = 0;
		
		for(si=0;si<92;si++) {
			qs = 0;
			for(col=0;col<8;col++) {
				row = solution[si][col];
				qs += chess[row][col];
			}
			if(maxqs<qs) maxqs = qs;
		}

		return maxqs;
	}
	
	public static void main(String[] args) {
		int n = Integer.parseInt(readLine());
		int i,j;
		
		buildQueenSolution();
		for(i=0;i<n;i++) {
			for(j=0;j<8;j++) {
				StringTokenizer st = new StringTokenizer(readLine());
				chess[j][0] = Integer.parseInt(st.nextToken());
				chess[j][1] = Integer.parseInt(st.nextToken());
				chess[j][2] = Integer.parseInt(st.nextToken());
				chess[j][3] = Integer.parseInt(st.nextToken());
				chess[j][4] = Integer.parseInt(st.nextToken());
				chess[j][5] = Integer.parseInt(st.nextToken());
				chess[j][6] = Integer.parseInt(st.nextToken());
				chess[j][7] = Integer.parseInt(st.nextToken());
			}
			System.out.printf("%5d\n",getMaxQueenSum());
		}
	}

}
