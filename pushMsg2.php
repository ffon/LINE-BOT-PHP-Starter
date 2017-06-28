<!DOCTYPE html>
<html lang="th">

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
                        <label>Text:</label>
                        <textarea class="form-control" rows="5" id="textArea" name="text"></textarea>
                    </div>
                    <!--buttonMember-->
                    <div class="form-group" align="center">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="margin-top:30px;margin-bottom:20px;">
                        MEMBER
                        </button>
                    </div>
                    <!--submitCancel-->
                    <div class="button-sc text-center">
                        <button type="cancel" class="btn btn-default" style="margin-right:10px;">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



<!--Modal-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Member</h4>
                </div>
                <div class="container">
                    <form method="post">
                        <div class="checkbox">
                            <label><input type="checkbox" value="U7de80d0a2ceea863e831375badd2eb55">ffon</label>
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" value="Ub5fea2ff169cba24b2179fd33e59e454">oil</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    
                    <button type="button" class="btn btn-primary" name="submit">Summit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').focus()
        })
    </script>



<?php
$proxy = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';
$proxyauth = 'http://fixie:f15Ug5dvUX8MX7F@velodrome.usefixie.com:80';  
$text = $_POST['textArea'];
$midUser = $_POST['value'];
$strAccessToken = "QQ4FDBydERg5R34tFiff7M+OOuRNzYKDA/btJh4Whsgl0ztKiDparY2v3TyaoL1LQPMU/R+dN8JPUEl4UZ3VdcnPVwB3VGFVHPu6HhvSBctP74gTqe5/G/kLHS2Ixe3w0jsLIaN0guHlHI+3q9c9ZQdB04t89/1O/w1cDnyilFU=";
$mids = array($midUser); 
foreach($mids as $key => $mid){        
        $messages = [
            "type" => "text",
            "text" => $text
        ];
 
        $post_data = [
            "to" => $mid,
            "messages" => [$messages]
        ];
 
        $header = array(
            'Content-Type: application/json',
            'Authorization: Bearer ' . $strAccessToken
        );
        $url = 'https://api.line.me/v2/bot/message/push';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_PROXY, $proxy);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
        $result = curl_exec($ch);
        curl_close($ch);
}
 
?>

</body>

</html>