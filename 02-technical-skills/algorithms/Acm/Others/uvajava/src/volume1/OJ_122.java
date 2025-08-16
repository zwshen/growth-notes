package volume1;

import java.util.HashMap;

/**
 * 122 Trees on the level: 雜湊, 二元樹 (先採用雜湊儲存, 再建構二元樹, 最後用重複排列法列舉節點)
 * 測驗結果: 通過 0.092ms
 * 測驗日期: 2009-06-04
 * 
 * @author Raymond Wu (小璋丸)
 */
class Node {
	Node   left;
	Node   right;
	int    value;
	String tag;
	
	public Node(int value, String tag) {
		this.tag = tag;
		this.value = value;
	}
}

public class OJ_122 {

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
					// 避免 readToken(), readLine() 交錯使用時發生問題
					if(bytedata==13) System.in.read();
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

	public static Node root;
	public static int depth;
	public static HashMap<String,Integer> nodes = new HashMap<String,Integer>();

	// 建構二元樹
	public static void buildTree(Node parent) {
		String  tag;
		Integer value;
		Node    child;		
		
		// 左子樹
		tag   = parent.tag+"L";
		value = nodes.get(tag);
		if(value!=null) {
			child = new Node(value,tag);
			parent.left = child;
			nodes.remove(tag);
			if(tag.length()>depth) depth++;
			buildTree(child);
		}
		
		// 右子樹
		tag   = parent.tag+"R";
		value = nodes.get(tag);
		if(value!=null) {
			child = new Node(value,tag);
			parent.right = child;
			nodes.remove(tag);
			if(tag.length()>depth) depth++;
			buildTree(child);
		}
	}

	// 二進位重複排列法定位節點
	public static Node getNodeOf(int path, int depth) {
		int mask = 1<<(depth-1);
		Node visit = root;

		while(mask>0) {
			visit = (path&mask)==0 ? visit.left : visit.right;
			if(visit==null) return null;
			mask>>=1;
		}

		return visit;
	}

	public static void visitTree() {
		if(root!=null) {
			System.out.print(root.value);
			
			// 二進位重複排列法列舉節點
			for(int exp=1;exp<=depth;exp++) {
				int range = 1<<exp;
				for(int path=0;path<range;path++) {
					Node node = getNodeOf(path,exp);
					if(node!=null) {
						System.out.print(' ');
						System.out.print(node.value);
					}
				}
			}
		}
		System.out.println();
	}

	public static void main(String[] args) {
		int n;
		String s;
		String pair = readToken();
		boolean dup;

		while(pair!=null) {
			// 初始配置
			root = null;
			depth = 0;
			dup = false;
			nodes.clear();
			
			// 讀取輸入
			while(!pair.equals("()")) {
				int cmpos = pair.indexOf(',');
				n = Integer.parseInt(pair.substring(1,cmpos));
				s = pair.substring(cmpos+1,pair.length()-1);
				if(nodes.containsKey(s)) dup = true;
				nodes.put(s,n);
				pair = readToken();
			}

			if(!dup) {
				Integer rootitem = nodes.get("");
				if(rootitem!=null) {
					root = new Node(rootitem,"");
					nodes.remove("");
					buildTree(root);
				}
				
				if(nodes.size()==0) {
					visitTree();
				} else {
					System.out.println("not complete");
				}
			} else {
				System.out.println("not complete");
			}

			pair = readToken();
		}
	}

}
