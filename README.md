Scripter
========

Makes your apps scriptable

## Features

* Scripts can be written in any programming language
* Scripts arguments can be specified using [docopt](http://docopt.org/) for self-documentation
* Symfony Console commands included
* Auto register scripts as Symfony Console commands on your CLI apps
* Scripts are executed in their own process

## Use-case

Scripter lets external developers extend the functionality of your apps in their programming language of choice.

Scripter scans a set of directories for executables (bash files, php scripts, node apps, binaries, etc) and
registers them in a collection.

The collection can be queried, and scripts can be executed easily from your app.

## Users

* [INFRA](https://github.com/linkorb/infra): your infrastructure as a GraphQL service

## License

MIT. Please refer to the [license file](LICENSE) for details.

## Brought to you by the LinkORB Engineering team

<img src="http://www.linkorb.com/d/meta/tier1/images/linkorbengineering-logo.png" width="200px" /><br />
Check out our other projects at [linkorb.com/engineering](http://www.linkorb.com/engineering).

Btw, we're hiring!