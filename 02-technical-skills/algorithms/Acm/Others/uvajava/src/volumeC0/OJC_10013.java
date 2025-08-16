package volumeC0;
/**
 * 10013 Super long sums: I/O 最佳化 (非常容易 TLE, I/O 速度是關鍵)
 * 測驗結果: 0.640ms
 * 測驗日期: 2008-09-20
 * 
 * 1. 假設兩數分別為 p 位數, q 位數, 且 p >= q
 * 2. p 位數的數值存於陣列的 1~p
 * 3. q 位數的數值存於陣列的 (p-q+1)~p 
 * 4. 陣列的 0 保留給 carry 使用
 * 5. 先計算陣列的 p 位置, 這裡不需要加上 carry
 * 6. 再計算陣列的 (p-1) ~ (p-q+1) 的位置, 這裡要兩數相加再加上 carry
 * 7. 最後計算 (p-q) 位置, 這裡只需要 p 位數加上 carry, 若 carry=0 可以中止
 * 8. 檢查開頭不是 0, 然後判斷從陣列的 0 還是 1 開始輸出
 * 
 * (加法直接以 ASCII 計算, 輸出時不用再轉型, 計算方法 a = a+b-48)
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10013 {

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
	
	// 讀取每一位數字要這樣用才夠快
	public static byte readDigit() {
		int bytedata = 0;
		
		try {
			bytedata = System.in.read();
			while(bytedata<'0') bytedata = System.in.read();
		} catch(Exception e) {}
		
		return (byte)bytedata;
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
	
	public static final int OUTPUT_LENGTH = 4096; 
	public static byte[] num1 = new byte[1000001];
	public static byte[] num2 = new byte[1000001];
	
	public static void main(String[] args) {
		int i,j,k;           // 迴圈索引
		int p,q;             // 兩數分別是幾位數
		int n,m;             // case數, 輸入組數
		int carry;           // 進位
		int offset,length;   // 輸出索引
		int found_count;     // 找到了幾組非 0 開頭的資料
		byte[] large = null; // 大數指向
		byte[] small = null; // 小數指向
		
		n = parseInt(readToken());
		for(i=0;i<n;i++) {
			p = 0; q = 0; k = 1;
			found_count = 0;
			m = parseInt(readToken());

			// 讀取資料
			for(j=0;j<m;j++) {
				// 讀取兩數值
				byte d1 = readDigit();
				byte d2 = readDigit();
				
				// 如果找到非 0 值, 要紀錄找到幾個, 並且決定大數和小數的指向
				if(found_count==0) {
					if(d1>'0') {
						large = num1;
						small = num2;
						found_count++;
					}
					if(d2>'0') {
						small = num2;
						large = num1;
						found_count++;
					}
				}
				
				// 找到第二組非 0 值, 要紀錄一下
				if(found_count==1) {
					if(large==num1) {
						if(d2>'0') found_count = 2;
					} else {
						if(d1>'0') found_count = 2;
					}
				}
				
				// 儲存數字並且紀錄位數
				if(found_count>0) {
					num1[k] = d1;
					num2[k] = d2;
					if(found_count>=1) p++;
					if(found_count==2) q++;
					k++;
				}
			}
			
			if(k==1) {
				num1[1] = '0';
				num2[1] = '0';
				large = num1;
				small = num2;
				p = 1;
				q = 1;
				k = 2;
			}
			
			// 計算個位數
			carry = 0;
			large[p] = (byte)(large[p]+small[p]-48);
			if(large[p]>'9') {
				large[p] -= 10;
				carry = 1;
			}
			
			// 計算陣列的 (p-1) ~ (p-q+1) 
			k = p-q+1;
			for(j=p-1;j>=k;j--) {
				large[j] = (byte)(large[j]+small[j]+carry-48);
				if(large[j]>'9') {
					large[j] -= 10;
					carry = 1;
				} else {
					carry = 0;
				}
			}
			
			// 計算陣列的 (p-q) ~ 1
			for(j=p-q;j>0;j--) {
				large[j] = (byte)(large[j]+carry);
				if(large[j]>'9') {
					large[j] -= 10;
					carry = 1;
				} else {
					carry = 0;
					break;
				}
			}
			
			if(j==0&&carry==1) {
				large[0] = 49;
				offset = 0;
			} else {
				large[0] = 48;
				offset = 1;
			}
			
			while(offset<=p) {
				length = Math.min(OUTPUT_LENGTH,p-offset+1);
				System.out.write(large,offset,length);
				offset += OUTPUT_LENGTH;
			}
			System.out.println();
			if(i<n-1) System.out.println();  
		}
	}

}
