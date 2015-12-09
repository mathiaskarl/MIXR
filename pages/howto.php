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
        <img src="images/howto/CreatePrefs.png"><br /><br />
        
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
        <b>Edit your preferences</b>
    </div>
    <br />
    <div id="newpassword">
        <b>Change your password</b>
    </div>
    <br /><br /><br /><br /><br /><br /><br /><br /><br />
    
</div>