# Installing Le Centre

## Mac OS X

- Download and install [XAMPP for OS X](https://www.apachefriends.org/)
    - This quickly installs Apache, MySQL, and PHP
    - Note: I had trouble with MySQL starting, but a reboot fix that
- Go to XAMPP Status page and MySQL database and PHP are ACTIVATED
- Click on phpMyAdmin, press Import, and then choose the .SQL database file and choose Go
- That should create the lecentre database
- Open Terminal and make a link to the web server folder
    $ cd ~
    $ ln -s /Applications/XAMPP/htdocs
    $ cd htdocs
- Link lecentre files into htdocs
    $ ln -s `PATH_TO_LECENTRE`
- Configure database connection
    $ edit lecentre/config.php
- Change username to 'root' and password to ''
- Verify [login page](http://localhost/lecentre/login.php) shows up correctly

## Windows

- Download and install WAMP
