package volume1;
import java.io.IOException;
import java.util.StringTokenizer;
import java.util.Vector;

/**
 * 105 The Skyline Problem: 屋頂線簡化
 * 測驗結果: 通過 2.300ms
 * 測驗日期: 2008-08-17
 *
 * @author Raymond Wu (小璋丸)
 */


public class OJ_105 {

	static class HorizontalLine {
		int x1;
		int x2;
		int height;
		
		public HorizontalLine(int x1, int x2, int height) {
			this.x1 = x1;
			this.x2 = x2;
			this.height = height;
		}
	}
	
	public static final int CUT_NONE = 0;
	public static final int CUT_HEAD = 1;
	public static final int CUT_TAIL = 2;
	public static final int CUT_BODY = 3;
	public static final int CUT_ALL  = 4;

	public static Vector<HorizontalLine> hlines;
	public static Vector<Byte> input_buf = new Vector<Byte>();
	
	// check if hi line could cut low line
	public static int checkCutStatus(HorizontalLine hi, HorizontalLine low) {
		if(hi.x2<=low.x1||hi.x1>=low.x2) return CUT_NONE;
		if(hi.x1<=low.x1) {
			if(hi.x2<low.x2) {
				return CUT_HEAD; 
			} else {
				return CUT_ALL;
			}
		} else {
			if(hi.x2<low.x2) {
				return CUT_BODY;
			} else {
				return CUT_TAIL;
			}
		}
	}
	
	// reduce skyline line
	public static String skyline() {
		int curr,next,cut_status;
		HorizontalLine hi,low,eq;

		if(hlines.size()>1) {
			// sort lines by height
			for(int i=0;i<hlines.size()-1;i++) {
				for(int j=i+1;j<hlines.size();j++) {
					boolean swap = false;
					if(hlines.get(i).height<hlines.get(j).height) {
						swap = true;
					} else if(hlines.get(i).height==hlines.get(j).height) {
						if(hlines.get(i).x1>hlines.get(j).x1) swap = true;
					}
					if(swap) {
						hi = hlines.get(i);
						hlines.set(i,hlines.get(j));
						hlines.set(j,hi);
					}
				}
			}
		
			// merge lines
			curr = 0;
			do {
				hi = hlines.get(curr);
				eq = hlines.get(curr+1);
				while(hi.height==eq.height && hi.x2>=eq.x1) {
					if(eq.x2>hi.x2) hi.x2 = eq.x2;
					hlines.remove(curr+1);
					if(curr+1<hlines.size()) {
						eq = hlines.get(curr+1);
					} else {
						break;
					}
				}
				curr++;
			} while(curr+1<hlines.size());
		}

		if(hlines.size()>1) {
			// cut and reduce lines
			curr = 0;
			do {
				hi = hlines.get(curr);
				next = curr+1;
				do {
					low = hlines.get(next);
					cut_status = checkCutStatus(hi,low);
					switch(cut_status) {
						case CUT_HEAD:
							low.x1 = hi.x2;
							next++;
							break;
						case CUT_TAIL:
							low.x2 = hi.x1;
							next++;
							break;
						case CUT_BODY:
							eq = new HorizontalLine(hi.x2,low.x2,low.height);
							low.x2 = hi.x1;
							hlines.insertElementAt(eq,next+1);
							next+=2;
							break;
						case CUT_ALL:
							hlines.remove(next);
							break;
						case CUT_NONE:
							next++;
					}
				} while(next<hlines.size());
				curr++;
			} while(curr+1<hlines.size());
			
			// sort lines by x
			for(int i=0;i<hlines.size()-1;i++) {
				for(int j=i+1;j<hlines.size();j++) {
					if(hlines.get(i).x1>hlines.get(j).x1) {
						hi = hlines.get(i);
						hlines.set(i,hlines.get(j));
						hlines.set(j,hi);
					}
				}
			}
		}

		String result = "";
		hi = hlines.get(0);
		result += hi.x1+" "+hi.height;
		for(int i=1;i<hlines.size();i++) {
			eq = hi;
			hi = hlines.get(i);
			if(hi.x1>eq.x2) result += " "+eq.x2+" 0";
			result += " "+hi.x1+" "+hi.height;
		}
		result += " "+hi.x2+" 0";
		
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
	
	public static void main(String[] args) {
		String line;
		HorizontalLine hl;
		hlines = new Vector<HorizontalLine>();
		
		do {
			line = readLine();
			if(line!=null) {
				// read building
				StringTokenizer st = new StringTokenizer(line);
				int l = Integer.parseInt(st.nextToken());
				int h = Integer.parseInt(st.nextToken());
				int r = Integer.parseInt(st.nextToken());
				if(l<r&&h>0) {
					hl = new HorizontalLine(l,r,h);
					hlines.add(hl);
				}
			}
		} while(line!=null);
		System.out.println(skyline());
	}

}
