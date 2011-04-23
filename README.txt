[*] Create a blank database in your local machine using phpmyadmin
[*] import the impulse.sql file in this folder in that database. that'll create the table
[*] Open the config.php file in this folder
[*] fill in the details of your database and phpmyadmin except the HOST, it is the same.
[*] if you'e using WAMP, paste this whole folder in the /www/wamp/ folder.. if XAMPP, I forgot. most probably in a folder named /webapps 
[*] once you do so, open your browser and open http://localhost/impulse ..
[*] It should work now.

[*] BTW, NET na thakle this wont work. if there is no net connection, just open the process.php file, at line 20, put a // at the beginning.. like -
//tweet(...);
that'll stop the no-net problems.
