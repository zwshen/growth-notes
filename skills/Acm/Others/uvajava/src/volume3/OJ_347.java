package volume3;
/**
 * 347 Run, Run, Runaround Numbers: 計算過程很殺時間 (可以用很賤的查表法)
 * 測驗結果: 2.650 ms
 * 測驗日期: 2008-10-08
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_347 {

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

	public static int[] ranum = new int[448];
	public static int[] digits = new int[7];
	public static boolean[] used = new boolean[10];
	
	public static boolean isRunaround(int number) {
		int i;
		int digit;
		int count = 0;
		
		// 檢查數字是否重複或有0
		used[0] = true;
		for(i=1;i<10;i++) used[i] = false;
		
		while(number>0) {
			digit = number%10;
			number /= 10;
			if(used[digit]) {
				return false;
			} else {
				used[digit] = true;
				digits[count++] = digit;
			}
		}
		
		// 反轉數值順序
		for(i=0;i<count/2;i++) {
			int temp = digits[i];
			digits[i] = digits[count-i-1];
			digits[count-i-1] = temp;
		}
		
		// 檢查是否符合 runaround 規則 2
		for(i=1;i<count;i++) used[i] = false;
		int found = 1;
		int offset = 0;
		while(found<count) {
			offset = (offset+digits[offset])%count;
			if(used[offset]) {
				return false;
			} else {
				used[offset] = true;
			}
			found++;
		}
		
		// 檢查是否返回原點
		offset = (offset+digits[offset])%count;
		return (offset==0);
	}
	
	public static int findRunaround(int n) {
		int begin  = 0;
		int size   = 448;
		int target = 0;
		
		while(size>0) {
			target = begin+size/2;
			if(n==ranum[target]) {
				return n;
			} else {
				if(n<ranum[target]) {
					size = target-begin;
				} else {
					size -= (target-begin+1);
					begin = target+1;
				}
			}
		}
		
		if(n>ranum[target]) target++;
		return ranum[target];
	}
	
	public static void main(String[] args) {
		int n;
		int count = 0;
		StringBuffer sbuf = new StringBuffer();

		for(n=10;n<=9682415;n++) {
			if(isRunaround(n)) ranum[count++] = n;
		}

		n = parseInt(readToken());
		count = 1;
		while(n>0) {
			sbuf.append("Case ");
			sbuf.append(count++);
			sbuf.append(": ");
			sbuf.append(findRunaround(n));
			System.out.println(sbuf);
			sbuf.delete(0,sbuf.length());
			n = parseInt(readToken());
		}
	}

}
