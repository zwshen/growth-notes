package volume1;
import java.util.StringTokenizer;

/**
 * 101 The Block Problem: 鍊結串列+以頂端積木為第一元素 (堆疊必死!!)
 * 測驗結果: 通過 0.340ms
 * 測驗日期: 2008-08-15
 * 
 * @author Raymond Wu
 */
public class OJ_101 {

	static class Block {
		public int id;
		public Block below = null;
		public Block(int id) {
			this.id = id;
		}
	}

	static class Robot {
		private int a;
		private int b;
		private int pile_a;
		private int pile_b;
		private int block_id;
		private Block visit;
		private Block block_a;
		private Block[] piles;

		public Robot(int count) {
			piles = new Block[count];
			for(int i=0;i<count;i++) {
				piles[i] = new Block(i);
			}
		}

		public void parseAction(String request) {
			String command, prepare;
			StringTokenizer st = new StringTokenizer(request);

			command = st.nextToken();
			a = Integer.parseInt(st.nextToken());
			prepare = st.nextToken();
			b = Integer.parseInt(st.nextToken());
			
			if(isLegalAction()) {
				if(prepare.equals("onto")) onto();
				if(command.equals("move")) {
					move();
				} else {
					pile();
				}
			}
		}
		
		private boolean isLegalAction() {
			if(a==b) return false;	
			int found=0;
			for(int i=0;i<piles.length;i++) {
				visit = piles[i];
				while(visit!=null) {
					if(visit.id==a) {
						pile_a = i;
						block_a = visit;
						found++;
					}
					if(visit.id==b) {
						pile_b = i;
						found++;
					}
					visit = visit.below;
				} 
				if(found==2) break;
			}
			if(pile_a==pile_b) return false;
			return true;
		}
		
		// return all blocks on b
		private void onto() {		
			while((block_id=piles[pile_b].id)!=b) {
				visit = piles[pile_b];
				piles[pile_b] = visit.below;
				visit.below = null;
				if(piles[block_id]==null) {
					piles[block_id] = visit;
				} else {
					visit.below = piles[block_id];
					piles[block_id] = visit;
				}
			}
		}
		
		private void move() {
			// return all blocks on a
			while((block_id=piles[pile_a].id)!=a) {
				visit = piles[pile_a];
				piles[pile_a] = visit.below;
				visit.below = null;
				if(piles[block_id]==null) {
					piles[block_id] = visit;
				} else {
					visit.below = piles[block_id];
					piles[block_id] = visit;
				}
			}
			// move a on the top of b
			visit = piles[pile_a];
			piles[pile_a] = visit.below;
			visit.below = piles[pile_b];
			piles[pile_b] = visit;
		}
		
		private void pile() {
			// pile
			Block pile_top = piles[pile_a];
			Block pile_bottom = block_a.below;
			piles[pile_a] = pile_bottom;
			block_a.below = piles[pile_b];
			piles[pile_b] = pile_top;
		}
		
		// divide a pile to 2 piles and return the top Block of bottom pile
		public Block divide(Block block) {
			visit = block;
			while(visit.id!=a) {
				visit = visit.below;
			}
			Block result = visit.below;
			visit.below = null;
			return result;
		}
		
		// show result
		public void showStatus() {
			String result; 
			for(int i=0;i<piles.length;i++) {
				visit = piles[i];
				result = "";
				while(visit!=null) {
					result = " "+visit.id+result;
					visit = visit.below;
				}
				result = i+":"+result;
				System.out.println(result);
			}
		}
	}
	
	public static char[] cinbuf = new char[256];
	
	public static String readLine() {
		int ch;
		int offset = 0;

		try {
			do {
				ch = System.in.read();
				if(ch!='\r'&&ch!='\n'&&ch!=-1) {
					cinbuf[offset++] = (char)ch;
				}
			} while(ch!='\n'&&ch!=-1);
			if(ch==-1&&offset==0) return null; // 輸入結束且最後一行沒資料
		} catch(Exception e) { 
			return null; 
		}

		return new String(cinbuf,0,offset);
	}
	
    public static void main(String args[]) {
    	String line;
    	do {
    		line = readLine();
    		if(line!=null) {
    			// read block count & create robot
    			int count = Integer.parseInt(line);
    			Robot robot = new Robot(count);
    			do {
    				line = readLine();
    				if(!line.equals("quit")) {
    					robot.parseAction(line);
    				} else {
    					robot.showStatus();
    				}
    			} while(!line.equals("quit"));
    		}
    	} while(line!=null);
    }

}
