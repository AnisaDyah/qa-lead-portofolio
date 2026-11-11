# QA Lead Portfolio — Editorial V4

## Design direction
A unified editorial layout inspired by the supplied About-page reference: warm off-white canvas, bold sans-serif headlines, monochrome visual treatment, restrained rules, generous whitespace, and compact navigation.

## Navigation
- About: `index.php?page=about`
- Experience: `index.php?page=experience`
- Workspace dropdown:
  - Project: `index.php?page=projects`
  - Management: `index.php?page=qa-management`
  - Technical: `index.php?page=technical-skills`
  - Documentation: `index.php?page=documentation`
- Contact: `index.php?page=contact`

## Run locally
From this directory:

```bash
php -S localhost:8000
```

Open `http://localhost:8000`.

## Notes
- The existing JSON data files remain the source for profile, experience, projects, and skills.
- Existing legacy pages and assets are retained, but the main router now uses the shared V4 editorial shell.
- The portrait remains a clearly labelled placeholder until a professional image is supplied.
- Review all profile details and add approved contact links before publishing.
