<?php
class User {
  public $AgeGroupId; // int
  public $Email; // string
  public $Id; // int
  public $Password; // string
  public $PreferedGenres; // ArrayOfGenre
  public $Username; // string
}

class Genre {
  public $Id; // int
  public $Name; // string
}

class AgeGroup {
  public $Id; // int
  public $Name; // string
}

class Error {
  public $ErrorCode; // string
  public $ErrorMessage; // string
}

class CreateUser {
  public $user; // User
}

class CreateUserResponse {
  public $CreateUserResult; // boolean
}

class Login {
  public $username; // string
  public $password; // string
}

class LoginResponse {
  public $LoginResult; // boolean
}

class ChangePassword {
  public $user; // User
  public $oldPassword; // string
  public $newPassword; // string
}

class ChangePasswordResponse {
  public $ChangePasswordResult; // boolean
}

class ChangeGenres {
  public $user; // User
  public $genres; // ArrayOfGenre
}

class ChangeGenresResponse {
  public $ChangeGenresResult; // boolean
}

class GetUser {
}

class GetUserResponse {
  public $GetUserResult; // User
}

class GetAgeGroups {
}

class GetAgeGroupsResponse {
  public $GetAgeGroupsResult; // ArrayOfAgeGroup
}

class GetGenres {
}

class GetGenresResponse {
  public $GetGenresResult; // ArrayOfGenre
}

class CheckUsernameEmailExists {
  public $user; // string
}

class CheckUsernameEmailExistsResponse {
  public $CheckUsernameEmailExistsResult; // boolean
}

class ReturnError {
}

class ReturnErrorResponse {
  public $ReturnErrorResult; // Error
}

class char {
}

class duration {
}

class guid {
}


/**
 * Service class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class Service extends SoapClient {

  private static $classmap = array(
                                    'User' => 'User',
                                    'Genre' => 'Genre',
                                    'AgeGroup' => 'AgeGroup',
                                    'Error' => 'Error',
                                    'CreateUser' => 'CreateUser',
                                    'CreateUserResponse' => 'CreateUserResponse',
                                    'Login' => 'Login',
                                    'LoginResponse' => 'LoginResponse',
                                    'ChangePassword' => 'ChangePassword',
                                    'ChangePasswordResponse' => 'ChangePasswordResponse',
                                    'ChangeGenres' => 'ChangeGenres',
                                    'ChangeGenresResponse' => 'ChangeGenresResponse',
                                    'GetUser' => 'GetUser',
                                    'GetUserResponse' => 'GetUserResponse',
                                    'GetAgeGroups' => 'GetAgeGroups',
                                    'GetAgeGroupsResponse' => 'GetAgeGroupsResponse',
                                    'GetGenres' => 'GetGenres',
                                    'GetGenresResponse' => 'GetGenresResponse',
                                    'CheckUsernameEmailExists' => 'CheckUsernameEmailExists',
                                    'CheckUsernameEmailExistsResponse' => 'CheckUsernameEmailExistsResponse',
                                    'ReturnError' => 'ReturnError',
                                    'ReturnErrorResponse' => 'ReturnErrorResponse',
                                    'char' => 'char',
                                    'duration' => 'duration',
                                    'guid' => 'guid',
                                   );

  public function Service($wsdl = "http://localhost:4832/Services/Service.svc?wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param CreateUser $parameters
   * @return CreateUserResponse
   */
  public function CreateUser(CreateUser $parameters) {
    return $this->__soapCall('CreateUser', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Login $parameters
   * @return LoginResponse
   */
  public function Login(Login $parameters) {
    return $this->__soapCall('Login', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param ChangePassword $parameters
   * @return ChangePasswordResponse
   */
  public function ChangePassword(ChangePassword $parameters) {
    return $this->__soapCall('ChangePassword', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param ChangeGenres $parameters
   * @return ChangeGenresResponse
   */
  public function ChangeGenres(ChangeGenres $parameters) {
    return $this->__soapCall('ChangeGenres', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetUser $parameters
   * @return GetUserResponse
   */
  public function GetUser(GetUser $parameters) {
    return $this->__soapCall('GetUser', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetAgeGroups $parameters
   * @return GetAgeGroupsResponse
   */
  public function GetAgeGroups(GetAgeGroups $parameters) {
    return $this->__soapCall('GetAgeGroups', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param GetGenres $parameters
   * @return GetGenresResponse
   */
  public function GetGenres(GetGenres $parameters) {
    return $this->__soapCall('GetGenres', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param CheckUsernameEmailExists $parameters
   * @return CheckUsernameEmailExistsResponse
   */
  public function CheckUsernameEmailExists(CheckUsernameEmailExists $parameters) {
    return $this->__soapCall('CheckUsernameEmailExists', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param ReturnError $parameters
   * @return ReturnErrorResponse
   */
  public function ReturnError(ReturnError $parameters) {
    return $this->__soapCall('ReturnError', array($parameters),       array(
            'uri' => 'http://tempuri.org/',
            'soapaction' => ''
           )
      );
  }

}

?>
