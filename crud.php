<?php 

$insert=false;
$update=false;
$delete=false;
//INSERT INTO `notes` (`sno`, `title`, `desciption`, `tstamp`) VALUES (NULL, 'Buy Books', 'Learn how to use \"books\" in a sentence with 500 example sentences on YourDictionary.', current_timestamp());

        //Connect to data base
        
        //echo "Connect php to DataBAse<br>";
        // 1.MySQli 
        // 2.PDO
        
        //connecting to database
        $servername="localhost";
        $username="root";
        $password="";
        $database="phpclass";
        
        //create a connection
        $conn=mysqli_connect($servername,$username,$password,$database);
        
        
        //Die if connection failed
        
        if(!$conn){
            die("Sorry we failed to connect".mysqli_connect_error());
        }
        
       if(isset($_GET['delete'])){
        $sno=$_GET['delete'];
        // echo $sno;
        $delete=true;
            //Sql delete
            $sql="DELETE FROM `notes` WHERE `notes`.`sno` = $sno";
            $result=mysqli_query($conn,$sql);

       }
        if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['snoEdit'])){
                //Update Record
                $sno=$_POST['snoEdit'];
                $title=$_POST['titleEdit'];
                $description=$_POST['descriptionEdit'];
                
                //SQL Query
                $sql="UPDATE `notes` SET `title`='$title', `description` = '$description' WHERE `notes`.`sno` = '$sno'";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $update=true;
                }





                
            }
            else{
            $title=$_POST['title'];
            $description=$_POST['description'];
  



            //SQL Query
            $sql="INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
            $result=mysqli_query($conn,$sql);
        
            if($result){
                // echo "The Record Inserted Successfully";
                $insert=true;
            }
            else{
                echo "<br>Couldn't insert Record".mysqli_error($conn);
            }
        }
        
    
    }

        
        
        
        
        ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">


    <title>PHP CRUD</title>


</head>

<body>
    <!-- =================================Modal====================== -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editmodal">
 Edit modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="editmodalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editmodalLabel">Edit Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="crud.php">
                <div class="modal-body">

                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="form-group">
                        <label for="titleEdit">Note Title</label>
                        <input type="text" name="titleEdit" class="form-control" id="titleEdit"
                            aria-describedby="emailHelp" placeholder="Enter a note heading">

                    </div>

                    <div class="form-group">
                        <label for="descriptionEdit">Note Description</label>
                        <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                    </div>
                    

                </div>
                <div class="modal-footer d-block mr-auto">
                   
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>






    <!-- =============================NAvigation==================== -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">i NOTES</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>


            </ul>



            <form class="form-inline my-2 my-lg-0" action="">
                <input class=" form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <?php 
    if($insert)

    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    
    
    ?>
    <?php 
    if($delete)

    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Deleted</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    
    
    ?>
    <?php 
    if($update)

    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Updated</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";
    
    
    ?>

    <!-- =======================NOTE FORM ================================================== -->
    <div class="container my-4">
        <h1>Add a Notes</h1>
        <form method="post" action="crud.php">
            <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp"
                    placeholder="Enter a note heading">

            </div>

            <div class="form-group">
                <label for="desc">Note Description</label>
                <textarea class="form-control" id="desc" name="description" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>
    <div class="container my-4">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S_NO</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        $sql="SELECT * FROM `notes`";
        $result=mysqli_query($conn,$sql);
        $sno=0;
        while($row=mysqli_fetch_assoc($result)){
            $sno=$sno+1;
          echo "<tr>
          <th scope='row'>".$sno."</th>
          <td>".$row['title']."</td>
          <td>".$row['description']."</td>
          <td> <button class=' btn btn-sm btn-primary edit' id=".$row['sno']." >Edit</button> <button class=' btn btn-sm btn-primary delete' id=d".$row['sno']." >Delete</button> </td>
          </tr>";
          
         
                }
        ?>



            </tbody>
        </table>




    </div>
    <hr>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <!-- Edit  and delete button -->
    <script>

        //Edit
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit",);
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                console.log(title, description);
                titleEdit.value = title;
                descriptionEdit.value = description;
                snoEdit.value = e.target.id;
                console.log(e.target.id);
                $('#editmodal').modal('toggle');

            })
        })

        //Delete

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit",);
                sno = e.target.id.substr(1,);

                if (confirm("Are You sure You Want to delete this note")) {
                    console.log("Yes")
                    window.location = `/crud/crud.php?delete=${sno}`;
                    //use post 
                }
                else {
                    console.log("no");
                }

            })
        })


    </script>
</body>

</html>