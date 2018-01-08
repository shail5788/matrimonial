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
                               Religion List
                            </h2>
                          <a href="addReligion.php" class="btn btn-primary pull-right">Add Religion</a>
                        </div>
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
                                        <?php echo $obj1->religionList();?>
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
               data:"id="+id+"&actionData=delReligion",
               success:function(html)
                  {
                    if(html=="success")
                      {
                        $("#msgact").html("Religion has been deleted successfully.");
                        setTimeout(function() { window.location.href="<?php echo $wwwroot;?>allReligionList.php";}, 1000);
                      } 
                  }
                });
      }
  }
</script>        