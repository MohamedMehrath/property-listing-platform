# Project Command Center

**Objective:** To serve as the single source of truth and primary interface for all project stakeholders. This dashboard is the primary output of the AI Executive Lead.

---

## Part 1: Project Vitals (Automated Monitoring)

| Metric | Status | Details & Recommended Action |
| :--- | :--- | :--- |
| **Dependency Health** | 🚨 Critical | No `package.json` or `composer.json` found. Dependencies like jQuery (v1.11.1) and Bootstrap (v3.3.4) are vendored directly and are severely outdated, posing a significant security risk. **Action:** Audit all libraries for known vulnerabilities (CVEs). Prioritize creating a plan to manage dependencies using a modern tool like Composer or npm and update these libraries to stable, secure versions. |
| **Code Quality** | 🚨 Critical | A refactoring from the deprecated `mysql_*` functions to modern PDO with prepared statements is underway. Key pages (`delete_item_admin.php`, `user_delete.php`) have been updated, but a significant number of files (30) still use the old, insecure functions. **Action:** The highest priority is to **complete the `mysql_*` to PDO refactoring** across the entire application to eliminate SQL injection vulnerabilities. Address remaining "spaghetti code" and duplicated helper functions like `GetSQLValueString` as part of this effort. |
| **Accessibility (A11y)** | ⚠️ Needs Attention | A scan revealed widespread accessibility issues. Many functional `<img>` tags (for links and buttons) are missing `alt` attributes or use vague placeholder text (e.g., `alt="rr"`), making the site difficult to navigate for users with screen readers. **Action:** Create a task to audit and fix all `alt` tags to ensure they clearly describe the image's content or the link's function. |
| **Performance Bottlenecks** | ⚠️ Needs Attention | The "N+1 query" problem on the main data entry form (`insert.php`) **has been fixed** via the `get_dropdown_data()` function. However, the pattern of fetching data with multiple, inefficient queries likely persists in other legacy files (e.g., `custom_searchold.php`). **Action:** Audit the top 5 most-used pages to identify and refactor remaining N+1 query issues by consolidating database calls. |
| **Documentation Freshness** | ⚠️ Needs Attention | The `mission_control` guide exists, but its contents (`Component_Catalog.md`, `Prompt_Recipes.md`) are currently placeholders. The documentation is not yet in sync with the actual codebase. **Action:** Begin populating the Component Catalog by documenting the newly refactored PDO database functions and the authentication flow. |

---

## Part 2: Strategic Action Center (Automated Task Generation)

This section automatically generates draft GitHub Issues for any `Critical` or `Recommended` actions identified in the Project Vitals scan.

### 🚨 Critical Actions
- [x] **Complete the Security Overhaul: Finish `mysql_*` to PDO Refactoring:** See Issue #1
  - **Task:** Identify all remaining files using `mysql_*` functions and refactor them to use the new PDO connection pattern found in `Connections/db.php`.
  - **Progress:** 2 files refactored, 30 remaining.
- [ ] **Audit and Upgrade Vendored Dependencies:** See Issue #2
  - **Task:** Identify all outdated JavaScript libraries (jQuery, Spry, etc.). Research their vulnerabilities and create a plan to upgrade them to secure, modern equivalents.

### ⚠️ Recommended Actions
- [ ] **Audit and Fix Image `alt` Tags for Accessibility:** See Issue #3
  - **Task:** Review all `<img>` tags in the application and provide descriptive `alt` text for non-decorative images, particularly those within `<a>` tags.
- [ ] **Identify and Fix Remaining N+1 Query Bottlenecks:** See Issue #4
  - **Task:** Analyze legacy pages like `custom_search.php` and `index1.php` for inefficient database loops and refactor them, potentially by extending the `get_dropdown_data` pattern.
- [ ] **Populate the Component Catalog:** See Issue #5
  - **Task:** Document the `get_db_connection` and `get_dropdown_data` functions in `docs/mission_control/EG_01_Component_Catalog.md` as the first entries.

---

## Part 3: Engineering Command Center (The "How-To" Guide)

This section contains the core engineering playbook for the project.

**Architectural Guardrails (Golden Rules):**
1.  **Never Mix Languages in One File:** PHP logic, HTML, CSS, and JavaScript must be in separate files. Follow the example set by `insert.php` and `insert_logic.php`.
2.  **All New Database Queries Must Use PDO:** Direct calls to `mysql_*` or `mysqli_*` are forbidden. Use the existing `get_db_connection` function and prepared statements.
3.  **No Business Logic in the Frontend:** Client-side code is for presentation and user interaction only. All business logic belongs on the server.
4.  **Consolidate Database Queries:** Avoid N+1 query patterns. Use `JOINs` or consolidated fetching functions like `get_dropdown_data` wherever possible.
5.  **Write for Humans, Not Just Machines:** Code must be clear, commented, and easy for another developer to understand. Adopting a specific coding style guide, like [PSR-12](https://www.php-fig.org/psr/psr-12/), is recommended.

**Component Catalog:**
- See the detailed guide here: [docs/mission_control/EG_01_Component_Catalog.md](./docs/mission_control/EG_01_Component_Catalog.md)

**Prompt Recipes:**
- See the detailed guide here: [docs/mission_control/EG_02_Prompt_Recipes.md](./docs/mission_control/EG_02_Prompt_Recipes.md)

---

## Part 4: Strategic Planning Unit (AI-Assisted Roadmapping)

Use the template below to translate business goals into a technical roadmap.

```markdown
---
**Business Goal:** [User fills this in.]
---
**Instructions for Jules:**
Based on the goal above, generate a technical roadmap. For each proposed step, include:
1.  **Task:** The engineering task.
2.  **Rationale:** How it serves the business goal.
3.  **Potential Risks & Mitigation:** What could go wrong (e.g., "Risk: Breaking change to API. Mitigation: Create a new versioned endpoint."), and how to prevent it.
4.  **Validation Plan:** How we will confirm the feature is working and successful (e.g., "Add analytics tracking; confirm via user testing.").
```

---

## Part 5: System Governance

Include the following prompt to trigger this system's update cycle.

> **Update Command Center:** "Hello Jules, please run the AI Executive protocol. Update the `00_PROJECT_COMMAND_CENTER.md`, refresh all Project Vitals, and automatically generate new draft issues for any critical or recommended actions."
