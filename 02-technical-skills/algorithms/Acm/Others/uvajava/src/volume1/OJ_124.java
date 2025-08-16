package volume1;

import java.util.Arrays;
import java.util.LinkedList;
import java.util.List;
import java.util.Scanner;

/**
 * 124 Following Orders: Branch & Bound
 * 測驗結果: 通過 0.104ms
 * 測驗日期: 2009-11-30
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_124 {

	private static int var_count;
	private static int rule_count;
	private static int perm_count;
	private static char[] vars = new char[20];
	private static char[] gvar = new char[50];
	private static char[] lvar = new char[50];
	private static char[] perm = new char[20];
	private static List<Character> nonused = new LinkedList<Character>();
	
	public static void subtree(char var) {
		int i;
		int vidx = nonused.indexOf(var);
		boolean possible;	
		nonused.remove(vidx);
		
		if(nonused.size()==0) {
			// 都用過了
			perm[perm_count++] = var;
			System.out.println(new String(perm,0,var_count));
			perm_count--;
		} else {
			possible = true;
			
			// 檢查這個變數是否符合條件 (不可以比任何一個未選取的還小)
			for(i=0;i<rule_count;i++) {
				if(var==lvar[i] && nonused.contains(gvar[i])) {
					possible = false;
					break;
				}
			}
						
			// 以其他未選取變數深度探索
			if(possible) {
				perm[perm_count++] = var;
				for(i=0;i<nonused.size();i++) {
					subtree(nonused.get(i));
				}
				perm_count--;
			}
		}
		
		nonused.add(vidx,var);
	}
	
	public static void root() {
		int i,j,k;
		char var;
		char[] first = new char[20];
		Arrays.sort(vars,0,var_count);
		
		// 先搜尋可以當第一個字母的變數 (不在 lvar 裡面的)
		k = 0;
		for(i=0;i<var_count;i++) {
			var = vars[i];
			nonused.add(var);
			for(j=0;j<rule_count;j++) {
				if(var==lvar[j]) break;
			}
			if(j==rule_count) first[k++] = var;
		}		
		
		// 以選定的第一個變數開始發展字典
		for(i=0;i<k;i++) {
			var = first[i];
			subtree(var);
		}
		
		nonused.clear();
	}
	
	public static void main(String[] args) {
		int i,j;
		char ch;
		String line;
		
		Scanner sc = new Scanner(System.in);
		while(sc.hasNextLine()) {
			j = 0;
			line = sc.nextLine();
			for(i=0;i<line.length();i++) {
				ch = line.charAt(i);
				if(ch!=' ') vars[j++] = ch;
			}
			var_count = j;
			
			j = 0;
			line = sc.nextLine();
			for(i=0;i<line.length();i++) {
				ch = line.charAt(i);
				if(ch!=' ') {
					if(j%2==0) {
						gvar[j/2] = ch;
					} else {
						lvar[j/2] = ch;
					}
					j++;
				}
			}
			rule_count = j/2;
			
			root();
			if(sc.hasNextLine()) System.out.println();
		}
	}

}
