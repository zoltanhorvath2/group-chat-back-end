#group-chat-back-end installation guide:

1. Make sure that you have an ssh key have set up for your GitHub account on your machine, see: https://docs.github.com/en/authentication/connecting-to-github-with-ssh/adding-a-new-ssh-key-to-your-github-account
2. Make sure that you have Docker engine v2 and Docker Compose or Docker Desktop is installed on your machine. see: https://docs.docker.com/
3. run git clone `git@github.com:zoltanhorvath2/group-chat-back-end.git`
4. cd group-chat-back-end
5. copy the content of `.env.example` to a new file called `.env`
6. run `docker compose up`
7. enter the php runtime container with `docker exec -ti php_fpm_group_chat_app bash`
8. run `composer install`
9. run `php bin/console key:generate`
10. You should see some test data returned in the response of http://localhost:8080/api/test
