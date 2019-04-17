<h1>Documentation</h1>

This is simple web service to return information about movies and movie details. <br>
You can also add a mark to the movie of your choosing.<br>

service use:
<ul>
 <li>php version 7.2.15</li>
 <li>MySql 5.7.25</li>
 <li>Symfony 4.2^</li>
 <li>Nginx 1.14.0</li>
</ul>
<h2>Usage</h2>
If you want to test this web service you can go to one of those specific url adresses. 
List is down below:
<h3>GET method</h3>
<ul>
 <li>http://104.248.246.56/movies Returns json with all movies in the data base table.</li>
 <li>http://104.248.246.56/movies/details/10 Returns json with one record with the movie details. Where 10 is the movie id.</li>
</ul>
<h3>POST method</h3>
<ul>
 <li> http://104.248.246.56/marks/create/10/?mark_value=4 This method adds mark to the movie. <br>
Where 10 is the movie id and mark_value is selected mark. Mark value cannot be less than 1 and bigger than 10.
 </li>
</ul>

<h2>Installation</h2>
If you want to add something more to this service, you can download it on your PC or laptop and build this project. <br>
But you have to install some programs. 
<ul>
 <li>composer https://getcomposer.org/download/</li>
 <li>MySql https://dev.mysql.com/downloads/installer/</li>
 <li>Symfony https://symfony.com/doc/current/setup.html</li>
 <li>nginx https://www.nginx.com/resources/wiki/start/</li>
 <li>apache2 https://www.apachefriends.org/pl/index.html </li> 
</ul>
<br> 
I prepared a .htaccess file (movie-api/public) if you want to use the apache server.<br>
When you have had the composer and MySql installed, clone this project.<br>
After that go to project's folder and run  this command in the console: <br>
 * linux: open bush and write composer install 
 * windows: open cmd and write php composer install

I hope everything is working!<br>
