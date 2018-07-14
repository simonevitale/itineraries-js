# itineraries-js

Itineraries-js is a web app which allows you to create dynamic itineraries using google maps JS APIs, specifying the transportation mean and other user info on each route.
The routes can be seen graphically on the map all together, specifically for each user.

This is a branded version of the tool for the no-profit youth organization AEGEE.

**Technologies**

PHP, JS, MYSQL, JSON

**Frameworks/Dependencies**

jQuery, Bootstrap, Google Maps APIs, Bootbox, jQuery.form, moments.js, Bootstrap DateTimePicker

**Set Up**

1. The SQL Folder contains the required database table to store information about the routes.
2. *itineraries-service.php* implements a mini service to manage the database according to a specified "action" as a parameter of a GET request. Make sure to specify at the top of this file the right access information to connect to your MySQL database.
3. Enjoy browsing *index.php*. :)
