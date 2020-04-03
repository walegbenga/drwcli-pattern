# drwcli

[Drwcli](https://github.com/gbengawale/drwcli) is a dependency-free toolkit for building CLI-only applications in PHP created by @walegbenga.
This repository is a template you can use to create a new application that has a single dependency: `drwcli/drwcli`.

### Why drwcli

The current trend in software development is basing your project on a big pile of unknowns. There is nothing wrong in using third party software, but if more than 80% of your application is out of your control, things can get messy.
What usually happens is that you don't even know what packages you're depending on, when using the most popular frameworks.

It can be used for microservices, personal dev tools, bots and little fun things.


## Getting Started

You'll need `php-cli` and [Composer](https://getcomposer.org/) to get started.

Create a new project with:

```
composer create-project --prefer-dist drwcli/application myapp
```

Once the installation is finished, you can run `drwcli` it with:

```
cd myapp
./drwcli
```

This will show you the default app signature:

```
usage: ./drwcli help
```

The default `help` command that comes with drwcli (`app/Command/Help/DefaultController.php`) auto-generates a tree of available commands:

```
./drwcli help
```

```
Available Commands

help
└──test

```

The `help test` command, defined in `app/Command/Help/TestController.php`, shows an echo test of parameters:

```
./minicli help test user=gbenga name=value
```

```
Hello, gbenga!

Array
(
    [user] => gbenga
    [name] => value
)
```

### The simplest app

The simplest drwcli script doesn't require using Command Controllers at all. You can delete the `app` folder and use `registerCommand` with an anonymous function, like this:

```
#!/usr/bin/php
<?php

if (php_sapi_name() !== 'cli') {
    exit;
}

require __DIR__ . '/vendor/autoload.php';

use \Drwcli\App;
use \Drwcli\Command\CommandCall;

$app = new App();
$app->setSignature('./drwcli mycommand');

$app->registerCommand('mycommand', function(CommandCall $input) {
    echo "My Command!";

    var_dump($input);
});

$app->runCommand($argv);
```

## Created with Drwcli

- 