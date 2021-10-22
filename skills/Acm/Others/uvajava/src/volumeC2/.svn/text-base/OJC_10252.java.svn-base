package volumeC2;
/**
 * 10252 Common Permutation: 沒什麼演算法(小心輸入緩衝設定, 每行最多1000個小寫字母!!)
 * 測驗結果: 通過 0.150 ms
 * 測驗日期: 2008-09-07
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10252 {

	public static char[] cinbuf = new char[1000];

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
	
	public static String common(String a, String b) {
		char[] schs;
		char[] lchs;
		int[] scount = new int[26];
		int[] lcount = new int[26];
		int i,offset;

		if(a.length()>=b.length()) {
			lchs = a.toCharArray();
			schs = b.toCharArray();
		} else {
			lchs = b.toCharArray();
			schs = a.toCharArray();
		}
		
		for(i=0;i<schs.length;i++) {
			offset = schs[i]-'a';
			scount[offset]++;
			offset = lchs[i]-'a';
			lcount[offset]++;
		}

		for(;i<lchs.length;i++) {
			offset = lchs[i]-'a';
			lcount[offset]++;
		}
		
		for(i=0;i<26;i++) scount[i] = Math.min(scount[i],lcount[i]);

		StringBuffer sbuf = new StringBuffer();
		for(i=0;i<26;i++) {
			if(scount[i]>0) {
				char c = (char)('a'+i);
				for(int j=0;j<scount[i];j++) sbuf.append(c);
			}
		}

		return sbuf.toString();
	}  
	
	public static void main(String[] args) {
		String a = readLine();
		String b;
		
		while(a!=null) {
			b = readLine();
			System.out.println(common(a,b));
			a = readLine();
		}
	}

}
