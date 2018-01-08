<?php 
include('includes/globalFunction.php');
include('includes/adminFunction.php');
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
                               Plan List
                            </h2>
                          <a href="addPlan.php" class="btn btn-primary pull-right">Add Plan</a>
                        </div>
                       
                        <div class="body">
                        <div id="msgact"></div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                          <th>S.N</th>
                                          <th>Name</th>
                                          <th>Description</th>
                                          <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $obj1->planList();?>
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
               data:"id="+id+"&actionData=delPlan",
               success:function(html)
                  {
                    
                        $("#msgact").html("Plan has been deleted successfully.");
                        setTimeout(function() { window.location.href="<?php echo $wwwroot;?>allPlanList.php";}, 1000);
                     
                  }
                });
      }
  }
</script>