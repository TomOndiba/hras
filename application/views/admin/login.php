<!DOCTYPE html>
<html lang="en">
<?php $data['setting'] = $this->Setting_model->get(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. --> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HR Application</title>
    <link rel="icon" href="<?php echo media_url('ico/favicon.jpg'); ?>" type="image/x-icon">

    <!-- Bootstrap core CSS -->

    <link href="<?php echo media_url() ?>/css/bootstrap.min.css" rel="stylesheet">    
    <link href="<?php echo media_url() ?>/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo media_url() ?>/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo media_url() ?>/css/form-elements.css" rel="stylesheet">
    <link href="<?php echo media_url() ?>/css/style.css" rel="stylesheet">
    <link href="<?php echo media_url() ?>/css/font.css" rel="stylesheet">

    <!-- javascript -->

    <script src="<?php echo media_url() ?>/js/jquery.backstretch.min.js"></script>
    <script src="<?php echo media_url() ?>js/scripts.js"></script> 
    <script src="<?php echo media_url() ?>js/jquery-1.11.1.js"></script> 

    <style type="text/css">
    #tengah{
        font-size:50px;        
        text-align:left;
        margin-top:1%;
        color:#FFF;
    }
</style>

</head> 


<body role="login">

    <!-- Top content -->
    <div class="top-content">

        <div class="inner-bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1><strong>Human Resources</strong> Application System</h1>
                        <div class="description">
                         <marquee> <p>
                            Selamat Datang Di Menu Aplikasi HRA |
                            Untuk Bantuan Hubungi Administrator</p></marquee>  </div>
                            <!-- <div><strong><?php echo pretty_date(date('Y-m-d'), 'l, d F Y',FALSE) ?></strong></div>                                        -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Login HR Application</h3>
                                <p>Masukan NIK dan Password untuk login</p>
                            </div>
                            <div class="form-top-right">
                                <img src="<?php echo media_url() ?>/images/alfa.png" alt="">
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form role="form" action="<?php echo site_url('admin/auth/login') ?>" method="post" class="login-form">
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
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Username</label>
                                    <input autofocus type="text" name="username" placeholder="NIK" class="form-username form-control" id="form-username">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password" class="form-password form-control" id="form-password">
                                </div>
                                <button type="submit" class="btn">Sign in!</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 text">
                        <div class="description">
                            <p>
                                PT. Sumber Alfaria Trijaya, Tbk <br /> 
                                Kawasan Industri Menara Permai Kav. 18 Cileungsi - Bogor<br/>
                                &copy; <?php echo pretty_date(date('Y-m-d'), 'Y',FALSE) ?> All Rights Reserved. Achyar Anshorie&trade;
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>