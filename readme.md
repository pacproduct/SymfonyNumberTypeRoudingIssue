# NumberType rounding test

This repo is a minimal Symfony 7 application showing what the default rounding mode of `NumberType` fields is when
no scale is defined. There is a suspected bug as it does not behave like what the
[documentation](https://symfony.com/doc/current/reference/forms/types/number.html#rounding-mode) advertises.

## How to run it

You need `git`, `composer` and the Symfony local web server `symfony`.

- Clone this repo.
- `composer install`
- `symfony server:start`
- Access the single page `/` that demonstrates the behavior (usually at http://127.0.0.1:8000/)
