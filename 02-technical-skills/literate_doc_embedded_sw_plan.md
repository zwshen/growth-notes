
# Literate Doc

## 核心心法（一句話）

把「說明」當成**設計的高階語言**：用清楚、分層的自然語言來表達需求、假設、API 與不變量（invariants），讓程式碼成為能被機器執行的低階證明或例證（code = runnable proof / example）。

## 要培養的三種思維（abstraction thinking）

1. **分層思維（Layering）**

   * 把系統拆成「需求 / API / 行為規格 / 實作 / 測試」這幾層。每一層都用一段 prose 描述「為什麼存在」和「契約(contract)」。
2. **契約導向（Contract Thinking）**

   * 對每個 module/函式寫 precondition/postcondition、邊界情況、錯誤模式與複雜度。把這些契約放在文件靠前的位置。
3. **最小抽象（Small Abstractions）**

   * 寫出最小但通用的抽象：不要一開始就抽象成太多泛用 library，先用 concrete examples 驗證再泛化。

## 讀 Knuth（TeX / Metafont / WEB）時的高效策略

Knuth 的文本是**範例＋說明**並重，要把「閱讀」變成「練習」：

1. **主動閱讀，不是被動掃過**：對每個 code chunk 做三件事 — 讀、執行（tangle/compile）與重寫（用你熟悉的工具/語言改寫一次）。
2. **逐段 close reading**：每讀一節，回答：作者解決了什麼設計困難？用了什麼抽象？有哪些不可見的假設？把答案寫成 1–3 句 summary。
3. **把書裡的 chunk 用現代工具重做**：把一段 WEB 範例用 org-mode 或 noweb 重寫並 tangle，看能否產出可編譯的 artifact。
4. **模仿 Knuth 的敘事結構**：Knuth 經常先講動機 → 再講 data-structure → 最後講演算法與實作。練習用同一結構寫你的 module。
5. **做邊讀邊寫的筆記本**：每讀完一章，寫一小節「我會如何把這段寫進我們專案的 literate doc」，並做一個小 PR 把它試著 merge 回現有 repo（或放到 private gist）。

## 如何把抽象思維轉成好文件（寫作技巧）

* **先寫設計故事（Design Narrative）**：一開頭用 3–5 行說明「問題 + 目標 + 限制條件（硬體、timing、memory）」。這是讀者（未來的你）決定是否繼續看實作的門檻。
* **契約區塊（Contract / API）放在靠前**：把 API 與使用範例（example call sequence）寫在文件前段，實作在後段。
* **用小節名做索引（named chunks）**：每個 code chunk 都給一個語意化的名字例如 `<<uart:init-hw>>`，並在 prose 中直接引用（像 Knuth 一樣）。
* **「設計決策」清單**：每個有 trade-off 的地方（重試次數、buffer size、blocking vs non-blocking）都寫成一個短條目：選項、結論、理由、可能的替代方案。
* **把測試與驗證放在文件裡**：測試案例不要只放在 test folder — 在 literate doc 內把「測試目的」→「步驟」→「成功標準」寫清楚，並把實際測試程式 tangle 出來。
* **用最簡範例先說明（minimal example）**：先放一個能跑的 minimal example，讓讀者快速理解「這東西是怎麼用的」。

## 把現有 embedded project 轉成 literate doc：逐步流程（可直接套用）

1. **選一個小模組做 pilot（最好 1–2 個 .c/.h）**，例如 UART 或 I²C driver（目標：在 1–2 天內完成初版）。
2. **寫設計敘事（30–60 分鐘）**：文件開頭寫 5 行目的 + 3 個使用情境 + 1 個 minimal example（使用 code block）。
3. **列出 contract（15–30 分鐘）**：函式清單、pre/post condition、error code。
4. **拆 chunk**：把現有程式碼依功能拆成 6–12 個 named chunks（init、tx、rx、irq、error、helper）並把 chunk 名放到 prose 的相應位置。
5. **tangle 一次**：用你選的 literate 工具（org-mode or noweb），tangle 出 .c/.h 並 compile。修正直到可編譯。
6. **補測試**：在 literate doc 中加入 unit-test chunk，tangle 出 test 程式並執行（host 或 QEMU）。
7. **寫設計決策 & trade-offs**：把為何做成這樣的理由（含硬體限制）寫進 doc。
8. **PR 與 Review**：在 repo 開一個 branch，把 literate 檔當成主要變更（而非直接改 .c），讓 reviewer 看「設計→程式→測試」流程。
9. **迭代**：根據 review 將 prose 改成更清楚的契約描述，再 tangle 出新 code。

## 具體寫作格式模板（可直接複製）

```
Title: [module name] — short 1-liner motivation

1. 概要（1 paragraph）
2. 使用情境（3 example calls / sequences）
3. API & Contract
   - func foo(arg): pre: ..., post: ..., error: ...
4. 設計敘事（motivations, constraints）
5. 最小範例（可立刻 tangle 的 code block）
6. Implementation (分 named chunks)
   <<chunk:init>>=
   /* code */
   @
   <<chunk:send>>=
   /* code */
   @
7. 測試與驗證（test cases，expected outputs）
8. 性能 / memory / timing 分析（粗量）
9. 設計決策 & 危險點（alternatives & why not）
10. 待辦 / TODOs / 改進想法
```

## 寫作與溝通的 heuristics（容易忽略但很有效）

* **每個段落首句說重點（lead with the result）**：讀者快速掃描就知道重點。
* **把可能誤解放成 FAQ（小節）**：列 3 個常見迷思或誤用方式並回答。
* **把硬體具體值寫清楚（clock, regs, DMA channels）**：這些細節若缺失，文件價值大減。
* **在 prose 放「失敗例子」**：寫一個錯誤用法並說明會怎樣壞。教訓勝於一切。
* **每次改 code 同步改文檔**：把 tangle 放進 CI，PR 無法通過除非文檔同步。

## 練習計畫：8 週到 12 週（把能力練到可持續執行）

Week 1：學 Knuth 的敘事風格 + 實作一個小 WEB / org 範例（tangle -> build）。
Week 2：寫 1 個完整 module 的 literate doc（含測試）。
Week 3：把 module 交給同事 review，收 feedback 並修正。
Week 4：把另一個 module 轉換，練習 trade-off 文檔段落。
Week 5：閱讀 Knuth 的一章（TeX 或 Metafont），close read 並把一個範例重寫到你的工具。
Week 6：寫一篇 1000 字的教學（怎麼把 legacy driver 轉成 literate doc），發 PR 或發 blog。
Week 7：把 tangle 流程加入 CI（自動化 build + run unit tests）。
Week 8：回顧並把你的模板整理成一個 repo / cheat-sheet，準備內部 workshop。

## 如何判斷你已經「超一流」了（可量化的信號）

* 任何人看你的 literate doc（10 分鐘）能複述出：功能目的、API、2 個限制、1 種 failure mode。
* 透過文檔可直接產生可編譯的 artifact（tangle）且 CI 綠燈。
* PR 的技術討論從「implementation bug」變成「設計 trade-off」，表示文件把 implementation 隱藏成本降低了。
* 你能用文檔快速寫 test cases 模擬硬體 edge-case（不是靠硬體摸索）。

## 小工具與自動化（實作上會幫大量時間）

* 把 literate doc 放入 repo 的 main flow：`tangle -> build -> unit test`。
* 在 PR 模板中加入「文檔更新檢查清單」：API 改變、契約改變、測試更新。
* 用 lint（markdown lint / org linter）檢查文件風格一致性。
* 把常見片語（precondition, postcondition, invariant）做為 template snippet（VSCode snippet）。

## 最後，幾個快速可執行的練習（今天就能開始）

1. 選一個你最近改過但沒寫設計原因的函式，寫 10 行設計敘事（目的、contract、failure）。把它放到 repo 的 `docs/` 作為第一個 literate chunk。
2. 用 org-mode 或 noweb，把該函式改成一個名為 `<<foo>>` 的 chunk，tangle 並 compile（確保 build 直到 green）。
3. 寫一個 unit test（host）來驗證一個 edge-case，並把 test 的步驟寫在文檔裡。
   （如果你願意，把這個小改動的內容貼上來，我可以立即幫你把那 10 行設計敘事改成更好的版本，或直接把它轉成 org-mode 範例。）
