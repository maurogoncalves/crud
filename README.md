# crud
app

1 - Clonar  o projeto

2 - Criar o banco de dados com nome crud, no mysql

3 - se o mysql tiver uma senha então no arquivo deve colocar a mesma senha crud\application\database.php  - $db['default']['password'] = 'sua senha'

4 - Execute o migrations, no browser https://localhost/crud/migrate - todas as tabelas deverão ser criadas 
    
5 - SE a migração não der certo, pode criar o banco de dados, a partir do do script database.sql 

6 - Os endpoints foram criando com basic auth, usuário e senha é o valor "CRUD"

7 - Os endpoints tem ter o X-API-KEY no header com o valor crud@2022

8 - Os endpoints foram testados via php, entra na pasta teste_api

9 - No postman podem ser testados todos os endpoints, basta importar a collection que está na pasta collection.

10 - Para mostrar um colaborador deve passar o codigo via url no postman localhost/crud/index.php/api/Colaboradores/2

11 - Para mostrar todos os colaboradores, não precisa passar o codigo via url localhost/crud/index.php/api/Colaboradores

12 - Para apagar um colaborador deve passar o codigo via url no postman localhost/crud/index.php/api/Colaboradores/2

13 - Todos os retornos da api e usado o json.


