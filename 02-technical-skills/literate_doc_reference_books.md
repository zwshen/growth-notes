# 參考書

1. **《Literate Programming》 (1992)**

   * 這是 Knuth 的論文集，收錄他在 1980 年代提出和發展 literate programming 的文章。
   * 內容包含他對 *WEB* 系統的設計理念，以及一些完整範例。
   * 這本書是理論和哲學性最強的，幾乎是 literate programming 的「宣言」。

2. **《TeX: The Program》 (1986)**

   * TeX 是 Knuth 設計的排版系統，而這本書就是 TeX 的 **完整程式碼 + literate documentation**。
   * 全書用 WEB 系統寫成，展示了如何用 literate programming 來組織一個龐大的、工業級的專案。
   * 特點是 **每個演算法都有數學推導與設計理由**，不只是程式碼註解。

3. **《METAFONT: The Program》 (1986)**

   * 與 TeX 一樣，這本書是 METAFONT 系統的完整 literate documentation。
   * 重點在字型設計演算法、數學曲線控制（筆劃、貝茲曲線）。
   * 同樣展示了 literate programming 如何讓程式碼變成「可閱讀的書」。

所以，如果你想學習 Knuth 的寫作風格與 literate doc 能力，**最好順序是**：

1. 先從《Literate Programming》精讀，理解理念與小範例。
2. 再選讀《TeX: The Program》的一部分（不必整本，挑模組），學習他怎麼寫大專案的文檔。
3. 《METAFONT》則可以作為「第二個完整專案」的參考。


## 12 個月 Literate Documentation 精讀與實作計畫

### 階段一（第 1–3 個月）基礎與理念：《Literate Programming》

#### 精讀重點

* **Preface + Chapter 1 (Why Literate Programming?)** → 理解核心思想：程式碼應該像文章。
* **Chapter 2 (Examples)** → 仔細讀 Knuth 的範例（如小型演算法），看他怎麼把「思路」和「程式碼」交織。
* **Chapter 7 (The Errors of TeX)** → Knuth 如何用 literate doc 分析並記錄錯誤，這有助於嵌入式系統 debug 文檔思維。

#### 任務

* 每週選一個小型演算法（例如 bubble sort、embedded system 的簡單模組），自己用 noweb 或其他 literate 工具撰寫 literate doc。
* 模仿 Knuth 的語氣，專注於「為什麼這樣設計」而不只是「程式做了什麼」。
* 每篇文檔寫成「像一篇短文章」，逐步鍛鍊英文說明能力。

### 階段二（第 4–8 個月）實戰專案：《TeX: The Program》

#### 精讀重點（不用整本，選模組）

* **Introduction (Sections 1–20)** → 觀察 Knuth 如何從全局概述展開。
* **Memory Management (Sections 100–200)** → 看他如何用文字 + 程式碼講解複雜資料結構。
* **Paragraph Breaking Algorithm (Sections 860–1000)** → 這是 TeX 的經典演算法，Knuth 在這裡把數學推導與程式碼自然融合。
* **Error Handling 部分 (Sections 1000–1100)** → 特別有助於嵌入式系統寫 robust code 的 literate doc。

#### 任務

* 選擇你在工作中用到的 **中型 embedded system 模組**（例如 BLE communication, power management, sensor fusion），參考 Knuth 的寫作方式，為其建立 literate doc。
* 每個月至少完成 **一個完整 literate module**，包含背景介紹、設計理由、演算法細節。
* 嘗試讓同事能讀懂這份 doc，即使他們不看程式碼。


### 階段三（第 9–12 個月）進階挑戰：《METAFONT: The Program》

#### 精讀重點

* **Introduction** → 看 Knuth 如何再次從零建立一個新系統的 literate doc。
* **Curve Drawing Algorithm (Sections 300–400)** → 觀察他如何解釋數學演算法並保持可讀性。
* **Device-Dependent Output (Sections 500–600)** → 特別適合對照 embedded system 中的硬體抽象層。

#### 任務

* 用 literate programming 為 **一個完整 side project** 建立文檔（例如小型 RTOS module、低功耗 sensor driver、或你的工作 side project）。
* 要求：

  * 讀者能像讀書一樣理解你的系統。
  * 每個演算法都要有設計理由、邊界條件解釋。
  * 英文寫作風格儘量模仿 Knuth（精簡、準確、帶點數學化）。

##  附加建議（全年持續）

1. **英語寫作訓練**：

   * 每週挑選你寫的 literate doc，請 ChatGPT 幫你 refine 成更自然的英文。
   * 保留修改前後版本，建立「style corpus」來模仿。

2. **Abstraction Thinking 練習**：

   * 每次寫 literate doc 前，先寫一段「如果我要教一個大學生，該怎麼解釋這段程式？」
   * 這能幫助你把程式轉換成敘事，養成 Knuth 式的 abstraction 習慣。

3. **每月回顧**：

   * 每月花 1 小時回顧你的 literate doc：是否讓「非程式人」也能讀懂？是否有 Knuth 的味道？


## 這些書裡的數學成分

**《TeX: The Program》** 和 **《METAFONT: The Program》** 都不只是程式碼，而是摻雜了大量的 **數學公式、演算法、資料結構設計**。這也是為什麼 Knuth 的 literate doc 與一般技術文檔完全不同——因為它不只是「記錄程式」，而是「把數學和程式合在一起，寫成一篇可以被閱讀的論文」。

* **TeX**

  * 段落分割（paragraph breaking）：動態規劃（Dynamic Programming）
  * 排版數學式：數學公式結構與 parsing
  * 字體間距計算：比例與懲罰函數（penalty functions）

* **METAFONT**

  * 曲線繪製：貝茲曲線、樣條（splines）
  * 幾何運算：向量、交點、斜率
  * 解析度與 rasterization（位圖生成）：數學近似與數值方法

這些內容本身就是 **Computer Science + Applied Math**，Knuth 把它們翻譯成「故事 + 程式碼」。

## 🎯 如何把數學學進 literate doc 技能

### 1. **學數學的角度要換**

你不是在「證明定理」，而是要學 **怎麼把數學描述轉換成可執行的程式，然後再用自然語言說清楚**。
也就是說，數學在這裡不是「算題目」，而是「解釋演算法和設計的工具」。

### 2. **學習路徑**

* **先補演算法數學**：

  * 動態規劃、貪婪演算法、圖論（排版和曲線處理都有用）
  * 這些在《算法導論》（CLRS）或 Knuth 的《TAOCP Vol.1-3》都有。
* **再補應用數學**：

  * 基礎線性代數（矩陣運算、向量、投影）
  * 基礎數值方法（迭代法、近似）
  * 曲線方程（特別是 Bezier 和 spline）
* **最後練習 literate doc**：

  * 嘗試把「數學公式」翻譯成「演算法解釋」→ 再配上程式碼。

### 3. **具體訓練方法**

1. **小數學公式轉 doc**

   * 拿一個簡單的數學公式，例如二次方程式 $ax^2+bx+c=0$。
   * 嘗試寫 literate doc：

     * 說明「為什麼需要解這個方程式」
     * 展示推導過程
     * 最後給一段 pseudocode 或程式碼

2. **數學 → 程式 → 故事**

   * 例如 Knuth 的「段落分割」演算法：

     * 數學：定義 badness function
     * 程式：計算每個可能分割的 cost
     * 故事：用文字講「程式如何嘗試不同斷行，選出總懲罰最小的組合」

3. **跟著 TeX / METAFONT 的例子走**

   * 先不要嘗試全部重現，選取其中一小段（比如 TeX 的 line-breaking）
   * 模仿 Knuth 的寫法，把數學 + 程式交織寫成文檔
   * 這樣你會真正「學到」如何在 literate doc 中處理數學。

## 最後的提升目標

當你把數學整合進 literate doc 時，你會獲得三種技能：

1. **數學抽象力** → 能把複雜的演算法用數學模型描述
2. **程式轉譯力** → 把數學公式翻譯成程式（或者 pseudocode）
3. **故事表達力** → 用自然語言講述「為什麼是這樣的數學、為什麼是這樣的程式」

這三者加起來，就能把你的 literate documentation 水平從「寫清楚」提升到「寫出有洞見的文章」，這正是 Knuth 的境界。


## 🎯 Knuth 的 literate doc 境界

**「Donald Knuth 的 literate programming 與一般 technical writing 差異到底在哪裡？」**

Knuth 的 literate documentation 已經超越「程式碼註解」或「技術文件」，而是達到 **學術文章、數學論文、故事敘事** 三者的融合：

1. **程式是故事，不只是代碼**

   * 他不是「說明程式在做什麼」，而是「講一個設計者思考的故事」。
   * 讀者不是在「讀 source code」，而是在「跟著作者走一遍解題過程」。

2. **數學、程式、文字三位一體**

   * 他能自然地把數學公式（理論）、程式碼（實作）、文字（解釋）交織在一起。
   * 沒有一部分是「附加的」，而是相互補充。

3. **經得起時間的文件**

   * Knuth 寫的 literate doc 可以在幾十年後依然被當成「學習演算法、數學思維、程式設計」的教材。
   * 它的價值遠超程式碼本身，因為它保留了完整的思維過程。


## 例子 1：TeX 的段落斷行（line breaking algorithm）

在《TeX: The Program》裡，Knuth 討論如何決定換行位置。

* 一般工程師寫法：

  ```c
  // Try breaking lines greedily
  // Compute penalty if line is too short or too long
  // Pick the best option
  ```
* Knuth 的寫法（簡化後）：

  * 他先定義一個 **badness function**：衡量一行字距離理想寬度有多「壞」。
  * 再解釋「如果只看單行會造成全局不好，所以要用動態規劃」。
  * 然後展示數學公式：

    $$
    demerits = sum(badness^2 + penalties)
    $$
  * 最後才把它變成 Pascal 代碼。

結果是，讀者在看到程式碼之前，已經明白 **為什麼程式要這樣設計**。


## 例子 2：METAFONT 的曲線繪製

在《METAFONT: The Program》裡，Knuth 解釋如何畫光滑曲線。

* 他不是直接給出 spline 演算法，而是先說：

  * 曲線必須平滑 → 需要連續的一階、二階導數
  * 如何保證？用三次貝茲曲線（cubic Bézier curves）
  * 再用一段故事解釋「為什麼 Bézier 比其他方法更合適」
* 接著才展示演算法，最後給出 Pascal 代碼。

這樣，讀者讀完後，不只是學到「這段程式怎麼跑」，而是學到 **電腦如何用數學把一條曲線畫出來**。


## 例子 3：《Literate Programming》導論

在《Literate Programming》第一章，他甚至用簡單程式展示理念：

* 同一份文件可以「編譯」成：

  1. **程式碼**（可執行）
  2. **文章**（可閱讀）

這種 **雙重產出** 的方式，讓程式設計提升到「文學創作」的高度。

## Knuth 的境界，用一句話總結

別人寫程式時，留下的是 **程式碼**；
Knuth 寫程式時，留下的是 **程式設計的思想與故事**。

這就是他能被認為「超一流」的原因。


## 📖 範例：TeX 的斷行演算法 (line breaking)

### 1️⃣ 普通技術文件寫法

（這是一般軟體工程師可能會寫的設計文件）

```
我們需要將一段文字分成多行，讓每一行的長度接近理想寬度。
演算法步驟：
1. 從左到右檢查單詞。
2. 如果目前行長度超過最大寬度，換行。
3. 計算每行與理想寬度的差距。
4. 選擇總體差距最小的換行位置。

程式碼實作如下：
```

```pascal
procedure break_lines(words, max_width);
begin
  current_width := 0;
  for each word in words do
    if current_width + width(word) > max_width then
    begin
      new_line;
      current_width := 0;
    end;
    print(word);
    current_width := current_width + width(word);
end;
```

👉 這樣的寫法功能上可以，但 **只描述了程式的流程**，讀者知道怎麼跑，但不知道為什麼這樣設計。



### 2️⃣ Knuth 的 literate doc 寫法（簡化後重現）

（來自 *TeX: The Program*，我把長篇數學推導簡化給你看）

```
The problem of breaking a paragraph into lines is more than a matter of greedily
fitting as many words as possible. If we break lines too early or too late,
the overall appearance suffers.

To quantify this, let us define a measure of "badness".
Suppose a line has an ideal length L, and the actual line has length A.
The badness is proportional to the cube of the relative difference:

    badness = 100 * (|A - L| / L)^3

This function penalizes very loose or very tight lines more severely.

Now the challenge is: choosing breaks not for each line independently, but so
that the sum of squared badness values over the whole paragraph is minimized.

This is a classic dynamic programming problem.

Let us implement the algorithm.
```

```pascal
procedure break_paragraph;
begin
  compute_badness_table;
  for each feasible breakpoint do
    compute_least_demerits;
  choose_breaks_with_minimum_demerits;
end;
```

👉 你會發現 Knuth 的寫法：

* **不是直接寫程式碼**，而是先告訴你「為什麼」需要 badness function。
* 他用數學公式定義美學準則（行寬差異立方懲罰）。
* 他把問題抽象成「全域最佳化」而不是「局部貪婪解」。
* 最後才給你 Pascal 程式。



## 差異總結

| 普通技術文件    | Knuth 的 literate doc   |
| --- | --- |
| 描述功能、流程   | 講故事：先有動機、再定義原則、再轉換成演算法 |
| 直接寫代碼註解   | 數學公式 + 思考過程 + 程式碼      |
| 讓人知道「怎麼做」 | 讓人知道「為什麼這樣做」           |
| 只能維護程式    | 可以作為經典教材、數學範例          |



這就是 **Knuth 的境界**：他的 literate doc 不是只為了讓「下一個工程師能讀懂程式」，而是讓「後世的人能理解思想」。
