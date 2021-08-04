<?php
include('includes/dbconnection.php');
$result = array();
if (isset($_POST['province_id'])) {
    $prov_id = $_POST['province_id'];
    $prov = "SELECT * from districts where provincecode=:prov_id";
    $prov_query = $dbh->prepare($prov);
    $prov_query->bindParam(':prov_id', $prov_id, PDO::PARAM_INT);

    $prov_query->execute();
    $prov_results = $prov_query->fetchAll(PDO::FETCH_OBJ);
    foreach ($prov_results as $prov_row) {

        array_push($result, (object)[
            'id' => $prov_row->districtcode,
            'name' => $prov_row->namedistrict
        ]);
    }
}

if (isset($_POST['district_id'])) {
    $distr_id = $_POST['district_id'];
    $distr = "SELECT * from sectors where districtcode=:distr_id";
    $distr_query = $dbh->prepare($distr);
    $distr_query->bindParam(':distr_id', $distr_id, PDO::PARAM_INT);

    $distr_query->execute();
    $distr_results = $distr_query->fetchAll(PDO::FETCH_OBJ);
    foreach ($distr_results as $distr_row) {

        array_push($result, (object)[
            'id' => $distr_row->sectorcode,
            'name' => $distr_row->namesector
        ]);
    }
}

if (isset($_POST['sector_id'])) {
    $sec_id = $_POST['sector_id'];
    $sec = "SELECT * from cells where sectorcode=:sec_id";
    $sec_query = $dbh->prepare($sec);
    $sec_query->bindParam(':sec_id', $sec_id, PDO::PARAM_INT);

    $sec_query->execute();
    $sec_results = $sec_query->fetchAll(PDO::FETCH_OBJ);
    foreach ($sec_results as $sec_row) {

        array_push($result, (object)[
            'id' => $sec_row->codecell,
            'name' => $sec_row->nameCell
        ]);
    }
}

echo json_encode($result);