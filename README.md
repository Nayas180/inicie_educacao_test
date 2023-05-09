**Inicie Educação Test**


## Como rodar?

php artisan serve


## End-points

Users
-> Função: Criar um novo usuario na API -- VERB: POST  URL: /api/v1/user/store

Parametros

Email,

name,

genero -- male or female


-> Função: Listar todos os usuarios da API -- VERB: POST  URL: /api/v1/user/index

-> Função: Listar um usuario apartir do ID -- VERB: POST  URL: /api/v1/user/show/{id_do_usuario}

----------------------------------------------------------------------------------

New Post
-> Função: Criar um novo post para o usuario na API -- VERB: POST  URL: /api/v1/store/post

Parametros

id_user,

title,

body

----------------------------------------------------------------------------------

New Comment
-> Função: Criar um novo comentario para o post na API -- VERB: POST  URL: /api/v1/store/comment

Parametros

id_post,

name,

email,

body

## Observação

No arquivo .env será necessario adicionar duas variaveis, chamadas de 

TOKEN_GOREST="" // Contendo o token de acesso da API, em volta das aspas dupla;
BASE_URL_API="https://gorest.co.in/public/v2"