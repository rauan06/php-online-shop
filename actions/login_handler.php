<?

    session_start();
    require '../includes/db_connect.php';

    #Recieving data from the filled inputs and setting variables for each of them
    $phone = $_POST['phone'];
    $pass = $_POST['pass'];

    #SQL statement
    $sql = "SELECT * FROM users WHERE PHONE='$phone'";
    $result = mysqli_query($link, $sql);

    $row = mysqli_fetch_array($result);
    
    #Lengthcheack for the inputs to save time spent on SQL queries
    if(strlen($phone)>15 or strlen($pass)>30)
    {
        $_SESSION['error2'] = "Some inputs are too long!";
        header('Location: ../login.php');
    } else{
        if(mysqli_num_rows($result)==0){
            $_SESSION['error2'] = "Phone or password are incorrect!";
            header('Location: ../login.php');
    } else{
        #Encrypting the entered password with the same key as while registrating
        $hashed = password_hash($pass,PASSWORD_DEFAULT);

        #Password verification
        if (password_verify($pass, $row['PASS']) === false){
            $_SESSION['error2'] = "Phone or password are incorrect!";
            header('Location: ../login.php');
        } else{
            $role = $row['ROLE'];
            $id = $row['USER_ID'];
            
            #New session starts
            $_SESSION['role'] = $role;
            $_SESSION['id'] = $id;
            
            header('Location: ../index.php');
        }}}

        