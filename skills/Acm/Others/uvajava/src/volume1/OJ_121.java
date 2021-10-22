package volume1;

import java.util.Scanner;
import java.util.StringTokenizer;

/**
 * 121 Pipe Fitters: 數學問題
 * 
 * @author Raymond Wu (小璋丸)
 */
public class OJ_121 {
	
	public static int skewHcapacity(double length) {
		// 1+(n-1)*sin60 = length
		// (n-1)*sin60 = length-1
		// n-1 = (length-1)/sin60
		// n = 1+(length-1)/sin60
		final double sin60 = 0.8660254037844386;
		return 1+(int)Math.floor((length-1)/sin60);
	}

	public static int skewCapacity(double w, double h) {
		int cap1,cap2;
		int hs,vsl,vsh;
		
		hs = skewHcapacity(w);
		vsl = (int)Math.floor(h-0.5);
		vsh = (int)Math.floor(h);
		if(hs%2==0) {
			cap1 = (vsl+vsh)*hs/2;
		} else {
			cap1 = vsl*hs+(vsh-vsl)*(hs/2+1);
		}
		
		hs = skewHcapacity(h);
		vsl = (int)Math.floor(w-0.5);
		vsh = (int)Math.floor(w);
		if(hs%2==0) {
			cap2 = (vsl+vsh)*hs/2;
		} else {
			cap2 = vsl*hs+(vsh-vsl)*(hs/2+1);
		}
		
		return Math.max(cap1,cap2);
	}
	
	public static void main(String[] args) {
		int rcap,scap;
		double w,h;
		Scanner sc = new Scanner(System.in);
		
		while(sc.hasNextLine()) {
			StringTokenizer tok = new StringTokenizer(sc.nextLine());
			w = Double.parseDouble(tok.nextToken());
			h = Double.parseDouble(tok.nextToken());
			rcap = (int)w*(int)h;
			scap = skewCapacity(w,h);
			if(scap>rcap) {
				System.out.print(scap);
				System.out.println(" skew");
			} else {
				System.out.print(rcap);
				System.out.println(" grid");
			}
		}
	}

}
