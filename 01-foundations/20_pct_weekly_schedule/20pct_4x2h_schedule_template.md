# Weekly 20% Learning Schedule (4×2h) — Template

**Strategy:** 4 blocks × 2 hours each (8 hours/week). Recommended days: Mon, Tue, Thu, Fri.

**Goal:** Each block should produce one small, verifiable output (e.g., a code chunk + test, a 200-word design note, or a PR).

---

## Week Overview

- **Strategy:** 4×2h blocks (8h/week)
- **Recommended output per block:** one micro-task with clear done-criteria
- **How to use:** copy this markdown into your editor or README, then edit times/days to match your calendar.

---

## Weekly Calendar (editable)

> Replace suggested blocks with times that match your calendar. Move any block that collides with fixed meetings.

| Time / Day | Monday | Tuesday | Wednesday | Thursday | Friday |
|---|---:|---:|---:|---:|---:|
| 08:00–10:00 | **Learning Block**<br>Deep reading / write design note |  |  | **Copilot experiment**<br>spec → code skeleton |  |
| 10:15–12:15 |  | **Focus Block**<br>tangle / build / test |  |  |  |
| 13:30–15:30 |  |  |  |  |  |
| 15:45–17:45 |  |  |  |  | **PR / CI / Wrap-up**<br>write README / run CI |
| Notes | Fill with personal clashes, prefered focus times, or recurring meetings | | | | |

---

## Micro-task Card Template (copy for each block)

```
Title: [Short task title]
Estimate: 30min / 1h / 2h
Goal (done criteria): e.g., unit test passes / doc 200 words / tangle OK
Preconditions: repo on dev branch, tangle script ready
Steps:
  1. open docs/xyz.nw or .org chunk
  2. write pre/post and minimal example
  3. tangle -> build -> run test
Resume Note (end of block): Status / Next step (2 lines)
```

Place one Micro-task Card inside the calendar cell or keep them in your task manager (Notion / GitHub issues).

---

## Suggested Micro-tasks (30–60min each)

1. Read a Knuth section and write a 3-sentence summary
2. Write pre/postcondition for one function (200 words)
3. Break an existing .c function into a named chunk and tangle
4. Add a minimal usage example to the literate doc
5. Use Copilot to generate a function skeleton inside the doc
6. Write a unit test (host) and run in CI
7. Draft a design-decision note (trade-offs, 3 lines)
8. Add a hardware register map to appendix
9. Create or test Makefile tangle step
10. Refactor complex code into smaller chunks
11. Add an FAQ entry for a common misuse
12. Draw an ASCII statechart and include it in the doc
13. Write a Resume Note and attach to the issue
14. Make CI run tangle as a pre-build step
15. Write a 500-word short tutorial for a pattern
16. Do a 30-min peer review and collect feedback

---

## Weekly Review (30 minutes)

Use this template at the end of the week to track progress and plan next week:

- **What I learned:**
- **What I built (outputs):**
- **Blocked by / Issues:**
- **Next week focus:**

**KPI suggestions:** at least 1 verifiable output per week (code chunk + test or a 200-word technical note). Every 6 weeks, prepare a shareable artifact (blog, repo, internal talk).

---

## Tips & Small Practices

- Put each block as calendar events and treat them as meetings (don’t cancel lightly).
- End each block with a 2-line Resume Note so you can resume fast.
- Keep micro-tasks atomic and measurable.
- Use GitHub issues with label `20%-learning` for tracking.
- Use PRs as learning acceptance — include doc + test in the same PR.

---

*Edit this file to match your preferred time blocks (e.g., 8×1h or 1×8h). Want me to generate a version for 8×1h? Ask and I’ll create it.*

