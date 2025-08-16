bool solution[10];  // 十個物品

int weight[10] = {4, 54, 1, ..., 32};   // 十個物品分別的重量
int cost[10] = {3, 3, 11, ..., 23};     // 十個物品分別的價值

const int maxW = 100;   // 背包承載上限
int maxC = 0;           // 出現過的最高總值

void backtrack(int n, int w, int c)
{
    // it's a solution
    if (n == 10)
    {
        if (c > maxC)   // 紀錄總值最高的
        {
            maxC = c;
            store_solution();
        }
        return;
    }

    // 放進背包
    if (w + weight[n] < maxW)   // 檢查背包超載
    {
        solution[n] = true;
        backtrack(n+1, w + weight[n], c + cost[n]);
    }

    // 不放進背包
    solution[n] = false;
    backtrack(n+1, w, c);
}


bool answer[10];    // 正確答案

void store_solution()
{
    for (int i=0; i<10; ++i)
        answer[i] = solution[i];
}
