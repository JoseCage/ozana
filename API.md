# 
Ozana API

### Routes

| Type        | Endpoint | Description | Fields/Params | :man: Auth/Token required? :lock: |
| ----------- |:-------:|-----:|-----:|-----:|
| `POST`| `api/auth/login`| Generate a new Token for existing User | `email`, `password` | :x:|
| `POST`| `api/auth/register`| Register a new User | `name`, `email`, `username`,`phone`,`avatar`,`password` | :x:|
| `GET`| `api/me`| Get logged in User information | :x: | :heavy_check_mark: |
| `GET`| `api/channels`| Get the available channels/platforms where you will watch | :x: | :x:|
| `GET`| `api/me/links`| Get User existing links | :x: | :heavy_check_mark: |
| `POST`| `api/me/links/share/{watchlist}` | Create a new shareable link of a User list | `url`,`watchlist_id` | :heavy_check_mark: |
| `GET`| `api/me/watchlists` | Get the User watchlists | :x: | :heavy_check_mark: ||
| `POST`| `api/me/watchlists`| Create a new Watchlists | `name`,`description`,`user_id`,`public` | :heavy_check_mark: |
| `GET`| `api/me/watchlists/{watchlist}` | Get watchlist details | `watchlist_id` | :heavy_check_mark: |
| `GET`| `api/movies` | Check available movies to add to your list | :x: | :x: |
| `GET`| `api/movietypes` | Get the movie types/categories | :x: | :x: |
| `GET`| `api/watchlists` | Get public watchlists | :x: | :x: |
| `GET`| `api/watchlists/{watchlist}` | See details and movies of a public list | `watchlist_id` | :x: |
