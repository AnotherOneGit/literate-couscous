<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Запросы
                </div>

                <div class="links">
                    POST http://127.0.0.1:8080/public/api/register - регистрация юзера. Необходимые поля:
                    name, email, password, password_confirmation</br>
                    POST http://127.0.0.1:8080/public/api/login - email, password</br>

                    GET http://127.0.0.1:8080/public/api/authors - список всех авторов с его книгами</br>
                    POST http://127.0.0.1:8080/public/api/authors - создание автора - name</br>
                    GET http://127.0.0.1:8080/public/api/authors/{author} - просмотр конкретного автора</br>
                    PUT http://127.0.0.1:8080/public/api/authors/{author} - редактирование автора</br>
                    DELETE http://127.0.0.1:8080/public/api/authors/{author} - удаление автора</br>

                    GET http://127.0.0.1:8080/public/api/books - просмотр всех книг. </br>
                    Если добавить в запрос ключ sort с пустым значением - будут отсортированы по средней оценке</br>
                    POST http://127.0.0.1:8080/public/api/books - создание книги. Поля:
                    author_id, title. Автор с данным id уже должен существовать</br>
                    GET http://127.0.0.1:8080/public/api/books/{book} - просмотр конкретной книги</br>
                    PUT http://127.0.0.1:8080/public/api/books/{book} - редактирование книги</br>
                    DELETE http://127.0.0.1:8080/public/api/books/{book} - удаление книги</br>

                    GET http://127.0.0.1:8080/public/api/search - поиск среди книг и авторов по значению ключа search </br>
                    POST http://127.0.0.1:8080/public/api/score - выставление оценки существуещей книге. Поля: book_id, score</br>
                </div>
            </div>
        </div>
    </body>
</html>
