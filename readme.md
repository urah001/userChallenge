>1 creation of native html css and js file 
>2 created the database file using xampp 
steps : 
after turing on xampp ( i used a kali enviroment for this process )
use any broswer to load myphpadmin in the localhost url : http://localhost/phpmyadmin
navigate to the db section and create a new db table called store ( anything you want to call it  ) 
efine the columns based on the following schema:
Column Name	Type	Length/Values	Extra
id	INT		AUTO_INCREMENT
name	VARCHAR	100	
email	VARCHAR	100	
item	VARCHAR	100	
quantity	INT		
total_price	DECIMAL(10,2)		
date	TIMESTAMP		Default: CURRENT_TIMESTAMP


