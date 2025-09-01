

## 參考書

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


---

# 📚 12 個月 Literate Documentation 精讀與實作計畫

## **階段一（第 1–3 個月）基礎與理念：《Literate Programming》**

### 精讀重點

* **Preface + Chapter 1 (Why Literate Programming?)** → 理解核心思想：程式碼應該像文章。
* **Chapter 2 (Examples)** → 仔細讀 Knuth 的範例（如小型演算法），看他怎麼把「思路」和「程式碼」交織。
* **Chapter 7 (The Errors of TeX)** → Knuth 如何用 literate doc 分析並記錄錯誤，這有助於嵌入式系統 debug 文檔思維。

### 任務

* 每週選一個小型演算法（例如 bubble sort、embedded system 的簡單模組），自己用 noweb 或其他 literate 工具撰寫 literate doc。
* 模仿 Knuth 的語氣，專注於「為什麼這樣設計」而不只是「程式做了什麼」。
* 每篇文檔寫成「像一篇短文章」，逐步鍛鍊英文說明能力。

---

## **階段二（第 4–8 個月）實戰專案：《TeX: The Program》**

### 精讀重點（不用整本，選模組）

* **Introduction (Sections 1–20)** → 觀察 Knuth 如何從全局概述展開。
* **Memory Management (Sections 100–200)** → 看他如何用文字 + 程式碼講解複雜資料結構。
* **Paragraph Breaking Algorithm (Sections 860–1000)** → 這是 TeX 的經典演算法，Knuth 在這裡把數學推導與程式碼自然融合。
* **Error Handling 部分 (Sections 1000–1100)** → 特別有助於嵌入式系統寫 robust code 的 literate doc。

### 任務

* 選擇你在工作中用到的 **中型 embedded system 模組**（例如 BLE communication, power management, sensor fusion），參考 Knuth 的寫作方式，為其建立 literate doc。
* 每個月至少完成 **一個完整 literate module**，包含背景介紹、設計理由、演算法細節。
* 嘗試讓同事能讀懂這份 doc，即使他們不看程式碼。

---

## **階段三（第 9–12 個月）進階挑戰：《METAFONT: The Program》**

### 精讀重點

* **Introduction** → 看 Knuth 如何再次從零建立一個新系統的 literate doc。
* **Curve Drawing Algorithm (Sections 300–400)** → 觀察他如何解釋數學演算法並保持可讀性。
* **Device-Dependent Output (Sections 500–600)** → 特別適合對照 embedded system 中的硬體抽象層。

### 任務

* 用 literate programming 為 **一個完整 side project** 建立文檔（例如小型 RTOS module、低功耗 sensor driver、或你的工作 side project）。
* 要求：

  * 讀者能像讀書一樣理解你的系統。
  * 每個演算法都要有設計理由、邊界條件解釋。
  * 英文寫作風格儘量模仿 Knuth（精簡、準確、帶點數學化）。

---

# 🌟 附加建議（全年持續）

1. **英語寫作訓練**：

   * 每週挑選你寫的 literate doc，請 ChatGPT 幫你 refine 成更自然的英文。
   * 保留修改前後版本，建立「style corpus」來模仿。

2. **Abstraction Thinking 練習**：

   * 每次寫 literate doc 前，先寫一段「如果我要教一個大學生，該怎麼解釋這段程式？」
   * 這能幫助你把程式轉換成敘事，養成 Knuth 式的 abstraction 習慣。

3. **每月回顧**：

   * 每月花 1 小時回顧你的 literate doc：是否讓「非程式人」也能讀懂？是否有 Knuth 的味道？


---

## 📌 這些書裡的數學成分

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

---

## 🎯 如何把數學學進 literate doc 技能

### 1. **學數學的角度要換**

你不是在「證明定理」，而是要學 **怎麼把數學描述轉換成可執行的程式，然後再用自然語言說清楚**。
也就是說，數學在這裡不是「算題目」，而是「解釋演算法和設計的工具」。

---

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

---

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

---

## 🚀 最後的提升目標

當你把數學整合進 literate doc 時，你會獲得三種技能：

1. **數學抽象力** → 能把複雜的演算法用數學模型描述
2. **程式轉譯力** → 把數學公式翻譯成程式（或者 pseudocode）
3. **故事表達力** → 用自然語言講述「為什麼是這樣的數學、為什麼是這樣的程式」

這三者加起來，就能把你的 literate documentation 水平從「寫清楚」提升到「寫出有洞見的文章」，這正是 Knuth 的境界。
