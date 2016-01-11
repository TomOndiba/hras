<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HRA Information System</title>
    <link rel="icon" href="<?php echo media_url('ico/favicon.jpg'); ?>" type="image/x-icon">

    <!-- Bootstrap core CSS -->

    <link href="<?php echo media_url() ?>/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo media_url() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo media_url() ?>/css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo media_url() ?>/css/custom.css" rel="stylesheet">

    <script src="<?php echo media_url() ?>/js/jquery.min.js"></script>

        <!--[if lt IE 9]>
            <script src="../assets/js/ie8-responsive-file-warning.js"></script>
            <![endif]-->

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
              <![endif]-->
              <style type="text/css">
                * {
                    margin: 0;
                    padding: 0;
                }

                #clock {
                    position: relative;
                    width: 250px;
                    height: 250px;
                    margin: 0px auto 0 auto;
                    background: url(<?php echo media_url() ?>/images/clockface.png);
                    list-style: none;
                }

                #sec, #min, #hour {
                    position: absolute;
                    width: 10px;
                    height: 250px;
                    top: 0px;
                    left: 120px;
                }

                #sec {
                    background: url(<?php echo media_url() ?>/images/sechand.png);
                    z-index: 3;
                }

                #min {
                    background: url(<?php echo media_url() ?>/images/minhand.png);
                    z-index: 2;
                }

                #hour {
                    background: url(<?php echo media_url() ?>/images/hourhand.png);
                    z-index: 1;
                }

                .carousel-indicators .active{ background: #31708f; } .adjust1{ float:left; width:100%; margin-bottom:0; } .adjust2{ margin:0; } .carousel-indicators li{ border :1px solid #ccc; } .carousel-control{ color:#31708f; width:5%; } .carousel-control:hover, .carousel-control:focus{ color:#31708f; } .carousel-control.left, .carousel-control.right { background-image: none; } .media-object{ margin:auto; margin-top:15%; } @media screen and (max-width: 768px) { .media-object{ margin-top:0; } }
                
                table.tbl-present {
                    width: 100%;
                }

                thead.thead-present, tbody.tbody-present, tr.tr-present,tbody.tbody-present td,tbody.thead-present  th { display: block; }

                tr:after {
                    content: ' ';
                    display: block;
                    visibility: hidden;
                    clear: both;
                }

                thead.thead-present th {
                    height: 30px;

                    /*text-align: left;*/
                }

                tbody.tbody-present {
                    height: 250px;
                    overflow-y: auto;
                }

                thead {
                    /* fallback */
                }


                tbody.tbody-present td, thead.thead-present th {
                    width: 16.5%;
                    float: left;
                }

                tbody.tbody-present td.col-date, thead.thead-present th.col-date {
                    width: 18%;
                    float: left;
                }

                tbody.tbody-present td.col-name, thead.thead-present th.col-name {
                    width: 29%;
                    float: left;
                }

                tbody.tbody-present td.col-ket, thead.thead-present th.col-ket {
                    width: 12%;
                    float: left;
                }

                tbody.tbody-present td.col-no, thead.thead-present th.col-no {
                    width: 5%;
                    float: left;
                }
                
                .carousel-indicators .active{ background: #31708f; } .adjust1{ float:left; width:100%; margin-bottom:0; } .adjust2{ margin:0; } .carousel-indicators li{ border :1px solid #ccc; } .carousel-control{ color:#31708f; width:5%; } .carousel-control:hover, .carousel-control:focus{ color:#31708f; } .carousel-control.left, .carousel-control.right { background-image: none; } .media-object{ margin:auto; margin-top:15%; } @media screen and (max-width: 768px) { .media-object{ margin-top:0; } }
                .text-footer{
                    margin-top:15px;
                }
                .footer{
                    background-color: #446CB3;
                    color:white;
                }
                .icons{
                    color: white;
                    background-color:#52B3D9;
                    font-size: 70pt;
                    /*padding-left: 50px;*/
                    height:140px;
                }
                .texts{
                    color: #E4F1FE;
                    background-color:#52B3D9;
                    font-size: 40pt;
                    padding-left: 30px;
                    padding-top: 20px;
                    padding-bottom: 48px;
                    height:140px;
                }
                .modul{
                    margin-top:40px;
                }
                
            </style>
            <script type="text/javascript">

                $(document).ready(function() {

                    setInterval(function() {
                        var seconds = new Date().getSeconds();
                        var sdegree = seconds * 6;
                        var srotate = "rotate(" + sdegree + "deg)";

                        $("#sec").css({"-moz-transform": srotate, "-webkit-transform": srotate});

                    }, 1000);


                    setInterval(function() {
                        var hours = new Date().getHours();
                        var mins = new Date().getMinutes();
                        var hdegree = hours * 30 + (mins / 2);
                        var hrotate = "rotate(" + hdegree + "deg)";

                        $("#hour").css({"-moz-transform": hrotate, "-webkit-transform": hrotate});

                    }, 1000);


                    setInterval(function() {
                        var mins = new Date().getMinutes();
                        var mdegree = mins * 6;
                        var mrotate = "rotate(" + mdegree + "deg)";

                        $("#min").css({"-moz-transform": mrotate, "-webkit-transform": mrotate});

                    }, 1000);

                });


</script>
<?php if ($this->session->flashdata('alert')) { ?>
<script type="text/javascript">
    alert('<?php echo $this->session->flashdata('alert') ?>');
</script>
<?php } ?>

<style type="text/css">
    #output{
        font-size:50px;
        font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
        text-align:center;
        margin-top:1%;
        color:#FFF;
    }
</style>

<script type="text/javascript">
    window.setTimeout("waktu()",1000);    
    function waktu() {     
        var tanggal = new Date();    
        setTimeout("waktu()",1000);    
        document.getElementById("output").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();  
    }   
</script>



</head> 


<body role="login">
    <div class="row" style="margin-top:1px">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 header-login">
            <center>
                <h1>HUMAN RESOURCES ADMINISTRATION SYSTEM</h1>                    
            </center>
        </div>
    </div>
    <div class="row" style="margin-top:1px">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 text-header">
            <marquee><h5>Human Resources Administration Application | People Development Branch Cileungsi 2</h5></marquee>
        </div>
    </div>        
    <div class="row">
        <div class="col-md-8 col-lg-4 col-sm-12 col-xs-12">
            <div class="row">
                <center>
                    <h2><strong><?php echo pretty_date(date('Y-m-d'), 'l, d F Y',FALSE) ?></strong>                            
                        <div id="output"></h2></center>           
                        </div> </div>           
                        <div class="row">
                            <div class="col-sm-3 col-md-3 col-sm-offset-4 col-md-offset-4">

                                <div class="panel panel-default">

                                  <div class="panel-body">
                                    <section class="login_content">
                                        <form role="form" action="<?php echo site_url('admin/auth/login') ?>" method="post">
                                            <?php
                                            echo form_open(current_url(), array('role' => 'form', 'class' => 'form-signin'));
                                            if (isset($_GET['location'])) {
                                                echo '<input type="hidden" name="location" value="';
                                                if (isset($_GET['location'])) {
                                                    echo htmlspecialchars($_GET['location']);
                                                }
                                                echo '" />';
                                            }
                                            ?>
                                            <h1>Sign HRD Here</h1>
                                            <div class="row">
                                             <div class="center-block"> <img width=270 height=100 src="<?php echo media_url() ?>/images/alfa.png" alt="">
                                             </div>
                                             <hr>
                                             <div>
                                                <input autofocus type="text" class="form-control" placeholder="NIK" name="username" required="" />
                                            </div>
                                            <div>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required="" />
                                            </div>
                                            <div>
                                                <button class="btn btn-success" type="submit" >Sign</button>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="separator">

                                                <div class="clearfix"></div>
                                                <br />
                                                <div>
                                                    <p>&copy; <?php echo pretty_date(date('Y-m-d'), 'Y',FALSE) ?> All Rights Reserved. Privacy and Terms</p>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- form -->
                                    </section>
                                    <!-- content -->
                                </div>
                            </div>
                        </div>

                        <div class="row" id="footer">
                            <div class="col-sm-8 col-md-12 col-sm-offset-8 col-md-offset-1">
                               <h3>PT. Sumber Alfaria Trijaya, Tbk <i onclick="initialize()" class="icon-map-marker"></i></h3>
                               <address>

                                  Kawasan Industri Menara Permai Kav. 18<br/>
                                  Cileungsi - Bogor Indonesia<br/>

                              </address>

                          </div>

                      </body>

                      </html>