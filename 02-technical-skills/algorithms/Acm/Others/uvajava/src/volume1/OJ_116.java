package volume1;
/**
 * 116 Unidirectional TSP: 動態規劃法, 由右向左處理 (由左向右會錯)
 * 測驗結果: 通過 0.920ms
 * 測驗日期: 2009-04-01
 * 
 * 1. 將第 n 行的值視為一開始的最小權重 
 * 2. 從第 n-1 行開始, 根據上次推算的最小權重, 找出向左發展後的最小權重, 同時要記憶路徑
 * 3. 重複 2 步驟到第 1 行
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_116 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// readLine() 時是否要丟棄 \r (解碼題目必須設為 false)
	public static final boolean IGNORE_R = true;

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
	
	// 轉成 long 型態 (比 Integer.parseLong() 快)
	public static long parseLong(String s) {
		int i;
		int mul = 10;
		long value;
		
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
	
	public static int m,n; // 矩陣大小
	public static long[][] matrix   = new long[100][100]; // 矩陣資料
	public static long[][] prevpath = new long[100][100]; // 最佳路徑(先前的)
	public static long[][] bestpath = new long[100][100]; // 最佳路徑(本次的)
	public static long[]   prevwgt  = new long[100];      // 權重(先前的)
	public static long[]   bestwgt  = new long[100];      // 權重(本次的)
	public static long[]   test     = new long[3];        // 三個方向的測試權重
	public static StringBuffer sbuf = new StringBuffer(); // 輸出緩衝
	
	// 將本次計算結果設定為先前計算結果
	public static void switchBuffer() {
		long[] tempwgt = prevwgt;
		prevwgt = bestwgt;
		bestwgt = tempwgt;
		
		long[][] temppath = prevpath;
		prevpath = bestpath;
		bestpath = temppath;
	}
	
	// 尋找最佳路徑
	public static void findBestPath() {
		int i,j;
		int dw,fw,uw; // 三個測試方向的索引
		int minidx;   // 最佳移動的索引
		long minwgt;  // 最佳移動的權重

		// 第 n 行的值視為初始權重, 以及最佳路徑
		for(i=0;i<m;i++) {
			prevwgt[i] = matrix[i][n-1];
			prevpath[i][n-1] = i;
		}
		
		// 從第(n-1)行開始(i=n-2~0), 進行(n-1)個階段的篩選
		// 算出以第i行作為終點的最佳路徑
		for(i=n-2;i>=0;i--) {
			for(j=0;j<m;j++) {
				dw = j-1; // 向下移動的索引
				fw = j;   // 水平移動的索引
				uw = j+1; // 向上移動的索引
				
				// 邊緣修正
				if(dw==-1) dw = m-1;
				if(uw==m)  uw = 0;
				
				// 找出怎麼走下一步最好
				test[0] = matrix[j][i]+prevwgt[dw]; // 向下移動測試
				test[1] = matrix[j][i]+prevwgt[fw]; // 水平移動測試
				test[2] = matrix[j][i]+prevwgt[uw]; // 向上移動測試
				minwgt = test[0]; minidx = dw;      // 假設向下移動最好
				
				// 測試水平移動是否更好
				if(test[1]<minwgt) {minwgt = test[1]; minidx = fw; }
				if(test[1]==minwgt&&fw<minidx) {minwgt = test[1]; minidx = fw; }
				
				// 測試向上移動是否更好
				if(test[2]<minwgt) {minwgt = test[2]; minidx = uw; }
				if(test[2]==minwgt&&uw<minidx) {minwgt = test[2]; minidx = uw; }
				
				// 把最好路徑的記錄下來 
				bestwgt[j] = minwgt;
				bestpath[j][i] = j;
				
				System.arraycopy(prevpath[minidx],i+1,bestpath[j],i+1,n-i-1);
			}
			
			// 將本次計算結果設定為先前計算結果
			switchBuffer();
		}
		
		// 從最後結果找出最佳移動
		minidx = 0;
		minwgt = prevwgt[0];
		for(i=1;i<m;i++) {
			if(prevwgt[i]<minwgt) {
				minidx = i;
				minwgt = prevwgt[i];
			}
		}
		
		// 產生答案資料
		sbuf.delete(0,sbuf.length());
		sbuf.append(prevpath[minidx][0]+1);
		for(i=1;i<n;i++) {
			sbuf.append(' ');
			sbuf.append(prevpath[minidx][i]+1);
		}
		sbuf.append('\n');
		sbuf.append(minwgt);
	}
	
	public static void main(String[] args) {
		int row;
		int col;
		String token = readToken();
		
		while(token!=null) {
			m = parseInt(token);
			n = parseInt(readToken());
			for(row=0;row<m;row++) {
				for(col=0;col<n;col++) {
					matrix[row][col] = parseLong(readToken());
				}
			}
			
			// 計算最佳路徑
			findBestPath();
			System.out.println(sbuf);
			
			token = readToken();
		}
	}

}
