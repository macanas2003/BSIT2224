<?php
session_start();
require 'connections1.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Warehousing | MANAGEMENT</title>
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <link rel="stylesheet" href="fontawsome/css/fontawesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    </head>
  <body>

  <div class="modal fade" id="inventoryDELETEModal" tabindex="-1" aria-labelledby="inventoryDELETEModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="inventoryDELETEModalLabel">DELETE INVENTORY</h1>
      </div>
      <form action="code2.php" method="POST">
      <div class="modal-body">
        <div class="form-control">
        <input type="hidden" name="inventory_id" id="delete_id">
            <h4>Are you sure you want to delete this inventory item? This action cannot be undone.</h4>
            </div>
        </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="delete_inventory" class="btn btn-primary">Confirm</button>
        </div>
        </form>
    </div>
  </div>
</div>

  <div class="modal fade" id="inventoryUPDATEModal" tabindex="-1" aria-labelledby="inventoryUPDATEModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="inventoryUPDATEModalLabel">UPDATE INVENTORY</h1>
      </div>
        <form action="code2.php" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id" id="i_id">
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="name" id="i_name" class="form-control" placeholder="Enter the name of the product.">
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <input type="text" name="category" id="i_category" class="form-control" placeholder="Enter the product category.">
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="text" name="quantity" id="i_quantity" class="form-control" placeholder="Enter the quantity of the product.">
            </div>
            <div class="form-group">
                <label for="">Stocks</label>
                <input type="text" name="stock" id="i_stock" class="form-control" placeholder="Enter the current stock level of the product.">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <input type="text" name="status" id="i_status" class="form-control" placeholder="Enter the status of the product (e.g., Available, Reserved, Out of Stock).">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="update_inventory" class="btn btn-primary">Save Changes</button>
        </div>
        </form>
    </div>
  </div>
  </div>

  <div class="modal fade" id="inventoryModal" tabindex="-1" aria-labelledby="inventoryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="inventoryModalLabel">NEW INVENTORY</h1>
      </div>
        <form action="code2.php" method="POST">
        <div class="modal-body">
            <div class="mb-2">
                <label for="">Product Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter the name of the product.">
            </div>
            <div class="mb-2">
                <label for="">Category</label>
                <input type="text" name="category" class="form-control" placeholder="Enter the product category.">
            </div>
            <div class="mb-2">
                <label for="">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Enter the quantity of the product.">
            </div>
            <div class="mb-2">
                <label for="">Stocks</label>
                <input type="text" name="stock" class="form-control" placeholder="Enter the current stock level of the product.">
            </div>
            <div class="mb-2">
                <label for="">Status</label>
                <input type="text" name="status" class="form-control" placeholder="Enter the status of the product (e.g., Available, Reserved, Out of Stock).">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            <button type="submit" name="save_inventory" class="btn btn-primary">Save</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="inventoryVIEWModal" tabindex="-1" aria-labelledby="inventoryVIEWModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="inventoryVIEWModalLabel">VIEW INVENTORY</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="form-control">
            <div class="inventory_viewing_data">
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

    <div class="container">
    
    <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>INVENTORY
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#inventoryModal">
                            ADD NEW</button>
                         <a href="admin.php"></a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Stocks</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                    $query = "SELECT * FROM inventory";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $inventory)
                                        {
                                             
                                            ?>
                                            <tr>
                                                <td class="inventory_id"><?= $inventory['id']; ?></td>
                                                <td><?php echo $inventory['name']; ?></td>
                                                <td><?php echo $inventory['category']; ?></td>
                                                <td><?php echo $inventory['quantity']; ?></td>
                                                <td><?php echo $inventory['stock']; ?></td>
                                                <td><?php echo $inventory['status']; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm view_btn">View</a>
                                                    <a href="#" class="btn btn-success btn-sm update_btn">Update</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete_btn">Delete</a>
                                                </td>                                           
                                            </tr>
                                            
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h4> No Record Found! </h4>";
                                    }

                                ?>
                            </tbody>
                         </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

     <script>

        $(document).ready(function () {
            
            $('.delete_btn').click(function (e) {
                e.preventDefault();

                var inventory_id = $(this).closest('tr').find('.inventory_id').text();
                $('#delete_id').val(inventory_id);
                $('#inventoryDELETEModal').modal('show');
            });

            $('.update_btn').click(function (e) {
                e.preventDefault();

               var inventory_id = $(this).closest('tr').find('.inventory_id').text();

               $.ajax({
                    type: "POST",
                    url: "code2.php",
                    data: {
                        'checking_update_btn': true,
                        'inventory_id': inventory_id,
                    },
                    success: function (response) {
                        $.each(response, function (key, value) {
                            $('#i_id').val(value['id']);
                            $('#i_name').val(value['name']);
                            $('#i_category').val(value['category']);
                            $('#i_quantity').val(value['quantity']);
                            $('#i_stock').val(value['stock']);
                            $('#i_status').val(value['status']);
                        });
                        $('#inventoryUPDATEModal').modal('show');
                    }
               });
            });

            $('.view_btn').click(function (e) {
                e.preventDefault();

               var inventory_id = $(this).closest('tr').find('.inventory_id').text();

               $.ajax({
                    type: "POST",
                    url: "code2.php",
                    data: {
                        'checking_viewbtn': true,
                        'inventory_id': inventory_id,
                    },
                    success: function (response) {
                        $('.inventory_viewing_data').html(response);
                        $('#inventoryVIEWModal').modal('show');
                    }
               });
            });
        });
     </script>
     
</body>
</html>

<link rel="stylesheet" href="index4.css">
  <div class="sidebar">
  <div class="logo-details">
        <div class="logo_name">ADMIN</div>
        <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='fas fa-search' ></i>
        <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="admin.php">
          <i class='fas fa-qrcode'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="#">
         <i class='fas fa-user' ></i>
         <span class="links_name">Warehouse</span>
       </a>
       <span class="tooltip">Warehouse</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module2</span>
       </a>
       <span class="tooltip">Module2</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module3</span>
       </a>
       <span class="tooltip">Module3</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module4</span>
       </a>
       <span class="tooltip">Module4</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module5</span>
       </a>
       <span class="tooltip">Module5</span>
     </li>
     <li class="profile">
     <div class="profile-details">
           <div class="name">LOGOUT</div>
         </div>
         <a href="../login.php"><i class='fas fa-right-from-bracket' id="log_out" ></i></a>
     </li>
    </ul>
  </div>
  <section class="home-section">
  </section>
  <script>
 let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-search");
let body = document.querySelector("body"); 

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange();
});

searchBtn.addEventListener("click", ()=>{ 
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange(); 
});

function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("fa-bars", "fa-arrow-right");
 } else {
   closeBtn.classList.replace("fa-arrow-right", "fa-bars"); 
 }
}


</script>