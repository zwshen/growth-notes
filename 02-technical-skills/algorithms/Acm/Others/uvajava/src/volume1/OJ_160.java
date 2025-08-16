package volume1;
import java.util.HashMap;
import java.util.Iterator;
import java.util.Map;
import java.util.Vector;

/**
 * 160 Factors and Factorials: 階乘每個數字個別因式分解+質數表+質數索引表
 * 測驗結果: 通過 0.130ms
 * 測驗日期: 2008-08-25
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_160 {

	// 因式分解的項
	static class FactTerm {
		int base;
		int exponent;
		public FactTerm(int base, int exponent) {
			this.base = base;
			this.exponent = exponent;
		}
	}

	public static char[] cinbuf = new char[256];
	public static Vector<Integer> primes = new Vector<Integer>(); // 質數表
	public static Map<Integer,Integer> indices = new HashMap<Integer,Integer>(); // 質數索引表
	
	// 分解 N!
	public static String parseFactor(int n) {
		if(n==1) return "  1! = 0";
		int i,j;
		int base,exp;
		int maxbase = 0;
		FactTerm[] terms;
		Map<Integer,Integer> expsum = new HashMap<Integer,Integer>();

		// n~2 進行因式分解 
		for(i=n;i>1;i--) {
			terms = factorize(i);
			for(j=0;j<terms.length;j++) {
				// 紀錄指數部份
				base = terms[j].base;
				if(base>maxbase) maxbase = base;
				Integer oe = expsum.get(base);
				if(oe==null) {
					expsum.put(base,terms[j].exponent);
				} else {
					expsum.put(base,oe+terms[j].exponent);
				}
			}
		}
		
		Iterator<Integer> itr = expsum.keySet().iterator();
		int size = indices.get(maxbase)+1;
		int[] explist = new int[size];
		while(itr.hasNext()) {
			base = itr.next();
			exp  = expsum.get(base);
			explist[indices.get(base)] = exp;
		}
		
		String result = String.format("%3d! =",n);
		for(i=0;i<explist.length;i++) {
			if(i>0&&i%15==0) result += "\n      ";
			result += String.format("%3d",explist[i]);
		}
		
		return result;
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
				indices.put(prime,primes.size());
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
		primes.add(2); indices.put(2,0);
		primes.add(3); indices.put(3,1);
		primes.add(5); indices.put(5,2);
		primes.add(7); indices.put(7,3);
		primes.add(11); indices.put(11,4);
		primes.add(13); indices.put(13,5);
		primes.add(17); indices.put(17,6);
		primes.add(19); indices.put(19,7);
		primes.add(23); indices.put(23,8);
		primes.add(29); indices.put(29,9);

		int n;
		String line = readLine();
		while(!line.equals("0")) {
			n = Integer.parseInt(line);
			System.out.println(parseFactor(n));
			line = readLine();
		}
	}

}
