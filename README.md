# API Mini Challenge 3

## Documentation

Main Url : `http://mc3.tokoandalan.com`

Response json format example : 

`{
    "success": true,
    "message": "Success Login",
    "response": 200,
    "data": []
}`

the `data` key is result data from destination url example :

if you request for list of waste collector, it would contain json data for all record of waste collector in database.

| Request | param | method | response data |
|---|---|---|---|
|`{main url}/login` | none | post | `{ "token" : "hash token xxxxx.xxxxx.xxxxx" }` |
|`{main url}/register` | none | post | `{ "token" : "hash token xxxxx.xxxxx.xxxxx" }` | 
|`{main url}/household/list` | token | get | `{ "name": "bill tanthowi jauhari", "address":"malang", "phone":"082xxxxx", "lat":"-7000.3", "long":"+733.4", "duration_time":"30" }` |


to access all url except login and register, you need to pass token in url with query string `token` eg : `mc3.tokoandalan.com/household/list?token=xxx.xxx.xxx`

