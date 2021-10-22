package volume1;

import java.util.Scanner;
import java.util.Set;
import java.util.TreeSet;

/**
 * 117 The Postal Worker Rings Once: 尤拉什麼小
 * 測驗結果: 通過 0.108
 * 測驗日期: 2009-11-26
 * 
 * 尤拉路徑充要條件: 洽有兩點分支度為奇數, 其餘分支度為偶數
 * 尤拉迴路充要條件: 所有點分支度為偶數
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_117 {
	
	// 點與邊的最大值
	public static final int MAX_V = 26;
	public static final int MAX_E = (MAX_V*MAX_V-MAX_V)/2;
	
	// 相鄰矩陣切一半
	public static int[] edge = new int[MAX_E];
	
	// 點的分支度
	public static int[] degree = new int[MAX_V];
	
	// 最短路徑
	public static int[] shortest = new int[MAX_V];
	
	/**
	 * 無向圖的一維陣列對應
	 * @param from 起點
	 * @param to   終點
	 * @return 一維陣列對應位置
	 */
	public static int edgeIndex(int from, int to) {
		int f = Math.min(from,to);
		int t = Math.max(from,to);
		return (MAX_V+MAX_V-f-1)*f/2+t-f-1;
	}
	
	/**
	 * 迪克斯徹一對多最短路徑演算法
	 * @param begin 起點
	 */
	public static void dijkstra(int begin) {
		int from;
		int to;
		int exp_from = -1;
		int exp_to = -1;
		int tmp_path;
		int tmp_edge;
		Set<Integer> used = new TreeSet<Integer>();
		Set<Integer> nonused = new TreeSet<Integer>();
		
		// 以初始點開始
		from = begin;
		shortest = new int[MAX_V];
		used.add(begin);
		for(to=0;to<MAX_V;to++) {
			if(to==from) continue;
			nonused.add(to);
			shortest[to] = edge[edgeIndex(from,to)];
		}
		
		// 演算法主體
		while(nonused.size()>0) {
			// 選取擴展邊
			tmp_path = Integer.MAX_VALUE;
			for(int vu : used) {
				for(int vn : nonused) {
					tmp_edge = edge[edgeIndex(vu,vn)];
					if(tmp_edge>0 && tmp_edge<tmp_path) {
						exp_from = vu;
						exp_to = vn;
						tmp_path = edge[edgeIndex(vu,vn)];
					}
				}
			}
			nonused.remove(exp_to);
			used.add(exp_to);
			
			// 如果與其他的點沒有連通性的時候就結束
			// 否則會無窮迴圈喔 @@"
			if(tmp_path==Integer.MAX_VALUE) break;
			
			// 更新擴展邊結束點的最短路徑
			tmp_path += shortest[exp_from];
			if(shortest[exp_to]==0 || shortest[exp_to]>tmp_path) {
				shortest[exp_to] = tmp_path;
			}
			
			// 更新擴展邊相鄰點的最短路徑
			for(to=0;to<MAX_V;to++) {
				if(to==exp_to) continue;
				tmp_edge = edge[edgeIndex(exp_to,to)];
				if(tmp_edge>0) {
					tmp_path = shortest[exp_to]+edge[edgeIndex(exp_to,to)];
					if(shortest[to]==0 || shortest[to]>tmp_path) {
						shortest[to] = tmp_path;
					}
				}
			}
		}
	}
	
	public static void main(String[] args) {
		int i;
		int odd;
		int ov1,ov2=-1;
		int itf,itt;
		int edge_len;
		int edge_sum;
		String st;
		Scanner sc = new Scanner(System.in);

		while(sc.hasNextLine()) {
			// 讀取路徑
			odd = 0;
			edge_sum = 0;
			st = sc.nextLine();
			while(!st.equals("deadend")) {
				edge_len = st.length();
				itf = st.charAt(0)-'a';
				itt = st.charAt(edge_len-1)-'a';
				degree[itf]++;
				degree[itt]++;
				edge_sum += edge_len;
				edge[edgeIndex(itf,itt)] = edge_len;
				st = sc.nextLine();
			}
			
			// 計算奇數分支度點個數
			ov1 = -1;
			for(i=0;i<MAX_V;i++) {
				if((degree[i]&1)==1) {
					odd++;
					if(ov1==-1) {
						ov1 = i;
					} else {
						ov2 = i;
					}
				}
			}
			
			// 奇數分支度點個數不是0就是2
			if(odd==2) {
				dijkstra(ov1);
				System.out.println(edge_sum+shortest[ov2]);
			} else {
				System.out.println(edge_sum);
			}
			
			// 清除邊和分支度
			for(i=0;i<MAX_V;i++) degree[i] = 0;
			for(i=0;i<MAX_E;i++) edge[i] = 0;
		}
	}

}
