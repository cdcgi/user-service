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

*if any special logic, please write down the logic here. thanks*

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

![](./forgot_password_layer.png)


For recycle your password, you need to input your email for sending password recovery to your email.

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
email | string | jacky@gmail.com
```
{
    "email": "jacky@gmail.com"
}
```
### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
200 | Password recovery was sended to your email. please checked your email. | Password recovery was sended to your email. please checked your email.
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
    "status_message": "Password recovery was sended to your email. please checked your email. ",
    "data": null
}
```

### Logic

1. Validate email input.
2. Store the link forgot password to forgot_password_temps table.
3. Send email reset password link to user.


#### Validation
- email: required, using email pattern, and not empty



### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "email is required",
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
    "status_message": "email is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "email": ""
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "email is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "email": "asal"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "email format is invalid",
    "data": null
}
```


#### Case : Negative Case 5

Request Payload
```
{
    "email": "asal@gmail.com"
}
```

Response HTTP Status Code : 404

Response Payload
```
{
    "status_code": "cdc-404",
    "status_message": "email not found",
    "data": null
}
```

#### Case : Positive Case

Request Payload :
```
{
    "email": "jacky@gmail.com"
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "Password recovery was sended to your email. please checked your email. ",
    "data": null
}
```

## <a name="change-password"></a>Change Password

### Endpoint
POST /change-password

## <a name="reset-password"></a>Reset Password

### Endpoint
POST /reset-password
