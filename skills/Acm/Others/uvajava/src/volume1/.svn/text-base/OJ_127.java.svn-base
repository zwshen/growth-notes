package volume1;
import java.util.StringTokenizer;

/**
 * 127 "Accordian" Patience: 鏈結串列
 * 測驗結果: 2.640 ms (有空研究一下改善方法)
 * 測驗日期: 2008-09-09
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_127 {

	public static char[] cinbuf = new char[256];
	public static Card[] cards  = new Card[52];

	public static class Card {
		public int suit;
		public int rank;
		public Card below;
		public Card(String s) {
			rank = s.charAt(0);
			suit = s.charAt(1);
			below = null;
		}
	} 
	
	public static int getNumber(Card card) {
		int count = 1;
		while(card.below!=null) {
			card = card.below;
			count++;
		}
		return count;
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
	
	public static String play() {
		int i=1,j;
		Card curr,left;
		int pile_count = 52;
		boolean match = true;
		
		while(match) {
			match = false;
			for(i=1;i<pile_count;i++) {
				curr = cards[i];
				if(i-3>=0) {
					left = cards[i-3];
					if(curr.rank==left.rank||curr.suit==left.suit) {
						if(curr.below!=null) {
							cards[i] = curr.below;						
						} else {
							pile_count--;
							for(j=i;j<pile_count;j++) cards[j] = cards[j+1];
						}
						curr.below = left;
						cards[i-3] = curr;
						match = true;
						break;
					}
				}
				left = cards[i-1];
				if(curr.rank==left.rank||curr.suit==left.suit) {
					if(curr.below!=null) {
						cards[i] = curr.below;						
					} else {
						pile_count--;
						for(j=i;j<pile_count;j++) cards[j] = cards[j+1];
					}
					curr.below = left;
					cards[i-1] = curr;
					match = true;
					break;
				}
			}
		}

		String s = pile_count>1 ? "s" : "";
		String result = String.format("%d pile%s remaining:",pile_count,s); 
		for(i=0;i<pile_count;i++) result += " "+getNumber(cards[i]);
		return result;
	}
	
	public static void main(String[] args) {
		int i;
		StringTokenizer st;
		String line = readLine();
		
		while(!line.equals("#")) {
			st = new StringTokenizer(line);
			for(i=0;i<26;i++) cards[i] = new Card(st.nextToken());
			st = new StringTokenizer(readLine());
			for(i=26;i<52;i++) cards[i] = new Card(st.nextToken());
			System.out.println(play());
			line = readLine();
		}
	}

}
