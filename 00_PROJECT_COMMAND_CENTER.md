# Project Command Center

**Objective:** To serve as the single source of truth and primary interface for all project stakeholders. This dashboard is the primary output of the AI Executive Lead.

---

## Part 1: Project Vitals (Automated Monitoring)

| Metric | Status | Details & Recommended Action |
| :--- | :--- | :--- |
| **Dependency Health** | 🚨 Critical | No `package.json` or `composer.json` found. Dependencies like jQuery, Spry, and accounting.js are vendored directly in the repository. **Action:** Audit all libraries for version, known vulnerabilities (CVEs), and license compliance. Create a plan to manage dependencies using a modern tool like Composer or npm. |
| **Code Quality** | 🚨 Critical | **1. Insecure Database Queries:** The codebase exclusively uses the deprecated `mysql_*` functions, making it highly vulnerable to SQL injection. **2. Spaghetti Code:** Files like `index.php` and `insert.php` tightly mix PHP, raw SQL, HTML, and JavaScript, making them nearly unmaintainable. **3. Duplicated Code:** Critical functions like `GetSQLValueString` are copied across multiple files. **Action:** Prioritize a security overhaul to replace `mysql_*` with PDO and prepared statements. Initiate a refactoring plan to separate application logic, presentation, and data access layers. |
| **Accessibility (A11y)** | ⚠️ Needs Attention | A `grep` scan revealed widespread accessibility issues. Many `<img>` tags are missing `alt` attributes or use non-descriptive placeholder text (e.g., `alt="rr"`). This is especially problematic for functional images like buttons and links. **Action:** Create a task to audit and fix all `alt` tags to ensure they are descriptive and provide context for screen reader users. |
| **Performance Bottlenecks** | ⚠️ Needs Attention | The application suffers from a classic "N+1 query" problem. For example, `insert.php` runs over 10 individual database queries to populate dropdowns, which is highly inefficient. **Action:** Analyze key pages to identify and consolidate database queries. Refactor data-fetching logic to use `JOIN`s and reduce the number of round trips to the database. |
| **Documentation Freshness** | ⚠️ Needs Attention | The `mission_control` guide and its contents (`Component_Catalog.md`, `Prompt_Recipes.md`) have just been created and are not yet in sync with the codebase. **Action:** Populate the Component Catalog by documenting existing components, services, and data models as they are refactored. |

---

## Part 2: Strategic Action Center (Automated Task Generation)

This section automatically generates draft GitHub Issues for any `Critical` or `Recommended` actions identified in the Project Vitals scan.

### 🚨 Critical Actions
- [ ] **Dependency Vulnerability Audit:** See Issue #1 (auto-generated)
  - **Task:** Audit all vendored JavaScript and PHP libraries for known security vulnerabilities (CVEs).
- [ ] **Security Overhaul: Replace `mysql_*` functions:** See Issue #2 (auto-generated)
  - **Task:** Refactor all database queries to use PDO with prepared statements to prevent SQL injection.

### ⚠️ Recommended Actions
- [ ] **Refactor `insert.php`:** See Issue #3 (auto-generated)
  - **Task:** Separate the business logic, database queries, and HTML presentation for the `insert.php` file. Address the N+1 query problem by consolidating data fetching.
- [ ] **Accessibility Audit: Image `alt` Tags:** See Issue #4 (auto-generated)
  - **Task:** Review all `<img>` tags in the application and provide descriptive `alt` text for non-decorative images.
- [ ] **Populate Component Catalog:** See Issue #5 (auto-generated)
  - **Task:** Document the first 5-10 most critical services and data models in `docs/mission_control/EG_01_Component_Catalog.md`.

---

## Part 3: Engineering Command Center (The "How-To" Guide)

This section contains the core engineering playbook for the project.

**Architectural Guardrails (Golden Rules):**
1.  **Never Mix Languages in One File:** PHP logic, HTML, CSS, and JavaScript must be in separate files.
2.  **All Database Queries Must Use PDO:** Direct calls to `mysql_*` or `mysqli_*` are forbidden. Use prepared statements to prevent SQL injection.
3.  **No Business Logic in the Frontend:** Client-side code is for presentation and user interaction only. All business logic belongs on the server.
4.  **Components Must Be Reusable:** Before writing new code, check the Component Catalog for an existing solution.
5.  **Write for Humans, Not Just Machines:** Code must be clear, commented, and easy for another developer to understand.

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
