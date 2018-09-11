# CommercialPeople Test

This is a test for CommercialPeople company.


## Executing the PHPUnit Tests:
```
cd {DIR}\CommercialPeopleTest
php bin/phpunit tests
```
## Loading the fixtures
```
cd {DIR}\CommercialPeopleTest
php bin/console doctrine:fixtures:load
```
## Running the server
```
cd {DIR}\CommercialPeopleTest
php bin/console server:run
```
## Authenticating the user using JWT (creating JWT Token for the user
`http://localhost:8000/authenticate`

## API Endpoints:
```
GET   Gets the list of football teams.
http://localhost:8000/football/team
```

```
POST  Creates new football team (pass variables `name` and `strip`) (ID of newly created team will be returned)
http://localhost:8000/football/team
```

```
PUT  Updates informations about the football team with specified ID (pass variables `name` and `strip` as a request parameters)
http://localhost:8000/football/team/{id}
```

```
DELETE  Removes the football league
http://localhost:8000/football/league/{id}
```
