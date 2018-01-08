<?php
  error_reporting(0);
  

          

      /*********************************************************
       *********************************************************
       ************* Reusable functions code *******************
       *********************************************************
       *********************************************************/
          

          class database
          {
            
                protected $con;  
                protected $condetion;
            
                public function __construct($con)
                {
                   $this->con=$con;
                }
            
                public  function login($username,$password)
                {
                     // global $con;
                     $queryStr="select * from login_info where username ='$username' AND password='$password' ";
                     $row=$this->con->query($queryStr);
                     $result=$row->fetch_assoc();
                     if($result)
                     {
                         return "true";
                     }
                     else 
                     {
                         return "false";
                     }

                 }
                 public function getAllWithLimit($table,$numRow)
                 {

                       
                       

                       $str="select * from ".$table." ORDER BY id DESC LIMIT ".$numRow;
                         
                       $row= $this->con->query($str);
                     
                       $array=array();

                       while($result=$row->fetch_assoc())
                       {
                           
                           $array[]=$result;

                       }

                       return $array;



                 }
                 public function insert($table,$data)
                 {
                     
                       $table_fields=array(); 
                       $table_value=array();
                 
                       foreach ($data as $key => $value) {
                         $table_fields[]=$key;
                         $table_value[]=$value;
                       }

                       $length=count($table_fields);
                       $fields="";
                       $data="";
                       
                       for($i=0;$i<$length;$i++)
                        {
                           $fields=$fields.$table_fields[$i].",";
                           $data .="'$table_value[$i]'".",";
                        }
                        
                        $fields= rtrim($fields, ",");
                        $data=rtrim($data, ",");
                       
                        $str ="insert into ".$table."($fields)values($data)";
                        $result=$this->con->query($str);
                       
                        if($result)
                        {
                            return true;
                        }
                        else
                        {
                            return false;  
                             
                        }
                  }
                  public function fetch_all($table)
                  {
                       

                        $str="select * from ".$table;
                       $row=$this->con->query($str);
                       $data =array();
                       
                       while($result=$row->fetch_assoc())
                       {
                          $data[]=$result;
                       }  
                       
                       return $data; 

                   }

                   public function getDistict($table)
                   {
                       
                       $str="select DISTINCT area from ".$table;
                       $row=$this->con->query($str);
                       $data =array();
                       
                       while($result=$row->fetch_assoc())
                       {
                          $data[]=$result;
                       }  
                       
                       return $data; 

                   }
                   public function LikeQuery($table,$id)
                   {
                       
                        $like =$this->like($id);
                        
                        $array=array();
                        
                        //$str="select * from ".$table." where customer_id LIKE '%".$id."%'";
                         $str="select * from ".$table." where ".$like;
                        
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                           
                            $array[]=$result;
                        
                        }
                        
                        return $array;
                   }
                   public function like($condition)
                   {


                       $this->condetion=$condition;
                       
                       $table_fields=array(); 
                       $table_value=array();
                       $fields="";
                       $data="";
                       
                       foreach($this->condetion as $key => $value) {
                         
                         $table_fields[]=$key;
                         $table_value[]=$value;
                       
                       }
                       
                       $length=count($table_fields);
                       
                        for($i=0;$i<$length;$i++)
                        {
                           $fields=$fields.$table_fields[$i]." LIKE '%$table_value[$i]%' AND ";
                           
                        }
                        $cond = preg_replace('/\W\w+\s*(\W*)$/', '$1', $fields);
                        // remove last AND from the query string
                        
                        return $cond;
                   }
                   public function count_row($table,$condition)
                   {
                        
                        
                        $condition=$this->where($condition);

                        $str="select * from ".$table." where ".$condition;
                        
                        $row=$this->con->query($str);
                        
                        $num_row=$row->num_rows;

                        return $num_row;

 


                   }
                   public function select_column($table,$colums)
                   {
                       
                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");

                        $str="select DISTINCT ".$colum." from ".$table;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                            $array[]=$result;
                        }
                        
                        return $array;


                   }
                   public function selectColum($table,$colums)
                   {
                       


                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");
                        
                        $str="select ".$colum." from ".$table;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                            $array[]=$result;
                        }
                        
                        return $array;


                   }
                   public function select_colum_where($table,$colums,$condition)
                   {
                         

                          $colum="";
                          $array=array();

                          for($i=0;$i<count($colums);$i++)
                          {
                            $colum.=$colums[$i].","; 
                          }
                          
                          $colum=rtrim($colum, ",");
                          
                          $where_condetion=$this->where($condition);
                          
                         $str="select ". $colum ." from ".$table." where ".$where_condetion;
                          $row=$this->con->query($str);
                          
                          while($result=$row->fetch_assoc())
                          {
                             $array[]=$result;
                          }
                          
                          return $array;
                          
                    }
                    function selectDistinct($table,$colums,$condetion)
                    {
                       

                        $colum="";
                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");
                        
                        $where_condetion=$this->where($condetion);
                        
                        $str="select DISTINCT ". $colum ." from ".$table." where ".$where_condetion;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                           $array[]=$result;
                        }
                        return $array;
                        
                   } 
                   public function selectDistinctGroupBy($table,$colums,$condetion,$groupBy)
                   {
                      
                        $colum="";
                        $array=array();
                        
                        for($i=0;$i<count($colums);$i++)
                        {
                          $colum.=$colums[$i].","; 
                        }
                        $colum=rtrim($colum, ",");
                        
                        $where_condetion=$this->where($condetion);
                        
                        $str="select ". $colum ." from ".$table." where ".$where_condetion." GROUP BY ". $groupBy;
                        $row=$this->con->query($str);
                        
                        while($result=$row->fetch_assoc())
                        {
                           $array[]=$result;
                        }
                        
                        return $array;
                        
                   }
                    public function select($table,$condetion)
                    {
                       
                        $record_set=array();
                        $where_condetion=$this->where($condetion);
                        
                        $str ="select * from ".$table." where ".$where_condetion;
                        $str_row=$this->con->query($str);
                        while( $result=$str_row->fetch_assoc())
                        {
                          $record_set[]=$result;
                        }
                        
                        return $record_set;
                    
                    }
                   public function get_data($table,$condetion="",$suffix=""){

                        $record_set=array();
                      
                         $where="";
                        
                        if($condetion!=""){
                           
                           $where="where=";
                           $where_condetion=$this->where($condetion);

                        }

                        
                       $str ="select * from ".$table." ".$where.$where_condetion." ".$suffix;
                        $str_row=$this->con->query($str);
                        while( $result=$str_row->fetch_assoc())
                        {
                          $record_set[]=$result;
                        }
                        
                        return $record_set; 
                   } 
                    
                    public function where($condetion)
                    {
                       
                       $this->condetion=$condetion;
                       $table_fields=array(); 
                       $table_value=array();
                       $fields="";
                       $data="";
                       
                       foreach ($this->condetion as $key => $value) {
                         $table_fields[]=$key;
                         $table_value[]=$value;
                       }
                       $length=count($table_fields);
                       
                       for($i=0;$i<$length;$i++)
                        {
                           $fields=$fields.$table_fields[$i]."='$table_value[$i]' AND ";
                           
                        }
                        $cond = preg_replace('/\W\w+\s*(\W*)$/', '$1', $fields);
                        // remove last AND from the query string
                        
                        return $cond;
                    }
                    public function row_update($table,$colums,$condetion)
                    {
                       
                       
                        $wcondetion=$this->where($condetion);
                        $table_fields=array(); 
                        $table_value=array();
                        $fields="";
                        $data="";
                        
                        foreach ($colums as $key => $value) {
                         
                         $table_fields[]=$key;
                         $table_value[]=$value;
                        
                        }
                        $length=count($table_fields);
                        
                        for($i=0;$i<$length;$i++)
                        {
                           
                           $fields=$fields.$table_fields[$i]."='$table_value[$i]',";
                           
                        }
                        
                        $fields=rtrim($fields, ",");
                        $str="UPDATE ".$table. " SET ".$fields. " where ".$wcondetion;
                        $row=$this->con->query($str);
                        
                        if($row)
                         {
                          return true;
                         } 
                        else{
                          return false;
                         }

                        
                    }
                    public function delete($table,$condition)
                    {

                           
                           $condition=$this->where($condition);

                           $str="delete from ".$table." where ".$condition;

                           $row=$this->con->query($str);
                           
                           if($row)
                           {
                             
                             return true;
                           
                           }
                           else
                           {
                             
                             return false ;
                           
                           }


                    } 

                    public function countUnprocessedRow()
                    {

                          

                          $str="select * from temp_table where status='0' AND flag='0'";

                          $row=$this->con->query($str);

                          $no_of_row=$row->num_rows;

                          return $no_of_row; 


                    }    
                  
                    public function rowCount($table,$condition)
                    {

                         $condi=$this->where($condition);

                         $str="select * from ".$table. " where ".$condi;

                         $row=$this->con->query($str);

                         $num_rows=$row->num_rows;

                         return $num_rows;
                    }
                    public function totalRowCount($table){

                        $str="select * from ".$table;

                         $row=$this->con->query($str);

                         $num_rows=$row->num_rows;

                         return $num_rows;
                    }

                    public function selectDistinctAll($table,$colum)
                    {
                       
                           
                           
                           $str="select DISTINCT  ".$colum." from ".$table;
                           
                           $rows=$this->con->query($str);

                           $array=array();
                           
                           foreach ($rows as $row) {
                             
                              $array[]=$row;
                           }
                        
                          return $array;


                    }
                    public function create_query($query_str){
                     
                          $rows=$this->con->query($query_str);

                           $array=array();
                           
                           foreach ($rows as $row) {
                             
                              $array[]=$row;
                           }
                        
                          return $array;;
                 }   

  
          } 
          

          
           
           
           
          

           
           
         

        


         


?>