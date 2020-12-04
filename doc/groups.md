# Groups Module
Module | HTTP Method | URL | Description 
--- | --- | --- | ---
[Add Groups](#add) | POST | /groups-add | Add Groups API
[Edit Groups](#edit) | PUT | /groups-edit/{id} | Edit Groups API
[View All Groups](#view) | GET | /groups | View Groups API
[Delete Groups](#delete) | DELETE | /groups-delete/{id} | Delete Groups API


### Database
![](./groups-layer.png)

*For [Add Groups](#add) and [Edit Groups](#edit), you need get aros to set aros_id.* 

## <a name="add"></a>Add Groups

### Endpoint 
POST /groups-add

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
title | string | Admin  
description | string | Administrator
aros_id | int | 1
```
{
    "title": "Admin",
    "description": "Administrator",
    "aros": {
      "aros_id": "1"
    }
}

```

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
201 | Created | Created
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
        "id": "1",
        "title": "Admin",
        "description": "Administrator",
        "created": "2020-12-01 00:00:00",
        "modified": "2020-12-01 00:00:00",
        "aros_id": "1"
    }
} 
```

### Logic

#### Validation
- title : required and not empty
- description : required and not empty
- aros_id : required and not empty

*if any special logic, please write down the logic here. thanks*

### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "title is required",
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
    "status_message": "title is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "title": ""
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "title is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "title": "Coba"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "description is required",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{
    "title": "Coba",
    "description": ""
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "description is empty",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload :
```
{
    "title": "Coba",
    "description": "Coba coba"
}
```

Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "aros_id is required"
    "data": null
}
```

#### Case : Negative Case 7

Request Payload :
```
{
    "title": "Coba",
    "description": "Coba coba",
    "aros" : {
        "aros_id": ""
    }
}
```

Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "aros_id is empty"
    "data": null
}
```
#### Case : Positive Case

Request Payload :
```
{
    "title": "Sales",
    "description": "Sales Position"
    "aros": {
        "aros_id": "2"
    }
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": "2",
        "title": "Sales",
        "description": "Sales Position",
        "created": "2020-12-01 00:00:00",
        "modified": "2020-12-01 00:00:00",
        "aros_id": "2"
    }
}
```

## <a name="edit"></a>Edit Groups

### Endpoint
PUT /groups-edit/{id}

## <a name="view"></a>View All Groups

### Endpoint
GET /groups

### Headers
Key | Value 
--- | ---
Content-Type | *
Accept | application/json

### Request Payload

No Request Payload

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
    "data": [
      {
        "id": "1",
        "title": "Admin",
        "description": "Administrator",
        "created": "2020-12-01 00:00:00",
        "modified": "2020-12-01 00:00:00",
        "aros_id": "1"
      },
      {
        "id": "2",
        "title": "Sales",
        "description": "Sales Admin",
        "created": "2020-12-01 00:00:00",
        "modified": "2020-12-01 00:00:00",
        "aros_id": "2"
      }
} 
```

## <a name="delete"></a>Delete Groups

### Endpoint
DELETE /groups-delete/{id}
