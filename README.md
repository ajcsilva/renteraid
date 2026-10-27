<p align="center">
<picture>
    <source srcset="https://statamic.com/assets/branding/squircle/statamic-logo-lime-white.svg" media="(prefers-color-scheme: dark)">
    <img align="center" width="350" alt="Statamic Logo" src="https://statamic.com/assets/branding/squircle/statamic-logo-lime.svg">
</picture>
</p>

## About Statamic

Statamic is the flat-first, Laravel + Git powered CMS designed for building beautiful, easy to manage websites.

> [!NOTE]
> This repository contains the code for a fresh Statamic project that is installed via the Statamic CLI tool.
>
> The code for the Statamic Composer package itself can be found at the [Statamic core package repository][cms-repo].


## Sending email with Postmark

The Postmark API transport is installed. Configure these values in your deployment environment or local `.env`:

```dotenv
MAIL_MAILER=postmark
POSTMARK_API_KEY=your-postmark-server-api-token
POSTMARK_MESSAGE_STREAM_ID=outbound
MAIL_FROM_ADDRESS=hello@your-domain.com
MAIL_FROM_NAME="${APP_NAME}"
```

Use a Postmark **Server API token** and a sender address or domain verified in Postmark. `outbound` is the default transactional message stream; change it if you use a different stream. Keep the token out of version control.

Run `php artisan config:clear` after changing these settings (or `php artisan config:cache` when deploying with cached configuration). Restart any long-running queue workers with `php artisan queue:restart` so they pick up the changes. SMTP credentials are not needed for this transport. Local development uses `MAIL_MAILER=log` until you enable Postmark.

See the [Laravel Postmark documentation](https://laravel.com/docs/13.x/mail#postmark-driver).

## Learning Statamic

Statamic has extensive [documentation][docs]. We dedicate a significant amount of time and energy every day to improving them, so if something is unclear, feel free to open issues for anything you find confusing or incomplete. We are happy to consider anything you feel will make the docs and CMS better.

## Support

We provide official developer support on [Statamic Pro](https://statamic.com/pricing) projects. Community-driven support is available via [GitHub Discussions](https://github.com/statamic/cms/discussions) and in [Discord][discord].


## Contributing

Thank you for considering contributing to Statamic! We simply ask that you review the [contribution guide][contribution] before you open issues or send pull requests.


## Code of Conduct

In order to ensure that the Statamic community is welcoming to all and generally a rad place to belong, please review and abide by the [Code of Conduct](https://github.com/statamic/cms/wiki/Code-of-Conduct).


## Important Links

- [Statamic Main Site](https://statamic.com)
- [Statamic Documentation][docs]
- [Statamic Core Package Repo][cms-repo]
- [Statamic Migrator](https://github.com/statamic/migrator)
- [Statamic Discord][discord]

[docs]: https://statamic.dev/
[discord]: https://statamic.com/discord
[contribution]: https://github.com/statamic/cms/blob/master/CONTRIBUTING.md
[cms-repo]: https://github.com/statamic/cms
