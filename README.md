# Show Episodes

Show all Episodes.
Includes Comments count for each episode.

**URL** : '/api/episodes/'

**Method** : `GET`

**Auth required** : NO

## Success Responses

**Condition** : list of episodes is returned.

**Code** : `200 OK`

**Content** : 

```json
[
    {
        "id": 1,
        "name": "Pilot",
        "air_date": "December 2, 2013",
        "episode": "S01E01",
        "characters":["https://rickandmortyapi.com/api/character/1", "https://rickandmortyapi.com/api/character/2",…],
        "url": "https://rickandmortyapi.com/api/episode/1",
        "created": "10-11-2017 12:56:33 PM",
        "comment_count": 2
    },    
]
```

## Error Response

**Condition** : Wrong Api is Entered

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "message": "404 Not Found",
    "status_code": 404
}
```

# Show Comments

Show all Comments.

**URL** : '/api/comments/'

**Method** : `GET`

## Success Responses

**Condition** : List of comments is returned

**Code** : `200 OK`

**Content** : 

```json
[
    {
        "id": 1,
        "episode_id": 1,
        "comment": "third comment",
        "ip": "127.0.0.1",
        "created_at": "2019-07-07 20:07:17"
    },
]
```
## Error Response

**Condition** : 

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "message": "404 Not Found",
    "status_code": 404
}
```

# Create Comments 

Add Comments To Episode

**URL** : '/api/episode/:episode/comment/create'

**URL Parameters** : `episode=[integer]` where `episode` is the ID of the Episode in the database.

**Method** : `POST`

## Success Responses

**Condition** : New Comment is added to an episode

**Code** : `200 OK`

**Content** : 

```json
[
    {
        "message" : "Comment Added",
        "status_code" : 200
    },
]
```

## Error Response

**Condition** : If wrong api is entered

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "message": "404 Not Found",
    "status_code": 404
}
```

### Or

**Condition** : If Validation fails

**Code** : `403 FORBIDDEN`

**Content** :

```json

    {
    "comment":[
      "The comment field is required."
      ],
    }

```

# Comments By Episode 

Retrieve Comments For an Episode

**URL** : '/api/episode/:episode/comments'

**URL Parameters** : `episode=[integer]` where `episode` is the ID of the Episode in the database.

**Method** : `GET`

## Success Responses

**Condition** : Retreive episodes

**Code** : `200 OK`

**Content** : 

```json
[
    {
        "id": 1,
        "episode_id": 1,
        "comment": "third comment",
        "ip": "127.0.0.1",
        "created_at": "2019-07-07 20:07:17"
    },
]
```

## Error Response

**Condition** : Wrong Api is Entered

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "message": "404 Not Found",
    "status_code": 404
}
```

# Characters list  

Retrieve characters For an Episode

**URL** : '/api/episode/:episode/characters'

**URL Parameters** : `episode=[integer]` where `episode` is the ID of the Episode in the database.

**Method** : `GET`

## Success Responses

**Condition** : Retreive characters by episodes

**Code** : `200 OK`

**Content** : 

```json
[
    {
        "id": 1,
        "name": "Rick Sanchez",
        "status": "Alive",
        "species": "Human",
        "type": "",
        "gender": "Male",
        "origin":{
        "name": "Earth (C-137)",
        "url": "https://rickandmortyapi.com/api/location/1"
        },
        "location":{
        "name": "Earth (Replacement Dimension)",
        "url": "https://rickandmortyapi.com/api/location/20"
        },
        "image": "https://rickandmortyapi.com/api/character/avatar/1.jpeg",
        "episode":["https://rickandmortyapi.com/api/episode/1", "https://rickandmortyapi.com/api/episode/2",…],
        "url": "https://rickandmortyapi.com/api/character/1",
        "created": "2017-11-04T18:48:46.250Z"
    },
]
```

## Error Response

**Condition** : Wrong Api is Entered

**Code** : `404 NOT FOUND`

**Content** :

```json
{
    "message": "404 Not Found",
    "status_code": 404
}
```