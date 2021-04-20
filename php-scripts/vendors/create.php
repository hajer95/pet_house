<?php
require_once "../dbCon.php";
if($con){
    if(isset($_POST['create']))
{
    $target_dir="../../assets/images/shops";
    $PetName=$_POST['pet_name'];
    $PetAge=$_POST['pet_age'];
    $category=$_POST['categories'];
    $price = 0;
    if($_POST['pet_price']&& strlen($_POST['pet_price'])>0){
        $price=$_POST['pet_price'];
    }
    $imagename = basename($_FILES["pet_name"]["name"]);
    $target_file = $target_dir . basename($_FILES["pet_name"]["name"]); 
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $isImage = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if(!$isImag){

die("file is not image");

    }
if(file_exists($target_file))
{
    $imagename=time().'_'.$imagename;
    $target_file=$target_dir.$imagename;
 }
 date_default_timezone_get("Asia/baghdad");
 $publishedAt=date('Y-m-d H:i:s',time());

 $query = "INSERT INTO pets(name,age,category,image,price,published_at,vendor_id)values('$PetName','$PetAge','$category','$imagename',$price,'$publishedAt',1)";
 $isinserted= mysqli_query($con,$query);
 if($isinserted){

 
 if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file))
  {
   header("location:localhost:../../petsm.php");
  } else {
   echo"sorry";}
}
else{
    echo"the data is not inserted";
}


}

}

else{
    mysqli_error($con);
}
