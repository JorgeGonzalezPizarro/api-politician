##!/bin/sh
#set -e
#
## first arg is `-f` or `--some-option`
#if [ "${1#-}" != "$1" ]; then
#	set -- php-fpm "$@"
#fi
#
#if [ "$1" = 'php-fpm' ] || [ "$1" = 'bin/console' ]; then
#	mkdir -p var/cache var/log
#	setfacl -R -m u:www-data:rwX -m u:"$(whoami)":rwX var
#	setfacl -dR -m u:www-data:rwX -m u:"$(whoami)":rwX var
#
#	if [ "$APP_ENV" != 'prod' ]; then
#		composer install --prefer-dist --no-progress --no-suggest --no-interaction
#		>&2 echo "Waiting for Postgres to be ready..."
#		until pg_isready --timeout=0 --dbname="${DATABASE_URL}"; do
#			sleep 1
#		done
#		bin/console doctrine:schema:update --force --no-interaction
#	fi
#fi
#
#exec docker-php-entrypoint "$@"
#!/usr/bin/env bash

isCommand() {
  for cmd in \
    "about" \
    "archive" \
    "browse" \
    "clear-cache" \
    "clearcache" \
    "config" \
    "create-project" \
    "depends" \
    "diagnose" \
    "dump-autoload" \
    "dumpautoload" \
    "exec" \
    "global" \
    "help" \
    "home" \
    "info" \
    "init" \
    "install" \
    "licenses" \
    "list" \
    "outdated" \
    "prohibits" \
    "remove" \
    "require" \
    "run-script" \
    "search" \
    "self-update" \
    "selfupdate" \
    "show" \
    "status" \
    "suggests" \
    "update" \
    "validate" \
    "why" \
    "why-not"
  do
    if [ -z "${cmd#"$1"}" ]; then
      return 0
    fi
  done

  return 1
}

# check if the first argument passed in looks like a flag
if [ "$(printf %c "$1")" = '-' ]; then
  set -- /sbin/tini -- composer "$@"
# check if the first argument passed in is composer
elif [ "$1" = 'composer' ]; then
  set -- /sbin/tini -- "$@"
# check if the first argument passed in matches a known command
elif isCommand "$1"; then
  set -- /sbin/tini -- composer "$@"
fi

exec "$@"