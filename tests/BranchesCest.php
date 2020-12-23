<?php
class BranchesCest 
{    
    public function addApi(ApiTester $I)
    {
        // positive testing
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'status_code' => 'string',
            'status_message' => 'string',
            'data' => 'object|null'
        ]);
        $I->seeResponseMatchesJsonType([
            'id' => 'string',
            'branch_code' => 'string',
            'company_code' => 'string',
            'branch_name' => 'string',
            'address' => 'string',
            'pic' => 'string',
            'kabeng' => 'string',
            'kelurahan' => 'string|null',
            'kecamatan' => 'string|null',
            'kab_kota' => 'string|null',
            'phone_number' => 'string|null',
            'fax_number' => 'string|null',
            'email' => 'string|null'
        ], '$.data');

        // negative testing 1
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode());
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch code is required",
            "data" => null
        ]);

        // negative testing 2
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch code is required",
            "data" => null
        ]);

        // negative testing 3
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch code is empty",
            "data" => null
        ]);

        // negative testing 4
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "1234",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch code must be 5 digit",
            "data" => null
        ]);

        // negative testing 5
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12344",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch code is exist in database",
            "data" => null
        ]);

        // negative testing 6
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch name is required",
            "data" => null
        ]);

        // negative testing 7
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "branch name is empty",
            "data" => null
        ]);

        // negative testing 8
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "address is required",
            "data" => null
        ]);

        // negative testing 9
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "address" => "",
            "pic" => "Budi",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "address is empty",
            "data" => null
        ]);

        // negative testing 10
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "pic is required",
            "data" => null
        ]);

        // negative testing 11
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "",
            "kabeng" => "Ridwan",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "pic is empty",
            "data" => null
        ]);

        // negative testing 12
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "kabeng is required",
            "data" => null
        ]);

        // negative testing 13
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPost('/branches', json_encode([
            "branch_code" => "12345",
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan 7",
            "pic" => "Budi",
            "kabeng" => "",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-400",
            "status_message" => "kabeng is empty",
            "data" => null
        ]);
    }

    public function editApi(ApiTester $I)
    {
        // positive testing
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPut('/branches/359ed520-346f-11eb-adc1-0242ac120002', json_encode([
            "branch_name" => "Testing Jaya Motor",
            "address" => "Jl. Kebahagiaan No.7",
            "pic" => "Rendi",
            "kabeng" => "Rojak",
            "kelurahan" => "Palmerah",
            "kecamatan" => "Palmerah",
            "kab_kota" => "Jakarta Barat",
            "phone_number" => "5367896",
            "fax_number" => "5113470",
            "email" => "testingmotor@gmail.com"
        ]));
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType([
            'status_code' => 'string',
            'status_message' => 'string',
            'data' => 'object|null'
        ]);
        $I->seeResponseMatchesJsonType([
            'branch_name' => 'string',
            'address' => 'string',
            'pic' => 'string',
            'kabeng' => 'string',
            'kelurahan' => 'string|null',
            'kecamatan' => 'string|null',
            'kab_kota' => 'string|null',
            'phone_number' => 'string|null',
            'fax_number' => 'string|null',
            'email' => 'string|null'
        ], '$.data');

        // negative testing 1
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPut('/branches/420ed511-346f-11eb-adc1-0242ac120002', json_encode([]));
        $I->seeResponseCodeIs(403);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-403",
            "status_message" => "Branch is not owned by user login",
            "data" => null
        ]);

        // negative testing 2
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendPut('/branches/359ed520-346f-11eb-adc1-0242ac110001', json_encode([]));
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-404",
            "status_message" => "data not found",
            "data" => null
        ]);
    }

    public function deleteApi(ApiTester $I)
    {
        // positive testing
        $I->haveHttpHeader('Content-Type', '*');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendDelete('/branches/632c725e-35e6-11eb-adc1-0242ac120002');
        $I->seeResponseCodeIs(204);
        
        // negative testing 1
        $I->haveHttpHeader('Content-Type', '*');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendDelete('/branches/420ed511-346f-11eb-adc1-0242ac120002');
        $I->seeResponseCodeIs(403);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-403",
            "status_message" => "Branch is not owned by user login",
            "data" => null
        ]);

        // negative testing 2
        $I->haveHttpHeader('Content-Type', '*');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendDelete('/branches/359ed520-346f-11eb-adc1-0242ac120112');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            "status_code" => "CDC-404",
            "status_message" => "data not found",
            "data" => null
        ]);
    }

    public function viewAllApi(ApiTester $I)
    {
        // positive testing
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches', [ 'keyword' => 'testing', 'page' => 1, 'limit' => 20, 'order' => 'branches.id', 'sort' => 'desc', 'company_id' => 1 ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $schema = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "Type" => "object",
                    "properties" => [
                        "branches" => [
                            "type" => "array",
                            "items" => [
                                "properties" => [
                                    "id" => [
                                        "type" => "string",
                                        "minLength" => 36,
                                        "required" => true
                                    ],
                                    "branch_code" => [
                                        "type" => "string",
                                        "minLength" => 5,
                                        "maxLength" => 5,
                                        "format" => "number",
                                        "required" => true
                                    ],
                                    "company_code" => [
                                        "type" => "string",
                                        "format" => "uppercase",
                                        "required" => true
                                    ],
                                    "branch_name" => [
                                        "type" => "string",
                                        "required" => true
                                    ],
                                    "address" => [
                                        "type" => "string",
                                        "required" => true
                                    ],
                                    "pic" => [
                                        "type" => "string",
                                        "required" => true
                                    ],
                                    "kabeng" => [
                                        "type" => "string",
                                        "required" => true
                                    ],
                                    "kelurahan" => [
                                        "type" => "string"
                                    ],
                                    "kecamatan" => [
                                        "type" => "string"
                                    ],
                                    "kab_kota" => [
                                        "type" => "string"
                                    ],
                                    "phone_number" => [
                                        "type" => "string",
                                        "format" => "number"
                                    ],
                                    "fax_number" => [
                                        "type" => "string",
                                        "format" => "number"
                                    ],
                                    "email" => [
                                        "type" => "string",
                                        "format" => "email"
                                    ]
                                ]
                            ]
                        ],
                        "pagination" => [
                            "type" => "object",
                            "properties" => [
                                "page" => [
                                    "type" => "integer",
                                    "minimum" => 1
                                ],
                                "limit" => [
                                    "type" => "integer",
                                    "minimum" => 1
                                ],
                                "order" => [
                                    "type" => "string",
                                    "enum" => ["id", "branch_code", "company_code"]
                                ],
                                "sort" => [
                                    "type" => "string",
                                    "enum" => ["asc", "desc"]
                                ],
                                "count" => [
                                    "type" => "integer"
                                ],
                                "keyword" => [
                                    "type" => ["string", "null"]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schema));

        // negative testing
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches', [ 'keyword' => 'testing', 'page' => 1, 'limit' => 20, 'order' => 'branches.id', 'sort' => 'desc', 'company_id' => 1 ]);
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $schemaFail = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "type" => "array"
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schemaFail));
        $I->seeResponseContainsJson([
            "status_code" => "CDC-200",
            "status_message" => "data not found",
            "data" => []
        ]);
    }

    public function viewByIdApi(ApiTester $I)
    {
        // positive testing
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches/359ede58-346f-11eb-adc1-0242ac120002');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $schema = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "Type" => "object",
                    "properties" => [
                        "id" => [
                            "type" => "string",
                            "minLength" => 36,
                            "required" => true
                        ],
                        "branch_code" => [
                            "type" => "string",
                            "minLength" => 5,
                            "maxLength" => 5,
                            "format" => "number",
                            "required" => true
                        ],
                        "company_code" => [
                            "type" => "string",
                            "format" => "uppercase",
                            "required" => true
                        ],
                        "branch_name" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "address" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "pic" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "kabeng" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "kelurahan" => [
                            "type" => "string"
                        ],
                        "kecamatan" => [
                            "type" => "string"
                        ],
                        "kab_kota" => [
                            "type" => "string"
                        ],
                        "phone_number" => [
                            "type" => "string",
                            "format" => "number"
                        ],
                        "fax_number" => [
                            "type" => "string",
                            "format" => "number"
                        ],
                        "email" => [
                            "type" => "string",
                            "format" => "email"
                        ]
                    ]
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schema));

        // negative testing 1
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches/555ede76-346f-11eb-adc1-0242ac120002');
        $I->seeResponseCodeIs(403);
        $I->seeResponseIsJson();
        $schemaFail1 = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "type" => null
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schemaFail1));
        $I->seeResponseContainsJson([
            "status_code" => "CDC-403",
            "status_message" => "Branch is not owned by user login",
            "data" => null
        ]);

        // negative testing 2
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches/359ed520-346f-11eb-adc1-0242ac120112');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $schemaFail2 = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "type" => null
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schemaFail2));
        $I->seeResponseContainsJson([
            "status_code" => "CDC-404",
            "status_message" => "data not found",
            "data" => null
        ]);
    }

    public function viewByCodeApi(ApiTester $I)
    {
        // positive testing
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches/code/17721');
        $I->seeResponseCodeIs(200);
        $I->seeResponseIsJson();
        $schema = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "Type" => "object",
                    "properties" => [
                        "id" => [
                            "type" => "string",
                            "minLength" => 36,
                            "required" => true
                        ],
                        "branch_code" => [
                            "type" => "string",
                            "minLength" => 5,
                            "maxLength" => 5,
                            "format" => "number",
                            "required" => true
                        ],
                        "company_code" => [
                            "type" => "string",
                            "format" => "uppercase",
                            "required" => true
                        ],
                        "branch_name" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "address" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "pic" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "kabeng" => [
                            "type" => "string",
                            "required" => true
                        ],
                        "kelurahan" => [
                            "type" => "string"
                        ],
                        "kecamatan" => [
                            "type" => "string"
                        ],
                        "kab_kota" => [
                            "type" => "string"
                        ],
                        "phone_number" => [
                            "type" => "string",
                            "format" => "number"
                        ],
                        "fax_number" => [
                            "type" => "string",
                            "format" => "number"
                        ],
                        "email" => [
                            "type" => "string",
                            "format" => "email"
                        ]
                    ]
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schema));

        // negative testing 1
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches/55555');
        $I->seeResponseCodeIs(403);
        $I->seeResponseIsJson();
        $schemaFail1 = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "type" => null
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schemaFail1));
        $I->seeResponseContainsJson([
            "status_code" => "CDC-403",
            "status_message" => "Branch is not owned by user login",
            "data" => null
        ]);

        // negative testing 2
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('Email', 'administrator@gmail.com');
        $I->sendGet('/branches/32450');
        $I->seeResponseCodeIs(404);
        $I->seeResponseIsJson();
        $schemaFail2 = [
            "properties" => [
                "status_code" => [
                    "type" => "string"
                ],
                "status_message" => [
                    "type" => "string"
                ],
                "data" => [
                    "type" => null
                ]
            ]
        ];
        $I->seeResponseIsValidOnJsonSchemaString(json_encode($schemaFail2));
        $I->seeResponseContainsJson([
            "status_code" => "CDC-404",
            "status_message" => "data not found",
            "data" => null
        ]);
    }
}