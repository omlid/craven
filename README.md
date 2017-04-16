# craven
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