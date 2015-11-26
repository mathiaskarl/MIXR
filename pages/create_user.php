<?php

if ($loginHandler->check_login()) {
    header('Location: http://localhost:8080/MIXR/');
    die();
}
switch (isset($_GET['step'])) {
    case '2':
        if(!isset($_SESSION['user_create'])) {
            header('Location: http://localhost:8080/MIXR/?page=create_user');
            die();
        }
        if (isset($_POST['submit'])) {
            if ($userHandler->create_user((isset($_POST['agegroup']) ? $_POST['agegroup'] : null), $_POST['genres'])) {
                if(!$loginHandler->check_login($userHandler->get_prepare_session()->Username, $userHandler->get_prepare_session()->Password, $config->token)) {
                    echo "nej";
                } else {
                $userHandler->unset_prepare_session();
                header('Location: http://localhost:8080/MIXR/');
                die();
                }
            } else {
                echo $userHandler->_error->ErrorMessage;
            }
        }
        $ageGroups = $service->GetAgeGroups(new GetAgeGroups())->GetAgeGroupsResult;
        $genres = $service->GetGenres(new GetGenres())->GetGenresResult;
        echo "
        <div id='login_container'>
            <form name='submit' method='post' action='?page=create_user&step=2'>
            <table valign='top'>
            <tbody>
            <tr>
                <td>";
                foreach(getObjectsFromList($ageGroups) as $value) {
                    echo "<input type='radio' name='agegroup' value='".$value->Id."'";
                    if((isset($userHandler->get_prepare_session()->AgeGroupId) && $userHandler->get_prepare_session()->AgeGroupId == $value->Id) || isset($_POST['agegroup']) && $_POST['agegroup'] == $value->Id) {
                        echo "checked";
                    }
                    echo ">". $value->Name;
                }
                echo "</td>
            </tr>
            <tr>
                <td>";
                foreach(getObjectsFromList($genres) as $value) {
                    echo "<input type='checkbox' name='genres[]' value='".$value->Id."'";
                    if(isset($userHandler->get_prepare_session()->PreferedGenres)) {
                        foreach($userHandler->get_prepare_session()->PreferedGenres as $checked_value) {
                            if($checked_value->Id == $value->Id) {
                                echo "checked";
                            }
                        }
                    } else if (isset($_POST['genres'])) {
                        if($_POST['genres'] == $value->Id) {
                            echo "checked";
                        }
                    }
                    echo ">". $value->Name;
                }
                echo "</td>
            </tr>
            <tr>
                <td>
                    <input type='submit' name='submit' value='Create' class='login_button' style='margin-right:10px;'><input type='reset' name='reset' value='Reset fields' class='login_button'>
                </td>
            </tr>
            </tbody>
            </table>
            </form>
        </div>
         ";
        break;

    default:
        if (isset($_POST['submit'])) {
            if ($userHandler->prepare_create_user($_POST['email'], $_POST['username'], $_POST['password1'], $_POST['password2'], $_POST['token'])) {
                header('Location: http://localhost:8080/MIXR/index.php?page=create_user&step=2');
                die();
            } else {
                echo $userHandler->_error->ErrorMessage;
            }
        }
        if(isset($_SERVER['HTTP_REFERER']) && !strpos($_SERVER['HTTP_REFERER'], '?page=create_user&step=2')) {
            $userHandler->unset_prepare_session();
        }
        $defaultValue["Username"] = (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '?page=create_user&step=2') && isset($_SESSION['user_create']) ? $_SESSION['user_create']->Username : (isset($_POST['submit']) ? $_POST['username'] : "Username"));
        $defaultValue["Email"] = (isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '?page=create_user&step=2') && isset($_SESSION['user_create']) ? $_SESSION['user_create']->Email : (isset($_POST['submit']) ? $_POST['email'] : "Email"));
        echo "
    <div id='login_container'>
	<form name='submit' method='post' action=''>
        <input type='hidden' name='token' value='" . $config->token . "'>
	<table valign='top'>
	<tbody>
        <tr>
            <td>
                <input type='text' name='email' value='".$defaultValue['Email']."' class='login_input' size='25'>
            </td>
	</tr>
	<tr>
            <td>
                <input type='text' name='username' value='".$defaultValue['Username']."' class='login_input' size='25'>
            </td>
	</tr>
        <tr>
            <td>
                <input type='password' name='password1' value='' class='login_input' size='25'>
            </td>
	</tr>
        <tr>
            <td>
                <input type='password' name='password2' value='' class='login_input' size='25'>
            </td>
	</tr>
	<tr>
            <td>
                <input type='submit' name='submit' value='Create' class='login_button' style='margin-right:10px;'><input type='reset' name='reset' value='Reset fields' class='login_button'>
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