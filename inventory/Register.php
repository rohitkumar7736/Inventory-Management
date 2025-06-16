<?php
include 'connect.php';
     class register extends connect
     {
        public function __construct()
        {
           parent::__construct();
        }
        public function save()
        {
           if($this->db_found==true)
           {
             $k=0;
             $s="select * from login";
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
             echo "<div style='color: red; font-weight: bold;'>⚠️ ID already exists.</div>";
             else
                {
                   $sql="insert into login values('$_POST[t1]','$_POST[t2]','$_POST[t3]')";
                   mysqli_query($this->db_found,$sql);
                   echo "<script>alert('Record save')</script>";
                }
           }
          else
            echo "Database Not Found";
        }
} 
$ob=new Register();
  if(isset($_REQUEST["b1"]))//To Save the record
  {
       $ob->Save();
  }
  echo
"<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(to right, #fce4ec, #f8bbd0);
        margin: 0;
        padding: 40px;
    }

    table {
        width: 60%;
        margin: 20px auto;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.8); /* Transparent background */
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        border-radius: 15px;
        overflow: hidden;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        color: #333;
    }

    th {
        background-color: #f48fb1;
        color: white;
        font-size: 16px;
        text-transform: uppercase;
    }

    tr:hover {
        background-color: rgba(255, 192, 203, 0.2);
    }

    input[type='text'] {
        width: 90%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        outline: none;
        font-size: 14px;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
         box-shadow: 0 0 10px rgba(0,0,0,.2); 
    }

    input[type='submit'], input[type='reset'] {
        background-color:rgb(233, 64, 92);
        color: white;
        padding: 10px 25px;
        margin: 4px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        cursor: pointer;
        transition: background 0.3s ease;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    input[type='submit']:hover, input[type='reset']:hover {
        background-color:rgb(238, 69, 106);
    }

    .form-wrapper 
    {
        padding: 20px;
        border-radius: 15px;
        background: rgba(255, 255, 255, 0.85);
        box-shadow: 0 40px 500px rgba(0,0,0,0.15);
        width: 65%;
        margin: auto;
    }
         .container
         {
                width: 360px;
                height: 380px;
                background: transparent;
                border: 10px solid pink(255,255,255,.2);
                backdrop-filter:blur(20px);
                box-shadow: 0 0 10px rgba(0,0,0,.2); 
                border-radius: 100px; 
                padding: 20px 20px;
         }
     h1 
    {
    text-align: center;
    font-size: 30px;
    font-weight: bold;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #ec407a, #f06292);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 30px;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.1);
    letter-spacing: 2px;
   }

</style>";
echo"<form name=f method=post action=Register.php>
<div class=container>
<h1>REGISTER</h1>
<center>
     <table border=1>
     <tr>
         <th>Login Id</th>
         <th><input type=text name=t1 value=$></th>
    </tr>
    <tr>
         <th>Login Password</th>
         <th><input type=text name=t2 value=$></th>
    </tr>
    <tr>
         <th>Counter</th>
         <th><input type=text name=t3 value=$></th>
    </tr>
    <tr> 
                    
          <th><input type='submit' name=b1 value=Save></th>
    </tr>
    </div>
 </center>
</table>";
?>
