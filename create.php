<?php
 $connection = new mysqli("localhost","root","","latihan");
 //get image name
 $image = $_FILES['image']['name']; 
 //create date now
 $date = date('Y-m-d');
 //make image path
 $imagePath = 'images/'.$image; 
 $tmp_name = $_FILES['image']['tmp_name']; 
 //move image to images folder
 move_uploaded_file($tmp_name, $imagePath);
 $result = mysqli_query($connection, "insert into flutter_upload_images set image='$image', 
date='$date'");
 
 if($result){
 echo json_encode([
 'message' => 'Data input successfully'
 ]);
 }else{
 echo json_encode([
 'message' => 'Data Failed to input'
 ]);
 }
?>
3. Buatlah sebuah file baru di dalam folder flutter_upload_image dengan nama list.php. 
Lalu ikuri scriptnya seperti di bawah ini.
 
<?php 
 $connection = new mysqli("localhost","root","","latihan");
 $data = mysqli_query($connection, "select * from flutter_upload_images");
 $data = mysqli_fetch_all($data, MYSQLI_ASSOC);
 echo json_encode($data);
?>