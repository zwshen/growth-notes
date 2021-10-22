package volume1;
import java.io.IOException;
import java.util.Stack;
import java.util.StringTokenizer;
import java.util.Vector;
import java.util.Arrays;

/**
 * 103 Stacking Boxes: 排序+分支法+忽略不可能狀況 (分支用N!模擬遞迴)
 * 測驗結果: 通過 0.680ms
 * 測驗日期: 2008-08-16
 * 
 * @author Raymond Wu
 */
public class OJ_103 {

	public static Vector<Byte> input_buf = new Vector<Byte>();
	public static int[][] boxes;
	
	// check if big box > small box
	public static boolean isMatch(int big, int small) {
		int dim = boxes[0].length;
		int[] big_box = boxes[big];
		int[] small_box = boxes[small];
		for(int i=0;i<dim;i++) {
			if(big_box[i]<=small_box[i]) return false;
		}
		return true;
	}

	// destroy seal
	public static void destroySeal(boolean[] available, Vector<Integer> seal) {
		for(int i=0;i<seal.size();i++) {
			available[seal.get(i)] = true;
		}
		seal.clear();
	} 
	
	// record boxes small and equal then this one
	public static void makeSeal(int box_id, boolean[] available, Vector<Integer> seal) {
		int count = boxes.length;
		seal.add(box_id);
		available[box_id] = false;
		for(int i=0;i<count;i++) {
			if(available[i]) {
				if(!isMatch(i,box_id)) {
					seal.add(i);
					available[i] = false;
				}
			}
		}
	}

	@SuppressWarnings("unchecked")
	public static String findMaxSeries() {
		int prev_child = -1;
		int next_child = -1;
		int count = boxes.length;
		int max_depth = 0;
		int[] solution = new int[count];
		Stack<Integer> stack = new Stack<Integer>();
		
		// seal
		boolean[] available = new boolean[count];
		Vector<Integer>[] seal = new Vector[count-1];
		for(int i=0;i<count-1;i++) seal[i] = new Vector<Integer>();
		for(int i=0;i<count;i++) available[i] = true;

		while(true) {
			if(stack.size()==count) {
				max_depth = count;
				for(int i=0;i<max_depth;i++) solution[i] = stack.get(i);
				break;
			} else {
				next_child = -1;
				for(int i=prev_child+1;i<count;i++) {
					if(stack.size()==0) {
						// can use any box 
						next_child = i;
						makeSeal(next_child,available,seal[0]);
						break;
					} else {
						// can use non-sealed box only
						if(available[i]) {
							// seal first & try
							if(stack.size()<count-1) makeSeal(i,available,seal[stack.size()]);
							
							// check if record could be break
							int max_chance = stack.size()+1;
							if(max_chance<=max_depth) {
								for(int j=0;j<available.length;j++) {
									if(available[j]) {
										max_chance++;
										if(max_chance>max_depth) break;
									}
								}
							}
							
							if(max_chance>max_depth) {
								next_child = i;
								break;
							} else {
								destroySeal(available,seal[stack.size()]);
							}
						}
					}
				}
				if(next_child==-1) {
					if(stack.size()!=0) {
						// record as best solution
						if(stack.size()>max_depth) {
							max_depth = stack.size();
							for(int i=0;i<max_depth;i++) {
								solution[i] = stack.get(i);
							}
						}
						prev_child = stack.pop();
						destroySeal(available,seal[stack.size()]);
					} else {
						// done
						if(prev_child==count-1) break;
					}
				} else {
					stack.push(next_child);
					prev_child = -1;
				}
			}
		}

		String result = max_depth+"\n"+(solution[0]+1);
		for(int i=1;i<max_depth;i++) {
			result = result+" "+(solution[i]+1);
		}
		
		return result;
	}
	
	public static String readLine() {
		int ch_code;
		boolean end_flag = false;
		final int EOF = -1;

		try {
			do {
				ch_code = System.in.read();
				if(ch_code==EOF||ch_code=='\n') {
					end_flag = true;
				} else {
					if(ch_code!='\r') input_buf.add((byte)ch_code);
				}
			} while(!end_flag);
		} catch(IOException e) {
			return null;
		}

		if(ch_code==EOF&&input_buf.size()==0) return null;
		byte[] bytes = new byte[input_buf.size()];
		for(int i=0;i<input_buf.size();i++) bytes[i] = input_buf.get(i);
		input_buf.clear();

		return new String(bytes);
	}
	
    public static void main(String args[]) {
    	String line;
    	
    	do {
    		line = readLine();
    		if(line!=null) {
    			StringTokenizer st = new StringTokenizer(line);
    			int count = Integer.parseInt(st.nextToken());
    			int dim = Integer.parseInt(st.nextToken());
    			boxes = new int[count][dim];
    			for(int i=0;i<count;i++) {
    				line = readLine();
    				st = new StringTokenizer(line);
    				for(int j=0;j<dim;j++) {
    					int len = Integer.parseInt(st.nextToken());
    					boxes[i][j] = len;
    				}
    				Arrays.sort(boxes[i]);
    			}
    			System.out.println(findMaxSeries());
    		}
    	} while(line!=null);
    }

}
