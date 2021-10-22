package volume1;
import java.io.IOException;
import java.util.StringTokenizer;
import java.util.Vector;

/**
 * 170 Clock Patience: 串列 (英文要看懂, 不然結果差很多 =.=)
 * 測驗結果: 通過 0.100ms
 * 測驗日期: 2008-08-25
 * 
 * @author Raymond Wu
 */
public class OJ_170 {
	
	static class Card {
		public int     value;
		public String  label;
		public Card    next;
		public boolean faceup = false;

		public Card(String label) {
			this.label = label;
			char digit = label.charAt(0);
			switch(digit) {
				case 'A': this.value = 1; break;
				case 'T': this.value = 10; break;
				case 'J': this.value = 11; break;
				case 'Q': this.value = 12; break;
				case 'K': this.value = 13; break;
				default: this.value = digit-'0';
			}
		}
	}
	
	public static Vector<Byte> input_buf = new Vector<Byte>();
	
	public static String play(Card[] piles) {
		int nextpile;
		int exposed = 1;
		boolean win = false;
		Card visit;
		Card previous;

		// 取第一張牌
		Card current = piles[12];
		current.faceup = true;
		piles[12] = piles[12].next;

		do {
			// 選新卡片
			previous = current;
			previous.next = null;
			nextpile = current.value-1;
			current  = piles[nextpile];
			if(!current.faceup) {
				// 翻面
				current.faceup = true;
				exposed++;
				piles[nextpile] = piles[nextpile].next;

				// 把舊牌塞到最下面
				visit = piles[nextpile];
				if(visit!=null) {
					while(visit.next!=null) visit = visit.next;
					visit.next = previous;
				} else {
					piles[nextpile] = previous;
				} 
			} else {
				win = true;
			}
		} while(!win);

		return String.format("%02d,%s",exposed,previous.label);
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
    	int i,j;
    	String line = null;
    	Card[] piles = new Card[13];

    	do {
    		line = readLine();
    		if(!line.equals("#")) {
    			for(i=3;i>=0;i--) {
    				StringTokenizer st = new StringTokenizer(line);
    				for(j=12;j>=0;j--) {
    					Card card = new Card(st.nextToken());
    					if(piles[j]!=null) {
    						// 下面的牌
    						Card visited = piles[j];
    						while(visited.next!=null) visited = visited.next;
    						visited.next = card;
    					} else {
    						// 頂端牌
    						piles[j] = card;
    					}
    				}
    				if(i>0) line = readLine();
    			}    			
    			System.out.println(play(piles));
    			for(i=0;i<13;i++) piles[i] = null;
    		}
    	} while(!line.equals("#"));
    }
}