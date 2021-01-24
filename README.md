# guestbook 
### this app does not use any framework or MVC ,it's core PHP  logout
in this app you can create messages , edit messages and delete messages
users else can reply on your messages
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
  a) **init file**:  contains variables of all paths and files for app  </br>
  b) **validation file** : cantains validation functions for user inputs and fields  </br>
  c) **sanitizer file**: coantains sanitization functions for user inputs for more security </br>
  
### 3)shared DIR :
   conatains some files shered by whole app :</br>
  a) **header**:  is HTML Header and open body tag  </br>
  b) **footer** : is HTML footer and closed body tag </br>
  c) **navbar**: contains app routing links </br>
