<?php 
function sendEmailRecipts($order_id,$paytype){
    global $conn;
    $sqlorder = "SELECT * from `order` WHERE id =".$order_id;
    $order_rs = mysqli_query($conn,$sqlorder);
    $order_res = mysqli_fetch_assoc($order_rs);
    $sqlprod = "SELECT * from order_product WHERE order_id =".$order_id;
    
    $select_items = mysqli_query($conn,$sqlprod);
    $itemdetailsUser="";
    $itemlistinvoice = '';
    while($data=mysqli_fetch_assoc($select_items)){      
    $itemdetailsUser .='<tr><td colspan="4">&nbsp;</td></tr><tr>
                    <td width="600" style="text-align:left"><strong>'.$data['name'].'</strong></td>
                    <td width="131" align="left"><strong>'.curr.number_format($data['price'],2).' X</strong></td>
                    <td width="100" align="left"><strong>'.$data['quantity'].'</strong></td>                    
                    <td width="142" align="right"><strong>'.curr.number_format($data['total'],2).'</strong></td>
                </tr><tr><td colspan="4">&nbsp;</td></tr>';
                
                $itemlistinvoice .='<tr><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;" colspan="2">'.$data['name'].'</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.curr.number_format($data['price'],2).'</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$data['quantity'].'</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.curr.number_format($data['total'],2).'</td></tr><tr>';
                
    }
    
    $txtCharge="PREPAID: Do Not Charge";
    $last_id=$order_res['id'];  
    $x_email=$order_res['email_address'];
    $first_name = $order_res['first_name'];
    $CardHoldersName=$order_res['first_name'].' '.$order_res['first_name'];
    $total_amount =$order_res['totalamount'];
    $subtotal =$order_res['subtotal'];
    $dateadded=$order_res['dateadded'];
    $address=$order_res['address'];
    $delivery_charge=$order_res['deliverycharge'];
    $paytype = $order_res['paymentmethod'];
    $phone_number    = $order_res['phone_number'];
    $sgst    = $order_res['sgst'];
    $cgst    = $order_res['cgst'];
     $paymentmethod    = $order_res['paymentmethod'];
    
    $site_name = 'Online Order '.Site_NAME;
    $eol = "\r\n";
    $eol = "\r\n<br />";
    $thanks_text = $eol.$eol.'Thanks!'. $eol; 
    
        #Send succes email to user
        $email_tpl = '';
        $emailrecipts=file_get_contents(website."include/emailRecipttemplate.html");
        $getarr=array("##restname##","##siteurl##","##sitelogo##","##orderid##","##firstname##","##fulname##", "##deladdress##","##paymentdate##",'##orderitem##', '##groundtotal##','##deliverycharge##','##total##','##paymenttype##','##restcontactno##','##orderid##','##restemail##','##cust_phone##','##custemail##','##paytype##','##txtcharge##','##Subtotal##','##sgst##','##cgst##','##totalamount##');
        
        $setarr=array(Site_NAME,website,website.'/assets/logo.png',$last_id,$first_name,$CardHoldersName,$address,$dateadded,$itemdetailsUser, $subtotal,curr.$delivery_charge,$total_amount,$paytype,Site_Contact,$last_id,owneremail,$phone_number,$x_email,$paymentmethod,$txtCharge,curr.$subtotal,curr.$sgst,curr.$cgst,curr.$total_amount);
        
        
        $newphrase = str_replace($getarr, $setarr, $emailrecipts);
        $email_tpl .= $newphrase. $eol;
        $email_tpl .= $eol . $thanks_text;
        //echo $email_tpl;die();
    $addresses = owneremail;
    $emaildata = array('to'=>$x_email,'toname'=>$CardHoldersName,'address'=>$addresses,'subject'=>'Order Invoice','html'=>$email_tpl,'body'=>'');    
    //sendemail($emaildata);
    return true;
}

function Recipts($order_id){
    global $conn;
    $sqlorder = "SELECT * from `order` WHERE id =".$order_id;
    $order_rs = mysqli_query($conn,$sqlorder);
    $order_res = mysqli_fetch_assoc($order_rs);
    $sqlprod = "SELECT * from order_product WHERE order_id =".$order_id;
    
    $select_items = mysqli_query($conn,$sqlprod);
    $itemdetailsUser="";
    $itemlistinvoice = '';
    while($data=mysqli_fetch_assoc($select_items)){      
    $itemdetailsUser .='<tr><td colspan="4">&nbsp;</td></tr><tr>
                    <td width="600" style="text-align:left"><strong>'.$data['name'].'</strong></td>
                    <td width="131" align="left"><strong>'.curr.number_format($data['price'],2).' X</strong></td>
                    <td width="100" align="left"><strong>'.$data['quantity'].'</strong></td>                    
                    <td width="142" align="right"><strong>'.curr.number_format($data['total'],2).'</strong></td>
                </tr><tr><td colspan="4">&nbsp;</td></tr>';
                
                $itemlistinvoice .='<tr><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;" colspan="2">'.$data['name'].'</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.curr.number_format($data['price'],2).'</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.$data['quantity'].'</td><td style="border: 1px solid #dddddd;text-align: left;padding: 8px;">'.curr.number_format($data['total'],2).'</td></tr><tr>';
                
    }
    
    $txtCharge="PREPAID: Do Not Charge";
    $last_id=$order_res['id'];  
    $x_email=$order_res['email_address'];
    $first_name = $order_res['first_name'];
    $CardHoldersName=$order_res['first_name'].' '.$order_res['first_name'];
    $total_amount =$order_res['totalamount'];
    $subtotal =$order_res['subtotal'];
    $dateadded=$order_res['dateadded'];
    $address=$order_res['address'];
    $delivery_charge=$order_res['deliverycharge'];
    $paytype = $order_res['paymentmethod'];
    $phone_number    = $order_res['phone_number'];
    $sgst    = $order_res['sgst'];
    $cgst    = $order_res['cgst'];
     $paymentmethod    = $order_res['paymentmethod'];
    
    $site_name = 'Online Order '.Site_NAME;
    $eol = "\r\n";
    $eol = "\r\n<br />";
    $thanks_text = $eol.$eol.'Thanks!'. $eol; 
    
        #Send succes email to user
        $email_tpl = '';
        $emailrecipts=file_get_contents(website."include/emailRecipttemplate.html");
        $getarr=array("##restname##","##siteurl##","##sitelogo##","##orderid##","##firstname##","##fulname##", "##deladdress##","##paymentdate##",'##orderitem##', '##groundtotal##','##deliverycharge##','##total##','##paymenttype##','##restcontactno##','##orderid##','##restemail##','##cust_phone##','##custemail##','##paytype##','##txtcharge##','##Subtotal##','##sgst##','##cgst##','##totalamount##');
        
        $setarr=array(Site_NAME,website,website.'/assets/logo.png',$last_id,$first_name,$CardHoldersName,$address,$dateadded,$itemdetailsUser, $subtotal,curr.$delivery_charge,$total_amount,$paytype,Site_Contact,$last_id,owneremail,$phone_number,$x_email,$paymentmethod,$txtCharge,curr.$subtotal,curr.$sgst,curr.$cgst,curr.$total_amount);
        
        
        $newphrase = str_replace($getarr, $setarr, $emailrecipts);
        $email_tpl .= $newphrase. $eol;
        $email_tpl .= $eol . $thanks_text;
        return $email_tpl;
        //echo $email_tpl;die();

}

function sendemail($val){
    /*sendemail $data = array('to'=>$to,'toname'=>$toname,'address'=>$address,'subject'=>$subject,'html'=>$html,'body'=>$body);*/
    
    
    require_once('phpmailerNew/class.phpmailer.php');
    $mail = new PHPMailer(true);    
    try {
        $mail->AddAddress($val['to'], $val['toname']);
        $mail->AddBCC($val['address']);
        $mail->Subject = $val['subject'];
        $mail->AltBody = $val['body'];
        // optional - MsgHTML will create an alternate automatically
          
        $mail->From = owneremail;
        $mail->FromName = Site_NAME;
        $mail->MsgHTML($val['html']);
        //$mail->AddAttachment($filenamePath);      // attachment 1       
        $mail->Send();
    } catch (phpmailerException $e) {
      echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
      echo $e->getMessage(); //Boring error messages from anything else!
    }
    return true;
}

?>