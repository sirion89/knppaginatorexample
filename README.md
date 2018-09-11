# KnpPaginatorExample

Requires latest docker-ce and docker-compose.

First, copy and configure the `.env.dist` file to `.env`.

Start the project :
```bash
$ make start
```

Install deps :
```bash
$ make install-deps
```

Initialize DB :
```bash
$ make init-db
```

Load fixtures :
```bash
$ make load-fixtures
```

Then browse http://localhost/app_dev.php .
