#!/usr/bin/env python3
"""Extract text paragraphs (and headings) from HTML/XHTML into a Markdown file.

Features:
 - Preserves reading order by iterating over top-level body children.
 - Converts h1..h6 to Markdown # headings.
 - Extracts <p> text; by default skips figure/image paragraphs (class 'figure').
 - Converts <em>, <i> to *italic*, <strong>, <b> to **bold**.
 - Removes inline anchors used only as page markers (<a id="pageX"/>).
 - Collapses excessive whitespace.
 - CLI options to include figure captions and raw HTML debug output.

Usage:
  python scripts/extract_html_to_md.py path/to/file.htm -o output.md
  python scripts/extract_html_to_md.py eslinput/Sapiens/c01.htm

If no -o given, writes alongside input with .md extension.
"""

from __future__ import annotations

import argparse
import sys
from pathlib import Path
from typing import Iterable

from bs4 import BeautifulSoup, NavigableString, Tag  # type: ignore


BLOCK_HEADINGS = {f"h{i}" for i in range(1, 7)}


def html_to_markdown_text(html: str, include_figures: bool = False) -> str:
    """Convert full document preserving reading order.

    Uses a depth-first traversal and emits content when encountering block
    nodes of interest (headings, paragraphs).
    """
    soup = BeautifulSoup(html, "html5lib")  # robust to imperfect xhtml
    body = soup.body
    if body is None:
        return ""

    lines: list[str] = []

    for el in body.descendants:
        if not isinstance(el, Tag):
            continue
        name = el.name.lower()
        if name in BLOCK_HEADINGS:
            # Only output heading if it is not nested inside another heading
            if any(isinstance(p, Tag) and p.name.lower() in BLOCK_HEADINGS for p in el.parents):
                continue
            level = int(name[1])
            text = inline_text(el).strip()
            if text:
                lines.append(f"{'#' * level} {text}")
                lines.append("")
        elif name == "p":
            cls = el.get("class", [])
            if (not include_figures) and any(c == "figure" for c in cls):
                continue
            text = inline_text(el).strip()
            if text:
                lines.append(text)
                lines.append("")

    # Remove trailing blank lines
    while lines and lines[-1] == "":
        lines.pop()
    return "\n".join(lines) + ("\n" if lines else "")


def inline_text(node: Tag | NavigableString) -> str:
    """Convert an element subtree into inline Markdown text.

    Rules:
      - <em>/<i> -> *...*
      - <strong>/<b> -> **...**
      - <br> -> line break (\n)
      - <a> -> its text (ignore href)
      - <sup> digits -> ^[digits] footnote style (simple heuristic)
      - Strip standalone anchors with only id and no text.
    """

    if isinstance(node, NavigableString):
        return normalize_ws(str(node))

    name = node.name.lower()

    # Self-closing anchor used as a page marker
    if name == "a" and not node.text.strip():
        return ""

    pieces: list[str] = []
    for child in node.children:
        if isinstance(child, NavigableString):
            pieces.append(normalize_ws(str(child)))
        elif isinstance(child, Tag):
            cname = child.name.lower()
            if cname in {"em", "i"}:
                pieces.append(f"*{inline_text(child)}*")
            elif cname in {"strong", "b"}:
                pieces.append(f"**{inline_text(child)}**")
            elif cname == "br":
                pieces.append("\n")
            elif cname == "sup":
                sup_txt = child.get_text(strip=True)
                if sup_txt.isdigit():
                    pieces.append(f"^[{sup_txt}]")
                else:
                    pieces.append(f"^{sup_txt}")
            elif cname == "a":
                # Keep visible text only.
                pieces.append(inline_text(child))
            else:
                pieces.append(inline_text(child))

    out = "".join(pieces)
    out = normalize_ws(out)
    out = fix_emphasis_spacing(out)
    return out


def normalize_ws(text: str) -> str:
    # Replace consecutive whitespace (incl. newlines) with single space, but keep explicit newlines we inserted.
    # We'll split on \n and normalize each segment.
    segments = []
    for seg in text.splitlines():
        segments.append(" ".join(seg.split()))
    return "\n".join(filter(None, segments))


def fix_emphasis_spacing(text: str) -> str:
    """Ensure spaces around emphasis markers where missing.

    Example: "into*Homo" -> "into *Homo"; "*sapiens*will" -> "*sapiens* will".
    """
    import re

    # space before opening * if attached to alnum
    text = re.sub(r"([\w)])([*]{1,2})(\w)", r"\1 \2\3", text)
    # space after closing * if attached
    text = re.sub(r"(\w)([*]{1,2})([A-Za-z0-9])", r"\1\2 \3", text)
    return text


def process_file(path: Path, output: Path | None, include_figures: bool) -> Path:
    md_path = output or path.with_suffix(".md")
    html = path.read_text(encoding="utf-8")
    md = html_to_markdown_text(html, include_figures=include_figures)
    md_path.write_text(md, encoding="utf-8")
    return md_path


def parse_args(argv: Iterable[str]) -> argparse.Namespace:
    p = argparse.ArgumentParser(description="Extract HTML text paragraphs + headings into Markdown.")
    p.add_argument("input", type=Path, help="Input .htm/.html file")
    p.add_argument("-o", "--output", type=Path, help="Output markdown file path (default: same name .md)")
    p.add_argument("--include-figures", action="store_true", help="Include figure paragraphs (class=figure)")
    return p.parse_args(list(argv))


def main(argv: Iterable[str] = sys.argv[1:]) -> int:
    args = parse_args(argv)
    if not args.input.exists():
        print(f"[ERROR] Input file not found: {args.input}", file=sys.stderr)
        return 1
    out_path = process_file(args.input, args.output, args.include_figures)
    print(f"[OK] Wrote markdown: {out_path}")
    return 0


if __name__ == "__main__":  # pragma: no cover (simple script entry)
    raise SystemExit(main())
