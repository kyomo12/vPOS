# API

## pos (Point of sales)

| HTTP Method   | URL             | Action      |
| ------------- |:-------------  | -----        |
| GET           | /api/pos?token=XXXX   | Retrieves all POS                  |
| GET           | /api/pos/2?token=XXXX  | Retrieves a single pos of primary key 2 |
| POST          | /api/pos?token=XXXX   | Adds a new pos |
| PUT           | /api/pos/1?token=XXXX | Updates a single pos of primary key 1 |
| DELETE        | /api/pos/3?token=XXXX | Deletes a single product of primary key 3 |

## Users

| HTTP Method   | URL             |
| ------------- |:-------------  |
| GET           | /api/users?token=XXXX   |
| GET           | /api/users/2?token=XXXX  |
| POST          | /api/users?token=XXXX   |
| PUT           | /api/users/1?token=XXXX |
| DELETE        | /api/users/3?token=XXXX |
| POST          | /api/login |

### login (example)
#### Request
{
  "mobile": "255879086905",
  "password": "test"
}
#### Response
{
  "token": "XXXX"
}

## Materials
TBD

## Activities
TBD
