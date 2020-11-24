# user-service

is a service to manage users and privileges. Main feature are authority with access controller list (ACL) and company assignment as : main dealer, company, branch, region or kios. 

## Technology Stack
- [PHP 7.x](https://www.php.net/)
- [CakePHP 4.x](https://cakephp.org/)
- [CodeCeption](https://codeception.com/)
- [Redis](https://redis.io/)
- [MySQL 8](https://www.mysql.com/)
- [JWT](https://jwt.io/) using [jwt-framework](https://web-token.spomky-labs.com/)
- [docker](https://www.docker.com/)
- [composer](https://getcomposer.org/)
- RESTful API
- JSON
- [JSON Schema](https://json-schema.org/)

## Features
- [ ] Login
- [ ] Forgot Password
- [ ] Change Password
- [ ] Access Controller List
- [ ] Users
- [ ] Groups
- [ ] Employees
- [ ] Companies
- [ ] Regions
- [ ] Branches
- [ ] kios

## Get Started
- git clone git@github.com:cdcgi/user-service.git

## API Testing
You can run api testing or integration testing by call `php vendor/bin/codecept run`

You alsa can to test manualy using postman
- Open your postman application
- Import file user-service.postman_collection.json
- Import file user-service.postman_environment.json
- Test all request

## API Documentation and Specification
You can read [API documentation and specification](https://github.com/cdcgi/user-service/blob/main/doc/main.md) in doc directory. 
