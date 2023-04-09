<!-- connecting to the databse using localhost -->

<?php

// syntx 👇
// $connect = new mysqli(host, username, password, dbname)

$conn = mysqli_connect('localhost','root','','user_db');

?>

<!-- 

* user_db database

** tables

1) users

columns ( id , int  primary key ,auto increment (A.I) )
        ( user_name , varchar )
        ( email , varchar    )
        ( password1 , varchar )


 -->