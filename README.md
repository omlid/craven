# Craven
An asset (JS, CSS) concatenation package for complex view level asset requirements via PHP

This can be extended on or used in applications to manage compilation of your assets defined at the server-side level in views.

# How to use

## Attaching requirements
#### Single use
```php
<?php

Craven\Craven::attach('path/to/file.js', 'js-footer');

?>
```

#### Multiple use
```php
<?php

Craven\Craven::attach([
	'path/to/first/file.js',
	'path/to/second/file.js',
], 'js-footer');

?>
```

## Concatenating files for particular repo
```php
<?php

$repo = 'js-footer';
Craven\Craven::concatenate($repo);

?>
```

```php
<?php

Craven\Craven::concatenate('js-footer');

?>
```

# Use cases

* User authentication requires you to include or exclude specific javascript and css on the page
* Need a better way to store on the fly compacted javascript and css from multiple build sources
* Gulp / Webpack aren't always the securest way to bundle your frontend code together
* Views can dictate their needs without having to include the HTML to load the css / javascript
