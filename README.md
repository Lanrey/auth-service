
A Minimal Authentication System.

<!---[![Build Status](https://travis-ci.org/Lanrey/auth-service.svg?branch=dev)](https://travis-ci.org/Lanrey/auth-service)-->


## Features
- Registration (/api/register)
- Login (/api/login)
- Single User retrieval (/api/user{id})
- Users retrieval (/api/users)
- Authenticated User (/api/auth-user-profile)


## Documentation
Check out the documentation at [ReadTheDocs](https://documenter.getpostman.com/view/7081137/TVKHVFf5).

```sh
  Development Api => https://patricia-tests.herokuapp.com/
```

## Installation without docker
- PHP 7.2.5 and Laravel/Lumen 5.8 or higher are required.
- Cd to source folder
  - Run Composer install
  - Copy .env.example to .env
  - Setup environment variables
  - Run php artisan migrate to migrate database


## Installation with docker
  //build and run (from root of project)
  docker build --tag IMAGENAME .
  docker run -d -p 9000:9000 --name CONTAINERNAME -it IMAGENAME /bin/sh
     
  docker exec -it CONTAINERNAME /bin/sh

  docker stop CONTAINERNAME
  docker start CONTAINERNAME
  docker rm CONTAINERNAME



