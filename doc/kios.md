# Kios Module
Module | HTTP Method | URL | Description 
--- | --- | --- | ---
[Add](#add) | POST | /kios | Add Data Kios
[Edit](#edit) | PUT | /kios/:id | Edit Data Kios
[View](#view) | GET | /kios/:id | View Data Kios
[Delete](#delete) | DELETE | /kios/:id | Delete Data Kios

## <a name="add"></a>Add Data Kios

### Endpoint
POST /kios

## Database
![](./kios-layer.png)

For add, you need get branch_code from branches tables

### Header
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
kios_name | string | mandala  
address | string | jl. bekasi timur raya no. 159 A
branch_code | string | mandala

```
{
    "kios_name": "mandala",
    "address": "jl. bekasi timur raya no. 159 A"
    "branches": [
        {
            "branch_code": "02629"
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
        "id": 1,
        "kios_name": "mandala",
        "address": jl. "bekasi timur raya no. 159 A",
        "branches": [
            {
                "branch_code": "02629"
            }
        ]
    }
}
```

### Logic

#### Validation
- kios_name     : required and not empty
- address       : required and not empty
- branch_code   : required and not empty

### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

response HTTP Status Code : 400

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "kios_name is required",
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
    "status_message": "kios_name is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "kios_name": ""
}
```

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "kios_name is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "kios_name": "mandala"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "address is required",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{
    "kios_name": "mandala",
    "address": ""
}
```
 
Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "address is empty",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload :
```
{
    "kios_name": "mandala",
    "address": "jl. bekasi timur raya no. 159 A",
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "branch_code is required",
    "data": null
}
```

#### Case : Negative Case 7

Request Payload :
```
{
    "kios_name": "mandala",
    "address": "jl. bekasi timur raya no. 159 A",
    "branch_code": ""
}
```
 
Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "branch_code is empty",
    "data": null
}
```

#### Case : Negative Case 8

Request Payload :
```
{
    "kios_name": "mandala",
    "address": "jl. bekasi timur raya no. 159 A",
    "branch_code": "asal"
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "branch_code is not found",
    "data": null
}
```

#### Case : Positive Case

Request Payload :
```
{
    "id": 1,
    "kios_name": "mandala",
    "address": "jl. bekasi timur raya no. 159 A",
    "branch_code": "02629"
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": 1,
        "kios_name": "mandala",
        "address": "jl. bekasi timur raya no. 159 A"
        "branches": [
            {
                "branch_code": "02629"
            }
        ]
    }
}
```

## <a name="edit"></a>Edit

### Endpoint
PUT /kios/:id

### Header
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
id | string | 1 
kios_name | string | mandala  
address | string | bekasi timur raya no. 159 A
branch_code | string | 02629

```
{
    "id": 1,
    "kios_name": "mandala",
    "address": "bekasi timur raya no. 159 A",
    "branch_code": "02629"
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
        "id": 1,
        "kios_name": "kalimantan",
        "address": "jl. k. h. moch mansyur no. 32 jembatan 5",
        "branches": [
            {
                "branch_code": "02629"
            }
        ]
    }
}
```

### Logic

#### Validation
- id            : required and not empty
- kios_name     : not empty
- address       : not empty
- branch_code   : required and not empty

### Scenario Test

### Case : Negative Case 1

Request Payload : empty

response HTTP Status Code : 400

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "id is required",
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
    "status_message": "id is required",
    "data": null
}
```

#### Case : Negative Case 3

Request payload :
```
{
    "id": ""
}
```

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "id is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "kios_name": "asal"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "cdc-400",
    "status_message": "id not found",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{
    "id": "1",
    "kios_name": ""
}
```
 
Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "kios_name is empty",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload :
```
{
    "id": "1",
    "kios_name": "kalimantan"
    "address": ""
}
```
 
Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "address is empty",
    "data": null
}
```

#### Case : Negative Case 7

Request Payload :
```
{
    "id": "1",
    "kios_name": "kalimantan"
    "address": "jl. k. h. moch mansyur no. 32 jembatan 5"
    "branch_code": ""
}
```
 
Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "cdc-404",
    "status_message": "branch_code is empty",
    "data": null
}
```

#### Case : Negative Case 8

Request Payload :
```
{
    "id": "1",
    "kios_name": "kalimantan"
    "address": "jl. k. h. moch mansyur no. 32 jembatan 5"
    "branch_code": "asal"
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "cdc-400",
    "status_message": "branch_code not found",
    "data": null
}
```

#### Case : Positive Case 1

Request Payload :
```
{
    "id": 1,
    "kios_name": "kalimantan",
    "address": "bekasi timur raya no. 159 A",
    "branch_code": "02629"
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": 1,
        "kios_name": "kalimantan",
        "address": "bekasi timur raya no. 159 A",
        "branches": [
            {
                "branch_code": "02629"
            }
        ]
    }
}
```

#### Case : Positive Case 2

Request Payload :
```
{
    "id": 1,
    "kios_name": "kalimantan",
    "address": "jl. k. h. moch mansyur no. 32 jembatan 5",
    "branch_code": "02629"
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": 1,
        "kios_name": "kalimantan",
        "address": "jl. k. h. moch mansyur no. 32 jembatan 5",
        "branches": [
            {
                "branch_code": "02629"
            }
        ]
    }
}
```

## <a name="view"></a>View

### Endpoint
GET /kios/:id

### Header
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
id | string | 1

```
{
    "id": 1
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
        "id": 1,
        "kios_name": "mandala",
        "address": jl. "bekasi timur raya no. 159 A",
        "branches": [
            {
                "branch_code": "02629"
            }
        ]
    }
}
```

### Logic

#### Validation
- id : required and not empty

### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

response HTTP Status Code : 400

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "id is required",
    "data": null
}
```

#### Case : Negative Case 2

Request Payload : 
```
{}
```

response HTTP Status Code : 400

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "id is required",
    "data": null
}
```

#### Case : Negative Case 3

Request Payload : 
```
{
    "id" : ""
}
```

response HTTP Status Code : 404

Response Payload : 
```
{
    "status_code": "cdc-404",
    "status_message": "id is empty",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload : 
```
{
    "id" : "asal"
}
```

response HTTP Status Code : 404

Response Payload : 
```
{
    "status_code": "cdc-404",
    "status_message": "id not found",
    "data": null
}
```

#### Case : Positive Case

Request Payload :
```
{
    "id": 1
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": 1,
        "kios_name": "kalimantan",
        "address": "jl. k. h. moch mansyur no. 32 jembatan 5",
        "branches": [
            {
                "branch_code": "06502"
            }
        ]
    }
}
```

## <a name="delete"></a>Delete

### Endpoint
DELETE /kios/:id

### Header
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json

### Request Payloads
Name | Type | Example Value
--- | --- | ---
id | string | 1

```
{
    "id": 1
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
}
```

```
{
    "status_code": "CDC-200",
    "status_message": "OK",
}
```

### Logic

#### Validation
- id: required and not empty

### Scenario Test

#### Case : Negative Case 1

Request Payload : empty

response HTTP Status Code : 400

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "id is required",
}
```

#### Case : Negative Case 2

Request Payload :
```
{}
```

response HTTP Status Code : 400

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "id is required",
}
```

#### Case : Negative Case 3

Request Payload :
```
{
    "id": ""
}
```

response HTTP Status Code : 404

Response Payload : 
```
{
    "status_code": "cdc-404",
    "status_message": "id is empty",
}
```

#### Case : Negative Case 4

Request Payload :
```
{
    "id": "asal"
}
```

response HTTP Status Code : 404

Response Payload : 
```
{
    "status_code": "cdc-400",
    "status_message": "id not found",
}
```

#### Case : Positive Case

Request Payload :
```
{
    "id": 1
}
```

response HTTP Status Code : 200

Response Payload : 
```
{
    "status_code": "cdc-200",
    "status_message": "OK",
}
```