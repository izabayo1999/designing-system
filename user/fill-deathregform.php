<?php
session_start();
// error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['obcsuid'] == 0)) {
    header('location:logout.php');
} else {
    if (isset($_POST['submit'])) {
        $uid = $_SESSION['obcsuid'];
        $fullname = $_POST['fullname'];
        $idnumber = $_POST['idnumber'];
        $mobnumber = $_POST['mobnumber'];
        $gender = $_POST['gender'];
        $fathername = $_POST['fathername'];
        $mothername = $_POST['mothername'];
        $spousename = $_POST['spousename'];
        $dob = $_POST['dob'];
        $dod = $_POST['dod'];
        $pob = $_POST['cell'];
        $pod = $_POST['cell2'];
        $comment = $_POST['comment'];
        $appnumber = mt_rand(100000000, 999999999);
        $sql = "insert into tblapplication(UserID,ApplicationID,DateofBirth,DateOfDeath,Gender,FullName,PlaceofBirth,PlaceOfDeath,NameofFather,NameOfMother,Spouse,IDNumber,MobileNumber,CellId, UserRemark)values(:uid,:appnumber,:dob,:dod,:gender,:fullname,:pob,:pod,:fathername,:mothername,:spousename,:idnumber,:mobnumber,:pod,:comment)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':uid', $uid, PDO::PARAM_STR);
        $query->bindParam(':appnumber', $appnumber, PDO::PARAM_STR);
        $query->bindParam(':dob', $dob, PDO::PARAM_STR);
        $query->bindParam(':dod', $dod, PDO::PARAM_STR);
        $query->bindParam(':gender', $gender, PDO::PARAM_STR);
        $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
        $query->bindParam(':pob', $pob, PDO::PARAM_INT);
        $query->bindParam(':pod', $pod, PDO::PARAM_INT);
        $query->bindParam(':fathername', $fathername, PDO::PARAM_STR);
        $query->bindParam(':mothername', $mothername, PDO::PARAM_STR);
        $query->bindParam(':spousename', $spousename, PDO::PARAM_STR);
        $query->bindParam(':idnumber', $idnumber, PDO::PARAM_STR);
        $query->bindParam(':mobnumber', $mobnumber, PDO::PARAM_STR);
        $query->bindParam(':pod', $pod, PDO::PARAM_STR);
        $query->bindParam(':comment', $comment, PDO::PARAM_STR);
        $query->execute();

        $LastInsertId = $dbh->lastInsertId();
        if ($LastInsertId > 0) {
            echo '<script>alert("Death details have been submitted.")</script>';
            echo "<script>window.location.href ='fill-deathregform.php'</script>";
        } else {
            echo '<script>alert("Something Went Wrong. Please try again")</script>';
        }
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>

    <title>Death Registration Form | Online Death Registration</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- modals CSS
		============================================ -->
    <link rel="stylesheet" href="css/modals.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="materialdesign">

    <div class="wrapper-pro">
        <div class="container-fluid">
            <div class="row">
                <?php include_once('includes/sidebar.php'); ?>
                <?php include_once('includes/header.php'); ?>
                <!-- Breadcome start-->
                <div class="breadcome-area mg-b-30 small-dn">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="breadcome-list shadow-reset">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <ul class="breadcome-menu">
                                                <li><a href="dashboard.php">Home</a> <span class="bread-slash">/</span>
                                                </li>
                                                <li><span class="bread-blod">Death Registration Form</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Basic Form Start -->
                <div class="basic-form-area mg-b-15">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sparkline12-list shadow-reset mg-t-30">
                                    <div class="sparkline12-hd">
                                        <div class="main-sparkline12-hd">
                                            <h1>Application Form</h1>
                                            <div class="sparkline12-outline-icon">
                                                <span class="sparkline12-collapse-link"><i
                                                        class="fa fa-chevron-up"></i></span>
                                                <span><i class="fa fa-wrench"></i></span>
                                                <span class="sparkline12-collapse-close"><i
                                                        class="fa fa-times"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sparkline12-graph">
                                        <div class="basic-login-form-ad">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="all-form-element-inner">

                                                        <form method="post">

                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Full
                                                                            Name</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control"
                                                                            name="fullname" value="" required="true" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">ID
                                                                            Number</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <input type="number" class="form-control"
                                                                            value="" name="idnumber" maxlength="16" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Mobile
                                                                            Number</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control" value=""
                                                                            name="mobnumber" maxlength="10"
                                                                            pattern="[0-9]+" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-9 col-sm-9 col-xs-9">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro"><span
                                                                                class="basic-ds-n">Gender</span></label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-3 col-sm-3 col-xs-3">
                                                                        <div class="bt-df-checkbox">

                                                                            <p style="text-align: left;"> <input
                                                                                    type="radio" name="gender"
                                                                                    id="gender" value="Male"
                                                                                    checked="true"> Male
                                                                            </p>
                                                                            <p style="text-align: left;"> <input
                                                                                    type="radio" name="gender"
                                                                                    id="gender" value="Female">
                                                                                Female</p>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Full
                                                                            Name of Father</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control"
                                                                            name="fathername" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Full
                                                                            Name of Mother</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control"
                                                                            name="mothername" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Full
                                                                            Name of Spouse(if any)</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <input type="text" class="form-control"
                                                                            name="spousename" value="" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Date
                                                                            of
                                                                            Birth</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <?php
                                                                            $dt = new DateTime(); // Date object using current date and time
                                                                            $dt = $dt->format('Y-m-d');

                                                                            ?>
                                                                        <input type="date" class="form-control"
                                                                            name="dob" value=""
                                                                            max="<?php echo date('Y-m-d', strtotime($dt)); ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Date
                                                                            of
                                                                            Death</label>
                                                                    </div>
                                                                    <div class="col-lg-9">

                                                                        <input type="date" class="form-control"
                                                                            name="dod" value=""
                                                                            max="<?php echo date('Y-m-d', strtotime($dt)); ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Place
                                                                            of
                                                                            Birth</label>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <select class="form-control" name="province"
                                                                            id="province">
                                                                            <option>--Select Province--
                                                                            </option>
                                                                            <?php
                                                                                $prov = "SELECT * from provinces";
                                                                                $prov_query = $dbh->prepare($prov);

                                                                                $prov_query->execute();
                                                                                $prov_results = $prov_query->fetchAll(PDO::FETCH_OBJ);
                                                                                foreach ($prov_results as $prov_row) {
                                                                                ?>
                                                                            <option
                                                                                value="<?php echo $prov_row->provincecode; ?>">
                                                                                <?php echo $prov_row->provincename; ?>
                                                                            </option>
                                                                            <?php
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2"><select class="form-control"
                                                                            name="district" id="district">
                                                                            <option value="">--Select District--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2"><select class="form-control"
                                                                            name="sector" id="sector">
                                                                            <option value="">--Select Sector--</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2"><select class="form-control"
                                                                            name="cell" id="cell">
                                                                            <option value="">--Select Cell--</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Place
                                                                            of Death</label>
                                                                    </div>
                                                                    <div class="col-lg-3">
                                                                        <select class="form-control" name="province"
                                                                            id="province2">
                                                                            <option>--Select Province--
                                                                            </option>
                                                                            <?php
                                                                                $prov = "SELECT * from provinces";
                                                                                $prov_query = $dbh->prepare($prov);

                                                                                $prov_query->execute();
                                                                                $prov_results = $prov_query->fetchAll(PDO::FETCH_OBJ);
                                                                                foreach ($prov_results as $prov_row) {
                                                                                ?>
                                                                            <option
                                                                                value="<?php echo $prov_row->provincecode; ?>">
                                                                                <?php echo $prov_row->provincename; ?>
                                                                            </option>
                                                                            <?php
                                                                                }
                                                                                ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2"><select class="form-control"
                                                                            name="district" id="district2">
                                                                            <option value="">--Select District--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2"><select class="form-control"
                                                                            name="sector" id="sector2">
                                                                            <option value="">--Select Sector--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-lg-2"><select class="form-control"
                                                                            name="cell2" id="cell2">
                                                                            <option value="">--Select Cell--
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3">
                                                                        <label
                                                                            class="login2 pull-right pull-right-pro">Comment
                                                                            on Death case</label>
                                                                    </div>
                                                                    <div class="col-lg-9">
                                                                        <textarea type="text" class="form-control"
                                                                            name="comment" value=""></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="login-btn-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3"></div>
                                                                        <div class="col-lg-9">
                                                                            <div
                                                                                class="login-horizental cancel-wp pull-left">

                                                                                <button
                                                                                    class="btn btn-sm btn-primary login-submit-cs"
                                                                                    type="submit" name="submit">Submit
                                                                                    Details</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Basic Form End-->
            <?php include_once('includes/footer.php'); ?>
        </div>
    </div>
    </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- modal JS
		============================================ -->
    <script src="js/modal-active.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html><?php }  ?>