<h1>Техническое задание для Leadfactor</h1>
<hr>
<h3>Установка</h3>
<ul>
    <li>Скачать репозиторий: <i>git clone</i></li>
    <li>Сгенерировать .env файл: <i>cp .env.example .env</i> и <i>php artisan key:generate</i></li>
    <li>Создать интеграцию AmoCRM, получить ключ доступа и записать в env переменную <i>APP_AMOCRM_KEY</i></li>
    <li>Создать сервисный ключ доступа на Google Cloud и разместить его в соотвествии с env переменной <i>APP_GOOGLE_AUTH_CREDS</i></li>
    <li>Заполнить .env переменные</li>
</ul>
<hr>
<h3>.env Переменные</h3>
<ul>
    <li>APP_AMOCRM_KEY</li>
    <li>APP_GOOGLE_AUTH_CREDS (путь до файла в формате .json)</li>
    <li>APP_GOOGLE_SHEET_ID</li>
</ul>
<hr>
<h3>Запуск</h3>
<p>проект не поддерживает Docker</p>
<code>php artisan serve</code>
<hr>
<p>Сделано Ult1mateXPHP (Aleksey Ekzhes)</p>
