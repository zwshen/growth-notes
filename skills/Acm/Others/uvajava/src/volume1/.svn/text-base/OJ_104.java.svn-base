package volume1;
import java.util.Stack;
import java.util.StringTokenizer;

/**
 * 104 Arbitrage: 檢查特殊狀況+N!問題分割 (小心測試資料有完美匯率表!!) 
 * 測驗結果: 通過 0.550 ms
 * 測驗日期: 2008-08-15
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_104 {

	static class Report {
		String label = "";
		double benefit = 0.0;
	}
	
	public static final double MIN_BENEFIT = 1.01;
	public static char[] cinbuf = new char[256];
	public static double[][] change;
	
	// 檢查是否為理想匯率表
	public static boolean isPrettyChange() {
		double step1;
		double step2;
		double result;
		int count = 0;
		boolean ispretty = true;
		
		// 階段一, 檢查 0 -> i -> 0 的匯率
		for(int i=1;i<change.length;i++) {
			step1 = change[0][i];
			step2 = change[i][0];
			result = step1 * step2;
			if(result!=1) {
				ispretty = false;
				count++;
			}
		}

		// 階段二, 檢查 i -> 1 -> j 的匯率
		for(int i=1;i<change.length;i++) {
			for(int j=1;j<change.length;j++) {
				if(j==i) continue;
				// i->j 的匯率應該要等於 i->0->j 的匯率
				step1 = change[i][0];
				step2 = change[0][j];
				result = step1 * step2;
				if(result!=change[i][j]) {
					ispretty = false;
					count++;
				}
			}
		}

		return ispretty;
	}
	
	public static Report rules(int limit, int n) {
		int prev_child = -1;
		int next_child = -1;
		Report report = new Report();
		Stack<Integer> stack = new Stack<Integer>();

		while(true) {
			if(stack.size()==limit) {
				// 顯示階段性結果
				int to;
				int from = stack.get(0);
				double rate = 1;
				for(int i=1;i<limit;i++) {
					to = stack.get(i);
					rate *= change[from][to];
					from = to;
				}
				to = stack.get(0);
				rate *= change[from][to];

				if(rate>MIN_BENEFIT) {
					if(rate>report.benefit) {
						report.label = "";
						for(int i=0;i<limit;i++) {
							report.label = report.label+(stack.get(i)+1)+" ";
						}
						report.label = report.label+(stack.get(0)+1);
						report.benefit = rate;
						return report;
					}
				}
				prev_child = stack.pop();
			} else {
				next_child = -1;
				for(int i=prev_child+1;i<n;i++) {
					if(stack.size()==0) {
						next_child = i;	break;
					} else if(stack.peek()!=i) {
						if(stack.size()<limit-1) {
							next_child = i;	break;
						} else {
							if(i!=stack.get(0)) { 
								next_child = i;	break;
							}
						}
					}
				}
				if(next_child==-1) {
					if(stack.size()!=0) {
						prev_child = stack.pop();
					} else {
						if(prev_child==n-1) {
							return report;
						}
					}
				} else {
					stack.push(next_child);
					prev_child = -1;
				}
			}
		}
	}
	
	public static String arbitrage(double[][] rate) {
		int n = rate.length;
		
		for(int i=2;i<=n;i++) {
			Report report = rules(i,n);
			if(report.benefit>MIN_BENEFIT) {
				return report.label;
			}
		}
		
		return "no arbitrage sequence exists";
	}

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

	public static void main(String[] args) {
		String line;
		do {
			line = readLine();
			if(line!=null) {
				int curr_count = Integer.parseInt(line);
				change = new double[curr_count][curr_count];
				for(int i=0;i<curr_count;i++) {
					change[i][i] = 1;
					line = readLine();
					StringTokenizer st = new StringTokenizer(line);
					for(int j=0;j<curr_count-1;j++) {
						int fix = (j>=i) ? 1 : 0;
						double rate = Double.parseDouble(st.nextToken());
						change[i][j+fix] = rate;
					}
				}
				if(!isPrettyChange()) {
					System.out.println(arbitrage(change));
				} else {
					System.out.println("no arbitrage sequence exists");
				}
			}
		} while(line!=null);
	}

}
