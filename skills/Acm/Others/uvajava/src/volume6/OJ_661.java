package volume6;
/**
 * 661 Blowing Fuses: 模擬 (要小心即使保險絲燒了也不可以 break 迴圈, 否則會造成 I/O 錯誤)
 * 測驗結果: 通過 0.150ms
 * 測驗日期: 2008-09-18
 * @author Raymond Wu (小璋丸)
 */
public class OJ_661 {

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
	
	public static int[] loading = new int[20];
	public static boolean[] turnon = new boolean[20];
	
	public static void main(String[] args) {
		int i;
		int n,m,c;
		int num;
		int device;
		int cur_amp,max_amp;
		String token;
		
		num = 1;
		token = readToken();
		while(true) {
			max_amp = 0;
			cur_amp = 0;
			n = parseInt(token);
			m = parseInt(readToken());
			c = parseInt(readToken());
			if(n==0&&m==0&&c==0) break;

			for(i=0;i<n;i++) {
				turnon[i]  = false;
				loading[i] = parseInt(readToken());
			}

			for(i=0;i<m;i++) {
				device = parseInt(readToken())-1;
				if(device<0) continue;
				turnon[device] = !turnon[device];
				if(turnon[device]) {
					// 小心這裡絕對不可以 break
					cur_amp += loading[device];
					if(cur_amp>max_amp) max_amp = cur_amp;
				} else {
					cur_amp -= loading[device];
				}
			}

			System.out.print("Sequence ");
			System.out.println(num);
			if(cur_amp<=c) {
				System.out.println("Fuse was not blown.");
				System.out.print("Maximal power consumption was ");
				System.out.print(max_amp);
				System.out.println(" amperes.\n");
			} else {
				System.out.println("Fuse was blown.\n");
			}
			
			token = readToken();
			num++;
		}
	}

}
