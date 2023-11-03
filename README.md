## About The In2tel Starter Task


The project encompasses a web application that allows users to access HostPbx data through a table view and API routes.

The In2tel Starter Task uses Laravel to manage both view and API routes.

jQuery is also used to build the Datatable that outputs the HostPbx data. 

## Requirements

The following requirements are needed in order to run this project locally:

- [Docker](https://www.docker.com/get-started)
- [WSL](https://docs.microsoft.com/en-us/windows/wsl/install) (Extra requirement for Windows)

First time:

```shell
copy and paste .env.example and rename it to .env
```

## Installation

To get started with local development, please follow the steps below:

Once you have met the requirements above and have cloned the repository, you will need to install the composer dependencies
by running the following command:

```shell
docker run --rm \
    -v "$(pwd)":/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install
```

Once you have been given the **hosted_pbx.sql** file, save it in the following directory of this codebase - storage/app/public/ .

Now, run the following command to start the project:

```shell
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
```

Finally to view the front-end locally you will need to run the following command:

```shell
npm run dev
```

You should now be able to access the web interface by visiting [http://localhost/hostedpbx](http://localhost/hostedpbx)

For more information on Laravel Sail, please visit the [official documentation](https://laravel.com/docs/10.x/sail)

For more information on Datatables, please visit the [official documentation](https://datatables.net/manual/installation)

## Authors

Written by Jake Buceac in November 2023.
