<!DOCTYPE html> 
<html lang="th"> 
 57 
<head> 
    <title>Push Messages</title> 
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style> 
        .head-form h1 { 
            padding-top: 30px; 
            padding-bottom: 50px; 
        } 
        #myModal { 
            margin-top: 100px; 
        } 
        .button-sc .button { 
            margin-bottom: 30px; 
            margin-top: 20px; 
        } 
    </style> 
</head> 
<body> 
    <div class="container"> 
        <div class="row"> 
            <div class="col-xs-12 head-form"> 
                <h1 align = "center">Push Massages</h1> 
            </div> 
             
            <div class="col-md-8 col-md-offset-2"> 
                <form method="post"> 
                    <div class="form-group"> 
                        <label>Line@</label><br> 
                            <input type="radio"  class="btn btn-primary"  value="f9/uoIUNEP1kL2paNPKAH+EGLrCz2VYyDLRzADLiG6cUM838OEmvwuLDaHOX8Y8gQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBcssXN77lyH4cRgzSRe+ubJT6jlMGO8SmAXXZaS0FNIeAQdB04t89/1O/w1cDnyilFU=" name="tokenLine"> Line@ffon</input> 
                            <input type="radio"  class="btn btn-primary"  value="xV/huVeGtwzqkP96ryoZdb3X0BHoAyuIXaXlIbf2axHa+CTebqsx8np2B8jQGVhnm31zNpHaY6lIWJ0LRzIqnxsgrBt0a+dKb56qqBmOlDttf2ciCpLUM4jXevfZFg1pqEJjUsahi4On8qIg1ocUWgdB04t89/1O/w1cDnyilFU=" name="tokenLine"> Line@oil</input> 
                         <br> 
                        <label>Text</label> 
                        <textarea class="form-control" rows="8" id="textArea" name="textArea"></textarea> 
                    </div> 
                     
                    <!--buttonMember--> 
                    <div class="form-group" align="center"> 
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin-top:30px;margin-bottom:20px;"> 
                        MEMBER 
                        </button> 
                    </div> 
                    <!--Modal--> 
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
                        <form method="post"> 
                            <div class="modal-dialog" role="document"> 
                                <div class="modal-content"> 
                                    <div class="modal-header"> 
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                        <h4 class="modal-title" id="myModalLabel">Member</h4> 
                                    </div> 
                                    <div class="container"> 
                                          
                                        <div class="checkbox"> 
                                            <label><input type="checkbox" value="Ub5fea2ff169cba24b2179fd33e59e454" name="mid[0]">oil</label> 
                                        </div> 
                                        <div class="checkbox"> 
                                            <label><input type="checkbox" value="U7de80d0a2ceea863e831375badd2eb55" name="mid[1]">ffon</label> 
                                        </div> 
                                    </div> 
                                    <div class="modal-footer"> 
                                        <button type="submit" class="btn btn-primary" name="submit">Summit</button> 
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
                                    </div> 
                                </div> 
                            </div> 
                        </form> 
                         
                    </div> 

                    <!--submitCancel--> 
<!--                     <div class="button-sc text-center"> 
                        <button type="submit" class="btn btn-primary">Submit</button> 
                        <button type="cancel" class="btn btn-default" style="margin-right:10px;">Cancel</button> 
                    </div> --> 
                </form> 
            </div> 
        </div> 
    </div> 

    <script> 
        $('#myModal').on('shown.bs.modal', function () { 
            $('#myInput').focus() 
        }) 
    </script> 

 

<?php 
    // *** Configuration *** 
    $proxy = 'if_u_want_to_fix_url';
    $proxyauth = 'if_u_want_to_fix_url';   
    $strAccessToken = "Token";
     
    //  *** Input *** 
    $text           = $_POST['textArea']; 
    $midUser        = $_POST['mid'];   
    $strAccessToken = $_POST['tokenLine']; 
     
    // *** Display Data *** 
    echo("this is toke : $strAccessToken \n"); 
    //var_dump($strAccessToken) ; 
    echo("this is mid : $midUser \n"); 
    //var_dump($midUser) ; 
    echo("this is text : $text \n"); 
    //var_dump($text) ; 

 
    // *** Params *** 
    $messages = array( 
            "type" => "text", 
            "text" => $text  
         ); 
          
    $header = array( 
            'Content-Type: application/json', 
            'Authorization: Bearer ' . $strAccessToken 
            );    
     
    function send_line_msg($post_data,$header){ 
        $url = 'https://api.line.me/v2/bot/message/push'; 
         
        $ch = curl_init($url); 
        $result =""; 
        try{ 
            curl_setopt($ch, CURLOPT_POST, true); 
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data)); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header); 
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
            $result = curl_exec($ch); 
            if($result['http_code'] != 200) 
            { 
               print "<br>---------<br>"; 
               var_dump($result);  
            } 
        }catch(exception $e) 
        { 
            print "<br>---------<br>"; 
            var_dump($result); 
        } 
        curl_close($ch); 
    } 
     
             
    //  Loop Send Line msg 
    $i =1;           
    foreach($midUser as $key => $mid) 
    {         
        print $i++ . ":send"; 
        $post_data = array( 
            "to"        => $mid, 
            "messages"  => [$messages] 
        ); 
       
        send_line_msg($post_data,$header); 
    } 
  
 ?> 
</body> 

</html>
