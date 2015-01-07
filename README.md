![Hoa](http://static.hoa-project.net/Image/Hoa_small.png)

Hoa is a **modular**, **extensible** and **structured** set of PHP libraries.
Moreover, Hoa aims at being a bridge between industrial and research worlds.

# Hoathis\SymfonyConsoleBundle [![Build Status](https://travis-ci.org/hoaproject/Contributions-Symfony-ConsoleBundle.png?branch=master)](https://travis-ci.org/hoaproject/Contributions-Symfony-ConsoleBundle)

## Installation

With [Composer](http://getcomposer.org/), to include this library into your dependencies, you need to require
[`hoathis/symfony-console-bundle`](https://packagist.org/packages/hoathis/symfony-console-bundle):

```json
{
    "require": {
        "hoathis/symfony-console-bundle": "~1.0"
    }
}
```

Please, read the website to [get more informations about how to install](http://hoa-project.net/Source.html).

Finally, install dependencies:

```sh
$ composer update hoathis/symfony-console-bundle
```

## How to use

### Console as a service

This bundle makes the console a DIC service. The console you used to use at `app/console` will be deprecated (but still available).
We encourage you to use the newly provided `bin/console` instead.

Doing so, you will gain acces to all the helpers and stuff provided by this bundle:

* [Output](#output)
* [Formatter](#formatter)
* [Helpers](#helpers)
  * [Window](#window)
  * [Cursor](#cursor)
  * [Readline](#readline)
  * [Pager](#pager)
  * [Tput](#tput)
