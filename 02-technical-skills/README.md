# 02 - 技術技能 (Technical Skills)

程式設計、電腦科學與相關技術領域的學習。


## 📚 子目錄與內容

### algorithms/
演算法與競程訓練，包含 ACM 競程題目與相關資料。

### computer-science/
電腦科學基礎理論與系統設計
- computer-system.md、cs_study_plan.md
- nand2tetris/：課程筆記、PDF、projects/、tools/ 等
- taocp/：Knuth 閱讀反思筆記
- reading-ThePragmaticProgrammer.md: 《程式設計師修練之道》閱讀筆記

### embedded-system/
嵌入式系統與心智模型
- mentalmodel-embedded-programming.md
- esbb/：BLOCKS/、HPLISTC/、TO/、UCOS-II/ 等嵌入式相關資料

---

如需詳細內容，請參閱各子目錄下的 README 或筆記文件。

## 學習目標

建立紮實的技術基礎，培養程式設計思維，提升解決複雜問題的能力。

---

## Literate Programming（可執行文件化開發）

本目錄新增了「Literate Programming」資源，用自然語言敘事＋可抽取（tangle）程式碼的方式來做設計與實作：

- `literate_doc_plan.md`：實作心法與落地流程（如何分層、寫契約、tangle→build→test）。
- `literate-doc-template.nw`：noweb 模板，可直接複製改名後使用。

### 快速開始（Windows）

1) 複製模板並替換占位符（如 `<<module_name>>`, `<<module_prefix>>`）
	- 建議命名：`your-module.nw`

2) Tangle（抽取程式碼）與 Weave（產出說明文件）
	- 可參考模板內的「Build & tangling instructions」章節與 `<<Makefile.snip>>` 片段。
	- 若已安裝 noweb 工具，以下命令供參考（可選）：
	  ```powershell
	  # 可選：抽取實作與標頭
	  notangle literate-doc-template.nw > .\out\example.c
	  notangle -index -noerrors -output=.\out\example.h literate-doc-template.nw

	  # 可選：產生 TeX，後續可用 pdflatex 轉 PDF
	  noweave literate-doc-template.nw > .\out\example.tex
	  ```
	- 如果你偏好自動化，可把模板中的 `<<Makefile.snip>>` 片段加入專案 Makefile。

3) 工具安裝建議（其一即可）
	- 使用 WSL（推薦）：在 WSL 內透過套件管理器安裝 noweb／TeX，再於專案目錄執行 tangle/weave。
	- 或使用套件管理器（例如 Chocolatey）安裝 noweb/TeX（依個人環境而定）。

4) 工作流建議
	- 在文件前段寫設計敘事與 API 契約；實作與測試以 named chunks 組織。
	- 把「tangle → build → test」放入 CI，確保文檔與程式碼同步。

更多細節與練習路線，請閱讀 `literate_doc_plan.md`；模板的使用方式與常見片段，請看 `literate-doc-template.nw` 內文。