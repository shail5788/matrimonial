<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();
$detail =  $obj1->categoryDetail($_GET['id']);
if(isset($_REQUEST['submit'])){
    $add = $obj1->editCategory($_POST,$_GET['id']);
    if($add == 1){?>
<script> window.location.href = "categoryList.php";</script>
<?php  }
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
                               Edit Category
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="" id="categoryForm">
                                
                                 <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="category">Add Category</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                             <input type="text" class="form-control" name="category" id="category" value="<?php echo $detail["category"];?>"></div>
                                             <span id="catMsgedit"></span>
                                        </div>
                                    </div>
                                </div>
                                 
                                
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="update" name="submit" id="submit"/>
                                        
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

<script type="text/javascript">
    
   $('#categoryForm').on("submit",function(e){
    $('#catMsgedit').html();
    var category = $('#category').val();
    if(category=="")
    {
            $('#category').css('border-bottom', '3px solid red');
            $("#catMsgedit").html("Please enter Category Name.");
            $("#catMsgedit").css('color', 'red');
    }
    else{
        $("#categoryForm").submit(); 
    }
    e.preventDefault();

   });
</script>
