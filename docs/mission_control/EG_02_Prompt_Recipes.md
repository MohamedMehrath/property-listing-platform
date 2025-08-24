# Prompt Recipes

This document contains a curated list of effective prompts for interacting with the AI Executive Lead (Jules). Use these "recipes" to streamline common development tasks, from generating code to planning new features.

## General Purpose Prompts

---

### **Recipe: Refactor a File**

**When to Use:** When you identify a file with poor code quality (e.g., mixed logic, large functions, security vulnerabilities).

**Prompt:**
> Hello Jules,
>
> Please refactor the file at `[path/to/file]`.
>
> Your primary goals are:
> 1.  **Separate Concerns:** Isolate the PHP logic, database queries, HTML, and JavaScript into separate, manageable parts.
> 2.  **Improve Security:** Replace any deprecated or insecure functions (like `mysql_*`) with modern, secure alternatives (e.g., PDO with prepared statements).
> 3.  **Enhance Readability:** Add comments, improve variable names, and break down large functions into smaller, single-purpose ones.
> 4.  **Increase Test Coverage:** Write unit tests for the extracted business logic to ensure correctness and prevent future regressions.
>
> Please create a new branch for this refactoring and submit a pull request for review when you are done.

---

### **Recipe: Create a New Feature**

**When to Use:** When you need to build a new feature from a business requirement.

**Prompt:**
> Hello Jules,
>
> Please implement the following feature: `[Describe the feature in plain language, e.g., "Add a user profile page that displays the user's name, email, and recent activity."]`
>
> To do this, please follow the Goal-to-Roadmap generator located in the `00_PROJECT_COMMAND_CENTER.md`. I will approve the plan before you begin implementation.

---

### **Recipe: Investigate a Bug**

**When to Use:** When a bug has been reported and you need to find the root cause.

**Prompt:**
> Hello Jules,
>
> I am investigating a bug. Here is the description:
> `[Describe the bug, including steps to reproduce, expected behavior, and actual behavior.]`
>
> Please analyze the codebase to identify the root cause of this issue. Provide a summary of your findings and a proposed plan to fix the bug.

---
