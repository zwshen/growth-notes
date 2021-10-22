package volumeC0;
import java.util.Arrays;

/**
 * 10008 What's Cryptanalysis?: java.lang.Comparable (對 Java 非常有利)
 * 測驗結果: 0.110 ms
 * 測驗日期: 2008-09-19
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10008 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 讀取一行
	public static String readLine() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 載入整行
			bytedata = System.in.read();
			while(bytedata!=-1) {
				if(bytedata==10) {
					break;
				} else {
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(cinbuf[offset-1]=='\r') offset--; // window 要去除 '\r' 字元
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
	
	// 可排序的字元計數類別
	public static class CharCount implements Comparable<CharCount> {
		public char ch;
		public int count;
		
		public CharCount(char ch) {
			this.ch = ch;
		}

		public int compareTo(CharCount o) {
			// 因為 Arrays.sort() 是小的先, 所以數字部份大的要說小, 小的要說大
			return (count!=o.count) ? (o.count-count) : (ch-o.ch);
		}
	}
	
	public static void main(String[] args) {
		int i,j;
		int n = parseInt(readLine());
		char ch;
		String line;
		CharCount[] chc = new CharCount[26];

		// 計數空間初始化
		for(char alpha='A';alpha<='Z';alpha++) {
			chc[alpha-'A'] = new CharCount(alpha);
		}
		
		// 讀取資料
		for(i=0;i<n;i++) {
			line = readLine();
			for(j=0;j<line.length();j++) {
				ch = line.charAt(j);
				if(ch>'Z') ch -= 32;
				if(ch>='A'&&ch<='Z') chc[ch-'A'].count++;
			}
		}
		
		// 計數結果排序與輸出
		Arrays.sort(chc);
		for(i=0;i<26;i++) {
			if(chc[i].count==0) break;
			System.out.print(chc[i].ch);
			System.out.print(' ');
			System.out.println(chc[i].count);
		}
	}

}
