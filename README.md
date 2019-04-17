<h1>Documentation</h1>

This is simple web service to return information about movies and movie detatils. <br>
You can also add mark to movie <br>

service use:
<ul>
 <li>php version 7.2.15</li>
 <li>MySql 5.7.25</li>
 <li>Symfony 4.2^</li>
 <li>Nginx 1.14.0</li>
</ul>
<h2>Testing</h2>
for testing this web service you can go to specifict adress <br>
url directory repositories 
<br>
<h3>GET method</h3>
<br>
<ul>
 <li>http://104.248.246.56/movies return Json with all movies in the data base table</li>
 <li>http://104.248.246.56/movies/details/10 return Json with one record with movie details. Where 10 is movie id</li>
</ul>
<br>
<h3>POST method</h3>
<br>
<ul>
 <li> http://104.248.246.56/marks/create/10/?mark_value=4 This method add mark to movie. <br>
10 is movie id and mark_value is selected mark. Mark value can be less than 1 and bigger than 10
 </li>
</ul>

<h2>Install</h2>
If you want try to add something more to this service, you can download on you PC or Laptop and build this project. <br>
But you have to install some programs. 
<br>
<ul>
 <li>composer https://getcomposer.org/download/</li>
 <li>MySql https://dev.mysql.com/downloads/installer/</li>
 <li>Symfony https://symfony.com/doc/current/setup.html</li>
 <li>nginx https://www.nginx.com/resources/wiki/start/</li>
 <li>apache2 https://www.apachefriends.org/pl/index.html </li> 
</ul>
<br> 
I prepere file .htaccess (movie-api/public) if you want use apache server 

When you install composer and MySql you have to clone this project<br>
then you have to select folder and run CMD or BUSH console and wirte simple command <br>
 * linux: composer install 
 * windows: php composer install

I hope everything is working!<br>


 

 
