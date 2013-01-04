
##This application provides an example of:

1. Building a complete RESTful API in PHP using the Slim framework.
2. Consuming these services using CanJS-Model

##Set Up:

1. Create a MySQL database name "cellar".
2. Execute cellar.sql to create and populate the "wine" table.
3. Deploy the webapp included in this repository.
4. Open Cellar-CanJS-Bootstrapped / api / lib / Database.php. In the getConnection() function at the bottom of the page, make sure the connection parameters match your database configuration.
5. Open application.js and make sure the rootURL variable matches your deployment configuration.
6. Access the application in your browser. For example: http://localhost/Cellar-CanJS-Bootstrapped/.

##Screenshots:
-- Application -- http://cl.ly/LmTy
-- API (home) -- http://cl.ly/LnYb
-- Mobi -- http://cl.ly/Lvyh

##Live
http://think-a-doo.net/

##Credits:
REST server with [Slim](http://coenraets.org/blog/2011/12/restful-services-with-jquery-php-and-the-slim-framework/) and
CRUD with [CanJS](http://net.tutsplus.com/tutorials/javascript-ajax/diving-into-canjs/)

##Console Code:

Create a .js file with the following:

    (function () {

	Wine = can.Model({
	        findAll : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/wines',
	        findOne : 'GET //localhost/Cellar-CanJS-Bootstrapped/api/wines/{id}',
	        create  : 'POST //localhost/Cellar-CanJS-Bootstrapped/api/wines',
	        update  : 'PUT //localhost/Cellar-CanJS-Bootstrapped/api/wines/{id}',
	        destroy : 'DELETE //localhost/Cellar-CanJS-Bootstrapped/api/wines/{id}'
	    },{
	    })

	})();
	
Create an index.html file and load jquery-1.7.2.min.js , can.jquery-1.1.3.js and your .js file.
Refresh the browser and open the console.
Try findAll()

    Wine.findAll({} , function (wines){console.log(wines)});
    
Try findOne()

    var myWine = Wine.findOne({id:1}, function(wine){console.log(wine)});
    
Try saving a new wine with save()

    myWine = new Wine();
    
    myWine.attr({"name": "CHATEAU DE SAINT COSME", "grapes": "Grenache / Syrah", "region": "Southern Rhone / Gigondas", "country": "France", "year": "2021", "picture": "default.jpg", "description": "The aromas of fruit and spice give one a hint of the light drinkability of this lovely wine, which makes an excellent complement to fish dishes." },true);
    
    myWine.save();
    
Try updating a wine [1] with save()    
    
    var that = this;
    Wine.findOne({'id': 1}).then(function(oneResponse){
        that.myWine = oneResponse;
        }
    )
    
    myWine.attr("year","2020");
    
    myWine.save();

Try deleting a wine [1] with destroy()      
    
    myWine.destroy();


