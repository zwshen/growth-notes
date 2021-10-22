package volumeC1;
/**
 * 10189 Minesweeper: 很簡單的, 測資也不機車
 * 測驗結果: 0.140 ms
 * 測驗日期: 2008-09-23
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJC_10189 {

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
		int value = s.charAt(s.length()-1)-48;
		
		for(i=s.length()-2;i>=0;i--) {
			value += (s.charAt(i)-48)*mul;
			mul *= 10;
		}
		
		return value;
	}
	
	public static int m;
	public static int n;
	public static boolean[][] area = new boolean[100][100];
	
	public static boolean hasMime(int row, int col) {
		if(row==-1) return false;
		if(col==-1) return false;
		if(row==m)  return false;
		if(col==n)  return false;
		return area[row][col];
	}
	
	public static char getHint(int row, int col) {
		if(hasMime(row,col)) return '*';
		
		char hint = '0';
		row--;
		col--;
		if(hasMime(row,col)) hint++; // 左上角
		col++;
		if(hasMime(row,col)) hint++; // 右
		col++;
		if(hasMime(row,col)) hint++; // 右
		row++;
		if(hasMime(row,col)) hint++; // 下
		row++;
		if(hasMime(row,col)) hint++; // 下
		col--;
		if(hasMime(row,col)) hint++; // 左
		col--;
		if(hasMime(row,col)) hint++; // 左
		row--;
		if(hasMime(row,col)) hint++; // 上
		
		return hint;
	}
	
	public static void main(String[] args) {
		m = parseInt(readToken());
		n = parseInt(readToken());
		int num = 1;
		int row,col;
		StringBuffer sbuf = new StringBuffer();
		
		while(m>0||n>0) {
			for(row=0;row<m;row++) {
				String token = readToken();
				for(col=0;col<n;col++) {
					area[row][col] = (token.charAt(col)=='*');
				}
			}
			
			if(num>1) sbuf.append('\n');
			sbuf.append("Field #").append(num).append(":\n");
			for(row=0;row<m;row++) {
				for(col=0;col<n;col++) {
					sbuf.append(getHint(row,col));
				}
				sbuf.append('\n');
			}
			
			System.out.print(sbuf.toString());
			sbuf.delete(0,sbuf.length());
			
			m = parseInt(readToken());
			n = parseInt(readToken());
			num++;
		}
	}

}
