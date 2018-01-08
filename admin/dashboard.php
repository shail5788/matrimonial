<?php 
include('includes/globalFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink">
                        <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        </div>
                        <a href="userList.php">
                        <div class="content">
                        <div class="text">USERS MANAGEMENT</div>
                         <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green">
                        <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        </div>
                        <a href="allReligionList.php">
                        <div class="content">
                        <div class="text">RELIGION MANAGEMENT</div>
                         <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange">
                        <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        </div>
                        <a href="professionList.php">
                        <div class="content">
                        <div class="text">PROFESSION MANAGEMENT</div>
                         <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan">
                        <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        </div>
                        <a href="allBannerList.php">
                        <div class="content">
                        <div class="text">BANNER MANAGEMENT</div>
                         <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-grey">
                        <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        </div>
                        <a href="addUrl.php">
                        <div class="content">
                        <div class="text">SOCIAL LINK</div>
                         <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-brown">
                        <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                        </div>
                        <a href="staticList.php">
                        <div class="content">
                        <div class="text">STATIC PAGES MANAGEMENT</div>
                         <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
            
<?php echo $obj->scriptSection();?>
            
       