package volumeC0;
import java.util.LinkedList;

/**
 * 10015 Joseph's Cousin: 質數表+鏈結串列 (不用鍊結串列的話會超久喔)
 * 測驗結果: 通過 0.220ms
 * 測驗日期: 2008-09-23
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10015 {

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
	
	
	
	public static void main(String[] args) {
		// 求 3502 個質數
		int i,j;
		int test,limit;
		int[] primes = new int[3501];

		i = 1;
		test = 3;
		primes[0] = 2;

		while(i<3501) {
			j = 0;
			limit = (int)Math.sqrt(test);
			while(primes[j]<=limit) {
				if(test%primes[j]==0) break;
				j++;
			} 
			if(primes[j]>limit) primes[i++] = test;
			test += 2;
		}
		
		// 接收輸入值
		int n = parseInt(readToken());
		LinkedList<Integer> circle = new LinkedList<Integer>();
		
		while(n>0) {
			// 把人圍圈圈
			for(i=0;i<n;i++) circle.add(i+1);
			
			// 依序把人喀擦掉 (用 LinkedList 在 O(n) 時間內就搞定啦)
			j = 1;
			if(n>1) circle.remove(1);
			while(circle.size()>1) {
				i = (i+primes[j++]-1)%circle.size();
				circle.remove(i);
			}
			
			System.out.println(circle.get(0));
			circle.remove(0);
			n = parseInt(readToken());
		}
	}

}
