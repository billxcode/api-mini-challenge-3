# api-mini-challenge-3

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

| Request | method | param | response data |
|---|---|---|
|{main url}/login | none | post | `{ "token" : "hash token xxxxx.xxxxx.xxxxx" }` |
|{main url}/register | none | post | `{ "token" : "hash token xxxxx.xxxxx.xxxxx" }` | 
|{main url}/household/list | token | get | `{}` |

