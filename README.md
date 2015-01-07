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

* [Dependency injection](#dependency-injection)
* [Output](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#output)
* [Formatter](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#formatter)
* [Helpers](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#helpers)
  * [Window](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#window)
  * [Cursor](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#cursor)
  * [Readline](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#readline)
  * [Pager](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#pager)
  * [Tput](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#tput)

### Dependency injection

#### Services

As said above, this bundle will turn your console into a DIC service. This is not the only thing that has been added to the container.
Indeed some other components have been added to it. Here are the new services you will get:

* `hoathis.console`: the console application
* `hoathis.console.output`: the console output
* `hoathis.console.formatter`: the console output formatter
* `hoathis.console.helperSet`: the console herlper set
* `hoathis.console.helperSet.helper.*`: all the available helpers
* `hoathis.console.formatter.style.*`: all the available formatter styles

You can find the detailed services declarations [here](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBundle/Resources/config/services)

#### Tags

In addition to services definitions, the bundle provides some tags that you can use to add new components. There are two of them:

* `hoathis.console.helperSet.helper` to declare a new helper
* `hoathis.console.formatter.style` to declare a new formatter style

The first one, `hoathis.console.helperSet.helper`, does not take any value. It's just here to inform the container to add your
helper instance to the console's helper set.

The last one, `hoathis.console.formatter.style`, can take one or more arguments:

* `foreground` to set the foreground color
* `background` to set the background color
* `options` to set the style options

To get more information on how to configure your styles, please read the dedicated section [here](http://central.hoa-project.net/Resource/Contributions/Symfony/ConsoleBridge#formatter).
