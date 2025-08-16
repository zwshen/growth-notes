package volume1;

import java.util.List;
import java.util.Vector;

/**
 * 109 SCUD Busters: Convex Hull 演算法 (注意第一個點不可以刪除, 否則可能產生凹多邊形)
 * 測驗結果: 通過 0.124ms
 * 測驗日期: 2009-11-05
 * 
 * @author Raymond Wu (小璋丸)
 */

// 點
class Vertex {
	
	int x;
	int y;
	
	public Vertex(int x, int y) {
		this.x = x;
		this.y = y;
	}
	
}

// 王國
class Kingdom {
	
	// 國界的多邊形
	double area;
	boolean locked = false;
	List<Vertex> polygon = new Vector<Vertex>();
	
	/**
	 * 產生一個國家版圖
	 * 
	 * @param vertices
	 */
	public Kingdom(List<Vertex> vertices) {
		// Convex Hull 演算法找出國界
		convexHull(vertices);
	}
	
	/**
	 * Convex Hull 演算法
	 */
	public void convexHull(List<Vertex> vertices) {
		int sx,lx;           // 左右範圍
		Vertex vcurr = null; // 目前拜訪的點
		Vertex vnext = null; // 下一次的選擇點
		
		// 取得左右範圍
		int i,x;
		lx = vertices.get(0).x;
		sx = vertices.get(0).x;
		for(i=1;i<vertices.size();i++) {
			x = vertices.get(i).x;
			if(x>lx) lx = x;
			if(x<sx) sx = x;
		}
		
		// 找最左的最上做為起點
		for(Vertex v : vertices) {
			if(v.x==sx && (vcurr==null || v.y>vcurr.y)) {
				vcurr = v;
			}
		}
		
		int dxs,dys; // 起始斜率
		int dxc,dyc; // 暫存斜率
		int dxt,dyt; // 測試斜率
		int lqc,lqt; // 長度平方(暫存/測試)
		int scmp;    // 斜率比較結果

		// 記憶起點
		polygon.add(vcurr);
		
		// 往左找斜率最大的點 （一樣大的斜率取距離最長的點)
		// 1. 定義起始斜率 (無限大)
		// 2. 測試左邊所有的點
		//    a. 先計算斜率, 篩選斜率比起始斜率小的 (斜率遞減)
		//    b. 在這些點裡面取斜率最大的, 若斜率相同取距離最長的
		//    c. 最佳的點為多邊形的下一個點
		// 3. 找到的斜率作為下次的起始斜率
		dys = 1; dxs = 0;
		while(vcurr.x<=lx) {
			dyc = -1; dxc = 0; lqc = 0;
			for(Vertex v : vertices) {
				if(v.x>=vcurr.x) {
					dyt = v.y - vcurr.y;
					dxt = v.x - vcurr.x;
					if(compareSlope(dyt,dxt,dys,dxs)==-1) {
						scmp = compareSlope(dyt,dxt,dyc,dxc);
						lqt  = dyt*dyt+dxt*dxt;
						if(scmp>=0) {
							if(scmp>0 || lqt>lqc) {
								vnext = v;
								dyc = dyt;
								dxc = dxt;
								lqc = lqt;
							}
						}
					}
				}
			}
			
			if(vnext==null) break;
			dys = dyc; dxs = dxc;
			polygon.add(vnext);
			vertices.remove(vnext);
			vcurr = vnext; vnext = null;
		}
		
		// 往右找斜率最大的點 （一樣大的斜率取距離最長的點)
		// 1. 定義起始斜率 (無限大)
		// 2. 測試右邊所有的點
		//    a. 先計算斜率, 篩選斜率比起始斜率小的 (斜率遞減)
		//    b. 在這些點裡面取斜率最大的, 若斜率相同取距離最長的
		//    c. 最佳的點為多邊形的下一個點
		// 3. 找到的斜率作為下次的起始斜率
		dys = 1; dxs = 0;
		while(vcurr.x>sx) {
			dyc=-1; dxc = 0; lqc = 0;
			for(Vertex v : vertices) {
				if(v.x<vcurr.x) {
					dyt = v.y - vcurr.y;
					dxt = v.x - vcurr.x;
					if(compareSlope(dyt,dxt,dys,dxs)==-1) {
						scmp = compareSlope(dyt,dxt,dyc,dxc);
						lqt  = dyt*dyt+dxt*dxt;
						if(scmp>=0) {
							if(scmp>0 || lqt>lqc) {
								vnext = v;
								dyc = dyt;
								dxc = dxt;
								lqc = lqt;
							}
						}
					}
				}
			}
			
			if(vnext==null) break;
			dys = dyc; dxs = dxc;
			polygon.add(vnext);
			vertices.remove(vnext);
			vcurr = vnext; vnext = null;
		}
		
		// 完成後計算面積
		evaluateArea();
	}
	
	/**
	 * 比較兩斜率的大小, 以分數形式處理無限的問題
	 *   m2 = dy1/dx1
	 *   m1 = dy2/dx2
	 * 
	 * @param dy2 第2組斜率的y差值
	 * @param dx2 第2組斜率的x差值
	 * @param dy1 第1組斜率的y差值
	 * @param dx1 第1組斜率的x差值
	 * 
	 * @return m2>m1傳回1, m2=m1傳回0, m2<m1傳回-1
	 */
	public int compareSlope(int dy2, int dx2, int dy1, int dx1) {
		if(dx2!=0 && dx1!=0) {
			// 兩數都不是無限大或無限小
			double test = dy2*dx1-dy1*dx2;
			return (int)Math.signum(test);
		} else {
			if(dx2!=0 || dx1!=0) {
				// 其中一個數是無限大或無限小
				if(dx2==0) {
					return dy2>=0 ? 1 : -1; // m1 無限大或無限小
				} else {
					return dy1>=0 ? -1 : 1; // m2 無限大或無限小
				}
			} else {
				// 兩個數都是無限大或無限小
				if(dy2>=0) {
					return dy1>=0 ? 0 : 1;  // m1 無限大
				} else {
					return dy1>=0 ? -1 : 0; // m1 無限小
				}
			}
		}
	}

	/**
	 * 計算國土面積
	 * 
	 * 0.5*Sigma[ x(i-1)y(i) - x(i)y(i-1)], i=>[1,n], v0=vn
	 */
	public void evaluateArea() {
		int i;
		int vcount = polygon.size();
		int x0,y0,x1,y1;
		int sigma = 0;

		x0 = polygon.get(0).x;
		y0 = polygon.get(0).y;
		for(i=vcount-1;i>=0;i--) {
			x1 = polygon.get(i).x;
			y1 = polygon.get(i).y;
			sigma += x0*y1-x1*y0;
			x0 = x1;
			y0 = y1;
		}
		
		area = sigma/2.0;
	}
	
	/**
	 * 檢查飛彈落點是否在領土內
	 * @param 飛彈落點
	 */
	public void lock(Vertex v) {
		if(locked) return;

		int x1,y1,x2,y2;
		int vcount = polygon.size();
		int cc = 0;
		double[] cx = new double[2];
		
		// 以 v 點畫水平線
		// 檢查水平線與多邊形的交點, 若發生下列兩種情況表示點在多邊形內
		// 1. 交點分別在 v 點的左邊和右邊
		// 2. v 點的水平線恰好是多邊形的邊
		x1 = polygon.get(vcount-1).x;
		y1 = polygon.get(vcount-1).y;
		for(int i=0;i<vcount;i++) {
			x2 = polygon.get(i).x;
			y2 = polygon.get(i).y;
			
			if((v.y-y1)*(v.y-y2)<=0) {
				if(y2!=y1) {
					// 非水平線, 求交點 x = [x2(y-y1)-x1(y-y2)]/y2-y1
					if(cc<2) {
						cx[cc++] = (double)(x2*(v.y-y1)-x1*(v.y-y2))/(y2-y1);
					}
				} else {
					// 水平線, 檢查 v 是否在邊上
					// v 若在邊界上 => 視同命中
					// v 若不在邊界上 => 繼續判斷
					if(v.y==y1 && (v.x-x1)*(v.x-x2)<=0) {
						locked = true;
						return;
					}
				}
			}
			
			x1 = x2;
			y1 = y2;
		}
		
		// 射線與邊界的交點分別在 v 的左邊和右邊
		// 若 v 在邊界上 (v.x-cx[0])*(v.x-cx[1])==0
		// 若 v 在國土外 (v.x-cx[0])*(v.x-cx[1])>0
		locked = (v.x-cx[0])*(v.x-cx[1])<=0;
	}
	
}

public class OJ_109 {
	
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
	
	// 轉成 int 型態 (比 Integer.parseInt() 快)
	public static int parseInt(String s) {
		int i;
		int mul = 10;
		int value;
		
		if(s.charAt(0)=='-') {
			value = 48-s.charAt(s.length()-1);
			for(i=s.length()-2;i>=1;i--) {
				value -= (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		} else {
			value = s.charAt(s.length()-1)-48;
			for(i=s.length()-2;i>=0;i--) {
				value += (s.charAt(i)-48)*mul;
				mul *= 10;
			}
		}
		
		return value;
	}
	
	public static void main(String[] args) {
		int i;
		int x,y;
		int vcount;
		Kingdom kingdom;
		Vector<Vertex> vertices;
		Vector<Kingdom> world = new Vector<Kingdom>();
		
		// 讀取所有的國家
		vcount = parseInt(readToken());
		while(vcount!=-1) {
			vertices = new Vector<Vertex>(vcount);
			for(i=0;i<vcount;i++) {
				x = parseInt(readToken());
				y = parseInt(readToken());
				vertices.add(new Vertex(x,y));
			}
			kingdom = new Kingdom(vertices);
			world.add(kingdom);
			vcount = parseInt(readToken());
		}
		
		// 發射飛彈
		Vertex v;
		String token = readToken();
		while(token!=null) {
			x = parseInt(token);
			y = parseInt(readToken());
			v = new Vertex(x,y);
			i = 0;
			for(i=0;i<world.size();i++) {
				world.get(i).lock(v);
			}
			token = readToken();
		}
		
		// 計算損害面積
		double total = 0;
		for(i=0;i<world.size();i++) {
			if(world.get(i).locked) {
				total += world.get(i).area;
			}
		}
		System.out.printf("%.2f\n",total);
	}

}
