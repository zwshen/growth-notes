
# 每週 20%（以 40 小時工時算 = 8 小時/週）三種常見分配策略（選一個）

**A. 深度日（1 天/週）**

* 1 個整天（8h）或 1 個半天＋1 個半天（2×4h）。
* 適合需要連續思考、原型或重構。
* 優點：低上下文切換；缺點：若整天被會議打斷會失去產出。

**B. 固定短區塊（4×2h）** ← 我常推薦給工程師

* 每週固定 4 個 2 小時 block（例如週一/二/四/五各 2h）。
* 兼顧深度與靈活度，容易放在早上或午後的 focus 時段。

**C. 碎片化微時段（8×1h 或 16×30min）** ← 適合會議多的人

* 每次 30–60 分鐘，分散在一週各天。
* 要做好「Resume Note」習慣以避免上下文成本。

選一個主策略（例如 B），並把它寫進行事曆（blocking）。不要用「空白時間」——把它當正式會議。

# 碎片化時間的實作流程（習慣與工具）

1. **日曆鎖定（不可輕易取消）**

   * 把每個 block 設為「Focus: 20%學習」，標明目標（短句）。
2. **每個 block 用「1–2 個微任務」驅動**

   * 不要把 block 當成「open time」，每個 block 前 1 分鐘取出 micro-task 卡片（見下方模板）。
3. **Resume Note（每個 block 結束前 3 分鐘）**

   * 寫 2 行：現在狀態、下一步要做什麼（讓下次 30 秒內回到進度）。例：`已完成：把 UART init chunk tangle 成功。下次：填 tx loop，預估 45min`。
4. **預先準備環境（減少 setup cost）**

   * 把常用 repo clone、編譯指令、tangle script 放在桌面或 VSCode workspace。
   * 建好 snippet（README template、API contract template）。
5. **時間盒 + 番茄鐘**

   * 30/25/50 分鐘內完成一個明確輸出（閱讀一節、寫一個 contract、跑一次 tangle）。
6. **把 micro-tasks 當成 GitHub issues**

   * 用 label `20%-learning`，每個 issue 寫清預估時間（30min / 1h / 2h）與完成標準。方便用 PR 關聯與追蹤。
7. **把學習輸出最小化為「可驗證成果」**

   * 每個 block 結束產出：一段 doc（100–300 字）、一個 code chunk、一個單元測試、一個 commit。
8. **利用會議/同步時間**

   * Lunch 30min → 閱讀 Knuth 節選並寫 3 句 summary（可在 Slack 分享）。
   * stand-up 後 15min → 讀測試結果或快速修一個 small bug（把它當 learning exercise）。
9. **搭配 Pair / Office Hours**

   * 每兩週找 30–60min 與同事 pair-review literate doc（feedback 快速提升寫作品質）。

# Micro-task 卡片模板（每個 micro-task 都用這個）

```
Title: [短一句]
Estimate: 30min / 1h / 2h
Goal: (明確可驗證) e.g., 完成 uart_read 的 pre/post 與一個 unit-test
Preconditions: repo on dev branch, tangle script ready
Steps:
  1. open docs/uart.org chunk <<uart:read>>
  2. write pre/post (5–8 行)
  3. tangle -> build -> run test
Expected outcome: unit test passes / doc段落 150 字
Resume-note: (2 行) current status / next step
```

把這張卡存在 Notion / GitHub issue / task board，上工前先挑一張。

# 具體週時程範例（採 B：4×2h，週8h外加 1h零碎）

假設你每天早上 09:00 有 30 分鐘低會議，偏好早上做學習：

* 週一 08:00–10:00（2h） — 深度閱讀 + 寫 1 節 Knuth close reading（產出 200 字 summary + 應用筆記）
* 週二 14:00–16:00（2h） — 把一個實作 micro-task 做完（tangle + build + test）
* 週四 08:00–10:00（2h） — Copilot 實驗：用自然語言寫 API spec 並生成 skeleton，貼回 literate doc
* 週五 15:00–17:00（2h） — PR / write README snippet / run CI（把成果正式化）
* 零碎 30–60min（任選時間） — lunch read 或補 Resume Note、整理週回顧

如果會議多、用碎片化 30min：

* 每日上午 09:00–09:30（閱讀）
* 每日下午 15:00–15:30（實作小段）
* 每週三 12:30–13:30（深度 1h：tangle + test）

# 針對 Literate Programming 的 16 個微任務（每個 30–60 分鐘）

1. 讀 Knuth 一小節並寫 3 句 summary（理解動機）
2. 為一個函式寫 pre/postcondition（200 字）
3. 把現有一個 .c 函式拆成 1 個 named chunk（tangle）
4. 在文檔內寫最小 usage example（能編譯）
5. 用 Copilot 產生函式 skeleton（在 doc 裡）並修改
6. 寫一個簡單 unit test（host）並在 CI 跑通
7. 寫一個設計決策短段（trade-offs 3 行）
8. 把一個硬體 register map加進 appendix（copy+format）
9. 建立一個 Makefile snippet 並測試 tangle step
10. 重構一段程式，把複雜段落轉成更小 chunk
11. 為 doc 加一個 FAQ 條目（常見誤用）
12. 製作一張小的 ascii statechart（放在 doc）
13. 寫一個 Resume Note（將狀態紀錄到 issue）
14. 調整 CI：把 tangle 作為 build 預備步驟
15. 寫一小段 blog-style 教學（500 字）解釋一種 design pattern
16. 做一次同儕 review：請同事 30 分鐘內 review doc並回饋

把這些當 backlog；每天挑 1–2 個完成。

# 追蹤、衡量與回顧（週期性習慣）

* **每週 30 分鐘回顧**：What I learned, What I built, Next week's focus（把結果寫到 Notion 或 PR notes）。
* **KPI（簡單）**：每週至少 1 個可執行輸出（code chunk + tangle + test）或 2 篇 100–300 字的技術筆記。
* **每 6 週檢視**：整理出「能放到 resume / 分享會」的產物（公開 repo、blog、internal talk）。
* **度量上下文成本**：若你發現 >50% 的 blocks 被會議打掉，調整成更多短時段或跟 manager 協商把某個早晨固定為 focus 時段。

# 小技巧（實戰級）

* **預先寫好 Resume Note 模板**，放 VSCode snippet：`// RESUME: status / next`，每次 block 結束快速呼叫。
* **一切微任務都要有「完成標準」**，避免半成品堆積。
* **把學習當成「產出導向」**：每次學習要可展示 — 一段文檔、一個測試、一個 PR。
* **用 PR 做「學習驗收」**：把 literate doc 放在 PR，讓 reviewer 看設計、程式、測試一次性通過。
* **把會議轉為學習機會**：午餐分享（15–20min）把你這週學到的一件事講給同事聽，能強化記憶也取得反饋。
