package volume1;
import java.util.StringTokenizer;
import java.util.Vector;

/**
 * 107 The Cat in the Hat: 兩數分別為 (n+1)^k, n^k 先求出 n,k 然後再計算答案
 * 測驗結果: 通過 1.680ms
 * 測驗日期: 2008-08-24
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_107 {

	// 因式分解的項
	static class FactTerm {
		int base;
		int exponent;
		public FactTerm(int base, int exponent) {
			this.base = base;
			this.exponent = exponent;
		}
	}
	
	public static Vector<Integer> primes = new Vector<Integer>(); // 質數表
	public static char[] cinbuf = new char[256];

	public static String getSolution(int bch, int lcc) {
		// 輸入 1 1 直接回傳特殊解
		if(bch==1&&lcc==1) return "0 1";
		
		// 最大貓的身高, bch=(n+1)^k
		// 最小貓的數量, lcc=n^k
		// k 可以用因式分解推測, 若 lcc=1 則 n = 1
		FactTerm[] terms = factorize(bch);
		int i,k;
		int n = 1;
		
		if(lcc!=1) {
			// 計算 k 的最大值
			k = terms[0].exponent;
			for(i=1;i<terms.length;i++) k = gcd(k,terms[i].exponent);
			// 以 k 的可能值計算 n (k 的所有因數, 由大道小)
			for(i=k;i>=1;i--) {
				if(k%i==0) {
					double tn = Math.pow(Math.E,(Math.log(lcc)/i));
					if(bch==Math.pow(tn+1,i)) {
						n = (int)tn;
						break;
					}
				}
			}
		} else {
			// 因為 n = 1, 所以 k 一定是 log(2,bch)
			k = (int)(Math.log(bch)/Math.log(2));
		}

		int rcc = 1;   // 偷懶貓的數目
		int sch = bch; // 所有貓身高總和
		for(i=1;i<k;i++) {
			int term = (int)Math.pow(n,i);
			sch += term*Math.pow(n+1,k-i);
			rcc += term;
		}
		sch += Math.pow(n,k);
		return (rcc+" "+sch);
	}
	
	// 最大公因數
	public static int gcd(int a, int b) {
		do {
			if(a>b) {
				a = a%b;
			} else {
				b = b%a;
			}
		} while(a>0&&b>0);
		return Math.max(a,b);
	}
	
	// 因式分解
	public static FactTerm[] factorize(int n) {
		int m = n;
		int prime;
		int prime_index = 0;
		FactTerm term;
		Vector<FactTerm> v = new Vector<FactTerm>(); 

		do {
			if(prime_index==primes.size()) buildNextPrime();
			prime = primes.get(prime_index);
			if(m%prime==0) {
				term = new FactTerm(prime,0);
				while(m%prime==0) {
					m/=prime;
					term.exponent++;
				}
				v.add(term);
			}
			prime_index++;			
		} while(m>1);

		FactTerm[] terms = new FactTerm[v.size()];
		v.toArray(terms);
		return terms;
	}
	
	// 計算下一組質數
	public static void buildNextPrime() {
		int i;
		int old_prime;
		int test = primes.get(primes.size()-1)+2;
		int prime = -1;
		
		do {
			for(i=0;i<primes.size();i++) {
				old_prime = primes.get(i);
				if(test%old_prime==0) break;
			}
			if(i<primes.size()) {
				test+=2;
			} else {
				prime = test;
				primes.add(prime);
			}
		} while(prime==-1);
	}

	// 讀取一行輸入
	public static String readLine() {
		int ch;
		int offset = 0;

		try {
			do {
				ch = System.in.read();
				if(ch>'\r') cinbuf[offset++] = (char)ch;
			} while(ch!='\n'&&ch!=-1);
			if(ch==-1&&offset==0) return null;
		} catch(Exception e) { 
			return null; 
		}

		return new String(cinbuf,0,offset);
	}
	
	public static void main(String[] args) {
		// 設定初始質數表
		int[] init_primes = {2,3,5,7,11,13,17,19,23,29};
		for(int i=0;i<init_primes.length;i++) {
			primes.add(init_primes[i]);
		}

		int bch = 0;
		int lcc = 0;
		String line;
		do {
			line = readLine();
			StringTokenizer st = new StringTokenizer(line);
			bch = Integer.parseInt(st.nextToken());
			lcc = Integer.parseInt(st.nextToken());
			if(bch>0) System.out.println(getSolution(bch,lcc));
		} while(bch!=0||lcc!=0);
	}

}
