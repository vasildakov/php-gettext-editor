# php gettext editor


Links

- [Gettext](https://github.com/php-gettext/Gettext)
- [Gettext PO/POT format explained](https://documatt.com/blog/2021/gettext-po-format.html)
- [Laminas i18n](https://docs.laminas.dev/laminas-i18n/translation/)


Laminas configuration

translator.global.php

```php 
<?php
// config/autoload/translator.global.php

return [
    'translator' => [
        'event_manager_enabled' => true,
        'locale' => [
            'bg_BG',
            'en_US'
        ],
        'translation_file_patterns' => [
            [
                'type'     => \Laminas\I18n\Translator\Loader\PhpArray::class,
                'base_dir' => getcwd() . '/data/languages',
                'pattern'  => '%s.php',
            ],
        ],
        'cache' => [
            'adapter' => [
                'name'    => \Laminas\Cache\Storage\Adapter\Filesystem::class,
                'options' => [
                    'cache_dir' => getcwd() . '/data/cache',
                    'ttl'       => 3600,
                ],
            ],
            'plugins' => [
                'serializer',
                'exception_handler' => [
                    'throw_exceptions' => false,
                ],
            ],
        ],
    ],
];
```