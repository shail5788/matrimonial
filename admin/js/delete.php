<script type="text/javascript">
function delit(id) 
{
    //alert(id);
   var  conf = confirm("Are you sure?");
    
    if (conf == true) {
        $.ajax({
              type:"POST",
               async:false,
               url: "deletePlanName.php",
                 data:"id="+id+"&del=del",
                 success:function(result){
                   
                      if(result=="success")
                      {
                        alert("Record deleted");
                       setTimeout(function() { window.location.href="planNameList.php";}, 1000);
                       
                      } 
                  
                  }
              });
    }
}



function delbenifit(id) 
{
    //alert(id);
   var  conf = confirm("Are you sure?");
    
    if (conf == true) {
        $.ajax({
              type:"POST",
               async:false,
               url: "deleteBenifit.php",
                 data:"id="+id+"&del=del",
                 success:function(result){
                   
                      if(result=="success")
                      {
                        alert("Record deleted");
                        setTimeout(function() { window.location.href="benifitList.php";}, 1000);
                       
                      } 
                  
                  }
              });
    }
}
</script>