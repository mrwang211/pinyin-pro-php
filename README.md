# Pinyin Pro for PHP

In progress port of pinyin-pro from https://github.com/zh-lx/pinyin-pro

## Installation

You can install the package via composer:

```bash
composer require mrwang211/pinyin-pro
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="pinyin-pro-config"
```

## Usage

```php
$pinyinPro = new Mrwang211\PinyinProBuilder()->build();
echo $pinyinPro->convert('pin1 yin1'); // pīn yīn
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [mrwang211](https://github.com/mrwang211)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
