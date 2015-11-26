<?php
if ($loginHandler->check_login()) {
    switch (isset($_GET["step"])) {
        case 'password':
            echo "
                <form name='password' method='post' action=''>
                <h1>Change Password:</h1>
                <div id='changePassword'>
                    <table valign='top'>
                        <tr>
                            <td>
                                <div class='label'>Old Password:</div>
                                <input name='oldPassword' type='password' value='' class='login_input'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class='label'>Enter New Password:</div>
                                <input name='newPassword1' type='password' value='' class='login_input'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class='label'>Repeat New Password:</div>
                                <input name='newPassword2' type='password' value='' class='login_input'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type='submit' name='submit' value='Submit Change'>
                    </table>
                </div>
            ";
            if (isset($_POST["submit"])) {
                if ($userHandler->change_password($loginHandler->user_session(), $_POST["oldPassword"], $_POST["newPassword1"], $_POST["newPassword2"])) {
                    $loginHandler->user_session()->Password = $_POST["newPassword1"];
                    echo "<p>Password Changed</p>";
                } else {
                    echo "<p>" . $userHandler->_error->ErrorMessage . "</p>";
                }

                
            }
            break;
            }
        
}


?>