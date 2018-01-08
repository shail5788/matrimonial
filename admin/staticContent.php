<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail['category_id'] = '';
$detail = $obj1->staticDetail($_GET['id']);
if(isset($_POST['submit']))
{
$add = $obj1->addStaticContent($_POST,$_GET['id']);
if($add == 1){
?>
<script> window.location.href = "staticList.php";</script>
<?php
}
}
?>

<section class="content">
        <div class="container-fluid">
            
                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               <?php echo $detail['name'];?>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" enctype=multipart/form-data>
                           
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="ckeditor" name="ckeditor" ><?php echo $detail['content'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2">French Description</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea id="MyTextarea3" name="french_content" ><?php echo $detail['french_content'];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Save" name="submit" id="submit"/>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
        
            </div>


<?php echo $obj->scriptSection();?>  
   
<script src="plugins/ckeditor/ckeditor.js"></script> 
<script src="js/pages/forms/editors.js"></script>  
<script type="text/javascript">
CKEDITOR.replace( 'ckeditor' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['ckeditor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please fill description' );
                e.preventDefault();
            }
        });
    </script>
<script type="text/javascript">
CKEDITOR.replace( 'MyTextarea3' );
        $("form").submit( function(e) {
            var messageLength = CKEDITOR.instances['MyTextarea3'].getData().replace(/<[^>]*>/gi, '').length;
            if( !messageLength ) {
                alert( 'Please fill french description' );
                e.preventDefault();
            }
        });
    </script>