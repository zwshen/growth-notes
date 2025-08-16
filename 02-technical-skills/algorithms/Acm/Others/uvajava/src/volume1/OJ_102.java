package volume1;
import java.util.StringTokenizer;

/**
 * 102 Ecological Bin Packing: 查表法(垃圾桶排列順序作為靜態陣列)
 * 測驗結果: 通過 1.040ms
 * 測驗日期: 2008-08-12
 * 
 * @author Raymond Wu
 */
public class OJ_102 {
	
	static class Bin {
		
		public static final int BROWN_BIN = 0;
		public static final int GREEN_BIN = 1;
		public static final int CLEAR_BIN = 2;
		
		private long brown;
		private long green;
		private long clear;
		
		public Bin(long b, long g, long c) {
			brown = b;
			green = g;
			clear = c;
		}

		public long setBinColor(int bin_type) {
			long movement = 0;
			switch(bin_type) {
				case BROWN_BIN: movement=green+clear; break;
				case GREEN_BIN: movement=brown+clear; break;
				case CLEAR_BIN: movement=brown+green; break;
			}
			return movement;
		}

	} 
	
	public static char[] cinbuf = new char[256];

	public static int[][] solutions = {
		{Bin.BROWN_BIN,Bin.CLEAR_BIN,Bin.GREEN_BIN},
		{Bin.BROWN_BIN,Bin.GREEN_BIN,Bin.CLEAR_BIN},
		{Bin.CLEAR_BIN,Bin.BROWN_BIN,Bin.GREEN_BIN},
		{Bin.CLEAR_BIN,Bin.GREEN_BIN,Bin.BROWN_BIN},
		{Bin.GREEN_BIN,Bin.BROWN_BIN,Bin.CLEAR_BIN},
		{Bin.GREEN_BIN,Bin.CLEAR_BIN,Bin.BROWN_BIN}
	};

	public static String findOptimizedBin(Bin[] bins) {
		int best = -1;
		long min_movement = Long.MAX_VALUE;

		for(int i=0;i<6;i++) {
			int movement = 0;
			int[] test_solution = solutions[i];
			for(int j=0;j<3;j++) movement += bins[j].setBinColor(test_solution[j]);
			if(movement<min_movement) {
				best = i;
				min_movement = movement;
			}
		}	
		
		String result = "";
		for(int i=0;i<3;i++) {
			switch(solutions[best][i]) {
				case Bin.BROWN_BIN: result+='B'; break;
				case Bin.GREEN_BIN: result+='G'; break;
				case Bin.CLEAR_BIN: result+='C'; break;
			}
		}
		result = result + " " + min_movement;

		return result;
	}

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

	public static void main(String[] args) {
		Bin[] bins = new Bin[3];	

		String line;
		do {
			line = readLine();
			if(line!=null) {
				long b_glass, g_glass, c_glass;
				StringTokenizer st = new StringTokenizer(line);
				for(int i=0;i<3;i++) {
					b_glass = Long.parseLong(st.nextToken());
					g_glass = Long.parseLong(st.nextToken());
					c_glass = Long.parseLong(st.nextToken());
					bins[i] = new Bin(b_glass,g_glass,c_glass);
				}
				System.out.println(findOptimizedBin(bins));
			}
		} while(line!=null);
	}

}
