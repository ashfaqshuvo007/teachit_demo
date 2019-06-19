# teachit_demo
For a video sharing api endpoint using laravel. My client requirement was to build a api endpoint for his project where he wanted to host videos. It was a kind of a udemy look alike. I started working on it and the project was cancelled laer on. BUt I practiced VUE.js on the project.

## Installation

Just clone it to you PC and use if you need a basic understanding on how to make a RESTFUL API using laravel framework.

## Technologies used:
=> laravel Framework
    techniques used
    ------------------
    ->resources
    ->model,factories
    ->migrations
=> Vue Js
    Simple CRUD SPA

##Usage

1. Download or Clone the github repository:
    Repositorpy Link:
    -----------------
    https://github.com/ashfaqshuvo007/teachit_demo.git

2. How to Get the app Up and running:
---------------------------------------    
    a) Open cmd/terminal and run command:
        composer install
    b) Copy .env.example and make .env file
        run command:  cp .env.example .env
    c)Generate a Key for the app :
     run command: php artisan key:generate


3) Database setup for the app
--------------------------------
    a) Make an empty Database (mysql)
    b) Migrate the database:
        run on cmd: php artisan Migrate

4) Set up the demo data for the database
------------------------------------------

There are four tables in the database and the package should include foour seeder file. Run db:seed command for each starting with the UserTableSeeder file.
This should be easy using the following command.

php artisan db:seed --class=UsersTableSeeder
php artisan db:seed --class=VideosTableSeeder
php artisan db:seed --class=LikesTableSeeder
php artisan db:seed --class=CommentsTableSeeder

Now your app is ready for testing the api CRUD.



Testing the api:
=================

You can use your browser ,but I prefer and recommend using "POSTMAN" api testing tool.

Well, the url you should hit for it to run and show data as json is: 

1) FOR VIDEO CRUD operations:

    a) To list all videos (15 videos and paginated)
    ------------------------------------------------

    a GET request to:
    localhost/teachit_demo/api/videos

    b) For a single video:
    ------------------------

    a GET request to:
    localhost/teachit_demo/api/video/1 and  so on ...

    c) To save a new video:
    ------------------------
    A POST request to -
    localhost/teachit_demo/api/video

    in the format:
    {
        "title" : "Testing Video",
        "description": "This is the description",
        "user_id": 2,
        "url": "path/to/video.avi",
        "thumbnailUrl": "path/to/video.png"
    }

    d) TO UPDATE a Video info:
    ---------------------------
    A PUT request in the format:
    {
        "videos_id" : 5,
        "user_id": 11,
        "title":  "Updated Title",
        "description" : "This is Updated Description"
    }

    e) To DELETE  a single Video:
    --------------------------------

    A DELETE request to 
    localhost/teachit_demo/api/video/1 and so on .........


2) FOR USER CRUD operations

    a) To list all users (10 users and paginated)
    ------------------------------------------------

    A GET request to:
    localhost/teachit_demo/api/users

    b) For a single user:
    ------------------------

    A GET request to:
    localhost/teachit_demo/api/user/1 and  so on ...

    c) To save a new user:
    ------------------------
    A POST request to -
    localhost/teachit_demo/api/user

    in the format:
    {
        "name": "ashfaq007",
        "avatar": "https://lorempixel.com/600/400/?35999",
        "email": "ashfaq@example.com",
        "password": "secret"
    }

    d) TO UPDATE a User info:
    ---------------------------
    A PUT request in the format:
    {
        "user_id": 21,
        "name": "ashfaq009",
        "avatar": "https://lorempixel.com/600/400/?35111",
        "email": "ashfaq@example.net",
        "password": "secret"
    }

    e) To DELETE  a single user:
    --------------------------------

    A DELETE request to 
    localhost/teachit_demo/api/user/1 and so on .........


3) To fetch all videos ordered by an order parameter (name, like ,count or updated time).

    Just hit the following url:
    ----------------------------

    http://teachit.demo/api/videos/orderBy=(db_field)/order=(the_order)

    Where, "db_field" can be:
            a)videos_id
            b)title
            c)user_id
            d)likes_count
            e)comments_count
            f)created_at or updated_at

    And "the_order" can be "ASC" or "DESC"


4)  a)The likes or comments count for each video:

        listed with each video

    b)Likes increment or decrement: 

        A PUT request to the url:

        localhost/api/video/1/like_counter

        In the following format:
        {
            "videos_id" : 1,
            "likes_count": 3 
        }

        set any value for likes_count

5) To add  comments for a particular video. Each comment should include the users reference and the date posted.

    A POST request to : 
    -------------------
    localhost/api/add_comment

    in the Format: 
    {
        "comment_body": "lorem Ipsum Demor set",
        "user_id": 1,
        "videos_id": 1
    }

    it return with data necessary.


## How it helped Me

This was obviously just for practice purpose only. So, I used resources and collection concept of laravel to solve the paginate and how the json should be formatted. 

I also learned about basic crud in Vue js.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)