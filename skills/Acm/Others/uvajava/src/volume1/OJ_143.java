package volume1;

/**
 * 143 Orchard Trees: 直線方程式 (小心特殊狀況)
 * 測驗結果: 通過 0.900ms
 * 測驗日期: 2009-06-17
 * 
 * 討厭的資料:
 *    1. 兩點重疊
 *    2. 三點重疊
 *    3. 有一條垂直線
 *    4. 三點在同一條垂直線上 
 *    5. 三角形的某一邊在 x=0, y=0, x=100, y=100 上
 * 
 * @author Raymond Wu (小璋丸)
 */

// 直線方程式 ax+by=c
class LineEQ {

	private double a;
	private double b;
	private double c;

	// 給兩個點產生直線方程式
	public LineEQ(double x1, double y1, double x2, double y2) {
		a = y2-y1;     // y2-y1
		b = x1-x2;     // x1-x2
		c = a*x1+b*y1; //a*x1+b*y1
	}

	public double findX(double y) {
		return (c-b*y)/a;
	}
	
	public double findY(double x) {
		return (c-a*x)/b;
	}

	public boolean isHorizontal() {
		return (a==0.0F);
	}
	
	public boolean isVertical() {
		return (b==0.0F);
	}
	
	public boolean isPoint() {
		return (a==0.0F && b==0.0F);
	}

	public boolean equals(LineEQ leq) {
		double ratea = a/leq.a;
		double rateb = b/leq.b;
		double ratec = c/leq.c;
		return (ratea==rateb && rateb==ratec);
	}

}

public class OJ_143 {

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
	
	public static String[] tk = new String[6];
	public static double[] x = new double[3];
	public static double[] y = new double[3];
	
	// 點由左到右排序
	public static void sortPoint() {
		int i,j;
		double temp;
		for(i=0;i<2;i++) {
			for(j=i+1;j<3;j++) {
				if(x[i]>x[j]) {
					temp = x[i]; x[i] = x[j]; x[j] = temp;
					temp = y[i]; y[i] = y[j]; y[j] = temp;
				}
			}
		}
	}
	
	// 讀取一組三角形
	public static boolean readTriangle() {		
		tk[0] = readToken();
		tk[1] = readToken();
		tk[2] = readToken();
		tk[3] = readToken();
		tk[4] = readToken();
		tk[5] = readToken();

		int i;
		for(i=0;i<6;i++) {
			if(!tk[i].equals("0")) break;
		}
		if(i==6) return false;
		
		x[0] = Double.parseDouble(tk[0]);
		y[0] = Double.parseDouble(tk[1]);
		x[1] = Double.parseDouble(tk[2]);
		y[1] = Double.parseDouble(tk[3]);
		x[2] = Double.parseDouble(tk[4]);
		y[2] = Double.parseDouble(tk[5]);
		
		return true;
	}

	public static int countCross(LineEQ leq) {
		// 以整數的 x 為基礎搜尋 y 也是整數的點
		int total = 0;
		
		if(leq.isVertical()) {
			// 垂直線要另外搞
			if(x[0]==(int)x[0] && x[0]!=0.0F && x[0]!=100.0F) {
				double ymin = Math.min(Math.min(y[0],y[1]),y[2]);
				double ymax = Math.max(Math.max(y[0],y[1]),y[2]);
				total = (int)(Math.floor(ymax)-Math.floor(ymin));
				if(ymin==Math.floor(ymin) && ymin!=0.0) total++;
				if(ymax==100.0F) total--;
			}
		} else {
			// 斜線和水平線這樣搞
			int x1 = (int)x[0];
			int x2 = (int)x[2];
			
			if(x1<x[0]) x1++;
			if(x1==0) x1 = 1;
			if(x2==100) x2 = 99;
			
			for(int x=x1;x<=x2;x++) {
				double fy = leq.findY(x);
				if(fy==Math.floor(fy) && fy!=0.0F && fy!=100.0F) total++;
			}
		}
		
		return total;
	}
	
	// 求兩條直線方程式在 x 介於 x1~x2 之間的區間所包圍的整數點個數
	public static int countBound(LineEQ leq1, LineEQ leq2, int x1, int x2) {
		int total = 0;

		if(x1==0)   x1 = 1;
		if(x2==100) x2 = 99;
		//System.out.printf("x1=%d,x2=%d\n",x1,x2);
		
		for(int x=x1;x<=x2;x++) {
			double y1 = leq1.findY(x);
			double y2 = leq2.findY(x);
			double ymax = Math.max(y1,y2);
			double ymin = Math.min(y1,y2);
			//System.out.printf("ymx=%f,yms=%f\n",ymax,ymin);
			if(ymax==100.0) ymax = 99.0;
			if(ymin==0.0)   ymin = 1.0;
			total += (Math.floor(ymax)-Math.floor(ymin));
			if(ymin==Math.floor(ymin) && ymin!=0.0) total++;
		}
		
		return total;
	}
	
	public static void main(String[] args) {
		int pcnt = 0;

		while(readTriangle()) {
			sortPoint();
			LineEQ leq1 = new LineEQ(x[0],y[0],x[1],y[1]); // 0,1
			LineEQ leq2 = new LineEQ(x[0],y[0],x[2],y[2]); // 0,2
			
			if(leq1.isPoint()) {
				if(leq2.isPoint()) {
					// 三點重疊, 檢查點的位置
					// System.out.println("三點重疊");
					boolean isontree = false;
					if(x[0]>0.0 && y[0]>0.0 && x[0]<100.0 && y[0]<100.0) {
						isontree = (x[0]==Math.floor(x[0]) && y[0]==Math.floor(y[0]));
					}
					pcnt = isontree ? 1 : 0;
				} else {
					// (x[0],y[0]) (x[1],y[1]) 重疊, 檢查方程式 leq2
					// System.out.println("0,1 重疊");
					pcnt = countCross(leq2);
				}
			} else {
				LineEQ leq3 = new LineEQ(x[1],y[1],x[2],y[2]); // 1,2

				if(leq2.isPoint() || leq3.isPoint()) {
					// (x[0],y[0]) (x[2],y[2]) 重疊, 檢查方程式 leq1 or leq3
					// (x[1],y[1]) (x[2],y[2]) 重疊, 檢查方程式 leq1 or leq2
					// 所以都檢查方程式 leq1 即可 ^^
					// System.out.println("0,2 重疊 or 1,2 重疊");
					pcnt = countCross(leq1);
				} else {
					int x1,x2;
					
					// 三點不重疊
					if(leq1.isVertical()) {
						if(leq3.isVertical()) {
							// 三點在同一條垂直線上
							// System.out.println("三點在同一條垂直線上");
							pcnt = countCross(leq1);
						} else {
							// 左邊有垂直線, 求 leq2, leq3
							// System.out.println("左邊有垂直線");
							x1 = (int)Math.floor(x[0]);
							if(x1<x[0]) x1++;
							x2 = (int)Math.floor(x[2]);
							pcnt = countBound(leq2,leq3,x1,x2);
						}
					} else {
						if(leq3.isVertical()) {
							// 右邊有垂直線 leq1, leq2
							// System.out.println("右邊有垂直線");
							x1 = (int)Math.floor(x[0]);
							if(x1<x[0]) x1++;
							x2 = (int)Math.floor(x[2]);
							pcnt = countBound(leq1,leq2,x1,x2);
						} else {
							// 沒有垂直線
							// System.out.println("沒有垂直線");
							x1 = (int)Math.floor(x[0]);
							if(x1<x[0]) x1++;
							x2 = (int)Math.floor(x[1]);
							pcnt = countBound(leq1,leq2,x1,x2);
							
							x1 = (int)Math.floor(x[1])+1;
							x2 = (int)Math.floor(x[2]);
							pcnt += countBound(leq2,leq3,x1,x2);
						}
					} // if(leq1.isVertical()) ...
				} // if(leq2.isPoint() || leq3.isPoint()) ...
			} // if(leq1.isPoint()) ...
			
			System.out.printf("%4d\n",pcnt);
		}
	}

}
