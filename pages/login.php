<?php
switch (isset($_GET['do']) ? $_GET['do'] : null) {
    case 'logout':
        $loginHandler->log_out();
        header('Location: http://localhost:8080/MIXR/');
        die();
        break;

    default:
        if ($loginHandler->check_login()) {
            header('Location: http://localhost:8080/MIXR/');
            die();
        }
        if (isset($_POST['submit'])) {
            if ($loginHandler->check_login($_POST['username'], $_POST['password'], $_POST['token'])) {
                header('Location: http://localhost:8080/MIXR/');
                die();
            } else {
                ErrorHandler::DisplayError($loginHandler->_error->ErrorMessage, false);
            }
        }
        echo "
    <div id='login_container'>
	<form name='submit' method='post' action=''>
        <input type='hidden' name='token' value='" . $config->token . "'>
	<table valign='top'>
	<tbody>
        <tr>
            <td>
                <div class='label'>Username:</div>
                <input type='text' name='username' value='' class='login_input' size='25'>
            </td>
	</tr>
	<tr>
            <td>
                <div class='label'>Password:</div>
                <input type='password' name='password' value='' class='login_input' size='25'>
            </td>
	</tr>
	<tr>
            <td>
                <input type='submit' name='submit' value='Login' class='login_button' style='margin-right:10px;'><input type='reset' name='reset' value='Reset fields' class='login_button'>
            </td>
	</tr>
	</tbody>
        </table>
	</form>
    </div>
     ";
        break;
}
?>