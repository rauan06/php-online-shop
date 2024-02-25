<?

    session_start();
    include '../includes/db_connect.php';

    #Recieving data from the filled inputs and setting variables for each of them
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    #SQL statement
    $query = "SELECT * FROM users WHERE PHONE='$phone'"; 
    $result = mysqli_query($link, $query);

    #Password verification
    if($pass !== $pass2)
    {
        $_SESSION['error'] = "Passwords don't match!";
        header('Location: ../register.php');
       
    #Lengthcheack for the inputs    
    } elseif(strlen($name)>30 OR strlen($phone)>15 OR strlen($pass)>30)
        {
            $_SESSION['error'] = "Some inputs are too long!";
            header('Location: ../register.php');
          
    #Search whether there is a phone number existing the database  
    } elseif(mysqli_num_rows($result)>0)
        {
            $_SESSION['error'] = "Phone number is already taken!";
            header('Location: ../register.php');
        } else{
            #Password encryption
            $hashed = password_hash($pass,PASSWORD_DEFAULT);

            #Insert into database
            $sql = "INSERT INTO users(USER_NAME,PHONE,PASS,ROLE) 
                    VALUES('$name','$phone','$hashed','user')";
            mysqli_query($link, $sql);
            
            $query = "SELECT * FROM users WHERE PHONE='$phone'"; 
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_array($result);
            
            $role = $row['ROLE'];
            $id = $row['USER_ID'];
            
            #Setting session confirming that user is authorized
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;

            header('Location: ../index.php');
    }



