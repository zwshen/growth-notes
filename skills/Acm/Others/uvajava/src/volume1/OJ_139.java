package volume1;
import java.util.Arrays;
import java.util.HashMap;
import java.util.Map;

/**
 * 139 Telephone Tangles: Greedy (陷阱一堆的題目, 要測試最機車的測資)
 * 測驗結果: 通過 0.900 ms
 * 測驗日期: 2008-10-08
 * 
 * 地名: 小心地名有空白 (如洛杉磯)
 * 
 * 區碼: 本地 [1-9][1-9]+
 *       
 *       國際 00[0-9]{1,3}[0-9]{4,10}
 *       國際碼長度為 3-5
 *       國際碼全長   7-15
 *       
 *       國內 0[0-9]{1,5}[0-9]{4,7}
 *       國內碼長度為 2-6 (00 001234 是國內碼喔 @@)
 *       國內碼全長   6-13
 *
 * @author Raymond Wu (小璋丸)
 */
public class OJ_139 {

	// 輸入緩衝區 (緩衝空間需要依照題目調整)
	public static byte[] cinbuf = new byte[1024];

	// 讀取一行
	public static String readLine() {
		int offset = 0;
		int bytedata = -1;
		
		try {
			// 載入整行
			bytedata = System.in.read();
			while(bytedata!=-1) {
				if(bytedata==10) {
					break;
				} else {
					cinbuf[offset++] = (byte)bytedata;
				}
				bytedata = System.in.read();
			}
		} catch(Exception e) {}

		if(offset+bytedata==-1) return null; // 串流結束
		if(cinbuf[offset-1]=='\r') offset--; // window 要去除 '\r' 字元
		return new String(cinbuf,0,offset);
	}
	
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
	
	// 地區電話設定
	public static class AreaInfo {
		public String name;
		public int price;
		public AreaInfo(String name, int price) {
			this.name  = name;
			this.price = price;
		}
	}
	
	public static char[] rowdata = new char[69];
	public static Map<String,AreaInfo> idd = new HashMap<String,AreaInfo>();
	public static Map<String,AreaInfo> std = new HashMap<String,AreaInfo>();

	// 輸出帳單明細
	public static void displayBill(String fcode, String area, String sub, int mins, int single) {
		char[] chs;
		Arrays.fill(rowdata,' ');
		
		chs = fcode.toCharArray();
		System.arraycopy(chs,0,rowdata,0,chs.length);

		chs = area.toCharArray();
		System.arraycopy(chs,0,rowdata,16,chs.length);
		
		chs = sub.toCharArray();
		System.arraycopy(chs,0,rowdata,51-chs.length,chs.length);
		
		chs = Integer.toString(mins).toCharArray();
		System.arraycopy(chs,0,rowdata,56-chs.length,chs.length);
		
		if(single!=-1) {
			chs = String.format("%d.%02d",single/100,single%100).toCharArray();
			System.arraycopy(chs,0,rowdata,62-chs.length,chs.length);

			int total = single*mins;
			chs = String.format("%d.%02d",total/100,total%100).toCharArray();
			System.arraycopy(chs,0,rowdata,69-chs.length,chs.length);
		} else {
			chs = "-1.00".toCharArray();
			System.arraycopy(chs,0,rowdata,69-chs.length,chs.length);
		} 
		
		System.out.println(rowdata);
	}
	
	public static void main(String[] args) {
		int price;
		int dspos;
		String line;
		String acode = readToken();
		String aname;
		AreaInfo ainfo;
		
		// 載入費率表
		while(!acode.endsWith("000000")) {
			line = readLine();
			dspos = line.indexOf('$'); 
			aname = line.substring(0,dspos);
			price = parseInt(line.substring(dspos+1));
			ainfo = new AreaInfo(aname,price);
			
			// 判斷是國際碼還國內碼, 儲存到 Hash
			if(acode.startsWith("00")&&acode.length()>=3&&acode.length()<=5) {
				idd.put(acode,ainfo);
			} else {
				std.put(acode,ainfo);
			}
			
			acode = readToken();
		}
		
		// 讀取通話資料
		int i;
		int mins;
		int maxlen;
		boolean match;
		String sub;
		String fcode = readToken();
		
		while(!fcode.equals("#")) {
			ainfo = null;
			match = false;
			mins = parseInt(readToken());
			
			// 判別計費方式
			if(fcode.startsWith("0")) {
				// 先比對是否符合 IDD
				if(fcode.startsWith("00") && fcode.length()>=7 && fcode.length()<=15) {
					maxlen = Math.min(5,fcode.length()-4);
					for(i=3;i<=maxlen;i++) {
						acode = fcode.substring(0,i);
						if(fcode.length()-acode.length()>10) continue;
						ainfo = idd.get(acode);
						if(ainfo!=null) {
							match = true;
							break;
						}
					}
				}
				// 再比對是否符合 STD
				if(!match && fcode.length()>=6 && fcode.length()<=13) {
					maxlen = Math.min(6,fcode.length()-4);
					for(i=2;i<=maxlen;i++) {
						acode = fcode.substring(0,i);
						if(fcode.length()-acode.length()>7) continue;
						ainfo = std.get(acode);
						if(ainfo!=null) {
							match = true;
							break;
						}
					}
				}
			} else {
				// Local
				match = true;
			}

			// 輸出帳單
			if(ainfo!=null) {
				sub = fcode.substring(acode.length()); 
				displayBill(fcode,ainfo.name,sub,mins,ainfo.price);
			} else {
				if(match) {
					displayBill(fcode,"Local",fcode,mins,0);
				} else {
					displayBill(fcode,"Unknown","",mins,-1);
				}
			}

			fcode = readToken();
		}
	}

}
