# Weekly 20% Learning Schedule (8×1h) — Template

**Strategy:** 8 blocks × 1 hour each (8 hours/week). Flexible placement across the week; good for people with many meetings.

**Goal:** Each 1-hour block should produce a verifiable output (short doc, code chunk, unit test, or PR).

---

## Overview

- **Strategy:** 8 × 1-hour blocks across the week (total 8h = 20% of a 40h work week)
- **Goal:** Each block produces a clear deliverable and a 2-line Resume Note at the end
- **Best practices:** Prepare a micro-task card before each block; keep environment ready (repo, tangle script, toolchain)

---

## Suggested 8×1h Calendar (editable)

> Move blocks to times that fit your meetings. If a block is interrupted, record a Resume Note and reschedule the remainder.

| Block | Suggested Time | Recommended Focus / Goal |
|---|---:|---|
| Block 1 | Mon 08:30–09:30 | Deep reading — Knuth close reading + 3-sentence summary
| Block 2 | Mon 16:30–17:30 | Tangle → build → run unit test (practical coding)
| Block 3 | Tue 08:30–09:30 | Write pre/postconditions for one function in the literate doc
| Block 4 | Tue 16:30–17:30 | Copilot experiment — spec → code skeleton in doc
| Block 5 | Wed 12:00–13:00 | Minimal example + compile (small runnable demo)
| Block 6 | Thu 08:30–09:30 | Refactor a complex function into named chunks
| Block 7 | Thu 16:30–17:30 | Write or expand a unit test and run locally / CI
| Block 8 | Fri 12:30–13:30 | PR / documentation wrap-up (README or changelog snippet)

Notes: adjust times to match your timezone and meeting schedule.

---

## Micro-task Card Template (use per 1-hour block)

```
Title: [Short task title]
Estimate: 1 hour
Goal (done criteria): e.g., unit test passes / doc 150–300 words / tangle OK
Preconditions: repo on dev branch, tangle script ready, toolchain available
Steps (suggested):
  1) Open literate doc chunk
  2) Implement or document (30–40 min)
  3) Tangle → build → run test (15–25 min)
  4) Write Resume Note (2 lines)
Resume Note (end of block): Status / Next step (2 lines)
```

Keep one micro-task card per block in your task manager or paste it into the calendar cell.

---

## Suggested Micro-tasks (1-hour friendly)

1. Close-read a Knuth paragraph and write a 3-sentence summary with an application note
2. Write pre/post for one API function and add it to the literate doc
3. Tangle one named chunk and compile a minimal example
4. Use Copilot to generate a skeleton and refine it inside the doc
5. Write a single unit test for an edge-case and run locally
6. Refactor a function: split into 2–3 named chunks and update docs
7. Add a hardware register snippet to the appendix and document assumptions
8. Write a short design-decision note (trade-offs, 3–5 lines)

---

## Weekly Review (15–30 minutes)

Use this short template at the end of the week to capture progress and plan next week:

- **What I learned:**
- **What I built (outputs):**
- **Blocked by / Issues:**
- **Next week focus:**

**KPI suggestions:** at least 3 verifiable outputs per week (since blocks are smaller), or 1 larger artifact every 4 weeks. Every 6 weeks, prepare a shareable artifact (blog, repo, internal talk).

---

## Tips & Small Practices

- Treat each block as a meeting in your calendar and avoid cancelling it lightly.
- End each block with a 2-line Resume Note so you can resume quickly next time.
- Keep micro-tasks atomic and measurable; prefer commit/test/doc as an acceptance criterion.
- Use GitHub issues labeled `20%-learning` for tracking and linking PRs.
- Use PRs as learning acceptance — include doc + test + any code changes in the same PR.

---

*Edit this file to match your preferred block times (e.g., different morning/evening slots). Want me to generate a downloadable `.md` file for you? I can create and provide the link.*

