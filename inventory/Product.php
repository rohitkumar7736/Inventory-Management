<?php
  include 'connect.php';
  class Product extends connect
  {
     public $id,$barcode,$name,$desc1,$category,$qty,$weight,$refrigerated;
   public function __construct()
   {
       parent::__construct();
   }
   public function save()
        {
           if($this->db_found==true)
           {
             $k=0;
             $s="select * from product";
             $r=mysqli_query($this->db_found,$s);
             while($f=mysqli_fetch_assoc($r))
             {
               if($f['id']==$_POST['t1']) 
                 {
                   $k=1;
                   break;
                 }
             }
             if($k==1)
             echo "<div style='color: red; font-weight: bold';>⚠️ ID already exists.</div>";
             else
                {
                   $sql="insert into product values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]''$_POST[t7]','$_POST[t8]')";
                   mysqli_query($this->db_found,$sql);
                   echo "<script>alert('Record save')</script>";
                }
           }
          else
            echo "Database Not Found";
        }
  public function delete()
   {
       if($this->db_found==true)
       {
            $sql="delete from Product where id='$_POST[t1]'";
            mysqli_query($this->db_found,$sql);
            echo "<script>alert('record delete')</script>";
       }
   else
       echo "Database not found";
    }
    public function update()
    {
        if($this->db_found==true)
        {
          $sql="Update product set barcode='$_POST[t2]',name='$_POST[t3]',desc1='$_POST[t4]',category='$_POST[t5]',qty='$_POST[t6]',weight='$_POST[t7]',refrigerated='$_POST[t8]' where id='$_POST[t1]'";
             mysqli_query($this->db_found,$sql);
             echo "<script>alert('record update')</script>";
        }
    else
        echo "Database not found";
     }
     public function Allsearch()
     {
        if($this->db_found==true)
        {
             $s="select*from product";
             $r=mysqli_query($this->db_found,$s);
             echo "<table border=2 bgcolor=pink>
             <tr>
             <th>Id</th>
             <th>Barcode</th>
             <th>Name</th>
             <th>Desc1</th>
             <th>Category</th>
             <th>Qty</th>
             <th>Weight</th>
             <th>Refrigerated</th>
             </tr>";
             while($db_field=mysqli_fetch_assoc(($r)))
             {
               echo"<tr><th>".$db_field['id']."</th>";
                  echo"<th>".$db_field['barcode']."</th>";
                  echo"<th>".$db_field['name']."</th>";
                  echo"<th>".$db_field['desc1']."</th>";
                  echo"<th>".$db_field['category']."</th>";
                  echo"<th>".$db_field['qty']."</th>";
                  echo"<th>".$db_field['weight']."</th>";
                  echo"<th>".$db_field['refrigerated']."</th>";
                  echo "</tr>";
             }
             echo"</table>";
        }
        else
        {
             echo "data does not found";
        }
     }
     public function Psearch()
     {
        if($this->db_found==true)
        {
             $s="select*from product where id='$_POST[t1]'";
             $r=mysqli_query($this->db_found,$s);
             echo "<table border=2 bgcolor=pink>
             <tr>
              <th>ID</th>
             <th>Barcode</th>
             <th>Name</th>
             <th>Desc1</th>
             <th>Category</th>
             <th>Qty</th>
             <th>Weight</th>
             <th>Refrigerated</th>
             </tr>";
             while($db_field=mysqli_fetch_assoc(($r)))
             {
               echo"<tr><th>".$db_field['id']."</th>";
                  echo"<th>".$db_field['barcode']."</th>";
                  echo"<th>".$db_field['name']."</th>";
                  echo"<th>".$db_field['desc1']."</th>";
                  echo"<th>".$db_field['category']."</th>";
                  echo"<th>".$db_field['qty']."</th>";
                  echo"<th>".$db_field['weight']."</th>";
                  echo"<th>".$db_field['refrigerated']."</th>";
               echo "</tr>";
             }
             echo"</table>";
        }
        else
        {
             echo "data does not found";
        }
     }
     public function Special_search()
  {
      if ($this->db_found == true) 
      {
          $value = $_POST["t1"];
          $field = $_POST["s"];
          $s = "SELECT * FROM product WHERE $field = '$value'";
          $r = mysqli_query($this->db_found, $s);
          echo "<table border=2 bgcolor=pink>
             <tr>
             <th>Id</th>
             <th>Barcode</th>
             <th>Name</th>
             <th>Desc1</th>
             <th>Category</th>
             <th>Qty</th>
             <th>Weight</th>
             <th>Refrigerated</th>
             </tr>";
             while($db_field=mysqli_fetch_assoc(($r)))
             {
               echo"<tr><th>".$db_field['id']."</th>";
                  echo"<th>".$db_field['barcode']."</th>";
                  echo"<th>".$db_field['name']."</th>";
                  echo"<th>".$db_field['desc1']."</th>";
                  echo"<th>".$db_field['category']."</th>";
                  echo"<th>".$db_field['qty']."</th>";
                  echo"<th>".$db_field['weight']."</th>";
                  echo"<th>".$db_field['refrigerated']."</th>";
                  echo "</tr>";
             }
             echo"</table>";
        }
        else
        {
             echo "data does not found";
        }
     }
     public function Auto_search()
     {
        if($this->db_found==true)
         {
             $s="select * from product where id='$_POST[t1]'";
             $r=mysqli_query($this->db_found,$s);
             while($db_field=mysqli_fetch_assoc(($r)))
             {
                  $this->id=$db_field['id'];
                  $this->barcode=$db_field['barcode'];
                  $this->name=$db_field['name'];
                  $this->desc1=$db_field['desc1'];
                  $this->category=$db_field['category'];
                  $this->qty=$db_field['qty'];
                  $this->weight=$db_field['weight'];
                  $this->refrigerated=$db_field['refrigerated'];
             }
         }
      }
  }
  $ob=new Product();
  if(isset($_REQUEST["b1"]))//To Save the record
  {
       $ob->Save();
  }
  if(isset($_REQUEST["b2"]))//To update the record
  {
       $ob->Update();
  }
  if(isset($_REQUEST["b3"]))//To delete the record
  {
       $ob->Delete();
  }
  if(isset($_REQUEST["b4"]))//Show all record
  {
       $ob->Allsearch();
  }
  if(isset($_REQUEST["b5"]))//Particular Search
  {
       $ob->Psearch();
  }
  if(isset($_REQUEST["b6"]))//Special search
  {
       $ob->Special_search();
  }
  if(isset($_REQUEST["b7"]))//special search
  {
       $ob->Auto_search();
  }
  echo
  "<style>
 body
       {
          font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
          background: linear-gradient(to right,rgb(198, 211, 142)	,rgb(124, 198, 233)	);
          margin: 0;
          padding: 40px;
      }

  .container {
    width: 40%;
    margin: auto;
    padding: 20px;
    margin-top: 10px;
    width: 590px;
    height: 720px;
    background: transparent;
    border: 10px solid pink(255,255,255,.2);
    backdrop-filter:blur(80px);
    box-shadow: 0 0 10px rgba(53, 15, 9, 0.2); 
    border-radius: 12px; 
   

    border-radius: 80px;
  }

  h1 {
    text-align: center;
    color: #333;
    margin-bottom: 14px;
  }

  table {
    width: 80%;
    border-collapse: collapse;
  }

  th, td {
    padding: 12px 15px;
    text-align: left;
  }

  th {
    background-color:rgba(18, 204, 204, 0.65);
    color: #333;
    font-weight: normal;
    border: 1px solid #ddd;
  }

  input[type=text] {
    width: 80%;
    padding: 8px;
    border: 2px solid #ccc;
    border-radius: 8px;
    box-shadow: inset 0 1px 3px rgba(15, 4, 4, 0.1);
  }

  input[type=submit], input[type=reset] {
    background-color:rgb(19, 20, 20);
    color: white;
    border: none;
    padding: 10px 16px;
    margin: 5px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(32, 129, 219, 0.1);
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  input[type=submit]:hover, input[type=reset]:hover {
    background-color:rgb(28, 121, 207);
  }

  table input[type=submit], table input[type=reset] {
    width: auto;
  }

  .action-row {
    text-align: center;
  }
</style>";

echo"<form name=f method=post action=Product.php>
<div class=container>
<body class=img> 
<h1>PRODUCT</h1>
    <center>
         <table border=0>
         <tr>
             <th>Id</th>
             <th><input type=text name=t1 value=$ob->id></th>
        </tr>
        <tr>
             <th>Barcode</th>
             <th><input type=text name=t2 value=$ob->barcode></th>
        </tr>
         <tr>
             <th>Name</th>
             <th><input type=text name=t3 value=$ob->name></th>
        </tr>
         <tr>
             <th>Desc1</th>
             <th><input type=text name=t4 value=$ob->desc1></th>
        </tr>
         <tr>
             <th>Category</th>
             <th><input type=text name=t5 value=$ob->category></th>
        </tr>
        <tr>
             <th>Qty</th>
             <th><input type=text name=t6 value=$ob->qty></th>
        </tr>
         <tr>
             <th>Weight</th>
             <th><input type=text name=t7 value=$ob->weight></th>
        </tr>
         <tr>
             <th>Refrigerated</th>
             <th><input type=text name=t8 value=$ob->refrigerated></th>
        </tr>
       <tr>
             <th colspan=3> <input type='reset' name=b1 value=New>
                      <input type='submit' name=b1 value=Save>
                      <input type='submit' name=b2 value=Update> </th>                              
        </tr>
       <tr>
              <th colspan=3><input type='submit' name=b3 value=Delete>
               <input type='submit' name=b4 value=AllSearch>
               <input type='submit' name=b5 value=Psearch>
               <input type='submit' name=b7 value=AutoSearch> </th>
    </tr>
    </div>
 </center>
</table>";
?>
