# Branches Module
Module | HTTP Method | URL | Description 
--- | --- | --- | ---
[Create Branches](#create-branches) | POST | /create-branches | Create Branches API
[Edit Branches](#edit-branches) | PUT | /edit-branches/{id} | Edit Branches API
[Delete Branches](#delete-branches) | DELETE | /delete-branches/{id} | Delete Branches API
[Get All Branches](#get-all-branches) | GET | /get-allbranches | Get All Branches API
[Get Branches By ID](#get-branches-byid) | GET | /get-branches-byid/{id} | Get Branches By ID API
[Get Branches By Branch Code](#get-branches-bybranchcode) | GET | /get-branches-bybranchcode/{kode} | Get Branches By Branch Code API

## <a name="create-branches"></a>Create

### Endpoint 
POST /create-branches

### Database
![](./branches-layer.png)

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

### Request Payloads
Name | Type | Example Value
--- | --- | ---
branchcode | string | 12345  
companycode | string | TES
branchname | string | Testing Jaya Motor  
address | string | Jl. Kebahagiaan 7
pic | string | Budi 
kabeng | string | Ridwan
kelurahan | string | Palmerah  
kecamatan | string | Palmerah
kabkota | string | Jakarta Barat  
phonenumber | string | 5367896
faxnumber | string | 5113470  
email | string | testingmotor@gmail.com
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
201 | Created | Success create to database
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
    "status_message": "Data Created",
    "data": {
            "id": "359ed520-346f-11eb-adc1-0242ac120002",
            "branchcode": "12345",
            "companycode": "TES",
            "branchname": "Testing Jaya Motor",
            "address": "Jl. Kebahagiaan 7",
            "pic": "Budi",
            "kabeng": "Ridwan",
            "kelurahan": "Palmerah",
            "kecamatan": "Palmerah",
            "kabkota": "Jakarta Barat",
            "phonenumber": "5367896",
            "faxnumber": "5113470",
            "email": "testingmotor@gmail.com"
        }
    }
}
```

### Logic

#### Headers Validation
- email : user email required and is not empty
- email : check user email is login or not
- email : must be top level, like administrator

#### Request Payloads Validation
- branchcode : required and not empty
- branchcode : must be 5 digit
- branchcode : unique and not exist in database
- companycode : required and not empty
- companycode : must be 3 digit
- branchname : required and not empty
- address : required and not empty
- pic : required and not empty
- kabeng : required and not empty

### Scenario Test

#### Case : Negative Case 1

Headers : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is required",
    "data": null
}
```

#### Case : Negative Case 2

Headers : email is not login

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is not login",
    "data": null
}
```

#### Case : Negative Case 3

Headers : email must be top level access

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email must be top level access or administrator",
    "data": null
}
```

#### Case : Negative Case 4

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch code is required",
    "data": null
}
```

#### Case : Negative Case 5

Request Payload :
```
{}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch code is required",
    "data": null
}
```

#### Case : Negative Case 6

Request payload :
```
{
    "branchcode": "",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch code is empty",
    "data": null
}
```

#### Case : Negative Case 7

Request Payload :
```
{
    "branchcode": "1234",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch code must be 5 digit",
    "data": null
}
```

#### Case : Negative Case 8

Request Payload :
```
{
    "branchcode": "12344",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```
 
Response HTTP Status Code : 400

Response Payload:
```
{
    "status_code": "CDC-400",
    "status_message": "branch code is exist in database",
    "data": null
}
```

#### Case : Negative Case 9

Request Payload
```
{
    "branchcode": "12345",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "company code is required",
    "data": null
}
```

#### Case : Negative Case 10

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "company code is empty",
    "data": null
}
```

#### Case : Negative Case 11

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TEST",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "company code must be 3 digit",
    "data": null
}
```

#### Case : Negative Case 12

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "branch name is required",
    "data": null
}
```

#### Case : Negative Case 13

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "branch name is empty",
    "data": null
}
```

#### Case : Negative Case 14

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "address is required",
    "data": null
}
```

#### Case : Negative Case 15

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "address is empty",
    "data": null
}
```

#### Case : Negative Case 16

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "pic is required",
    "data": null
}
```

#### Case : Negative Case 17

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "pic is empty",
    "data": null
}
```

#### Case : Negative Case 18

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "kabeng is required",
    "data": null
}
```

#### Case : Negative Case 19

Request Payload
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7",
    "pic": "Budi",
    "kabeng": "",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "kabeng is empty",
    "data": null
}
```

#### Case : Positive Case

Headers :
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

Request Payload :
```
{
    "branchcode": "12345",
    "companycode": "TES",
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan 7"
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 201

Response Payload :
```
{
    "status_code": "CDC-201",
    "status_message": "Data Created",
    "data": {
        "id": "359ed520-346f-11eb-adc1-0242ac120002",
        "branchcode": "12345",
        "companycode": "TES",
        "branchname": "Testing Jaya Motor",
        "address": "Jl. Kebahagiaan 7"
        "pic": "Budi",
        "kabeng": "Ridwan",
        "kelurahan": "Palmerah",
        "kecamatan": "Palmerah",
        "kabkota": "Jakarta Barat",
        "phonenumber": "5367896",
        "faxnumber": "5113470",
        "email": "testingmotor@gmail.com"
    }
}
```

## <a name="edit-branches"></a>Edit

### Endpoint
PUT /edit-branches/{id}

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

### Request Payloads
Name | Type | Example Value
--- | --- | ---
branchname | string | Testing Jaya Motor  
address | string | Jl. Kebahagiaan No.7
pic | string | Budi 
kabeng | string | Rojak
kelurahan | string | Palmerah  
kecamatan | string | Palmerah
kabkota | string | Jakarta Barat  
phonenumber | string | 5367896
faxnumber | string | 5113470  
email | string | testingmotor@gmail.com
```
{
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan No.7",
    "pic": "Rendi",
    "kabeng": "Rojak",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
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
    "status_message": "Data Changed",
    "data": {
            "branchname": "Testing Jaya Motor",
            "address": "Jl. Kebahagiaan No.7",
            "pic": "Rendi",
            "kabeng": "Rojak",
            "kelurahan": "Palmerah",
            "kecamatan": "Palmerah",
            "kabkota": "Jakarta Barat",
            "phonenumber": "5367896",
            "faxnumber": "5113470",
            "email": "testingmotor@gmail.com"
        }
    }
}
```

### Logic

#### Endpoint Validation
must be add parameter id and must exist in database

#### Headers Validation
- email : user email required and is not empty
- email : check user email is login or not
- email : must be top level, like administrator

#### Request Payloads Validation
- branchname : required and not empty
- address : required and not empty
- pic : required and not empty
- kabeng : required and not empty

### Scenario Test

#### Case : Negative Case 1

Headers : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is required",
    "data": null
}
```

#### Case : Negative Case 2

Headers : email is not login

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is not login",
    "data": null
}
```

#### Case : Negative Case 3

Headers : email must be top level access

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email must be top level access or administrator",
    "data": null
}
```

#### Case : Negative Case 4

- param id is empty

Endpoint : /edit-branches

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "url Not Found, param id is required",
    "data": null
}
```

#### Case : Negative Case 5

- param id is not exist in database

Endpoint : /edit-branches/359ed520-346f-11eb-adc1-0242ac110001

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "data not found",
    "data": null
}
```

#### Case : Negative Case 6

Request Payload : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch name is required",
    "data": null
}
```

#### Case : Negative Case 7

Request Payload :
```
{}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch name is required",
    "data": null
}
```

#### Case : Negative Case 8

Request payload :
```
{
    "branchname": "",
    "address": "Jl. Kebahagiaan No.7",
    "pic": "Rendi",
    "kabeng": "Rojak",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "branch name is empty",
    "data": null
}
```

#### Case : Negative Case 9

Request Payload
```
{
    "branchname": "Testing Jaya Motor",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "address is required",
    "data": null
}
```

#### Case : Negative Case 10

Request Payload
```
{
    "branchname": "Testing Jaya Motor",
    "address": "",
    "pic": "Budi",
    "kabeng": "Ridwan",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "address is empty",
    "data": null
}
```

#### Case : Negative Case 11

Request Payload
```
{
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan No.7",
    "kabeng": "Rojak",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "pic is required",
    "data": null
}
```

#### Case : Negative Case 12

Request Payload
```
{
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan No.7",
    "pic": "",
    "kabeng": "Rojak",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "pic is empty",
    "data": null
}
```

#### Case : Negative Case 13

Request Payload
```
{
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan No.7",
    "pic": "Rendi",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "kabeng is required",
    "data": null
}
```

#### Case : Negative Case 14

Request Payload
```
{
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan No.7",
    "pic": "Rendi",
    "kabeng": "",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 400

Response Payload
```
{
    "status_code": "CDC-400",
    "status_message": "kabeng is empty",
    "data": null
}
```

#### Case : Positive Case

- param id is exist in database

Endpoint : /edit-branches/359ed520-346f-11eb-adc1-0242ac120002

Headers :
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

Request Payload :
```
{
    "branchname": "Testing Jaya Motor",
    "address": "Jl. Kebahagiaan No.7",
    "pic": "Rendi",
    "kabeng": "Rojak",
    "kelurahan": "Palmerah",
    "kecamatan": "Palmerah",
    "kabkota": "Jakarta Barat",
    "phonenumber": "5367896",
    "faxnumber": "5113470",
    "email": "testingmotor@gmail.com"
}
```

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "Data Changed",
    "data": {
        "branchname": "Testing Jaya Motor",
        "address": "Jl. Kebahagiaan No.7",
        "pic": "Rendi",
        "kabeng": "Rojak",
        "kelurahan": "Palmerah",
        "kecamatan": "Palmerah",
        "kabkota": "Jakarta Barat",
        "phonenumber": "5367896",
        "faxnumber": "5113470",
        "email": "testingmotor@gmail.com"
    }
}
```

## <a name="delete-branches"></a>Delete

### Endpoint
DELETE /delete-branches/{id}

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

### Request Payloads
No Request Payloads

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
204 | No Content | Server request has succeeded but response is no content
```
{
    "status_code": "CDC-404",
    "status_message": "Not Found",
    "data": null
}
```

```
{
    "status_code": "CDC-204",
    "status_message": "Data Has Been Deleted",
    "data": null
}
```

### Logic

#### Endpoint validation
must be add parameter id and must exist in database

#### Headers Validation
- email : user email required and is not empty
- email : check user email is login or not
- email : must be top level, like administrator

#### Request Payloads Validation
No Request Payloads Validation

### Scenario Test

#### Case : Negative Case 1

Headers : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is required",
    "data": null
}
```

#### Case : Negative Case 2

Headers : email is not login

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is not login",
    "data": null
}
```

#### Case : Negative Case 3

Headers : email must be top level access

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email must be top level access or administrator",
    "data": null
}
```

#### Case : Negative Case 4

- param id is empty

Endpoint : /delete-branches

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "url Not Found, param id is required",
    "data": null
}
```

#### Case : Negative Case 5

- param id is not exist in database

Endpoint : /delete-branches/359ed520-346f-11eb-adc1-0242ac120112

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "data not found",
    "data": null
}
```

#### Case : Positive Case

- param id is exist in database

Endpoint : /delete-branches/632c725e-35e6-11eb-adc1-0242ac120002

Headers :
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

Response HTTP Status Code : 204

Response Payload :
```
{
    "status_code": "CDC-204",
    "status_message": "Data Has Been Deleted",
    "data": null
}
```

## <a name="get-all-branches"></a>Get All

### Endpoint
GET /get-allbranches

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

### Request Payloads
No Request Payloads

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
200 | OK | OK
```
{
    "status_code": "CDC-404",
    "status_message": "data not found",
    "data": null
}
```

```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": [
        {
            "id": "359ed520-346f-11eb-adc1-0242ac120002",
            "branchcode": "12345",
            "companycode": "TES",
            "branchname": "Testing Jaya Motor",
            "address": "Jl. Kebahagiaan 7",
            "pic": "Budi",
            "kabeng": "Ridwan",
            "kelurahan": "Palmerah",
            "kecamatan": "Palmerah",
            "kabkota": "Jakarta Barat",
            "phonenumber": "5367896",
            "faxnumber": "5113470",
            "email": "testingmotor@gmail.com"
        },
        {
            "id": "359ede58-346f-11eb-adc1-0242ac120002",
            "branchcode": "17721",
            "companycode": "TST",
            "branchname": "Tahta Sahabat Testing",
            "address": "Jl. Bukit utara",
            "pic": "Rini",
            "kabeng": "Surya",
            "kelurahan": "Manggarai",
            "kecamatan": "Tebet",
            "kabkota": "Jakarta Selatan",
            "phonenumber": "5721136",
            "faxnumber": "5805543",
            "email": "tst@yahoo.com"
        }
    ]
}
```

### Logic

#### Headers Validation
- email : user email required and is not empty
- email : check user email is login or not
- email : must be top level, like administrator

#### Request Payloads Validation
No Validation

### Scenario Test

#### Case : Negative Case 1

Headers : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is required",
    "data": null
}
```

#### Case : Negative Case 2

Headers : email is not login

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is not login",
    "data": null
}
```

#### Case : Negative Case 3

Headers : email must be top level access

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email must be top level access or administrator",
    "data": null
}
```

#### Case : Negative Case 4

Data in database is empty

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "data not found",
    "data": null
}
```

#### Case : Positive Case

Headers :
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": [
        {
            "id": "359ed520-346f-11eb-adc1-0242ac120002",
            "branchcode": "12345",
            "companycode": "TES",
            "branchname": "Testing Jaya Motor",
            "address": "Jl. Kebahagiaan 7",
            "pic": "Budi",
            "kabeng": "Ridwan",
            "kelurahan": "Palmerah",
            "kecamatan": "Palmerah",
            "kabkota": "Jakarta Barat",
            "phonenumber": "5367896",
            "faxnumber": "5113470",
            "email": "testingmotor@gmail.com"
        },
        {
            "id": "359ede58-346f-11eb-adc1-0242ac120002",
            "branchcode": "17721",
            "companycode": "TST",
            "branchname": "Tahta Sahabat Testing",
            "address": "Jl. Bukit utara",
            "pic": "Rini",
            "kabeng": "Surya",
            "kelurahan": "Manggarai",
            "kecamatan": "Tebet",
            "kabkota": "Jakarta Selatan",
            "phonenumber": "5721136",
            "faxnumber": "5805543",
            "email": "tst@yahoo.com"
        }
    ]
}
```

## <a name="get-branches-byid"></a>Get By ID

### Endpoint
GET /get-branches-byid/{id}

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

### Request Payloads
No Request Payloads

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
200 | OK | OK
```
{
    "status_code": "CDC-404",
    "status_message": "Not Found",
    "data": null
}
```

```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": "359ede58-346f-11eb-adc1-0242ac120002",
        "branchcode": "17721",
        "companycode": "TST",
        "branchname": "Tahta Sahabat Testing",
        "address": "Jl. Bukit utara",
        "pic": "Rini",
        "kabeng": "Surya",
        "kelurahan": "Manggarai",
        "kecamatan": "Tebet",
        "kabkota": "Jakarta Selatan",
        "phonenumber": "5721136",
        "faxnumber": "5805543",
        "email": "tst@yahoo.com"
    }
}
```

### Logic

#### Endpoint Validation
must be add parameter id and must exist in database

#### Headers Validation
- email : user email required and is not empty
- email : check user email is login or not
- email : must be top level, like administrator

#### Request Payloads Validation
No Request Payloads Validation

### Scenario Test

#### Case : Negative Case 1

Headers : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is required",
    "data": null
}
```

#### Case : Negative Case 2

Headers : email is not login

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is not login",
    "data": null
}
```

#### Case : Negative Case 3

Headers : email must be top level access

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email must be top level access or administrator",
    "data": null
}
```

#### Case : Negative Case 4

- param id is empty

Endpoint : /get-branches-byid

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "url Not Found, param id is required",
    "data": null
}
```

#### Case : Negative Case 5

- id not exist in database

Endpoint : /get-branches-byid/359ed520-346f-11eb-adc1-0242ac120112

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "data not found",
    "data": null
}
```

#### Case : Positive Case

- id is exist in database

Endpoint : /get-branches-byid/359ede58-346f-11eb-adc1-0242ac120002

Headers :
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": "359ede58-346f-11eb-adc1-0242ac120002",
        "branchcode": "17721",
        "companycode": "TST",
        "branchname": "Tahta Sahabat Testing",
        "address": "Jl. Bukit utara",
        "pic": "Rini",
        "kabeng": "Surya",
        "kelurahan": "Manggarai",
        "kecamatan": "Tebet",
        "kabkota": "Jakarta Selatan",
        "phonenumber": "5721136",
        "faxnumber": "5805543",
        "email": "tst@yahoo.com"
    }
}
```

## <a name="get-branches-bybranchcode"></a>Get By Branch Code

### Endpoint
GET /get-branches-bybranchcode/{kode}

### Headers
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

### Request Payloads
No Request Payloads

### Response Payloads
HTTP Code | Status | Description
--- | --- | ---
400 | Bad Request | Bad request payload  
404 | Not Found | User not found in database  
500 | Internal Server Error | some un-handle error in server 
200 | OK | OK
```
{
    "status_code": "CDC-404",
    "status_message": "Not Found",
    "data": null
}
```

```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": "359ede58-346f-11eb-adc1-0242ac120002",
        "branchcode": "17721",
        "companycode": "TST",
        "branchname": "Tahta Sahabat Testing",
        "address": "Jl. Bukit utara",
        "pic": "Rini",
        "kabeng": "Surya",
        "kelurahan": "Manggarai",
        "kecamatan": "Tebet",
        "kabkota": "Jakarta Selatan",
        "phonenumber": "5721136",
        "faxnumber": "5805543",
        "email": "tst@yahoo.com"
    }
}
```

### Logic

#### Endpoint Validation
must be add parameter branch code and must exist in database

#### Headers Validation
- email : user email required and is not empty
- email : check user email is login or not
- email : must be top level, like administrator

#### Request Payloads Validation
No Request Payloads Validation

### Scenario Test

#### Case : Negative Case 1

Headers : empty

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is required",
    "data": null
}
```

#### Case : Negative Case 2

Headers : email is not login

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email is not login",
    "data": null
}
```

#### Case : Negative Case 3

Headers : email must be top level access

Response HTTP Status Code : 400

Response Payload :
```
{
    "status_code": "CDC-400",
    "status_message": "headers email must be top level access or administrator",
    "data": null
}
```

#### Case : Negative Case 4

- param branch code is empty

Endpoint : /get-branches-bybranchcode

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "url Not Found, param branch code is required",
    "data": null
}
```

#### Case : Negative Case 5

- branch code not exist in database

Endpoint : /get-branches-bybranchcode/32450

Response HTTP Status Code : 404

Response Payload :
```
{
    "status_code": "CDC-404",
    "status_message": "data not found",
    "data": null
}
```

#### Case : Positive Case

- branch code is exist in database

Endpoint : /get-branches-bybranchcode/17721

Headers :
Key | Value 
--- | ---
Content-Type | application/json
Accept | application/json
Email | administrator@gmail.com

Response HTTP Status Code : 200

Response Payload :
```
{
    "status_code": "CDC-200",
    "status_message": "OK",
    "data": {
        "id": "359ede58-346f-11eb-adc1-0242ac120002",
        "branchcode": "17721",
        "companycode": "TST",
        "branchname": "Tahta Sahabat Testing",
        "address": "Jl. Bukit utara",
        "pic": "Rini",
        "kabeng": "Surya",
        "kelurahan": "Manggarai",
        "kecamatan": "Tebet",
        "kabkota": "Jakarta Selatan",
        "phonenumber": "5721136",
        "faxnumber": "5805543",
        "email": "tst@yahoo.com"
    }
}
```