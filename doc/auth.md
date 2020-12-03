# Auth
Module | HTTP Method | URL | Description 
--- | --- | --- | ---
[Login](#login) | POST | /login | Login API
[Forgot Password](#forgot-password) | POST | /forgot-password | Forgot Password API
[Change Password](#change-password) | POST | /change-password | Change Password API
[Reset Password](#reset-password) | POST | /reset-password | Reset Password

## <a name="login"></a>Login

### Endpoint 
POST /login

### Database
![](./acl-layer.png)

For login, you need get users by username and password (see users table). And for access response payload, you need get acos data which grant to users.

*if need create new database, please write the sql script below* 

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
username | string | jacky  
password | string | jakaRTa!2020
```
{
    "username": "jacky",
    "password": "jakaRTa!2020"
}
```

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
200 | OK | OK
```
{
    "status_code": "CDC-400",
    "status_message": "Bad Request",
    "data": null
}
```

```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "token": "eyJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MDYwMzE0MTksInVzZXJuYW1lIjoiamFja3kifQ.CwZfexfM7EsE37xpnIt-bHA_wRBXyDXOUnbX2D5iHVM",
        "user": {
          "name": "Jacky Chan"
        },
        "access": [
          "controllers",
          "users",
          "users:index"
        ]
    }
}
```

### Logic

#### Validation
- username : required and not empty
- password: required and not empty


<<<<<<< HEAD
*if any special logic, please write down the logic here*
=======

*if any special logic, please write down the logic here. thanks*
>>>>>>> [#9] resolve conflict


### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "username is required",
    "data": null
}
```

#### Case : Negative Case 2

Request Payload :
```
{}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "username is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "username": ""
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "username is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "username": "asal"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "password is required",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{
    "username": "asal",
    "password": ""
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "Password is empty",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload
```
{
    "username": "asal",
    "password": "asal"
}
```

Response HTTP Status Code : 404

Response Payload
```
{
    "status_code": "cdc-404",
    "status_message": "Invalid username/password",
    "data": null
}
```

#### Case : Positive Case

Request Payload :
```
{
    "username": "jacky",
    "password": "jakaRTa!2020"
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "token": "eyJhbGciOiJIUzI1NiJ9.eyJleHAiOjE2MDYwMzE0MTksInVzZXJuYW1lIjoiamFja3kifQ.CwZfexfM7EsE37xpnIt-bHA_wRBXyDXOUnbX2D5iHVM",
        "user": {
          "name": "Jacky Chan"
        },
        "access": [
          "controllers",
          "users",
          "users:index"
        ]
    }
}
```

## <a name="forgot-password"></a>Forgot Password

### Endpoint
POST /forgot-password

## <a name="change-password"></a>Change Password

### Endpoint
POST /change-password

## <a name="reset-password"></a>Reset Password

### Endpoint
POST /reset-password
