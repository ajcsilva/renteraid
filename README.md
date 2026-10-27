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

## Git automation

Git automation is disabled locally and in `.env.example`. The existing `config/statamic/git.php` supports automatic commits and pushes through environment variables. To enable these in production, set:

```dotenv
STATAMIC_PRO_ENABLED=true
STATAMIC_GIT_ENABLED=true
STATAMIC_GIT_AUTOMATIC=true
STATAMIC_GIT_PUSH=true
```

After setting these variables in production, run `php artisan config:clear` (or rebuild the deployment's configuration cache). Git automation requires Statamic Pro and an appropriate license in production.

The server's PHP user needs Git, write access to the checkout, and SSH credentials with push access to `git@github.com:ajcsilva/renteraid.git`. The deployed branch must track its remote branch; for `main`, run `git branch --set-upstream-to=origin/main main` after fetching the remote. Deploy an attached branch rather than a detached HEAD.

Commits use the authenticated editor's identity when available. Set `STATAMIC_GIT_USER_NAME` and `STATAMIC_GIT_USER_EMAIL` to customize the fallback identity. Only the paths listed in `config/statamic/git.php` are staged automatically.

With the existing `QUEUE_CONNECTION=sync`, commits and pushes run during the save request. If you configure a background queue, set `STATAMIC_GIT_QUEUE_CONNECTION` to that connection and run its queue worker. Set `STATAMIC_GIT_PUSH=false` in environments where automatic pushes are unwanted.

See [Statamic's Git automation documentation](https://statamic.dev/control-panel/git-automation).

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
