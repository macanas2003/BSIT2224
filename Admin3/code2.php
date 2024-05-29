<?php
session_start();
require 'connections1.php';

if(isset($_POST['save_inventory']))
{
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];



    $query = "INSERT INTO inventory (name,category,quantity,stock,status) VALUES
        ('$name','$category','$quantity','$stock','$status')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Inventory Added Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Inventory Item Not Added!";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['checking_viewbtn'])) {
    $i_id = $_POST['inventory_id'];

    $query = "SELECT * FROM inventory WHERE id='$i_id' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $inventory)
        {
            echo $return = '
            <h4> ID: '.$inventory['id'].'</h4>
            <h4> NAME: '.$inventory['name'].'</h4>
            <h4> CATEGORY: '.$inventory['category'].'</h4>
            <h4> QUANTITY: '.$inventory['quantity'].'</h4>
            <h4> STOCKS: '.$inventory['stock'].'</h4>
            <h4> STATUS: '.$inventory['status'].'</h4>
            
            
            ';
        }
    }
    else
    {
    echo $return = "<h4> No Record Found! </h4>";
    }    
}

if(isset($_POST['checking_update_btn'])) {
    $i_id = $_POST['inventory_id'];
    $result_array = [];

    $query = "SELECT * FROM inventory WHERE id='$i_id' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $inventory)
        {
            array_push($result_array, $inventory);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    }
    else
    {
    echo $return = "<h4> No Record Found </h4>";
    }    
}

if(isset($_POST['update_inventory'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $stock = $_POST['stock'];
    $status = $_POST['status'];

    $query = "UPDATE inventory SET name='$name',category='$category',quantity='$quantity',stock='$stock',status='$status' 
    WHERE id='$id' "; 
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Inventory Updated Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Inventory Not Updated!";
        header("Location: index.php");
        exit(0);
    }

}

if(isset($_POST['delete_inventory'])) {
    $id = $_POST['inventory_id'];

    $query = "DELETE FROM inventory WHERE id='$id' ";
    $query_run = mysqli_query($con, $query); 

    if($query_run)
    {
        $_SESSION['message'] = "Inventory Deleted Succesfully!";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Inventory Not Deleted!";
        header("Location: index.php");
        exit(0);
    }
}
?>