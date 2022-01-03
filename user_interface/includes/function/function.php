<?php
//  get title the function  is dynamic tilte all pages 
// function get_Tilte(){
//     global $pageTitle;
//     if(isset($pageTitle)){
//         echo $pageTitle;
//     }else{
//         echo "defult";
//     }
// }
function fetchData_Users($user_id){
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    if (mysqli_num_rows($result) > 0) {
      return $data;
    }else {
echo"<div class='alert alert-warning' role='alert'>
      0 results
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
      </div>";
    }
}
function update_info_profile($username, $email,$pass,$id){
  global $conn;
  $sql = "UPDATE users SET username='$username',email='$email',password='$pass' WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
  echo "<div class='alert alert-warning' role='alert'>
        Record updated successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
      </div>";
} else {
  echo "<div class='alert alert-warning' role='alert'>
  Error updating record: " . mysqli_error($conn)."
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
  <span aria-hidden='true'>&times;</span>
</button>
  </div>";
}

}

?>