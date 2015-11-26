<?php
class ErrorHandler
{
    public static $Error;

    public static function ReturnError($errorCode = null)
    {
        ErrorHandler::$Error = ErrorHandler::SetErrorMessage($errorCode);
        return ErrorHandler::$Error;
    }

    private static function SetErrorMessage($errorCode = null)
    {
        $errorMessage;
        switch ($errorCode)
        {
            case "INVALID_FORM":
                $errorMessage = "You must use our webform.";
                break;
            
            case "EMPTY_FORM":
                $errorMessage = "You must fill out all fields";
                break;
            
            case "LOGIN_INVALID_DATA":
                $errorMessage = "You must enter correct data.";
                break;
            
            case "LOGIN_ALREADY_EXISTS":
                $errorMessage = "You are already logged in.";
                break;
            
            case "LOGIN_INVALID_INFO":
                $errorMessage = "Your email/username and password is not correct.";
                break;
            
            case "CREATE_USER_MISMATCH_PASSWORD":
                $errorMessage = "The passwords you entered does not match.";
                break;
            
            case "CREATE_INVALID_USERNAME":
                $errorMessage = "The username may only contain letters and numbers";
                break;
            
            case "CREATE_INVALID_EMAIL":
                $errorMessage = "The entered email is invalid.";
                break;
            
            case "CREATE_ENTER_STEP_ONE":
                $errorMessage = "You must fill out the fields from step one.";
                break;
            
            case "CREATE_USERNAME_TAKEN":
                $errorMessage = "Username already exists.";
                break;
            
            case "CREATE_EMAIL_TAKEN":
                $errorMessage = "This email is connected to another user.";
                break;

            default:
                $errorCode = "UNKOWN_ERROR";
                $errorMessage =  "Unknown error.";
                break;
        }
        return ErrorHAndler::CreateError($errorCode, $errorMessage);
    }

    public static function CreateError($errorCode, $errorMessage)
    {
        $error = new Error();
        $error->ErrorCode = $errorCode;
        $error->ErrorMessage = $errorMessage;
        return $error;
    }
}
