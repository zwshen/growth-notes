package volume1;
import java.util.Arrays;

/**
 * 153 Permalex: 不完全相異排列+因式分解約分 (測資絕對讓階乘爆掉)
 * 測驗結果: 通過 0.100 ms
 * 測驗日期: 2008-10-09
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_153 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];
	
	// 檢查作業系統是否為 Windows (會影響某些編碼題目)
	public static final boolean WINDOWS = System.getProperty("os.name").startsWith("Windows");

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
					// 這一行的目的是為了判斷測試資料是否故意提供非 ASCII 字元
					// 上傳後得到 Runtime Error 就知道要改用 Binary I/O 解題
					if(bytedata>126) throw new RuntimeException("偵測到非 ASCII 字元");
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		
		// Windows 環境上要再忽略一個 \r, Linux 則把 \r 當一般字元來用
		// 也可以上傳前拿掉這一行
		if(WINDOWS && cinbuf[offset-1]=='\r') offset--;

		return new String(cinbuf,0,offset);
	}
	
	// 質數表
	public static int[] primes = {2,3,5,7,11,13,17,19,23,29};
	
	// 計算不完全相異字母的排列 (乘開會爆炸, 要用約分法)
	public static int perm(int[] m) {
		// 因式分解約分法求:
		//
		//        n!
		// ----------------
		// m1!m2!m3!...m26!
		//
		// n,m 都不會超過 30, 質數分解到 29 即可
		int i,j,k;
		int n;
		int value;
		int prime;
		int[] num = new int[10]; // 分子因式分解指數
		int[] den = new int[10]; // 分母因式分解指數

		// 求 n
		n = 0;
		for(i=0;i<26;i++) n += m[i];
		
		// 分解分子
		for(i=2;i<=n;i++) {
			j = 0;
			prime = primes[j];
			value = i;
			while(value>1) {
				if(value%prime==0) {
					value /= prime;
					num[j]++;
				} else {
					j++;
					prime = primes[j];
				}
			}
		}
		
		// 分解分母
		for(i=0;i<m.length;i++) {
			for(j=2;j<=m[i];j++) {
				k = 0;
				prime = primes[k];
				value = j;
				while(value>1) {
					if(value%prime==0) {
						value /= prime;
						den[k]++;
					} else {
						k++;
						prime = primes[k];
					}
				}
			}
		}
		
		// 計算約分結果
		int p = 1;
		for(i=0;i<10;i++) {
			prime = primes[i];
			p *= Math.pow(prime,num[i]-den[i]);
		}
		
		return p;
	}
	
	// 計算字串順序值
	public static int rank(String s) {
		int i;
		int r = 1;
		int[] lcs = new int[26];

		// 計算字母個數
		for(i=0;i<s.length();i++) lcs[s.charAt(i)-'a']++;
		
		// 排列公式求位置
		for(int selected=0;selected<s.length();selected++) {
			char ch_lead = s.charAt(selected);
			char ch_used;

			for(ch_used='a';ch_used<ch_lead;ch_used++) {
				if(lcs[ch_used-'a']>0) {
					lcs[ch_used-'a']--;
					r += perm(lcs);
					lcs[ch_used-'a']++;
				}
			}
			
			lcs[ch_lead-'a']--;
		}
		
		return r;
	}
	
	public static void main(String[] args) {
		char[] rank;
		char[] row = new char[10];
		String line = readLine();
		
		while(!line.equals("#")) {
			rank = Long.toString(rank(line)).toCharArray();
			Arrays.fill(row,' ');
			System.arraycopy(rank,0,row,10-rank.length,rank.length);
			System.out.println(row);
			line = readLine();
		}
	}
	
}
