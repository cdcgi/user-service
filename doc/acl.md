# ACL Module
Module | HTTP Method | URL | Description 
--- | --- | --- | ---
[List] | GET | /access | Get All List Access
[Add] | POST | /access | Add New Record to Acos
[View] | GET | /access/:id | View detail Acos by id
[Edit] | PUT | /access/:id | Edit Existing record in Acos by id
[Delete] | DELETE | /access/:id | Delete Existing record in Acos by id
[Grant] | POST | /access/grant/:id | insert new record in aros_acos. aco_id in path url. aro_id grab from header email
[Revoke] | POST | /access/revoke/:id | remove existing record in aros_acos. aco_id in path url. aro_id grab from header email.

## <a name="add"></a>Login

### Endpoint 
POST /access

### Database
![](./acl_model.png)

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | cdc_user@gmail.com


### Request Payloads
Name | Type | Example Value
--- | --- | ---
parent_id | int | 1 
alias | int | Groups
```
{
    "parent_id" : 1,
    "alias" : "Groups",
}
```

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
201 | Created | Success created new access
```
{
    "status_code": "CDC-400",
    "status_message": "Bad Request",
    "data": null
}
```

```
{
    "status_code": "CDC-201",
    "status_message": "Created",
     "data": {
        "id":2,
        "parent_id": 1,
        "alias": "Groups",
        "created": "2020-10-28T08:58:13+00:00",
        "modified": "2020-10-28T08:58:13+00:00"
    }
}
```

### Logic
 using <a href="https://book.cakephp.org/4/en/orm/behaviors/tree.html" rel="notfollow">cakephp tree</a> behavior to get lft and rght from parent_id

#### Validation
- parent_id: required and not empty
- alias: required, not empty and unique

### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "parent_id is required",
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
    "status_message": "parent_id is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "parent_id": ""
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "Parent_id is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "parent_id": 1
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "alias is required",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{
    "parent_id": 1,
    "alias": ""
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": " alias is empty",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload :
```
{
    "parent_id": 1,
    "alias": "Groups"
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": " alias is already exist in acos table",
    "data": null
}
```

#### Case : Negative Case 7

Request Payload :
```
{
    "parent_id": 1,
    "alias": "Groups"
}
```
 
Response HTTP Status Code : 404

Response Payload:
```
{
    "status_code": "cdc-404",
    "status_message": " parent_id not found in acos table",
    "data": null
}
```

#### Case : Positive Case

Request Payload :
```
{
    "parent_id": 1,
    "alias": "Groups"

}
```

Response HTTP Status Code : 201

Response Payload :
```
{
    "status_code": "CDC-201",
    "status_message": "Created",
    "data": {
        "id":2,
        "parent_id": 1,
        "alias": "Groups",
        "created": "2020-10-28T08:58:13+00:00",
        "modified": "2020-10-28T08:58:13+00:00"
    }
}
```

## <a name="index"></a>Index

### Endpoint
GET /access

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | cdc_user@gmail.com

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
200 | OK | OK

{
    "status_code": "CDC-200",
    "status_message": "OK",
     "data": {
         "acos": [
             {
                "id":1,
                "parent_id": null,
                "alias": "Controller",
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
             },
             {
                "id":2,
                "parent_id": 1,
                "alias": "Index",
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
             },
             {
                "id":3,
                "parent_id": 1,
                "alias": "Add",
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
             },
             {
                "id":4,
                "parent_id": 1,
                "alias": "View",
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
             },
             {
                "id":5,
                "parent_id": 1,
                "alias": "Edit",
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
             },
         ]
    }
}

### Logic
- if there is no email header, it get all acos in tree.
- if any email header, it get all acos which is grant to user login (you need join to aros_acos table).

## <a name="view"></a>View

### Endpoint
GET /access/:id

## <a name="edit"></a>Edit

### Endpoint
PUT /access/:id

## <a name="delete"></a>DELETE

### Endpoint
DELETE /access/:id

## <a name="grant"></a>DELETE

### Endpoint
POST /access/grant/:id

## <a name="revoke"></a>DELETE

### Endpoint
POST /access/revoke/:id
