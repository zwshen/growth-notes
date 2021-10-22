package volume1;
/**
 * 145 Gondwanaland Telecom: 簡單
 * 測驗結果: 0.140 ms
 * 測驗日期: 2008-09-25
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_145 {
	
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
	
	public static void main(String[] args) {
		// 時段分隔點
		final int div_nd = 480;
		final int div_de = 1080;
		final int div_en = 1320;
		
		// 通話費率
		final int[][] cost = {
			{ 10,  6,  2}, // A 級距
			{ 25, 15,  5}, // B 級距
			{ 53, 33, 13}, // C 級距
			{ 87, 47, 17}, // D 級距
			{144, 80, 30}, // E 級距
		};

		String cs = readToken();
		int[] mins = new int[3]; 

		while(!cs.equals("#")) {
			String tel = readToken();
			int mins_begin = parseInt(readToken())*60+parseInt(readToken());
			int mins_end   = parseInt(readToken())*60+parseInt(readToken());		
			
			if(mins_begin<mins_end) {
				// 沒有跨日撥打, 扣除兩端時間
				mins[0] = 600; // 早晨時段
				mins[1] = 240; // 下午時段
				mins[2] = 600; // 晚間時段
				// 早晨時段扣除
				if(mins_begin>div_nd) mins[0] -= Math.min(mins_begin-div_nd,600);
				if(mins_end<div_de)   mins[0] -= Math.min(div_de-mins_end,600);
				// 下午時段扣除
				if(mins_begin>div_de) mins[1] -= Math.min(mins_begin-div_de,240);
				if(mins_end<div_en)   mins[1] -= Math.min(div_en-mins_end,240);
				// 晚間時段扣除
				if(mins_begin>div_en) mins[2] -= mins_begin-div_en;
				mins[2] -= Math.min(1440-mins_end,120);
				mins[2] -= Math.min(mins_begin,480);
				if(mins_end<div_nd)   mins[2] -= div_nd-mins_end;
			} else {
				// 有跨日撥打, 增加兩端時間
				mins[0] = 0;
				mins[1] = 0;
				mins[2] = 0;
				// 早晨時段計算
				if(mins_end>div_nd)   mins[0] += Math.min(mins_end-div_nd,600);
				if(mins_begin<div_de) mins[0] += Math.min(div_de-mins_begin,600);
				// 下午時段計算
				if(mins_end>div_de)   mins[1] += Math.min(mins_end-div_de,240);
				if(mins_begin<div_en) mins[1] += Math.min(div_en-mins_begin,240);
				// 晚間時段處理
				if(mins_end>div_en)   mins[2] += mins_end-div_en;
				mins[2] += Math.min(1440-mins_begin,120);
				mins[2] += Math.min(mins_end,480);
				if(mins_begin<div_nd) mins[2] += div_nd-mins_begin;
			}
			
			int cents = 0;
			int sol = cs.charAt(0)-'A';
			for(int i=0;i<3;i++) {
				cents += cost[sol][i]*mins[i];
			}
			
			System.out.printf(
				"%10s %5d %5d %5d %2s %4d.%02d\n",
				tel,
				mins[0], mins[1], mins[2],
				cs, cents/100, cents%100
			);
			cs = readToken();
		}
	}

}
