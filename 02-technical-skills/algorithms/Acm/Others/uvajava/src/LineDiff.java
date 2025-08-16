import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.IOException;

public class LineDiff {
	
	public static int wa_count = 0;
	public static int pe_count = 0;
	public static int blen1;
	public static int blen2;
	public static byte[] bary1 = new byte[1000];
	public static byte[] bary2 = new byte[1000];
	public static FileInputStream fstd;
	public static FileInputStream fans;

	public static final boolean displayHex = false;
	public static final boolean removeCR = true;
	
	// 比較作答答案和標準答案
	public static void compareLine(int num) {
		int i;
		int len;
		boolean ac = false;
		boolean pe = false;
		
		if(blen1==blen2) {
			for(i=0;i<blen1;i++) {
				if(bary1[i]!=bary2[i]) break;
			}
			ac = i==blen1;
		}
		
		if(!ac) {
			len = blen1;
			String stdln = new String(bary1,0,len);
			len = blen2;
			String ansln = new String(bary2,0,len);
			
			String[] tokens1 = stdln.trim().split("\\s+");
			String[] tokens2 = ansln.trim().split("\\s+");
			if(tokens1.length==tokens2.length) {
				for(i=0;i<tokens1.length;i++) {
					if(!tokens1[i].equals(tokens2[i])) break;
				}
				pe = i==tokens1.length;
			}
			
			if(pe) {
				pe_count++;
				System.out.printf("第 %d 行格式錯誤 ",num);
			} else {
				wa_count++;
				System.out.printf("第 %d 行答案錯誤 ",num);
			}
			
			System.out.print("(正確值: ");
			System.out.print(stdln);
			if(displayHex) {
				for(i=0;i<blen1;i++) {
					System.out.printf(" 0x%02x",bary1[i]);
				}
			}
			
			System.out.print(", 計算值: ");
			System.out.print(ansln);
			if(displayHex) {
				for(i=0;i<blen2;i++) {
					System.out.printf(" 0x%02x",bary2[i]);
				}
			}
			System.out.println(")");
		}
	}
	
	// 標準答案和作答答案各讀取一行
	public static boolean readLine() {
		int ch;
		
		try {
			blen1 = 0;
			ch = fstd.read();
			if(ch==-1) return false;
			while(ch!=-1&&ch!='\n') {
				bary1[blen1++] = (byte)ch;
				ch = fstd.read();
			}
			if(removeCR && blen1>0) {
				if(bary1[blen1-1]=='\r') blen1--;
			}
			
			blen2 = 0;
			ch = fans.read();
			if(ch==-1) return false;
			while(ch!=-1&&ch!='\n') {
				bary2[blen2++] = (byte)ch;
				ch = fans.read();
			}
			if(removeCR && blen2>0) {
				if(bary2[blen2-1]=='\r') blen2--;
			}
		} catch(IOException ex) {
			System.out.println(ex.getMessage());
		}
		
		return true;
	}
	
	public static void main(String[] args) {
		if(args.length==2) {
			try {
				fstd = new FileInputStream(args[0]);
				fans = new FileInputStream(args[1]);
				
				int linenum = 1;
				while(readLine()) {
					compareLine(linenum++);
				}
				
				if(wa_count==0 && pe_count==0 && linenum>1) {
					System.out.println("完全正確");
				} else {
					if(linenum>1) {
						System.out.println("------------");
						System.out.printf("%d 行答案之中\n",(linenum-1));
						System.out.printf("%d 行格式錯誤\n",pe_count);
						System.out.printf("%d 行答案錯誤\n",wa_count);
					} else {
						System.out.printf("沒有輸出值");
					}
				}
				
				fstd.close();
				fans.close();
			} catch(FileNotFoundException ex) {
				System.out.println(ex.getMessage());
			} catch(IOException ex) {
				System.out.println(ex.getMessage());
			}
		}
	}
	
}
