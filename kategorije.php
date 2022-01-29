<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imenik</title>
    <link href="assets/img/logo.png" rel="icon" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.css"/>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-light justify-content-start p-4">
    <a href="index.php"><button class="btn btn-success mx-5"><i class="fas fa-arrow-circle-left"></i> Nazad na imenik</button></a>
    <img src="assets/img/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
    <h3 class="m-3">Imenik App</h3>

</nav>
<!-- END NAVBAR -->


<!-- Modal Nova Kategorija -->

<div class="container">
            <form action="" method="post" id="form-kategorija" class="mx-3 my-3">
                <div class="form-group mx-3 my-3">
                    <input class="form-control" type="text" name="kategorija" placeholder="Naziv kategorije" required>
                </div>
                            <!-- sub dugme -->
                <div class="form-group mx-3 my-3">
                    <input class="btn btn-primary mx-4" type="submit" name="insertKategorija" id="insertKategorija" value="Sacuvaj Kategoriju">
                </div>
            </form>

            <div class="table-responsive m-5" id="showKategorije">

            </div>
</div>

        


<!-- END Modal Nova Kategorija -->


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.4/datatables.min.js"></script>
  <script type="text/javascript">
        $(document).ready(function () {

            showAllKategorije();


            // ispis kategorija
            function showAllKategorije() {
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {action:"viewKategorija"},
                success:function(response) {
                  //  console.log(response);
                  $("#showKategorije").html(response);
                //   $('table').DataTable({
                //       order: [0, 'desc']
                //   });
                }
                });
            }



                // Delete kategoriju ajax request
            $("body").on("click", ".delBtnKategorija", function(e) {
            e.preventDefault();
            deleteKategorija_id = $(this).attr('id');

                Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url: "action.php",
                    type: "POST",
                    data:  {deleteKategorija_id:deleteKategorija_id},
                    success:function(response) {
                        console.log(deleteKategorija_id);
                        Swal.fire({
                            title: 'Kategorija je uspesno izbrisana!',
                            icon: 'success'
                        })
                        showAllKategorije();
                    }
                   });
                }
            });
          });

          // dodaj kategoriju
          $("#insertKategorija").click(function(e) {
               if($("#form-kategorija")[0].checkValidity()) {
                   e.preventDefault();
                   $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#form-kategorija").serialize() + "&action=insertKategorija",
                    success:function(response) {
                        Swal.fire({
                            title: 'Kategorija je uspesno dodata!',
                            icon: 'success'
                        })
                        $("#addKategorija").modal('hide');
                        $("#form-kategorija")[0].reset();
                        showAllKategorije();
                    }
                   });
               }
           });
        });
  </script>
</body>
</html>