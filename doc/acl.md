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


*if need create new database, please write the sql script below* 

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | application/json


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
        "parent_id": 1,
        "alias": "Groups",
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
- parent_id: required and not empty
- alias: required, not empty and unique

*if any special logic, please write down the logic here. thanks*

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



#### Case : Positive Case

Request Payload :
```
{
    "parent_id": 1,
    "alias": Groups

}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "parent_id": 1,
        "alias": "Groups",
        "acos": [
            {
                "id": 1,
                "_create" : 1,
                "_read" : 1,
                "_update" : 1,
                "_delete" : 1,
                "created": "2020-10-28T08:58:13+00:00",
                "modified": "2020-10-28T08:58:13+00:00"
            }
        ]
    }
}
```

## <a name="index"></a>Index

### Endpoint
GET /access

## <a name="view"></a>View

### Endpoint
GET /access/:id

## <a name="edit"></a>Edit

### Endpoint
POST /access/:id

## <a name="delete"></a>DELETE

### Endpoint
DEL /access/:id

## <a name="grant"></a>DELETE

### Endpoint
POST /access/grant/:id

## <a name="revoke"></a>DELETE

### Endpoint
POST /access/revoke/:id
