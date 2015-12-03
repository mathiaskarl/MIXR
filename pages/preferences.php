<?php
if(isset($_POST['url']) && $_POST['url'] == true) {
    require "../include/ajax_includes.php";
    require "../include/ajax/header_includes.php";
}

if (!$loginHandler->check_login()) {
    ErrorHandler::ErrorPage("USER_MUST_BE_LOGGED_IN");
} else {

    switch (isset($_REQUEST["step"]) ? $_REQUEST['step'] : null) {
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
                                    <input type='button' class='change_password' name='submit' value='Submit Change'>
                        </table>
                    </div>
                ";
            break;

        case 'preferences':
            echo "
                    <div id='loginContainer'>
                        <form name='preferences' method='post' action''>
                        <table valign='top'>
                        <tbody>
                        <tr>
                            <td>
                            <div class='label'>Select Your Age:</div>";
            $ageGroups = $service->GetAgeGroups(new GetAgeGroups())->GetAgeGroupsResult;
            foreach (getObjectsFromList($ageGroups) as $value) {
                echo "<input type='radio' name='agegroup' value='" . $value->Id . "'";
                if ($loginHandler->user_session()->AgeGroupId == $value->Id) {
                    echo "checked";
                }
                echo ">" . $value->Name;
            }

            echo " </td>
                    </tr>
                    <tr> 
                        <td>
                            <div class='label'>Select Your Favorite Genres:</div>";
            $genres = $service->GetGenres(new GetGenres())->GetGenresResult;
            foreach (getObjectsFromList($genres) as $value) {
                echo "<input type='checkbox' name='genres[]' value='" . $value->Id . "'";
                if (isset($loginHandler->user_session()->PreferedGenres->Genre)) {
                    foreach (is_array($loginHandler->user_session()->PreferedGenres->Genre) ? $loginHandler->user_session()->PreferedGenres->Genre : $loginHandler->user_session()->PreferedGenres  as $checked_value) {
                        if ($checked_value->Id == $value->Id) {
                            echo "checked";
                        }
                    }
                }
                echo ">" . $value->Name;
            }
            echo "<tr>
                    <td>
                        <input type='button' name='submit' value='Update' class='change_preferences' style='margin-right:10px;'>
                    </td>
                </tr>
                    </td>
                    </tr>
                    </table>
                    </form>
                </div>";
            break;

        default:
            ErrorHandler::ErrorPage("PAGE_DOESNT_EXIST");
            break;
    }
}
?>