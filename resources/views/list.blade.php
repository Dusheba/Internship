<!DOCTYPE html>
<html>
<head>
    <title>Друзья рекомендуют</title>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/list.css') }}" type="text/css">
    <style>
        body {
            background: #edeef0;
            font-family: 'Roboto', sans-serif;
            font-weight: 400;

        }

        .text {
            font-size: 20px;
            height: 30px;
            text-align: center;
            background-color: white;
        }
        .type{
            color:#2787F5;
            font-size: 10px;
        }

        .accordionMenu {
            width: 500px;
            margin: auto;
        }

        .accordionMenu input[type=radio] {
            display: none;
        }

        .accordionMenu label {
            display: block;
            height: 120px;
            line-height: 47px;
            padding: 0 25px 0 10px;
            border-radius: 1%;
            border: 5px solid white;
            text-indent: 18px;
            background: #FFFFFF;
            color:#2787F5;
            font-weight:bold;
            font-size: 18px;
            position: relative;
            cursor: pointer;
            border-bottom: 1px solid #e6e6e6;
        }

        .accordionMenu label::after {
            display: block;
            content: "";
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 5px 0 5px 10px;
            border-color: transparent transparent transparent #2787F5;
            position: absolute;
            right: 10px;
            top: 20px;
            z-index: 10;
            -webkit-transition: all 0.3s ease-in-out;
            -moz-transition: all 0.3s ease-in-out;
            -ms-transition: all 0.3s ease-in-out;
            -o-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .accordionMenu .content {
            max-height: 0;
            height: 0;
            overflow: hidden;
            -webkit-transition: all 2s ease-in-out;
            -moz-transition: all 2s ease-in-out;
            -o-transition: all 2s ease-in-out;
            transition: all 2s ease-in-out;
        }

        .accordionMenu .content .inner {
            font-size: 1rem;
            color: #000000;
            line-height: 1.5;
            background: white;
            padding: 20px 10px;
        }

        .accordionMenu input[type=radio]:checked+label:after {
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .accordionMenu input[type=radio]:checked+label+.content {
            max-height: 2000px;
            height: auto;
        }

    </style>
</head>
<body>
</body>
</html>

<?php
//include  $_SERVER['DOCUMENT_ROOT']."/config/token.php";
use VK\Client\VKApiClient;
$com_token="your_token";
$vk = new VKApiClient();
$group_ids = array('sci','sinekineki','aequator','g_equality','thelisris','kazzzak','baneksbest','art.oooh','que4life','galerkameme','svyaz__vremen','mayland');
$fields=array('description','activity');
$response = $vk->groups()->getById($com_token, array(
    'group_ids' => $group_ids,
    'fields' => $fields,
));

echo '<div class="accordionMenu"><h1 class="text">Друзья рекомендуют</h1>';
for ($i=0;$i<count($group_ids);$i++){
    $photo='<img style="border-radius: 50%" align="left" hspace="5" src='.$response[$i]['photo_100'].'>';
    echo '<input type="radio" name="trg1" id='.$i.' checked="checked">
        <label for='.$i.'>'.$photo.$response[$i]['name'].'<br>&#8195'
        .$response[$i]['activity'].'

        </label>
        <div class="content">
            <div class="inner">
                '.($response[$i]['description']).'
            </div>
        </div>';
}
echo '</div>';
?>
