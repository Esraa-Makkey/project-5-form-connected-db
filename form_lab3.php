<html>
    <head>
    <title> Form demo </title>
    <style>
        .error {color: #FF0000;}
    </style>
    </head>
    <body>
        <?php 
            //  if(!empty($_POST['name'])) {
            //     echo "Name: ". $_POST['name']. "<br />";
            //  }
            // define variables and set to empty values
            $name = $email = $group = $comment = $gender  = $subject ="";
            $nameErr = $emailErr = $genderErr = $subjectErr  = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["name"])) {
                    $nameErr = "Name is required";
                  } else {
                    $name = test_input($_POST["name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                      $nameErr = "Only letters and white space allowed";
                    }
                  }
              
                  if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                  } else {
                    $email = test_input($_POST["email"]);
                    // check if e-mail address is well-formed
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                      $emailErr = "Invalid email format";
                    }
                  }
                if (empty($_POST["group"])) {
                    $group = "";
                  } else {
                    $group = test_input($_POST["group"]);
                  }
                
              
                if (empty($_POST["comment"])) {
                  $comment = "";
                } else {
                  $comment = test_input($_POST["comment"]);
                }
              
                if (empty($_POST["gender"])) {
                  $genderErr = "Gender is required";
                } else {
                  $gender = test_input($_POST["gender"]);
                }
                if (empty($_POST["subject"])) {
                    $subjectErr = "You must select 1 or more";
                 }else {
                    $subject = $_POST["subject"];	
                 }
              }
               
                    

            function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
            }  
    
        ?>
    <h2>Application name : AAST_BIS class registration</h2>
    <p><span class = "error" color = red >* required field.</span></p> 
      <form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
         <table>
            <tr>
               <td>Name:</td> 
               <td>
                   <input type = "text" name = "name">
                   <span class = "error" >* <?php echo $nameErr;?> </span>
                </td>
               
            </tr>
            
            <tr>
               <td>E-mail:</td>
               <td>
                   <input type = "text" name = "email">
                   <span class = "error">* <?php echo $emailErr;?> </span>
                </td>
              
            </tr>
            
            <tr>
               <td>Grouup #</td>
               <td><input type = "text" name = "group"></td>
            </tr>
            
            <tr>
               <td>Class details:</td>
               <td><textarea name = "comment" rows = "5" cols = "40"></textarea></td>
            </tr>
            
            <tr>
               <td>Gender:</td>
               <td>
                  <input type = "radio" name = "gender" value = "female">Female
                  <input type = "radio" name = "gender" value = "male">Male
                  <span class = "error" color = red >* <?php echo $genderErr;?> </span>
               </td>
            </tr>
            <tr>
                <td> Select courses : </<td>
                <td>
                    <select name = " subject[]" size = "4" multiple >
                        <option value = "PHP" > PHP </option>
                        <option value = "Java script"> Java script </option>
                        <option value = "MySQL">MySQL </option>
                        <option value = "HTML"> HTML </option>
                        <option value = "java"> Java</option>
                        <option value = "bootstrap"> Bootstrap  </option>
                    </select>
                </td>
                <?php echo $subjectErr;?>                 
            </tr>
            <tr>
                <td>
                    Agree
                </td>
                <td>
                        <input type = "checkbox" name = "checked" value = "1">
                    <?php if(!isset($_POST['checked'])){ ?>
                        <span class = "error">* <?php echo "You must agree to terms";?></span>
                    <?php } ?>
                </td>
                
            </tr>    
            
            <tr>
               <td>
               <input type = "submit" name = "submit" value = "Submit">
               </td>
            </tr>
         </table>
      </form>
      <?php
            echo "<h2>Your given values are as :</h2>";
            echo "Name :". $name;
            echo "<br>";
            echo "E-mail :". $email;
            echo "<br>";
            echo "group# :". $group;
            echo "<br>";
            echo "class detaails :". $comment;
            echo "<br>";
            echo "gender :". $gender;
            echo "<br>";
            for($i = 0; $i < count($subject); $i++) {
                echo("Your courses are :" .$subject[$i] . " ");
             }
           
        ?>
    </body>
</html>