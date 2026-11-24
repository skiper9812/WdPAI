# Portal Mieszkańca Domów Studenckich PK — Agent Guidelines

This is a web application intended to digitalize and improve administrative and everyday processes in CUT/PK student dormitories. It serves students and dormitory employees. Prioritize correctness, security, maintainability, responsive usability, and consistency with the existing repository.

> **Repository verification required:** This file was prepared from project-owner survey answers. The application repository was not available during its creation. Any item marked "verify in repository" must be checked against the actual code and configuration before being treated as an existing implementation detail. Do not invent paths, scripts, packages, services, or workflows.

## Project Scope & Architecture

- **Product scope:** The application supports dormitory processes such as reservations, schedules and information, notifications, communication between dormitory employees, and an administration panel.
- **Future scope:** Applications/requests and financial management are later-development areas. Do not treat them as current MVP requirements unless explicitly requested.
- **Users and roles:** The application serves students and dormitory employees. The final role taxonomy is not yet defined. Inspect the current implementation and requirements before creating or renaming roles.
- **Authorization:** Use role-based access control (RBAC), with permission checks enforced on the server. Never rely on frontend visibility or JavaScript checks as authorization.
- **Architecture:** The project uses plain PHP for server-side code and vanilla JavaScript for browser behavior. Do not introduce Laravel, React, Vue, Angular, or another application framework unless explicitly authorized.
- **Frontend/backend communication:** Both REST-style API requests and traditional PHP page/form requests are expected. Inspect the existing application to determine which approach belongs to each feature; do not migrate one style to the other without approval.
- **Database:** PostgreSQL is accessed through PHP PDO. The intended data model is relational and normalized.
- **File storage:** Uploaded files are intended to use local storage backed by Docker volumes. Verify the actual volume and storage paths before changing upload behavior. Do not store uploaded files in the public web root unless the existing design explicitly requires it and access is secured.
- **Real-time behavior:** No real-time communication infrastructure is currently required. Prefer ordinary HTTP requests unless a requirement explicitly calls for real-time behavior.
- **Architecture boundaries:** Follow the repository's actual structure. Before moving files, introducing layers, changing routing, or separating frontend/backend directories, inspect the project and explain the proposed change.
- **API compatibility:** Preserve existing routes, request/response formats, form behavior, and database contracts unless the task explicitly requires a change. Update all affected callers and documentation when a contract change is approved.

## Language & Code Conventions

- **User-facing UI:** Polish. This includes page titles, buttons, labels, validation messages, notifications, empty states, and error messages.
- **Code, comments, identifiers, and technical documentation:** English.
- **User documentation:** Polish, unless the repository already establishes a different convention for a specific document.
- **PHP:** PHP 8.3 or newer is the target. Verify the runtime and Docker image version before relying on version-specific syntax or APIs.
- **PHP style:** Follow PSR-12. Use strict typing where practical and consistent with the surrounding code. Use PSR-compatible naming conventions; do not perform unrelated mass-renaming.
- **JavaScript:** Vanilla JavaScript (ES6+) without a frontend framework. Use `camelCase` for variables and functions. Follow existing module/script loading patterns.
- **CSS:** Custom CSS. The visual direction is based on Figma-generated views. Preserve the approved design and translate its layout, typography, spacing, colors, and responsive behavior into maintainable CSS. Do not add Bootstrap, Tailwind, Sass, or another styling framework without approval.
- **Responsive UI:** Support mobile, tablet, and desktop layouts. Avoid desktop-only assumptions and test interactive controls at narrow viewport sizes.
- **Structure:** Follow the existing directory and file organization. Verify the actual structure before creating new top-level directories or moving files.
- **Maintainability:** Prefer readable, focused functions and reusable components. Separate presentation, request handling, business rules, and database access according to patterns already established in the repository.
- **Separation of concerns:** Avoid embedding large SQL statements, business rules, and unrelated UI behavior in presentation templates. Do not introduce a new architectural layer solely for stylistic preference.
- **Database access:** Use PDO prepared statements for values supplied at runtime. Never concatenate untrusted input into SQL.
- **Error handling:** Follow or establish the repository's centralized error-handling and logging approach. Do not expose stack traces, SQL details, filesystem paths, credentials, or internal exception messages to end users.
- **Design source:** When a Figma view or design asset is provided, treat it as the visual reference. Do not invent a new design system or redesign screens unless requested.

## Verify Before Coding — Repository Is the Source of Truth

Before implementing a feature or changing architecture:

1. Inspect the repository tree and identify the actual entry points, routing approach, templates, JavaScript assets, CSS assets, and configuration files.
2. Read the relevant PHP files and follow their existing conventions before editing.
3. Inspect `composer.json` and `composer.lock` if present. Do not assume Composer or any particular package is installed.
4. Inspect Dockerfiles and Compose configuration to identify PHP, web server, PostgreSQL, volumes, ports, and environment configuration.
5. Inspect database connection code, SQL schema files, and existing migration conventions before changing persistence.
6. Inspect registration, login, logout, session handling, password hashing, CSRF implementation, and authorization checks before modifying authentication-related code.
7. Inspect existing test configuration and scripts before selecting or invoking test commands.
8. Inspect `git log` and recent diffs before preparing a commit plan. Match the repository's actual commit-message style; the project owner has requested Conventional Commits as the intended convention, but compare it with the existing history first.
9. If a required detail cannot be verified, state that it is unknown and ask for clarification when it affects implementation. Do not silently guess.

## Commands

- **Container tooling:** The project uses Docker Compose and Dockerfiles.
- **Local startup:** The owner-provided startup command is:
  ```bash
  docker compose up -d --build
  ```
  `docker compose up -d` is also used when rebuilding is not required.
- **Other Docker commands:** Inspect the Compose file and project documentation before recommending service names, logs, shell access, shutdown, or rebuild commands. Do not invent service names.
- **PHP commands:** Verify the PHP runtime and available tools inside the relevant container before running PHP commands.
- **Database commands:** Use the repository's documented migration process. Do not assume a framework migration command exists.
- **Testing:** Automated integration and end-to-end tests are expected. Discover the actual test runner, configuration, and commands in the repository before running tests or documenting them.
- **Code quality:** Linters, formatters, static analysis, and PHP coding-standard tools are not yet confirmed. Inspect repository configuration before selecting tools. Do not add tools or dependencies without approval.
- **Completion checks:** Run the relevant available tests and checks for the changed area. Report exactly what was run, what passed, what failed, and what could not be run. Never claim a test passed if it was not executed.
- **Environment:** Configuration uses a combination of `.env` and Docker environment variables. Inspect the actual precedence and variable names. Keep real secrets out of source control; provide safe example placeholders where needed.

## Database & Data Management

- **Database engine:** PostgreSQL, accessed from PHP through PDO.
- **Schema approach:** Use a normalized relational model and preserve existing constraints, foreign keys, indexes, and transaction behavior.
- **Schema changes:** Store database changes as SQL migration files in the repository, following the existing naming and ordering convention. Verify that convention before creating a migration.
- **Migration safety:** A migration should be understandable, scoped, and reviewed. Consider existing data and rollback implications.
- **Destructive operations:** Never execute destructive database operations, drop tables/columns, truncate data, reset a database, or run irreversible migrations without explicit approval.
- **Production data:** Never use production data for local testing unless explicitly authorized and appropriately protected. Do not expose personal data in logs, fixtures, screenshots, or test output.
- **Transactions:** Use transactions where a feature performs multiple related writes that must succeed or fail together.
- **Backups:** The backup strategy has not yet been decided. Do not claim automated backups exist. Do not alter backup or restore procedures without approval.
- **Data integrity:** Enforce important invariants on the server and in the database where appropriate. Frontend validation is for usability and never replaces backend validation.

## Git, Deployment & Development Workflow

- **Branching:** Use feature branches and the `main` branch. Inspect current branch names and repository conventions before creating or recommending a branch.
- **Commit messages:** The intended convention is Conventional Commits. Inspect `git log` first and prepare proposed messages that are consistent with both the history and the intended convention.
- **Git permissions:** Do not create commits, amend commits, rebase, merge, push, or change branches on the owner's behalf. Prepare a proposed commit plan/list for the owner to review and execute.
- **Commit plan:** Group related changes into logical commits. For each proposed commit, list the included files or change areas and provide a suggested message. Do not present the plan as executed work.
- **Deployment:** Docker is the deployment packaging/runtime approach. GitHub Actions is a possible future CI/CD mechanism, but no GitHub Actions workflows are currently prepared.
- **CI/CD changes:** Do not claim a workflow exists. If asked to introduce GitHub Actions, inspect the repository and deployment requirements, propose the workflow and required secrets, and obtain approval before adding or activating deployment automation.
- **Deployment safety:** Do not deploy, restart production services, modify production environment variables, or run production migrations without explicit approval.
- **Environment files:** Never commit real `.env` files, credentials, tokens, private keys, or production secrets. Check `.gitignore` and existing examples before changing environment-file handling.
- **Database backups:** No backup schedule or mechanism has been confirmed. Treat backup and restore procedures as unresolved operational requirements.

## Security & Agent Rules

- **Authentication:** The current direction is custom registration and authentication. University authentication or Poland's national login service (e.g. login integration) may be considered in later development; do not implement or assume such integration is already available.
- **Password hashing:** Use the dedicated password-hashing library already selected by the project, if present. Its identity and configuration must be verified in the repository before use. Do not invent a package name or replace the existing password-hashing mechanism without review. Never store plaintext passwords or reversible password encryption.
- **Sessions:** The owner suspects PHP sessions with secure cookie configuration, but this is not verified. Inspect the current implementation. If PHP sessions are used, review secure cookie attributes, session ID regeneration, expiration, logout invalidation, and HTTPS behavior before changing them.
- **CSRF:** Protect state-changing browser requests against CSRF. Inspect the existing token lifecycle and ensure protection is applied consistently to traditional forms and applicable state-changing API requests.
- **Validation:** Validate all untrusted input on the backend. Frontend validation may improve usability but is not a security boundary. Validate type, length, format, allowed values, and ownership/permissions as appropriate.
- **Output encoding:** Escape untrusted content for its output context to prevent XSS. Do not treat input validation as a substitute for output encoding.
- **SQL injection:** Use PDO prepared statements for user-controlled values. Dynamic identifiers or SQL fragments must be selected from strict allowlists, not directly from request input.
- **Authorization:** Enforce RBAC and resource-level access checks on the server for every protected operation. Do not rely on hidden buttons, route obscurity, or client-side role values.
- **Privacy:** Follow applicable GDPR requirements and data-minimization principles. Collect and expose only data required for the feature. Avoid unnecessary personal-data retention.
- **Logging:** Log errors and important system events where appropriate. Never log passwords, session identifiers, authentication tokens, secrets, or unnecessary sensitive personal data. Keep detailed diagnostics out of user-facing responses.
- **Secrets:** Use environment variables and the repository's approved secret-management approach. Never hardcode credentials or commit real secrets.
- **Dependencies:** The agent may research and recommend dependencies, but must obtain explicit approval before adding, updating, or removing packages or introducing frameworks.
- **Architecture changes:** Inspect existing files and explain the impact before changing architecture, directory boundaries, API contracts, authentication flow, database design, or deployment topology.
- **Database changes:** The agent may prepare SQL migration files. It must not execute destructive database operations without explicit approval.
- **Git operations:** The agent may inspect Git history and prepare a commit plan. It must never commit or push changes.
- **Figma/UI changes:** Preserve the supplied Figma-based visual direction. Do not perform broad redesigns or replace custom CSS with a framework without explicit instruction.
- **Uncertainty:** Distinguish verified repository facts from assumptions and proposed improvements. Ask before making decisions that affect security, data integrity, compatibility, or architecture.
- **Scope discipline:** Do not implement future financial-management or application-submission features as part of unrelated tasks. Do not add features outside the requested scope.
