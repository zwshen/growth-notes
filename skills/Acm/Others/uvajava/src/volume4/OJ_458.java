package volume4;
/**
 * 458 The Decoder: 不要用 System.out.print 以及 char 型態, 必死!!
 * 測驗結果: 通過 0.500ms
 * 測驗日期: 2008-09-16
 * @author Raymond Wu (小璋丸)
 */
public class OJ_458 {

	public static void main(String[] args) {
		try {
			int i = System.in.read();
			while(i!=-1) {
				if(i!=10) i-=7;
				System.out.write(i);
				i = System.in.read();
			}
			System.out.flush();
		} catch(Exception e) {
			
		}
	}

}