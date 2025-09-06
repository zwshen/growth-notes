# Comprehensive Input Style Bilingual Study Guide Production Manual

> 目的：建立一套可重複、可擴充、避免版權爭議、對 B1–B2（可向上/向下調整）學習者友善的英文長篇閱讀精讀筆記產出流程。

---
## 0. 原則 (Principles)

1. Comprehensible Input：輸入可理解 + 有 5–15% 新挑戰詞。
2. 不重貼受版權保護原文；只做意譯摘要與自寫例句。
3. 結構化：固定段落編號 + 標題層級 + 詞彙區。方便日後自動化抽取 / 轉 CSV / Anki。
4. 一致格式；避免 tab；Markdown lint 友好（空行、清晰 lists）。
5. 語言雙向：中文幫助快速理解；英文保持原用法感知。
6. 可溯源：段落編號與原文段落一一對應（不含標題）。

---
## 1. 基本流程 (Workflow Overview)

| 步驟 | 內容 | 產出 |
|------|------|------|
| 1 | 取得原始 Markdown / Text | 原文檔案 |
| 2 | 段落切分與編號 | 段落列表 (P1..Pn) |
| 3 | 段落難度掃描 | 粗估 CEFR / 生詞密度 |
| 4 | 撰寫 B1–B2 中文大意 | 每段 1–3 句摘要 |
| 5 | 詞彙挑選 | 每段 4–8 詞（長段可 10）|
| 6 | 詞條資訊補全 | 形態 / IPA / 詞性 / 中文義 / 英例句 / 中譯 |
| 7 | 格式渲染 | Heading + bullet 樣板 |
| 8 | QA / Lint | Markdown 格式 & 重複檢查 |
| 9 | 衍生輸出 | 生成 Vocab CSV / Anki / 減量版 |

---
## 2. 段落處理 (Paragraph Handling)

- 切分基準：以「空行」為界；純標題不算段落。
- 遇到超長段（>180 words）可：
  # Comprehensive Input Style Bilingual Study Guide Production Manual
---
## 5. 詞條格式 (Entry Template)

```markdown
* word (/IPA/) 詞性 — 精準中文義
  * Example: 自寫英文例句（≤14 詞） 中文翻譯。
```

- IPA：英式或混合即可，保持一致來源（建議 Cambridge）。
- 詞性：縮寫統一（n. / v. / adj. / adv. / phr. / idiom）。
- 例句策略：
  - 不抄原文句子；可局部結構借用但換語意或主語。
  - 長詞彙（如 abstraction）例句降低其它難度詞密度。
  - 動詞盡量給常見搭配：exert influence / sustain growth。
  - 名詞顯示語義範疇：A cognitive leap reshaped early human society.
- 若為抽象詞，例句加一個具體主語（Scientists, Traders, Early humans）。

---

## 6. 格式規範 (Formatting Conventions)

- 標題層：`##`（指南主題）→ `### 第 n 段`。
- 段落大意：獨立一行以「大意：」。
- 詞彙區塊前：`詞彙：`。
- 無 tab；僅空格；列表項目前後需空一行避免 MD032。
- 子例句縮排：兩個空格 + `*`（保持與上一層分界清楚）。
- 段落間空一行，不多堆空白。
---

## 7. 難度調整 (Level Adaptation)

| 層級 | 摘要句數 | 詞數/段 | 例句複雜度 | 補充策略 |
|------|----------|---------|------------|-----------|
| A2 | 1 | 3–4 | 一般現在式 | 可加圖片提示（外部系統） |
| B1–B2 | 1–2 | 4–8 | 現在 / 過去 / 基本從句 | 保留搭配標示 |
| C1 | 2–3（含推論） | 6–10 | 複合句 / 名詞化 | 增加語源 / 詞族 |
---

## 8. QA / 品質檢查 (Quality Checklist)

| 項目 | 檢查 | 狀態 |
|------|------|------|
| 段落編號連續 | 無跳號 / 重複 |  |
| 無原文長段 Copy | 只意譯 |  |
| IPA 一致 | 無混亂標記 |  |
| 例句長度 | ≤14 英文詞 |  |
| 專有名詞首字母 | 正確 |  |
| Markdown Lint | 無 MD007/010/032 等 |  |
| 無重複詞過量 | 同詞出現 ≤3 段 |  |
| 中英語序自然 | 無直翻痕跡 |  |
---

## 9. 衍生輸出 (Derivative Outputs)

1. Vocab CSV：欄位建議：`paragraph,word,ipa,pos,cn_meaning,en_sentence,cn_sentence,lemma,collocation`。
2. Anki：Front = 英詞 + IPA + 標記詞性；Back = 中文義 + 英例 + 中譯 + (Optional) 近義詞。
3. Frequency List：用語料統計（e.g. wordfreq, spaCy）→ 排除最常見 2K 詞後做加權。
4. 減量速讀版：僅保留每 5 段合併摘要 + 詞表 Top 3。
---

## 10. 半自動化建議 (Automation Ideas)

| 任務 | 工具 / 方法 | 備註 |
|------|-------------|------|
| 斷段 | Regex `\n\n+` | 先清理多餘空白 |
| 詞頻 | Python wordfreq / nltk FreqDist | 過濾停用詞 |
| 詞性標註 | spaCy / Stanza | 幫助挑詞平衡詞性 |
| IPA 批次 | Cambridge API / local dict | 需注意授權 |
| Lint | markdownlint-cli | CI 驗證格式 |
| 產 CSV | 自寫 script -> pandas | 與 Anki 導出整合 |
---

## 11. 模板 (Mini Template)

```markdown
### 第 X 段

大意：...(≤2 句)。

詞彙：
* term (/ˈtɜːm/) n — 中文義
  * Example: 自寫例句（≤14 詞） 中文。
* ...
```

---
## 12. 版本控制與檔案命名 (Versioning & Naming)

- 原文：`c01.md`、`c02.md` ...
- 指南附錄：直接附在每章後或獨立 `c01_study.md`。
- 通用手冊：本檔 `COMPREHENSIVE_INPUT_GUIDE.md`。
- CSV：`c01_vocab.csv`。
- Anki Deck：`c01_vocab_apkg/`（建包工具輸出）。
- 版本註記：於章末新增 `> Guide v1.1 (YYYY-MM-DD)`。

---
## 13. 常見錯誤 (Common Pitfalls)

| 問題 | 說明 | 修正 |
|------|------|------|
| 無空行 | 列表黏標題出 lint | 在 list 上下加空行 |
| Tab 字元 | 造成縮排 lint | 全部轉空格 |
| 例句太長 | 讀者負擔大 | 精簡主幹 + 善用動詞 |
| 詞義塞太多 | 初學者負荷高 | 保留語境義 + 補充派生於備註 |
| 重複詞 | 浪費篇幅 | 若已出現兩次則改給近義 |
| 抄書中句型 | 版權 & 失去再造價值 | 重構語序 / 不複製專句 |

---
## 14. 延伸：進階層 (Advanced Layer Options)

| Layer | 說明 | 增加內容 |
|-------|------|----------|
| Grammar Focus | 聚焦語法結構 | 標示關鍵句式 (e.g. concessive clauses) |
| Discourse | 篇章銜接 | 標記轉折 / 因果鏈 |
| Morphology | 詞形學 | 標示詞根 + 常見派生 |
| Etymology | 語源 | 拉丁 / 希臘來源提示 |

---
## 15. 產出評估指標 (Evaluation Metrics)

| 指標 | 量化建議 |
|------|----------|
| Coverage (詞表覆蓋核心概念) | ≥ 90% 章節關鍵術語 |
| Avg New Words / 段 | 5–7 (長段可 8–10) |
| 例句重複率 | 相同例句 0% |
| 讀者回饋理解度 | 快速測驗 ≥80% 正確 |
| Lint 無錯 | 100% |

---
## 16. 更新紀錄 (Changelog)

| 版本 | 日期 | 說明 |
|------|------|------|
| v1.0 | 2025-09-06 | 初版建立 |

---
## 17. 後續可加功能 (Next Ideas)
- 自動檢測已出現詞 → 建議避免重複。
- 產生 Cloze 減詞練習（依出場次序遮蔽）。
- 雙層詞表：核心 vs. 推薦（延伸）。
- 自動產生 CEFR 標籤（透過 wordfreq/語料標註）。
- 以 front-matter 寫入 JSON metadata，方便生成應用。

---
**End of Guide**
