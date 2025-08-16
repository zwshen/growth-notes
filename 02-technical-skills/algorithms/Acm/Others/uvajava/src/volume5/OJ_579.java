package volume5;
/**
 * 579 ClockHands: 不會很難
 * 測驗結果: 通過 1.740 ms
 * 測驗日期: 2008-09-17
 * @author Raymond Wu (小璋丸)
 */
public class OJ_579 {
	
	public static char[] cinbuf = new char[256];

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

	public static int getMinutes() {
		int div;
		int min;
		int hour;

		String line = readLine();
		div  = line.indexOf(':');
		hour = parseInt(line.substring(0,div));
		min  = parseInt(line.substring(div+1));
		min += hour*60;
		
		return min;
	}
	
	public static void main(String[] args) {
		int mins;
		float hhand;
		float mhand;
		float angle;

		mins = getMinutes();
		while(mins>0) {
			hhand = (float)mins/2;
			mhand = mins*6;
			angle = Math.abs(hhand-mhand)%360;
			if(angle>180) angle = 360-angle;
			System.out.printf("%.3f\n",angle);
			mins = getMinutes();
		}
	}

}
