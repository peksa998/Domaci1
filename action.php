<?php

    require_once 'models/db.php';
    require_once 'models/dbKategorija.php';

    $db = new Database();
    $kat = new Kategorija();

    if(isset($_POST['action']) && $_POST['action'] == "view") {
        $output = '';
        $data = $db->read();
        $dataKat = $kat->readKategorija();
        if($db->totalRowCount()>0) {
            $output = '<table class="table table-striped table-sm table-bordered"><thead>
            <tr class="text-center">
                <th>Ime</th>
                <th>Prezime</th>
                <th>Kategorija</th>
                <th>E-Mail</th>
                <th>Telefon</th>
                <th>Akcija</th>
            </tr>
            </thead>

            <tbody>';

            foreach ($data as $row) {
                // $pom = (int) $row['kategorijaID'];
                // echo "<script>console.log('Console: " . $pom . "' );</script>";
                // $kategorija = $kat->getKategorijaById($pom);
                // umesto .$row['kategorijaID']. ide .$kategorija['kategorija'].
                $output .= ' <tr class="text-center text-secondary">
                    <td>'.$row['ime'].'</td>
                    <td>'.$row['prezime'].'</td>
                    <td>'.$row['kategorijaID'].'</td>
                    <td>'.$row['email'].'</td>
                    <td>'.$row['telefon'].'</td>

                    <td>
                        <a href="#" title="View Details" class="text-success infoBtn" id="'.$row['id'].'"><i class="fas fa-info-circle fa-md mr-3"></i></a>
                        <a href="#" title="Edit" class="text-primary editBtn" data-bs-toggle="modal" data-bs-target="#editModal" id="'.$row['id'].'"><i class="fas fa-edit fa-md mx-3"></i></a>
                        <a href="#" title="Delite" class="text-danger delBtn" id="'.$row['id'].'"><i class="fas fa-trash-alt fa-md ml-3"></i></a>
                    </td>
                    </tr>';
                }
                $output .= '</tbody></table>';
                echo $output;
        } else {
            echo '<h3 class = "text-center text-secondary mt-5">:( No any user present in the database!</h3>';
        }
    }

    // prikaz kategorija
    if(isset($_POST['action']) && $_POST['action'] == "viewKategorija") {
        $output = '';
        $dataKat = $kat->readKategorija();
        if($kat->totalRowCountKategorija()>0) {
            $output = '<table class="table table-striped table-sm table-bordered"><thead>
            <tr class="text-center">

                <th>Naziv kategorije</th>
                <th>Akcija</th>
            </tr>
            </thead>

            <tbody>';

            foreach ($dataKat as $row) {

                $output .= ' <tr class="text-center text-secondary">
                    <td>'.$row['kategorija'].'</td>
                    <td>
                        <a href="#" title="Delite" class="text-danger delBtnKategorija" id="'.$row['kategorijaID'].'"><i class="fas fa-trash-alt fa-md ml-3"></i></a>
                    </td>
                    </tr>';
                }
                $output .= '</tbody></table>';
                echo $output;
        } else {
            echo '<h3 class = "text-center text-secondary mt-5">:( No any category present in the database!</h3>';
        }
    }

    if(isset($_POST['action']) && $_POST['action'] == "insert") {
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $kategorijaID = $_POST['kategorijaID'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];

        $db->insert($ime, $prezime, $kategorijaID, $email, $telefon);
    }

    // dodaj kategoriju
    if(isset($_POST['action']) && $_POST['action'] == "insertKategorija") {
        $kategorija = $_POST['kategorija'];

        $kat->insertKategorija($kategorija);
    }


    if(isset($_POST['edit_id'])) {
        $id = $_POST['edit_id'];

        $row = $db->getKontaktById($id);
        echo json_encode($row);
    }

    if(isset($_POST['action']) && $_POST['action'] == "update") {
        $id = $_POST['id'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $kategorijaID = $_POST['kategorijaID'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];

        $db->update($id, $ime, $prezime, $kategorijaID, $email, $telefon);
    }

    if(isset($_POST['del_id'])) {
        $id = $_POST['del_id'];

        $db->delete($id);
    }

    if(isset($_POST['deleteKategorija_id'])) {

        $id = $_POST['deleteKategorija_id'];
        echo "<script>console.log('Console: " . $id . "' );</script>";
        $kat->deleteKategorija($id);
    }

    if(isset($_POST['info_id'])) {
        $id = $_POST['info_id'];

        $row  = $db->getKontaktById($id);
        echo json_encode($row);
    }



?>