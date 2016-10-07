# Slim ADR Project

Dockerized ADR PHP sandbox project, working under [Slim](http://www.slimframework.com/) framework.

## Prerequisites

In order to run this project, first install:
 
- [Composer](https://getcomposer.org/download/)
- [Docker](https://docs.docker.com/engine/installation/) --optional
- [Docker Compose](https://docs.docker.com/compose/install/) --optional

## Installation

In root directory, install packages with composer

```bash
$ composer install
```

Then run provided Docker stack

```bash
$ docker-compose up -d
```

## Author

[Jonathan VUILLEMIN](ekkinox@gmail.com) - 2016

## Licence

[MIT](https://opensource.org/licenses/MIT)