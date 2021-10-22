package volume1;

/**
 * 118 Mutant Flatworld Explorers: 模擬
 * 測驗結果: 通過 0.084ms
 * 測驗日期: 2009-06-06
 * 
 * @author Raymond Wu
 */
public class OJ_118 {

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

	// 轉成 int 型態 (比 Integer.parseInt() 快)
	public static int parseInt(String s) {
		int i;
		int mul = 10;
		int value;
		
		if(s.charAt(0)=='-') {
			value = 48-s.charAt(s.length()-1);
			for(i=s.length()-2;i>=1;i--) {
				value -= (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		} else {
			value = s.charAt(s.length()-1)-48;
			for(i=s.length()-2;i>=0;i--) {
				value += (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		}
		
		return value;
	}
	
	// 方向定義
	public static final int N = 0;
	public static final int E = 1;
	public static final int S = 2;
	public static final int W = 3;
	
	// 死亡現場標記
	public static int x_max;
	public static int y_max;
	public static boolean[] lost_point;

	// 取得邊界點索引
	public static int getEdgeIndex(int x, int y) {
		if(y==0) {
			return x;
		} else {
			if(y==y_max) {
				return x_max*2+y_max-x;
			} else {
				if(x==x_max) {
					return x+y;
				} else {
					return (x_max+y_max)*2-y;
				}
			}
		}
	}
	
	// 檢查這個點有沒有失事過
	public static boolean isLostPoint(int x, int y) {
		int index = getEdgeIndex(x,y);
		return lost_point[index];
	}

	// 標記這個點失事過
	public static void setLostPoint(int x, int y) {
		int index = getEdgeIndex(x,y);
		lost_point[index] = true;
	}
	
	// 讓機器人移動
	public static void execute(int x, int y, int d, String iset) {
		int i;
		int len = iset.length();
		int mx, my;
		int nx, ny;
		char inst;
		boolean lost = false;
		
		for(i=0;i<len;i++) {
			inst = iset.charAt(i);
			switch(inst) {
				case 'R':
					d = (d+1)&3; // d = (d+1)%4
					break;
				case 'L':
					d = (d+3)&3; // d = (d+3)%4
					break;
				case 'F':
					mx = 0;
					my = 0;
					switch(d) {
						case N: my = 1;  break;
						case E: mx = 1;  break;
						case S: my = -1; break;
						case W: mx = -1;
					}
					
					nx = x+mx;
					ny = y+my;
					if(nx>=0 && nx<=x_max && ny>=0 && ny<=y_max) {
						x = nx;	y = ny;
					} else {
						if(!isLostPoint(x,y)) {
							setLostPoint(x,y);
							lost = true;
						}
					}
			}

			if(lost) break;
		}
		
		System.out.print(x+" "+y+" ");
		char dch = 'x';
		switch(d) {
			case N: dch = 'N'; break;
			case E: dch = 'E'; break;
			case S: dch = 'S'; break;
			case W: dch = 'W'; break;
		}
		System.out.print(dch);
		String postfix = lost ? " LOST" : "";
		System.out.println(postfix);
	}
	
	public static void main(String[] args) {
		// 取得行動範圍
		x_max = parseInt(readToken());
		y_max = parseInt(readToken());
		lost_point = new boolean[(x_max+y_max)*2];
		
		// 取得機器人資訊
		int x,y,d;
		String iset;
		String token = readToken();

		while(token!=null) {
			x = parseInt(token);
			y = parseInt(readToken());
			d = -1;
			token = readToken();
			switch(token.charAt(0)) {
				case 'N': d = 0; break;
				case 'E': d = 1; break;
				case 'S': d = 2; break;
				case 'W': d = 3; break;
			}
			iset = readToken();
			execute(x,y,d,iset);
			token = readToken();
		}
	}

}
