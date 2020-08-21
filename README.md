# WP Updater

This package has been created to integrate WordPress core updates with your custom plugin.

This Wordpress package is based on [Misha Rudrastyh article: Self-Hosted Plugin Updates](https://rudrastyh.com/wordpress/self-hosted-plugin-update.html).

This package is a simple class organized using [traits](https://www.php.net/manual/en/language.oop5.traits.php).

## Tests

```
$ ./vendor/bin/phpunit
```

### Wordpress spies

To test the package which call some Wordpress functions, I've created spies functions to simulate them outside a Wordpress environment.

These functions are located in `/tests/spies/wordpress.php`.

#### Transient

`get_transient()` in `/tests/spies/wordpress.php` simulate a transient retrievement by default. Uncomment the first line to test a remote retrievement.

You have to update tests by commenting/uncommenting some lines in `TransientTest.php` and `UpdateTest.php` files depending on the remote or transient information retrievement.
