<?php

    function pname($link, $pcode)
    {
    $rg_query = mysqli_query($link,"select pname from tproducts where pID='$pcode'"); // select query
    $rg = mysqli_fetch_array($rg_query);
    if (isset($rg['pname'])){return $rg['pname'];}else{$Other ="Not Available";return $Other;}
    }

    function payment_option_name($link, $ocode)
    {
    $rg_query = mysqli_query($link,"select oName from payment_options where(oID='$ocode')"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['oName'])){return $rg['oName'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_status($link, $scode)
    {
    $rg_query = mysqli_query($link,"select status from hh_project_status where id='$scode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['status'])){return $rg['status'];}else{$Other ="Not Available";return $Other;}
    }

    function product_cost($link, $pcode)
    {
    $rg_query = mysqli_query($link,"select pCost from tproducts where pID='$pcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['pCost'])){return $rg['pCost'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_selected_product($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select selected_product from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['selected_product'])){return $rg['selected_product'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_payment_option($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select pOption from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['pOption'])){return $rg['pOption'];}else{$Other ="Not Available";return $Other;}
    }

    function contractor_name($link, $ccode)
    {
    $rg_query = mysqli_query($link,"select cname from tcontractor where id='$ccode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['cname'])){return $rg['cname'];}else{$Other ="Not Available";return $Other;}
    }

    function pstatus($link, $s_code)
    {
    $rg_query = mysqli_query($link,"select status from tproject_status where id='$s_code'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['status'])){return $rg['status'];}else{$Other ="Not Available";return $Other;}
    }
    
    function ap_name($link, $apID)
    {
    $dis_query = mysqli_query($link,"select pa_ from adminposts where id='$apID'"); // select query
    $dis = mysqli_fetch_array($dis_query); 
    if (isset($rg['pa_'])){return $rg['pa_'];}else{$Other ="Not Available";return $Other;}
    }

    function locality_name($link, $localityID)
    {
    $bairo_query = mysqli_query($link,"select bairro from bairros where id='$localityID'"); // select query
    $bair = mysqli_fetch_array($bairo_query); 
    if (isset($rg['bairro'])){return $rg['bairro'];}else{$Other ="Not Available";return $Other;}
    }

    function current_toilet($link, $toiletID)
    {
    $toilet_query = mysqli_query($link,"select type_ from hh_latrine where id='$toiletID'"); // select query
    $toil = mysqli_fetch_array($toilet_query); 
    if (isset($rg['type_'])){return $rg['type_'];}else{$Other ="Not Available";return $Other;}
    }

    function bairro_name($link, $bairroID)
    {
    $dis_query = mysqli_query($link,"select bairro from bairros where id='$bairroID'"); // select query
    $dis = mysqli_fetch_array($dis_query); 
    if (isset($rg['bairro'])){return $rg['bairro'];}else{$Other ="Not Available";return $Other;}
    }

    function area_name($link, $acode)
    {
    $rg_query = mysqli_query($link,"select aname from areas where areacode='$acode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['aname'])){return $rg['aname'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_name($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select hhname from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['hhname'])){return $rg['hhname'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_id_found($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select phhcode from tprojects where phhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if ($rg['phhcode'] <> "")
    {return true;} else{return false;;}
    }

    function hh_plot($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select plot from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['plot'])){return $rg['plot'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_enroll_check($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select enrolled from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['enrolled'])){return $rg['enrolled'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_product_approved_check($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select product_approved from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['product_approved'])){return $rg['product_approved'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_ready_select_check($link, $hcode)
    {
    $rg_query = mysqli_query($link,"select ready_selection from households where hhcode='$hcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['ready_selection'])){return $rg['ready_selection'];}else{$Other ="Not Available";return $Other;}
    }


    function role_name($link, $rcode)
    {
    $rg_query = mysqli_query($link,"select rolename from userroles where roleid='$rcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['rolename'])){return $rg['rolename'];}else{$Other ="Not Available";return $Other;}
    }

    function agecat_name($link, $agecode)
    {
    $rg_query = mysqli_query($link,"select cat from age_category where id='$agecode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['cat'])){return $rg['cat'];}else{$Other ="Not Available";return $Other;}
    }

    function superstructure($link, $id)
    {
    $rg_query = mysqli_query($link,"select struct from superstruct where id='$id'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['struct'])){return $rg['struct'];}else{$Other ="Not Available";return $Other;}
    }

    function livelihood_name($link, $livecode)
    {
    $rg_query = mysqli_query($link,"select livelihood from main_livelihood where id='$livecode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['livelihood'])){return $rg['livelihood'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_income($link, $incode)
    {
    $rg_query = mysqli_query($link,"select income from month_income where id='$incode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['income'])){return $rg['income'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_homestatus($link, $hscode)
    {
    $rg_query = mysqli_query($link,"select status_ from home_status where id='$hscode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['status_'])){return $rg['status_'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_lzone($link, $hslcode)
    {
    $rg_query = mysqli_query($link,"select l_zone from location_zone where id='$hslcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['l_zone'])){return $rg['l_zone'];}else{$Other ="Not Available";return $Other;}
    }

    function hh_latrine($link, $hhlcode)
    {
    $rg_query = mysqli_query($link,"select type_ from hh_latrine where id='$hhlcode'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['type_'])){return $rg['type_'];}else{$Other ="Not Available";return $Other;}
    }


    function userid($link, $code)
    {
    $rg_query = mysqli_query($link,"select id from users where usercon='$code'"); // select query
    $rg = mysqli_fetch_array($rg_query); 
    if (isset($rg['id'])){return $rg['id'];}else{$Other ="Not Available";return $Other;}
    }
    
?>