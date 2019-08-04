<?php
/* 
 * This software is released under the BSD 2-clause (simplified) license.
 * 
 * Copyright (c) 2014, J.Valentine (LunarCMS.com, jv@thevdm.com)
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer. 
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR
 * ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * The views and conclusions contained in the software and documentation are those
 * of the authors and should not be interpreted as representing official policies, 
 * either expressed or implied, of the FreeBSD Project.
 */

/* Create the menu list */

if(basename(__FILE__) == basename($_SERVER['PHP_SELF'])){
    header("Location: ../");
}
if($users == '1') {
    if(isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    }
    if($mode == 'login') {
        if (isset($_POST['Submit'])) {
            /* username and password sent from form */
            $email=$_POST['email'];
            $password=sha1($_POST['password']);
            /* Include the database connection details */
            include('../includes/configure.php');
            /* Get the user details from the database */
            $dbUser = $bdd->query('SELECT id, access, name, email, password FROM users');
            $dbUser->execute();
            while ($data = $dbUser->fetch()) {
                /* Check each user against the login details submitted */
                if(($email==$data['email']) && ($password==$data['password'])) {
                    /* User session */
                    $_SESSION['user'] = $data['name'];
                    /* User ID session */
                    $_SESSION['uid'] = $data['id'];
                    /* Access session, determines if the user is a 'Super User' or an 'Admin' */
                    $_SESSION['access'] = $data['access'];
                    /* Secure session, unique for each install, this enables multiple installations on the same server */
                    $_SESSION['secure'] = $secure;
                    /* if the user is not logged in redirect to the login page */
                    if($seo == '1') {
                        echo '<meta http-equiv="refresh" content="0; url=!Accounts-my_account.html">';
                    } else {
                        echo '<meta http-equiv="refresh" content="0; url=?page=!Accounts&mode=my_account">';
                    }
                    echo "Redirecting...";
                    exit;               
                    /* If no user account was found, create an error */
                } else {
                    $error='1';
                }
            }
            $dbUser->CloseCursor();
        }
            
        echo "<strong>Login</strong><br><br>";
        if ($error == '1') {
            echo "<div class='notification'>Invalid username and/or password.</div>";
        }
?> 
        <form method='post' style='width:400px; margin: auto;'>
            <label>Email address:</label><br>
            <input type='text' name="email" class="form"><br>
            <br>
            <label>Password:</label><br>
            <input type="password" name="password" class="form"><br>
            <br>
            <button name="Submit" value="submit" type="submit" class="formbutton">Login</button>
        </form>
<?php        
    } elseif($mode == 'register') {
        $name_error = '';
        $email_error = '';
        $password_error = '';
        $sub_name = '';
        $sub_email = '';
        if (isset($_POST['Submit'])) {
            $submitted = 'y';
            $sub_name = $_POST['name'];
            $sub_email = $_POST['email'];
            $sub_password1 = $_POST['password1'];
            $sub_password2 = $_POST['password2'];
            $sub_security = $_POST['security'];
            $sub_access = '2';
            /* PHP validation */
            if( $_SESSION['security_code'] != $sub_security && !empty($_SESSION['security_code'] ) ) {
                $security_error = '<span class="error">The security codes did not match.</span>';
                $err = '1';
            }
            /* Make sure a name has been entered */
            if (trim($sub_name) == '') {
                $name_error = '<span class="error">This field is required.</span>';
                $err = '1';
            }
            if (trim($sub_email) == '') {
                $email_error = '<span class="error">This field is required.</span>';
            }
            if (trim($sub_password1) == '') {
                $password_error = '<span class="error">This field is required.</span>';
            }
            /* Load the user data from the database and check the email value agains that of the form */
            $emailUsed = $bdd->query('SELECT email FROM users');
            while ($emailData = $emailUsed->fetch())
            {
                if ($sub_email == $emailData['email']) {
                    $email_error = '<span class="error">The E-mail address: \'' . $sub_email . '\' is in use with another acount.</span>';
                    $err = '1';
                }
            }
            $emailUsed->CloseCursor();
            if ($sub_password1 != $sub_password2) {
                $password_error = '<span class="error">The password fields do not match.</span>';
                $err = '1';
            } else {
                $password = sha1($sub_password1);
            }
            if ($err == '') {
                /* submit the form */
                $insertUser = "INSERT INTO users (access,name,email,password) VALUES(:access,:name,:email,:password)";
                $queryUser = $bdd->prepare($insertUser);
                $queryUser->execute(array(':access'=>$sub_access,
                                          ':name'=>$sub_name,
                                          ':email'=>$sub_email,
                                          ':password'=>$password));
                $queryUser->CloseCursor();
                $subject = $siteName . ' - Account details';
                $headers = 'From: ' . $siteName . '<noreply@lunarcms.com>' . "\r\n";
                $headers .= "Content-type: text/html; charset=\"UTF-8\"; format=flowed \r\n";
                $headers .= "Mime-Version: 1.0 \r\n"; 
                $headers .= "Content-Transfer-Encoding: quoted-printable \r\n";
                $message = "Your account has been created with " . $siteName . "<br><br>The details are as follow:<br><br>Name: " . $sub_name . "<br>User name: " . $sub_email . "<br>Password: " . $sub_password1 . "<br><br>Regards<br>$siteName Admin";
                mail($sub_email, $subject, $message, $headers);
                $mode = 'created';
            }
        unset($_SESSION['security_code']);
        }
        
  
        echo "<strong>Register</strong><br><br>";
?>
        <form method="post" style="width:400px; margin: auto;">
            <label>Name:</label><span class="error">*</span> <?php echo $name_error; ?><br>
            <input type="text" name="name" class="form" value="<?php echo $sub_name; ?>"><br>
            <br>
            <label>Email address:</label><span class="error">*</span> <?php echo $email_error; ?><br>
            <input type="text" name="email" class="form" value="<?php echo $sub_email; ?>"><br>
            <br>
            <label>Password:</label><span class="error">*</span> <?php echo $password_error; ?><br>
            <input type="password" name="password1" class="form"><br>
            <input type="password" name="password2" class="form"><br>
            <br>
            <label>Security Code:</label><span class="error">*</span> <?php echo $security_error; ?><br />
            <img src="includes/CaptchaSecurityImages.php?width=100&height=40&characters=5" /><br />
            <input id="security" name="security" type="text" class="form" /><br />
            <br>
            <button name="Submit" value="submit" type="submit" class="formbutton">Register</button>
        </form>
<?php
    } elseif($mode == 'my_account') {
        /* Check for login session, if it does not exist refer viewer to login page */
        $notloggedin = '0';
        if(!isset($_SESSION['user'])) {
            $notloggedin = '1';
        }
        if(isset($_SESSION['secure'])) {
            if($_SESSION['secure'] != $secure) {
                $notloggedin = '1';
            }
        } else {
            $notloggedin = '1';
        }
        if(!isset($_SESSION['uid'])) {
            $notloggedin = '1';
        }
        if ($notloggedin == '1') {
            /* if the user is not logged in redirect to the login page */
            if($seo == '1') {
                echo '<meta http-equiv="refresh" content="0; url=!Accounts-login.html">';
            } else {
                echo '<meta http-equiv="refresh" content="0; url=?page=!Accounts&mode=login">';
            }
            echo "Redirecting...";
            exit;
        }
        echo "<strong>My Account >> " . $_SESSION['user'] . "</strong><br><br>";
        $notification = '';
        $id = $_SESSION['uid'];
        $user = $bdd->prepare("SELECT id, name, email, password FROM users WHERE id = :id");
        $user->execute(array(':id' => $id));
        while ($data = $user->fetch()) {
            $id = $data['id'];
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];

        }
        if (isset($_POST['ChangePass'])) {
            $currentpass = $_POST['currentpass'];
            $newpass1 = $_POST['newpass1'];
            $newpass2 = $_POST['newpass2'];
            $err = '0';
            if (sha1($currentpass) != $password) {
                $currentpass_error = "<span class='error'>Your password was incorrect.</span>";
                $err = '1';
            }
            if (trim($newpass1) == '') {
                $newpass_error = "<span class='error'>This field is required.</span>";
            }
            if ($newpass1 != $newpass2) {
                $newpass_error = "<span class='error'>The password fields did not match.</span>";
                $err = '1';
            }
            if ($err == '0') {
                /* Update the details */
                $newpass = sha1($newpass1);
                $update = "UPDATE users SET password=? WHERE id=?";
                $query = $bdd->prepare($update);
                $query->execute(array($newpass,$id));
                $query->CloseCursor();
                $notification = "<div class='notification'>Your password has been updated.</div>";
            }
        }
        if (isset($_POST['Update'])) {
            /* update the email address */
            $email = $_POST['email'];
            $origemail = $_POST['origemail'];
            $checkpass = $_POST['password'];
            $err = '0';
            /* Check the password is correct */
            if (sha1($checkpass) != $password) {
                $update_passerror = "<span class='error'>Your password was incorrect.</span>";
                $err = '1';
            }
            $emailUsed = $bdd->query('SELECT email FROM users');
            while ($emailData = $emailUsed->fetch())
            {
                if ($email == $emailData['email']) {
                    $email_error = '<span class="error">The E-mail address: \'' . $sub_email . '\' is in use with another acount.</span>';
                    $err = '1';
                }
            }
            if ($email == $origemail) {
                $email_error = "<span class='error'>There was no email address to change.</span>";
                $err = '1';
            }
            $emailUsed->CloseCursor();
            if ($err == '0') {
                /* Update the details */
                $update = "UPDATE users SET email=? WHERE id=?";
                $query = $bdd->prepare($update);
                $query->execute(array($email,$id));
                $query->CloseCursor();
                $notification = "<div class='notification'>Your email address has been updated.</div>";
            }
        }
        echo $notification;
        ?>
        <form method="post" style="width:400px; margin: auto;">
            <label>Name:</label><br>
            <input type="text" name="name" class="form" value="<?php echo $name; ?>" disabled><br>
            <br>
            <label>Email address:</label><span class="error">*</span> <?php echo $email_error; ?><br>
            <input type="text" name="email" class="form" value="<?php echo $email; ?>"><br>
            <input type="hidden" name="origemail" value="<?php echo $email; ?>" />
            <br>
            <label>Password:</label><span class="error">*</span> <?php echo $update_passerror; ?><br>
            <input type="password" name="password" class="form"><br>
            <br>
            <button name="Update" value="submit" type="submit" class="formbutton">Update</button>
        </form><br>
        <br>
        <form method="post" style="width:400px; margin: auto;">
            <label>Current Password:</label><span class="error">*</span> <?php echo $currentpass_error; ?><br>
            <input type="password" name="currentpass" class="form"><br>
            <br>
            <label>New Password::</label><span class="error">*</span> <?php echo $newpass_error; ?><br>
            <input type="password" name="newpass1" class="form"><br>
            <input type="password" name="newpass2" class="form"><br>
            <br>
            <button name="ChangePass" value="submit" type="submit" class="formbutton">Change Password</button>
        </form>
        <?php
    } elseif($mode == 'logout') {
        /* Start the session */
        session_start();
        /* Destroy the session to ensure the cookie is deleted */
        session_destroy();
        /* Redirect the user to the my account page, if the session has been destroyed the page will auto direct to the login page */
        if($seo == '1') {
            echo '<meta http-equiv="refresh" content="0; url=!Accounts-my_account.html">';
        } else {
            echo '<meta http-equiv="refresh" content="0; url=?page=!Accounts&mode=my_account">';
        }
    }
} else {
    echo '<span style="color: red; font-size:22px;">User accounts are disabled.</span>';
}
?>