<h1>Documentation</h1>

This is simple web service to return information about movies and movie detatils. <br>
Also You can add mark to movie <br>

service use:
* php version 7.2.15
* MySql 5.7.25
* Symfony 4.2^
* Nginx 1.14.0

<h2>Testing</h2>
for testing this web service you can go to specifict adress <br>
url directory repositories <br>
<h3>GET method</h3>
* http://104.248.246.56/movies return Json with all movies in the data base table
* http://104.248.246.56/movies/details/10 return Json with one record with movie details. Where 10 is movie id  
<h3>POST method</h3>
* http://104.248.246.56/marks/create/10/?mark_value=4 This method add mark to movie. <br>
10 is movie id and mark_value is selected mark. Mark value can be less than 1 and bigger than 10

<h2>Install</h2>
If you want try to add something more to this service, you can download on you PC or Laptop and build this project. <br>
But you have to install some programs. <br>
* composer https://getcomposer.org/download/
* MySql https://dev.mysql.com/downloads/installer/
* Symfony https://symfony.com/doc/current/setup.html
* nginx https://www.nginx.com/resources/wiki/start/
* apache2 https://www.apachefriends.org/pl/index.html <br> I prepere file .htaccess (movie-api/public) if you want use apache server 

When you install composer and MySql you have to clone this project<br>
then you have to select folder and run CMD or BUSH console and wirte simple command <br>
* linux: composer install 
* windows: php composer install

I hope everything is working!<br>


 

 
