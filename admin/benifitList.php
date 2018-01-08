<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
$message="";
echo $obj->headerSection();
echo $obj->leftSideBar();
echo $obj->footer();

?>
<section class="content">
        <div class="container-fluid">
            
                 <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Benifit Name
                            </h2>
                          <a href="addBenifit.php" class="btn btn-primary pull-right">Add Benifit</a>
                        </div>
                        <div id="msgact"><?php echo $message;?></div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                          <th>S.N</th>
                                          <th>Name</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $obj1->benifitList();?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->
           
            </div>


<?php echo $obj->scriptSection();?>      

<script type="text/javascript">
  function delIt(id)
  {
    var san = confirm("Are you sure!");
    //var urlData = $('#base_url').val();
     if(san)
      {
         $.ajax({
               type:"POST",
               async:false,
               url: 'ajax_function.php',
               data:"id="+id+"&actionData=delbenifitPlan",
               success:function(html)
                  {
                    if(html=="success")
                      {
                        $("#msgact").html("Benifit has been deleted successfully.");
                        
                       setTimeout(function() { window.location.href="<?php echo $urlroot;?>benifitList.php";}, 1000);
                      } 
                  }
                });
      }
  }
</script>    