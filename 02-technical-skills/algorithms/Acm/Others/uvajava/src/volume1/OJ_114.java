package volume1;

import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;
import java.util.Vector;

/**
 * 114 Simulation Wizardry: 循環簡化處理, 網路上的測資看看就好
 * 測驗結果: 通過 0.944ms
 * 測驗日期: 2008-11-06
 * 
 * @author Raymond Wu (小璋丸)
 */

public class OJ_114 {

	static class Track {
		private int x;
		private int y;
		private int dir;
		private int life;
		private int score;
		
		public Track(int x, int y, int dir, int life, int score) {
			this.x = x;
			this.y = y;
			this.dir = dir;
			this.life = life;
			this.score = score;
		}
				
		@Override
		public boolean equals(Object obj) {
			Track t = (Track)obj;
			return (x==t.x && y==t.y && dir==t.dir);
		}		
	}
	
	private static int m;
	private static int n;
	private static int wallcost;
	
	private static Map<Integer,Integer> bumper_value;
	private static Map<Integer,Integer> bumper_cost;
	
	public static int play(int x, int y, int dir, int life) {
		int nx, ny;
		int grid;
		int score = 0;
		int cycle_idx = -1;
		boolean iswall;
		boolean isbumper;
		Track track = null;
		Vector<Track> ball_tracks = new Vector<Track>();
		
		while(life>1) {
			// 記憶軌跡和檢查循環
			track = new Track(x,y,dir,life,score);
			cycle_idx = ball_tracks.indexOf(track); 
			if(cycle_idx!=-1) {
				break; // 發現循環
			} else {
				ball_tracks.add(track); // 沒發現循環
			}
			
			// 生命-1, 計算新座標
			life--; nx = x; ny = y;
			switch(dir) {
				case 0:	nx++; break;
				case 1:	ny++; break;
				case 2:	nx--; break;
				case 3:	ny--; break;
			}
			
			// 檢查是否遇到障礙物
			grid = (ny-1)*m+(nx-1);
			iswall = (nx==1 || ny==1 || nx==m || ny==n);
			isbumper = bumper_value.containsKey(grid);
		
			if(iswall || isbumper) {
				// 轉向 90 度
				dir = (dir+3)&3;
				
				// 處理障礙物的分數和生命變化
				if(iswall) life -= wallcost;
				else if(isbumper) {
					score += bumper_value.get(grid); 
					life -= bumper_cost.get(grid);
				}
			} else {
				// 移動到新位置
				x = nx; y = ny;
			}
		}
		
		// 發現循環的狀況
		if(cycle_idx!=-1) {
			// 計算生命值差和分數差
			Track prev = ball_tracks.get(cycle_idx);
			int plife  = prev.life;
			int dlife  = plife - life;
			int dscore = score - prev.score;
			int minlife = life;
			
			// 取最大生命消耗
			for(int i=cycle_idx;i<ball_tracks.size();i++) {
				prev = ball_tracks.get(i);
				if(prev.life<minlife) minlife = prev.life;
			}
			int maxcost = plife-minlife;
			
			// 剩餘的生命扣除最大消耗後做循環處理
			if(life>maxcost*2) {
				int clife = life-maxcost;
				int loops = clife/dlife;
				int reminder = clife%dlife;
				score += loops*dscore;
				life = reminder+maxcost;
			}
			
			// 計算剩餘部份
			while(life>1) {
				// 生命-1, 計算新座標
				life--; nx = x; ny = y;
				switch(dir) {
					case 0:	nx++; break;
					case 1:	ny++; break;
					case 2:	nx--; break;
					case 3:	ny--; break;
				}
				
				// 檢查是否遇到障礙物
				grid = (ny-1)*m+(nx-1);
				iswall = (nx==1 || ny==1 || nx==m || ny==n);
				isbumper = bumper_value.containsKey(grid);
			
				if(iswall || isbumper) {
					// 轉向 90 度
					dir = (dir+3)&3;
					
					// 處理障礙物的分數和生命變化
					if(iswall) life -= wallcost;
					else if(isbumper) {
						score += bumper_value.get(grid); 
						life -= bumper_cost.get(grid);
					}
				} else {
					// 移動到新位置
					x = nx; y = ny;
				}
			}
		}
		
		return score;
	}
	
	public static void main(String[] args) {
		int i,x,y,l,d,v,c;
		int grid;
		int count;
		int score;
		int total = 0;
		
		Scanner sc = new Scanner(System.in);
		bumper_value = new HashMap<Integer,Integer>();
		bumper_cost = new HashMap<Integer,Integer>();
		m = sc.nextInt();
		n = sc.nextInt();
		wallcost = sc.nextInt();
		count = sc.nextInt();
		
		// 防撞桿資料
		for(i=0;i<count;i++) {
			x = sc.nextInt();
			y = sc.nextInt();
			v = sc.nextInt();
			c = sc.nextInt();
			grid = (y-1)*m+(x-1);
			bumper_value.put(grid,v);
			bumper_cost.put(grid,c);
		}
		
		// 進行彈珠模擬
		while(sc.hasNext()) {
			x = sc.nextInt();
			y = sc.nextInt();
			d = sc.nextInt();
			l = sc.nextInt();
			score = play(x,y,d,l);
			total += score;
			System.out.println(score);
		}
		
		System.out.println(total);
	}

}
