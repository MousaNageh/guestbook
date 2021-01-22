# guestbook 
### this app does not use any framework or MVC ,it's core PHP 
## database 
1) **user table**: userId, username , fullname , email , password </br>
2) **messages table** : messageId , message conntent ,userID </br>
3) **replies table**: replyId , reply contnet , messageId, userId </br>
***database connection using PDO***
## app stucture 
### 1)CSS DIR : 
 contains the css files of the app 
### 2)js DIR : 
contains the js files of the app 
### 3) helps DIR : 
  conatains some code's helping like :</br>
  a) **init file **:  contains variables of all paths and files for app  </br>
  b) **validation file ** : cantains validation functions for user inputs and fields  </br>
  c) **sanitizer file **: coantains sanitization functions for user inputs for more security </br>
  
