# Commit Message Guidelines

We follow a structured commit style inspired by [Conventional Commits](https://www.conventionalcommits.org/) with clear verbs.

## Format

```
<type>: <verb> <short description>
```

### Examples

- `feat: adds user authentication via Laravel Sanctum`
- `fix: removes invalid null check in project controller`
- `chore: updates dependencies to latest patch`
- `docs: adds API usage example in README`
- `style: fixes code formatting in helpers.php`
- `refactor: improves query builder usage`
- `test: adds feature test for task creation`

---

## Commit Types

- **feat** → New features
- **fix** → Bug fixes
- **docs** → Documentation changes
- **style** → Code style/formatting (no logic changes)
- **refactor** → Code refactoring (logic changes, no new features or fixes)
- **test** → Adding/updating tests
- **chore** → Build tasks, configs, maintenance
- **perf** → Performance improvements
- **ci** → Continuous Integration changes

---

## Recommended Verbs

- **adds** → introducing new functionality, files, or docs
- **removes** → deleting or deprecating code/files
- **fixes** → resolving a bug or issue
- **updates** → modifying existing code without major refactor
- **improves** → better implementation, optimization
- **refactors** → restructuring code for clarity/efficiency
- **renames** → changing file/class/function names
- **moves** → moving code or files
- **cleans up** → removing unused code, simplifying
- **documents** → improving documentation

---

## Long Descriptions

If needed, add a longer description after a blank line:

```
feat: adds project sharing feature

Allows users to invite other members to projects by email.
Includes new database migration, controller, and Vue component.
```

---

**Rule of thumb:**

- Short, imperative, lowercase description.
- Always start with a verb (`adds`, `removes`, `fixes`).
- Keep subject under 72 chars.
