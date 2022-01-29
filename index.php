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
<nav class="navbar navbar-light bg-light justify-content-center p-4">

    <img src="assets/img/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
    <h3 class="m-3">Imenik App</h3>

</nav>
<!-- END NAVBAR -->

<!-- TABELA -->
<div class="container">
    <!-- NOVI KORISNIK -->
    <div class="d-flex flex-row-reverse">

                    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary m-3 float-right" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="fas fa-user-plus fa-md"></i> Novi Kontakt
        </button>

                    <!-- Button trigger modal Kategorija -->
        <a href="kategorije.php">
        <button type="button" class="btn btn-success m-3 float-right" data-bs-toggle="modal" data-bs-target="#addKategorija">
        <i class="fas fa-folder-open fa-md"></i> Dodaj Kategoriju
        </button>
        </a>
    </div>
    <hr class="my-0 mb-4">
    <!-- END NOVI KORISNIK -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="showUser">

            </div>
        </div>
    </div>
</div>
<!-- END TABELA -->

<!-- Modal Novi Korisnik -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Novi Kontakt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <form action="" method="post" id="form-data">
                <div class="form-group m-3">
                    <input class="form-control" type="text" name="ime" placeholder="Ime" required>
                </div>
                <div class="form-group m-3">
                    <input class="form-control" type="text" name="prezime" placeholder="Prezime" required>
                </div>
                <!-- ovo izmeniti da bude izbor -->
                <div class="form-group m-3">
                    <input class="form-control" type="number" name="kategorijaID" placeholder="Kategorija" required>
                </div>
                <!-- END ovo izmeniti da bude izbor -->
                <div class="form-group m-3">
                    <input class="form-control" type="email" name="email" placeholder="E-mail" required>
                </div>
                <div class="form-group m-3">
                    <input class="form-control" type="tel" name="telefon" placeholder="Broj telefona" required>
                </div>
                            <!-- sub dugme -->
                <div class="form-group m-3">
                    <input class="btn btn-primary" type="submit" name="insert" id="insert" value="Sacuvaj Kontakt">
                </div>
            </form>

      </div>
    </div>
  </div>
</div>
<!-- END Modal Novi Korisnik -->

<!-- Modal Edit Korisnik -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Izmeni Kontakt</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
            <form action="" method="post" id="edit-form-data">
            <input type="hidden" name="id" id="id">
                <div class="form-group m-3">
                    <input class="form-control" type="text" name="ime" id="ime" required>
                </div>
                <div class="form-group m-3">
                    <input class="form-control" type="text" name="prezime" id="prezime" required>
                </div>
                <!-- ovo izmeniti da bude izbor -->
                <div class="form-group m-3">
                    <input class="form-control" type="number" name="kategorijaID" id="kategorijaID" required>
                </div>
                <!-- END ovo izmeniti da bude izbor -->
                <div class="form-group m-3">
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>
                <div class="form-group m-3">
                    <input class="form-control" type="tel" name="telefon" id="telefon" required>
                </div>
                            <!-- sub dugme -->
                <div class="form-group m-3">
                    <input class="btn btn-primary" type="submit" name="update" id="update" value="Izmeni Kontakt">
                </div>
            </form>

      </div>
    </div>
  </div>
</div>
<!-- END Modal Edit Korisnik -->

<!-- Modal Nova Kategorija -->
<div class="modal fade" id="addKategorija" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nova Kategorija</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

            <div class="table-responsive" id="showKategorije">

            </div>
        
            <form action="" method="post" id="form-kategorija">
                <div class="form-group m-3">
                    <input class="form-control" type="text" name="kategorija" placeholder="Naziv kategorije" required>
                </div>
                            <!-- sub dugme -->
                <div class="form-group m-3">
                    <input class="btn btn-primary" type="submit" name="insertKategorija" id="insertKategorija" value="Sacuvaj Kategoriju">
                </div>
            </form>

      </div>
    </div>
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

            showAllKontakte();
            showAllKategorije();

            function showAllKontakte() {
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {action:"view"},
                success:function(response) {
                  //  console.log(response);
                  $("#showUser").html(response);
                  $('table').DataTable({
                      order: [0, 'desc']
                  });
                }
                });
            }

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

           // insert ajax request
           $("#insert").click(function(e) {
               if($("#form-data")[0].checkValidity()) {
                   e.preventDefault();
                   $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#form-data").serialize() + "&action=insert",
                    success:function(response) {
                        Swal.fire({
                            title: 'Kontakt je uspesno dodat!',
                            icon: 'success'
                        })
                        $("#addModal").modal('hide');
                        $("#form-data")[0].reset();
                        showAllKontakte();
                    }
                   });
               }
           });

           // edit kontakt
           $("body").on("click", ".editBtn", function(e) {
                e.preventDefault();
                edit_id = $(this).attr('id');
                $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: {edit_id:edit_id},
                    success:function(response) {
                        data = JSON.parse(response);
                        $("#id").val(data.id);
                        $("#ime").val(data.ime);
                        $("#prezime").val(data.prezime);
                        $("#kategorijaID").val(data.kategorijaID);
                        $("#email").val(data.email);
                        $("#telefon").val(data.telefon);
                    }
                });
           });


            // update ajax request
            $("#update").click(function(e) {
                    if($("#edit-form-data")[0].checkValidity()) {
                   e.preventDefault();
                   $.ajax({
                    url: "action.php",
                    type: "POST",
                    data: $("#edit-form-data").serialize() + "&action=update",
                    success:function(response) {
                        Swal.fire({
                            title: 'Kontakt je uspesno izmenjen!',
                            icon: 'success'
                        })
                        $("#editModal").modal('hide');
                        $("#edit-form-data")[0].reset();
                        showAllKontakte();
                    }
                   });
               }
           });

          // Delete ajax request
          $("body").on("click", ".delBtn", function(e) {
            e.preventDefault();
            del_id = $(this).attr('id');

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
                    data:  {del_id:del_id},
                    success:function(response) {
                       
                        Swal.fire({
                            title: 'Kontakt je uspesno izbrisan!',
                            icon: 'success'
                        })
                        showAllKontakte();
                    }
                   });
                }
            });
          });

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

          // show kontakt details
          $("body").on("click", ".infoBtn", function(e) {
            e.preventDefault();
            info_id = $(this).attr('id');
            $.ajax({
                    url: "action.php",
                    type: "POST",
                    data:  {info_id:info_id},
                    success:function(response) {
                        //console.log(response);
                        data = JSON.parse(response);
                        Swal.fire({
                            title: '<strong>Informacije o kontaktu</strong>',
                            icon: 'info',
                            html: '<b>Ime: </b>'+data.ime+'<br><b>Prezime: </b>'+data.prezime+'<br><b>Kategorija: </b>'+data.kategorijaID+'<br><b>E-mail: </b>'+data.email+'<br><b>Telefon: </b>'+data.telefon+'<br>',
                        })
                        showAllKontakte();
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