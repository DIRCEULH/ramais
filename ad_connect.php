<?php

$ldapconfig['host']= '#'; 
$domain= '#';
$username = '#';
$password = base64_decode('#');

$sn= ldap_connect($ldapconfig['host']);
ldap_set_option($sn, LDAP_OPT_PROTOCOL_VERSION, 3);
ldap_set_option($sn, LDAP_OPT_REFERRALS, 0);

$filterUrl = !empty($_REQUEST['filtro']) ? $_REQUEST['filtro'] : "";

$bind= @ldap_bind($sn, $username."@".$domain , $password);

if (!empty($filterUrl)
    && $filterUrl != 'Administrativo Vendas'
    && $filterUrl != 'TI' 
    && $filterUrl != 'Televendas'
    && $filterUrl != 'Diretoria'
    && $filterUrl != 'Recursos Humanos'
    && $filterUrl != 'Engenharia'
    && $filterUrl != 'Marketing'
    && $filterUrl != 'Expedição'
    && $filterUrl != 'Qualidade'
    && $filterUrl != 'Logistica'
    && $filterUrl != 'Laboratório'
    && $filterUrl != 'Almoxarifado'

    ) {
   $filter = "(name=*$filterUrl*)";
}

if ($filterUrl == 'Administrativo Vendas'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Almoxarifado'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'TI'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Laboratório'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Engenharia'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Marketing'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Recursos Humanos'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Diretoria'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Televendas'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Expedição'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Qualidade'){
        $filter = "(department=$filterUrl)";

}

if ($filterUrl == 'Logistica'){
        $filter = "(department=$filterUrl)";

}

if (empty($filterUrl)) {
   $filter =  "(objectClass=user)"; 
}



$search = ldap_search($sn,'DC=#, DC=local', $filter );

if (!$search ) {

        print_r('Erro ao conectar ldap');
        
}

$data = ldap_get_entries($sn, $search);

$arrayData = [];


        foreach ($data as $key=>$value){  
                

                if ( !empty( $value["lastlogon"][0] )   & !empty($value["name"][0]) & !empty($value["department"][0]) & !empty($value["description"][0]) & !empty($value["telephonenumber"][0])) {
                        
                        $lastLogon = $value["lastlogon"][0];

                        $inactiveThreshold = 30 * 24 * 60 * 60; 
            
                        $lastLogonDate = date("Y-m-d H:i:s", ($lastLogon / 10000000) - 11644473600);
            
                        $status = strtotime($lastLogonDate) < (time() - $inactiveThreshold);

                        if ( $status == false ) {

                        $arrayData []=  array(
                                        'nome'=>tirarAcentos($value["name"][0]),
                                        'departamento'=>$value["department"][0],
                                        'cargo'=>$value["description"][0],
                                        'ramal'=>$value["telephonenumber"][0]
                                        );

                                }
                               // sort ($arrayData);
                
                }

                
        }

        function compareASCII($a, $b) {
                $at = iconv('UTF-8', 'ASCII//TRANSLIT', $a);
                $bt = iconv('UTF-8', 'ASCII//TRANSLIT', $b);
                return strcmp($at, $bt);
            }

 array_multisort($arrayData, SORT_ASC);
 
 print_r(json_encode($arrayData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));


 function tirarAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

require_once ('log.rest.php');

 ?>