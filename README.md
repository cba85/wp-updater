# WP Updater

This Wordpress package is based on [Misha Rudrastyh article: Self-Hosted Plugin Updates](https://rudrastyh.com/wordpress/self-hosted-plugin-update.html).

## Tests

```
$ ./vendor/bin/phpunit
```

### Wordpress spies

To test the package which call some Wordpress functions, I've created spies function to simulate them outside a Wordpress environment.

These functions are located in `/tests/spies/wordpress.php`.

#### Transient

`get_transient()` simulate a transient retrievement by default. Uncomment the first line to test a remote retrievement.
