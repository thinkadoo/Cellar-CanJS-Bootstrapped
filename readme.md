
This application provides an example of:

1. Building a complete RESTful API in PHP using the Slim framework.
2. Consuming these services using jQuery

Set Up:

1. Create a MySQL database name "cellar".
2. Execute cellar.sql to create and populate the "wine" table:

	mysql cellar -uroot < cellar.sql

3. Deploy the webapp included in this repository.
4. Open api/index.php. In the getConnection() function at the bottom of the page, make sure the connection parameters match your database configuration. 
5. Open application.js and make sure the rootURL variable matches your deployment configuration.
6. Access the application in your browser. For example: http://localhost/cellar.

Screenshot:
-- Application -- http://cl.ly/LnYb
-- API (home) -- http://cl.ly/LnAV

Credit: http://coenraets.org/blog/2011/12/restful-services-with-jquery-php-and-the-slim-framework/

