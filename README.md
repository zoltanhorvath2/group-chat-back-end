#group-chat-back-end installation guide:

1. Make sure that you have an ssh key have set up for your GitHub account on your machine, see: https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account
2. Make sure that you have Docker engine v2 and Docker Compose or Docker Desktop is installed on your machine. see: https://docs.docker.com/
3. run git clone `git@github.com:zoltanhorvath2/group-chat-back-end.git`
4. cd group-chat-back-end
5. copy the content of `.env.example` to a new file called `.env`
6. uncomment the DATABASE_URL line in the .env file for PostgreSQL, set up the user and password for your database and enter `group_chat_app` as the database name
7. run `docker compose up`
8. enter the php runtime container with `docker exec -ti php_fpm_group_chat_app bash`
9. run `composer install`
10. run `php bin/console secrets:generate-key` for generating an application secret key
11. You should see some test data returned in the response of http://localhost/api/test
12. To be able to handle websocket connections, enter the container with `docker exec -ti php_fpm_group_chat_app bash` and run `php bin/console web-socket:start` there
13. You can connect to the chat app websocket server at http://localhost/ws
