<?php
 // ****************************This is used for data base connection integrate on in this file*****************************

 require_once('db.php');


//***********************// on click accept request button then take this id.**************** */

$id=$_GET['id']; 

 //******************* */ if request has been accept so update 1 in databse *************************

$query = "UPDATE request_tbl SET position=1 WHERE UID='$id'";


//************************* Run query **************************** */
if(mysqli_query($conn,$query)){
    echo "Your request has been Accepted";

    // **************  header on recive file after accept request. **********************
    
    header('Location:recive.php');  
}
else{
    echo " pleace check Error";
}
//***************************************************88 */