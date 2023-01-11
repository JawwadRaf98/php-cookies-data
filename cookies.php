
function createCookies($cookieName,$cookieValue, $_time=""){
    $time = empty($_time) ?  time() + (86400 * 365) : $_time; // for 1 year
    $path = "/";
    setcookie($cookieName, $cookieValue, $time, $path);
    
}
function updateCookies($cookieName,$cookieValue){
    if(isset($_COOKIE[$cookieName])){
        $this->createCookies($cookieName,$cookieValue);
    }
}
function deleteCookies($cookieName){
    $time = time() - 86400 ;
    
    if(is_array($cookieName)){
        foreach($cookieName as $key=>$value){
            $this->createCookies($value,"", $time);   
        }
    }else{
        $this->createCookies($cookieName,"", $time);  
    }
}


function getCookie($cookieName){
    if(isset($_COOKIE[$cookieName])){
        return $_COOKIE[$cookieName];
    }
}

function create_webLogin_cookies($data){
    $id = $data['acc_id'];
    $name = $data['acc_name'];
    $email = $data['acc_email'];
    $acc_role_type = $data['acc_role_type'];
    $token = trim($id, " ").':'.trim($email," ");
    $token = base64_encode($token);
    $this->createCookies('id', $id);
    $this->createCookies('userName', $name);
    $this->createCookies('email', $email);
    $this->createCookies('acc_role_type', $acc_role_type);
    $this->createCookies('token', $token);
    $PatientList = $this->createPatientList($id);
    $this->createCookies('patientList', $PatientList);
    
}