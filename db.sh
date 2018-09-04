#!/usr/bin/env bash
php bin/console doctrine:schema:update --dump-sql
php bin/console doctrine:generate:entities AppBundle --no-backup
php bin/console doctrine:schema:update --force