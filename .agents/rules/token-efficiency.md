---
name: token-efficiency
description: Rules to optimize token usage and AI quota consumption during workspace tasks.
---

# Token and Quota Optimization Rules for Antigravity

To save AI tokens and quota, the agent must adhere strictly to these guidelines:

## 1. Communication & Output
- **Absolute Conciseness**: Be extremely brief. Avoid greetings, pleasantries, and sign-offs (e.g., "Certainly!", "Here is...", "I hope this helps").
- **No Code Repetition**: Do not reprint unmodified code blocks in your chat responses.
- **Short Summaries**: Keep summaries of actions taken to 1-2 lines. Do not re-summarize content that is already written in artifacts (like `implementation_plan.md` or `walkthrough.md`).
- **Direct Answers**: Answer questions directly without lengthy introductory explanations.

## 2. File and Directory Operations
- **Targeted Views**: When reading files using `view_file`, do not read the entire file if only a specific section is relevant. Use `StartLine` and `EndLine` to read only the lines of interest.
- **Precise Edits**: Use `replace_file_content` or `multi_replace_file_content` to edit only the exact lines that need modification. Never rewrite or replace large chunks or entire files.
- **Efficient Searching**: Use `grep_search` with specific query parameters and glob filters rather than searching broadly or reading multiple files to find references.

## 3. Command Execution
- **Control Output Size**: When running terminal commands that might output large amounts of text (e.g., `git log`, `composer show`, `npm list`), always limit the output using options like `-n <limit>`, `head`, or redirection.
- **No Polling**: Do not poll or loop on commands. Trust the reactive wakeup system to notify you when a task completes.

## 4. Planning and Artifacts
- **Minimal Artifacts**: Keep `implementation_plan.md`, `task.md`, and `walkthrough.md` highly compact. Use short bullet points. Do not write extensive paragraphs.
- **Skip Planning for Minor Changes**: For trivial changes (bug fixes, formatting, minor config edits), do not create a full implementation plan. Perform the change directly and explain it briefly.

## 5. Tool Usage
- Use the most specific tool for the job. Do not run general commands (like `cat` or `dir` via terminal) if specialized tools (like `view_file` or `list_dir`) are available.
