package volume4;
import java.util.Vector;

/**
 * 494 Kindergarten Counting Game: 偵測字母與非字母相鄰次數
 * 測驗結果: 通過 0.090ms
 * 測驗日期: 2008-08-19
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_494 {

	public static Vector<Byte> input_buf = new Vector<Byte>();
	
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
		} catch(Exception e) {
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
		boolean is_prev_alpha;
		boolean is_curr_alpha;
		
		do {
			line = readLine();
			if(line!=null) {
				int word_count = 0;
				char[] chs = line.toCharArray();
				is_prev_alpha = false;
				for(int i=0;i<chs.length;i++) {
					is_curr_alpha = false;
					if(chs[i]>='A'&&chs[i]<='Z') is_curr_alpha = true;
					if(chs[i]>='a'&&chs[i]<='z') is_curr_alpha = true;
					if(is_curr_alpha!=is_prev_alpha) {
						if(is_curr_alpha) word_count++;
						is_prev_alpha = is_curr_alpha;
						
					}
				}
				System.out.println(word_count);
			}
		} while(line!=null);
	}

}
