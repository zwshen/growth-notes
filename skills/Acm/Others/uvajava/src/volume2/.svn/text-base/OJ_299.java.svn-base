package volume2;
import java.util.StringTokenizer;

/**
 * 299 Train Swapping: 氣泡排序法
 * 測驗結果: 0.010 ms
 * 測驗日期: 2008-09-10
 * @author Raymond Wu (小璋丸)
 */
public class OJ_299 {

	public static int[] carriges = new int[50];;
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

	public static int bubbleSort(int count) {
		int i,j;
		int temp;
		int swap_count = 0;

		for(i=0;i<count-1;i++) {
			for(j=i+1;j<count;j++) {
				if(carriges[i]>carriges[j]) {
					temp = carriges[i];
					carriges[i] = carriges[j];
					carriges[j] = temp;
					swap_count++;
				}
			}
		}

		return swap_count;
	}
	
	public static void main(String[] args) {
		int i,j;
		int count;
		int cases = Integer.parseInt(readLine());

		for(i=0;i<cases;i++) {
			count = Integer.parseInt(readLine());
			StringTokenizer st = new StringTokenizer(readLine());
			for(j=0;j<count;j++) carriges[j] = Integer.parseInt(st.nextToken());
			System.out.printf("Optimal train swapping takes %d swaps.\n",bubbleSort(count));
		}
	}

}
