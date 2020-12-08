# ACL Module
Module | HTTP Method | URL | Description 
--- | --- | --- | ---
[Add](#add) | POST | /add | Add ACL
[View](#view) | GET | /view/id | View Acl
[Edit](#edit) | PUT | /edit/id | Edit ACL
[Delete](#delete) | DELETE | /delete/id | Delete Acl

## <a name="login"></a>Login

### Endpoint 
POST /add

### Database
![](./acl_model.png)

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
model | string | Groups 
foreign_key | int | 2 
lft | int | 1 
right | int | 1 
acos_id | int | 1  
_create | int| 1
_read | int| 1
_update | int| 1
_delete | int| 1
```
{
    "model" : "Groups",
    "foreign_key" : 2,
    "lft" : 1,
    "right" : 1,
    "acos" : [
        {
            "id" : 1,
            "_create" : 1,
            "_read" : 1,
            "_update" : 1,
            "_delete" : 1
        }
    ]
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
        "model": "Groups",
        "acos": [
            {
                "id": 1,
                "_create" : 1,
                "_read" : 1,
                "_update" : 1,
                "_delete" : 1
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
            }
        ]
    }
}
```

### Logic

#### Validation
- model : required and not empty
- foreign_key: required and not empty
- acos_id: required and not empty

*if any special logic, please write down the logic here. thanks*

### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "model is required",
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
    "status_message": "model is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "model": ""
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "model is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "model": "Groups"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "foreign_key is required",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{
    "model": "Groups",
    "foreign_key": ""
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "Foreign Key is empty",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload
```
{
    "model": "Groups",
    "foreign_key": 1
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "cdc-400",
    "status_message": " Acos ID is required",
    "data": null
}
```

#### Case : Negative Case 7

Request Payload
```
{
    "model": "Groups",
    "foreign_key": 1,
    "acos" : [
        {
            "id" : ""
        }
    ]
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "cdc-400",
    "status_message": " Acos ID is empty",
    "data": null
}
```

#### Case : Positive Case

Request Payload :
```
{
    "model": "Groups",
    "foreign_key": 1,
    "acos" : [
        {
            "id" : ""
        }
    ]

}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "model": "Groups",
        "acos": [
            {
                "id": 1,
                "_create" : 0,
                "_read" : 0,
                "_update" : 0,
                "_delete" : 0
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
            }
        ]
    }
}
```

## <a name="index"></a>Index

### Endpoint
GET /acl

## <a name="view"></a>View

### Endpoint
GET /view/id

## <a name="edit"></a>Edit

### Endpoint
POST /edit/id

## <a name="delete"></a>DELETE

### Endpoint
DEL /delete/id
