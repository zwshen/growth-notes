package volume2;
/**
 * 201 Squares: 定點向右下延伸做檢查
 * 測驗結果: 1.200 ms
 * 測驗日期: 2008-09-14
 * @author Raymond Wu (小璋丸)
 */
public class OJ_201 {

	public static int n;
	public static boolean[][] hlines = new boolean[9][8];
	public static boolean[][] vlines = new boolean[9][8];
	public static int[] sqcount = new int[8];

	public static int cinoff;                            // 緩衝區資料的開始位置
	public static int cinend;                            // 緩衝區資料的結束位置
	public static final int CINBUF_SIZE = 4096;          // 緩衝區容量
	public static byte[] cinbuf = new byte[CINBUF_SIZE]; // 緩衝區記憶體

	// 讀取一個單字
	public static String readToken() {
		byte b;
		int begin = -1;
		int tklen = 0;
		
		try {
			// 尋找起始點
			while(begin==-1) {
				// 無資料時讀取新資料
				if(cinoff==cinend) {
					cinoff = 0;
					cinend = System.in.read(cinbuf);
					if(cinend==-1) break;
				}
				
				while(cinoff<cinend) {
					b = cinbuf[cinoff++];
					if(b!=32&&b!=13&&b!=10) {
						begin = cinoff-1;
						break;
					}
				}
			}

			// 尋找結束點
			if(begin!=-1) {
				while(tklen==0) {
					// 無資料時讀取新資料
					if(cinoff==cinend) {
						if(cinoff==CINBUF_SIZE) {
							cinoff = cinend-begin;
							System.arraycopy(cinbuf,begin,cinbuf,0,cinoff);							
							begin = 0;
						}
						cinend = cinoff+System.in.read(cinbuf,cinoff,CINBUF_SIZE-cinoff);
					}

					while(cinoff<cinend) {
						b = cinbuf[cinoff++];
						if(b==32||b==13||b==10) {
							tklen = cinoff-begin-1;
							break;
						}
					}
				}
			}
		} catch(Exception e) {
			return null;
		}

		if(tklen==0||cinend==-1) return null;
		return new String(cinbuf,begin,tklen);
	}
	
	// 轉成 int 型態 (比 Integer.parseInt() 快)
	public static int parseInt(String s) {
		int i;
		int mul = 10;
		int value = s.charAt(s.length()-1)-48;
		
		for(i=s.length()-2;i>=0;i--) {
			value += (s.charAt(i)-48)*mul;
			mul *= 10;
		}
		
		return value;
	}
	
	public static void countSquare() {
		int row,col,size;
		int maxsize;
		int i;
		
		for(row=0;row<n-1;row++) {
			for(col=0;col<n-1;col++) {
				maxsize = Math.min(n-col,n-row)-1;
				for(size=1;size<=maxsize;size++) { 
					// 測試延伸的上左線
					i = size - 1;
					if(!hlines[row][col+i]||!vlines[col][row+i]) break;
					
					// 計算下線數
					for(i=0;i<size;i++) {
						if(!hlines[row+size][col+i]) break;
						if(!vlines[col+size][row+i]) break;
					}
					if(i==size)	sqcount[size-1]++;
				}
			}	
		}
	}
	
	public static void main(String[] args) {
		int i,j;
		int lc;
		String token = readToken();
		boolean[][] lines;
		int idx1,idx2;
		int number = 1;
		int scount = 0;
		
		while(token!=null) {
			n = parseInt(token);
			for(i=0;i<n-1;i++) sqcount[i] = 0;
			for(i=0;i<n;i++) {
				for(j=0;j<n-1;j++) {
					hlines[i][j] = false;
					vlines[i][j] = false;
				}
			}
			
			lc = parseInt(readToken());
			for(i=0;i<lc;i++) {
				lines = readToken().equals("H") ? hlines : vlines;
				idx1 = parseInt(readToken())-1;
				idx2 = parseInt(readToken())-1;
				lines[idx1][idx2] = true;
			}

			scount = 0;
			countSquare();
			if(number>1) System.out.print("\n**********************************\n\n");
			System.out.print("Problem #");
			System.out.println(number++);
			System.out.println();
			for(i=0;i<n-1;i++) {
				if(sqcount[i]>0) {
					System.out.print(sqcount[i]);
					System.out.print(" square (s) of size ");
					System.out.println(i+1);
					scount++;
				}
			}
			if(scount==0) System.out.println("No completed squares can be found.");

			token = readToken();
		}
	}

}
