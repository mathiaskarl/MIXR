<?php
    if(isset($_POST['url']) && $_POST['url'] == true) {
        require "../include/ajax_includes.php";
        require "../include/ajax/header_includes.php";
    }
 ?>

<div style="width: 750px;margin: 0px auto 0px auto;">
    
    <h3><b>Oh, hi there!</b></h3> 
    If you are here, you are either curious about the content of this page<br />
    or you are uncertain of how <b>MIXR</b> works!<br />
    If the latter is the case, you have come to the right place!<br />
    On this page you will find all the relevant information to get you started with using <b>MIXR</b>!<br />
    To read on, either keep on scrolling or select a topic from the list below!<br /><br />
    

    <a href="#crt&lgn"><b>- Creating a user and logging in</b></a><br />
    <a href="#getpassword"><b>- Forgot your password?</b></a><br />
    <a href="#discover"><b>- Discover new music</b></a><br />
    <a href="#manage"><b>- Manage your favourite music</b></a><br />
    <a href="#prefs"><b>- Edit your preferences</b></a><br />
    <a href="#newpassword"><b>- Change your password</b></a><br />

    <br /><br />

    <div id="crt&lgn">
        <b>Creating a user and logging in</b><br /><br />
        
        When you first enter this site, you will find these buttons<br />
        in the top right corner of your browser window:<br /><br />
        <img src="images/howto/CreateUserLoginPic.png"><br /><br />
        If you haven't created user-profile yet,
        you will want to press the button marked "<b>Create User</b>".<br />
        This will take you the following formula:<br /><br />
        <img src="images/howto/CreateForm.png"><br /><br />
        To create a user-profile, the first step is to fill out the above formula.<br />
        You are required to provide:<br /><br />
        - A valid email address<br />
        - A suiting username<br />
        - A valid password<br /><br />
        Once these fields have been filled out correctly, you can press<br /> 
        the button marked "<b>Create</b>" and you will be sent on to the next step.<br />
        If, however, you want to clear all you entries, please press "<b>Reset fields</b>."<br /><br />
        
        If all your data has been accepted, you will be presented with the formula below:
        <br /><br />
        <img src="images/howto/CreatePrefs.png"><br /><br />
        Here you will be required to choose an age group and, if you'd like,<br />
        your preferences in regards to music genres.<br />
        Your age group and genre preferences can be changed at your will,<br />
        after you have finished creating your profile.<br /><br />
        
        Once again, if you want to clear all your entries, please press "<b>Reset fields</b>."<br />
        Otherwise, click the button marked "<b>Create</b>" and your profile should now be created.<br /><br />
        
        Once you have gone through these steps, you should automatically be logged in to <b>MIXR</b>.<br /><br />
        If you already have an account, you can log in by pressing the button marked "<b>Login</b>"<br />
        in the upper right corner, next to the "<b>Create user</b>" button.<br />
        You will then be asked to input your email or username, as well as your password.<br /><br />
    </div>
    
    <br />
    <div id="getpassword">
        <b>Forgot your password?</b>
    </div>
    <br />
    <div id="discover">
        <b>Discover new music</b>
    </div>
    <br />
    <div id="manage">
        <b>Manage your favourite music</b>
    </div>
    <br />
    <div id="prefs">
        <b>Edit your preferences</b><br /><br />
        If you would like to edit your age group or your default music preferences,<br />
        you can do so by pressing the "<b>Settings</b>" button in the top right corner<br />
        followed by pressing the tab marked "<b>Preferences</b>", as shown below.<br /><br />
        <img src="images/howto/temp.png"><br /><br />
        You will then be presented with the following form, that will allow you to change<br /> 
        your age group, as well as adding and removing content to your preferred musical genres.<br /><br />
        <img src="images/howto/temp.png"><br /><br />
        When you are done editing your preferences, simply press the button marked "<b>Change preferences</b>"<br />
        and your new preferences will be saved to your account.
    </div>
    <br />
    <div id="newpassword">
        <b>Change your password</b>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    
</div>