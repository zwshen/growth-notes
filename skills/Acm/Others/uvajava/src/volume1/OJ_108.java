package volume1;
/**
 * 108 Maximum Sum: 暴力法+不可能狀況忽略+特殊解處理
 * 測驗結果: 通過 0.200ms
 * 測驗日期: 2008-09-10
 * 
 * 1. 以某一列開始取 1,2,3,4,5,...,n 列 ....... O(n) = n(n+1)/2
 * 2. 將所取的列相加為一列(含快取) ............ O(n) = n
 * 3. 將這一列簡化為 + - + - + - 的陣列 ....... O(n) = n
 * 4. 再用暴力法來計算這個陣列的最大和 ........ O(n) = n(n+1)/2
 *
 * @author Raymond Wu (小璋丸)
 */
public class OJ_108 {

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
	
	public static int n;
	public static int rsize;
	public static int[] rowsum;
	public static int[] reduce;
	public static int[][] matrix;

	// 簡化陣列中尋找最大子陣列
	public static int maxSubArray() {
		int sum;
		int lbd = 0;
		int hbd = rsize-1;
		int maxlen;
		int maxsum = Integer.MIN_VALUE;
		
		if(reduce[lbd]<0) lbd++;
		if(reduce[hbd]<0) hbd--;
		
		for(int i=lbd;i<=hbd;i++) {
			sum = 0;
			maxlen = hbd-i+1;
			for(int j=0;j<maxlen;j++) {
				sum += reduce[i+j];
				if(sum>maxsum) maxsum = sum;
			}
		}
		
		return maxsum;
	}
	
	// 取得簡化的列總和
	public static void reduceSubSet(int rowbegin, int rowcount) {
		int i;
		int col;
		int row;
		boolean sgn1;
		boolean sgn2;
		
		// 列合併
		if(rowcount==1) {
			for(col=0;col<n;col++) rowsum[col] = matrix[rowbegin][col]; 
		} else {
			row = rowbegin+rowcount-1;
			for(col=0;col<n;col++) rowsum[col] += matrix[row][col];
		}
	
		// 合併列簡化
		i = 0;
		reduce[0] = rowsum[0];
		sgn1 = reduce[0]>=0;
		for(col=1;col<n;col++) {
			sgn2 = rowsum[col]>=0;
			if(sgn1==sgn2) {
				reduce[i] += rowsum[col];
			} else {
				sgn1 = sgn2;
				reduce[++i] = rowsum[col];
			}
		}
		rsize = i+1;
	}
	
	public static void main(String[] args) {
		int i;
		int sum;
		int maxsum = Integer.MIN_VALUE;
		int row;
		int col;
		int rowlimit;
		
		// 配置和載入
		n = parseInt(readToken());
		rowsum = new int[n];
		reduce = new int[n];
		matrix = new int[n][n];
		
		for(row=0;row<n;row++) {
			for(col=0;col<n;col++) {
				matrix[row][col] = parseInt(readToken());
			}
		}
		
		// 計算
		for(row=0;row<n;row++) {
			rowlimit = n-row;
			for(i=1;i<=rowlimit;i++) {
				reduceSubSet(row,i);
				sum = maxSubArray();
				if(sum>maxsum) maxsum = sum;
			}
		}
		
		System.out.println(maxsum);
	}
	
}
