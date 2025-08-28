# 03: Test-Driven Ignition Prompt

This file contains a pre-written prompt to be used by a developer to begin the hands-on keyboard work for this project. It is designed to ensure that the project starts with a solid, test-driven foundation.

---

### **Instructions for Project Manager:**

1.  Create a new task or issue in your project management system (e.g., GitHub Issues, Jira).
2.  Use the "Issue Title" below as the title for the task.
3.  Copy the entire "Prompt Body" below and paste it into the description of the task.
4.  Assign the task to the lead developer or engineering agent.

---

**Issue Title:** `Execute Test-Driven Ignition for New Application`

**Prompt Body:**

Hello Jules,

The "Phoenix Command" is approved. The strategic planning phase is complete, and all project assets have been generated. Please proceed with the following actions to build the foundation of the new real estate application.

Refer to the following documents for all architectural and feature decisions:
*   `01_Modernization_Blueprint.md`
*   `02_Project_Workflow_and_Backlog.md`
*   `backlog.csv`

Your specific tasks are:

1.  **Scaffold New Application:**
    *   Create the new application directory.
    *   Scaffold it using the approved tech stack: **Next.js**.
    *   Set up the database connection to **PostgreSQL** using the environment variables defined in `02_Project_Workflow_and_Backlog.md`.
    *   Initialize a new Git repository for the project.

2.  **Implement First Story:**
    *   Implement the first user story from `backlog.csv` (ID: `MVP-02`).
    *   Create a simple, un-styled page at the `/login` route.
    *   This page should contain an email input, a password input, and a "Log In" button. For now, it does not need to have any working logic behind it. The goal is to have a visible, testable page.

3.  **Write Passing E2E Test:**
    *   Add a modern end-to-end testing framework to the project. **Playwright** is recommended.
    *   Write a single, passing E2E test that:
        1.  Navigates to the `/login` page.
        2.  Asserts that the page title is "Login".
        3.  Asserts that an `h1` element with the text "Login" is visible.
        4.  Asserts that the email and password input fields are present on the page.

4.  **Commit and Push:**
    *   Commit the working, tested, foundational slice of the application to a new branch.
    *   Open a new Pull Request for review.
