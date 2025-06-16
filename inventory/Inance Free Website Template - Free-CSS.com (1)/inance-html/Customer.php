<?php
  include 'connect.php';
  class Customer extends connect
  {
    public $id,$nm,$address;
   public function __construct()
   {
       parent::__construct();
   }
   public function save()
   {
      if($this->db_found==true)
      {
        $k=0;
        $s="select * from customer";
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
              $sql="insert into customer values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
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
            $sql="delete from customer where id='$_POST[t1]'";
            mysqli_query($this->db_found,$sql);
            echo "<script>alert('record delete')</script>";
       }
   else
       echo "Database not found";
    }

  public function Update()
   {
       if($this->db_found==true)
       {
            $sql="Update  customer set nm='$_POST[t2]',address='$_POST[t3]' where id='$_POST[t1]'";
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
          $s="select*from customer";
          $r=mysqli_query($this->db_found,$s);
          echo "<table border=2 bgcolor=pink>
          <tr>
          <th> Id</th>
          <th>Nm</th>
          <th>Address</th>
          </tr>";
          while($db_field=mysqli_fetch_assoc(($r)))
          {
               echo"<tr><th>".$db_field['id']."</th>";
               echo"<th>".$db_field['nm']."</th>";
               echo"<th>".$db_field['address']."</th>";
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
          $s="select*from customer where id='$_POST[t1]'";
          $r=mysqli_query($this->db_found,$s);
          echo "<table border=2 bgcolor=pink>
          <tr>
          <th> Id</th>
          <th>Nm</th>
          <th>Address</th>
          </tr>";
          while($db_field=mysqli_fetch_assoc(($r)))
          {
               echo"<tr><th>".$db_field['id']."</th>";
               echo"<th>".$db_field['nm']."</th>";
               echo"<th>".$db_field['address']."</th>";
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
          $s = "SELECT * FROM customer WHERE $field = '$value'";
          $r = mysqli_query($this->db_found, $s);
          echo "<table border=2 bgcolor=pink>
          <tr>
          <th> Id</th>
          <th>Nm</th>
          <th>Address</th>
          </tr>";
          while($db_field=mysqli_fetch_assoc(($r)))
          {
               echo"<tr><th>".$db_field['id']."</th>";
               echo"<th>".$db_field['nm']."</th>";
               echo"<th>".$db_field['address']."</th>";
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
             $s="select * from customer where id='$_POST[t1]'";
             $r=mysqli_query($this->db_found,$s);
             while($db_field=mysqli_fetch_assoc(($r)))
             {
                  $this->id=$db_field['id'];
                  $this->nm=$db_field['nm'];
                  $this->address=$db_field['address'];
             }
         }
      }
}
  $ob=new Customer();
  if(isset($_REQUEST["b1"]))//To Save the record
  {
       $ob->Save();
  }
  if(isset($_REQUEST["b3"]))//To delete the record
  {
       $ob->Delete();
  }
  if(isset($_REQUEST["b2"]))//To update the record
  {
       $ob->Update();
  }
  if(isset($_REQUEST["b4"]))//To show all record
  {
       $ob->Allsearch();
  }
  if(isset($_REQUEST["b5"]))//Particular search
  {
       $ob->Psearch();
  }
  if(isset($_REQUEST["b6"]))//special search
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
    width: 570px;
    height: 450px;
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
 echo "<form method=post action='Customer.php'>
  <div class=container>
<h1>CUSTOMER</h1>
    <center>
    <table border=1>
      <tr><td>Id</td><td><input type=text name=t1 value=$ob->id></td></tr>
      <tr><td>nm</td><td><input type=text name=t2 value=$ob->nm></td></tr>
      <tr><td>Address</td><td><input type=text name=t3 value=$ob->address></td></tr>
      <tr><td colspan=2>
      <input type=reset value=New>
      <input type=submit name=b1 value=Save>
      <input type=submit name=b2 value=Update></td></tr>
      <tr><td colspan=2><input type=submit name=b3 value=Delete>
      <input type=submit name=b4 value=AllSearch>
      <input type=submit name=b5 value=Psearch>
      <input type='submit' name=b7 value=Auto_search></td></tr>
      </div>
      </table>
      </center>
  </form>";
?>