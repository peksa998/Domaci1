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

    </div>
    <hr class="my-0 mb-4">
    <!-- END NOVI KORISNIK -->

    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive" id="showUser">
                <table class="table table-striped table-sm table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Ime</th>
                            <th>Prezime</th>
                            <th>Kategorija</th>
                            <th>E-Mail</th>
                            <th>Telefon</th>
                            <th>Akcija</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php for($i=1; $i<=100; $i++): ?>
                        <tr class="text-center text-secondary">
                            <td>Ime<?= $i?></td>
                            <td>Prezime<?= $i?></td>
                            <td>Kategorija<?= $i?></td>
                            <td><?= $i?>@email.com</td>
                            <td>555-<?= $i?></td>
                            <td>
                                <a href="#" title="View Details" class="text-success"><i class="fas fa-info-circle fa-md mr-3"></i></a>
                                <a href="#" title="Edit" class="text-primary"><i class="fas fa-edit fa-md mx-3"></i></a>
                                <a href="#" title="Delite" class="text-danger"><i class="fas fa-trash-alt fa-md ml-3"></i></a>
                            </td>
                        </tr>
                        <?php endfor;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- END TABELA -->

<!-- Modal -->
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
            $('table').DataTable();
        });
  </script>
</body>
</html>