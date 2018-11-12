<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tedshd - Version</title>
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="description" content="">
<meta name="keywords" content="">
<script src="https://rawgithub.com/tedshd/device.js/master/lib/device.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49247550-5', 'auto');
  ga('send', 'pageview');

</script>
<style>
    body {
        background: #000;
        color: #00ff00;
        line-height: 1.3;
        letter-spacing: 2px;
	font-family: Microsoft JhengHei, San Francisco, Heiti TC, Helvetica Neue, Arial, Tahoma, Geneva, sans-serif;
    }
    .highlight {
        color: #fff;
    }
    /* 1 dpr */
    @media
    (-webkit-min-device-pixel-ratio: 1) {
        #retina:before {
            content: "No retina";
        }
    }
    /* 1.25 dpr */
    @media
    (-webkit-min-device-pixel-ratio: 1.25),
    (min-resolution: 120dpi) {
        /* Retina-specific stuff here */
        #retina:before {
            content: "1.25";
        }
    }
    /* 1.3 dpr */
    @media
    (-webkit-min-device-pixel-ratio: 1.3),
    (min-resolution: 124.8dpi) {
        /* Retina-specific stuff here */
        #retina:before {
            content: "1.3";
        }
    }
    /* 1.5 dpr */
    @media
    (-webkit-min-device-pixel-ratio: 1.5),
    (min-resolution: 144dpi) {
        /* Retina-specific stuff here */
        #retina:before {
            content: "1.5";
        }
    }
    /* 2 dpr */
    @media
    (-webkit-min-device-pixel-ratio: 2),
    (min-resolution: 192dpi) {
        /* Retina-specific stuff here */
        #retina:before {
            content: "2";
        }
    }
    @media (orientation: landscape) {
        #orientation:before {
            content: "landscape";
        }
    }
    @media (orientation: portrait) {
        #orientation:before {
            content: "portrait";
        }
    }
</style>
</head>
<body>
    <h1>Version: 0.20151023 Beta</h1>
<?php
// echo "USER AGENT : ". $_SERVER['HTTP_USER_AGENT'];
?>
<div>
    USER AGENT : <span class="highlight"><?php echo $_SERVER['HTTP_USER_AGENT']; ?></span>
</div>
<?php
// include_once('geoip.inc');
if ($_SERVER['HTTP_CLIENT_IP']) { // check ip from share internet
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif ($_SERVER['HTTP_X_FORWARDED_FOR']) { // to check ip is pass from proxy
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
/*
if((strpos($ip, ":") === false)) {
    //ipv4
    $gi = geoip_open("/usr/share/GeoIP/GeoIP.dat",GEOIP_STANDARD);
    $country = geoip_country_code_by_addr($gi, $ip);
    $ip_type = "IPv4";
}
else {
    //ipv6
    $gi = geoip_open("/usr/share/GeoIP/GeoIPv6.dat",GEOIP_STANDARD);
    $country = geoip_country_code_by_addr_v6($gi, $ip);
    $ip_type = "IPv6";
}
*/
$geo = [
    "ip" => $ip,
    "ip_type" => $ip_type,
    "country" => $country
];
?>
<div>
    IP : <span class="highlight"><?php echo $geo["ip"] ?></span>
<div>
</div>
    IP type : <span class="highlight"><?php echo $geo["ip_type"] ?></span>
<div>
</div>
    Geo: <span class="highlight"><?php echo $geo["country"]; ?></span>
</div>
<?php
    function browser($value='')
    {
        if ( ! isset($_SERVER['HTTP_USER_AGENT'])) {
           return 'unknown browser';
        }

        $agent = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($agent, 'Edge') > 0) {
            return 'Edge';
        }
        if (strpos($agent, 'OPR') > 0) {
            return 'Opera';
        }
        if (strpos($agent, 'Opera') > 0) {
            return 'Opera';
        }
        if (strpos($agent, 'Firefox') > 0) {
            return 'Firefox';
        }
        if (strpos($agent, 'Chrome') > 0) {
            return 'Chrome';
        }
        if(strpos($agent, 'CriOS') > 0 && preg_match('/iphone|ipod|ipad/i', $agent)) {
            return 'Chrome';
        }
        if (strpos($agent, 'Safari') > 0) {
            return 'Safari';
        }
        if (strpos($agent, 'MSIE 7') > 0) {
            return 'IE7';
        }
        if (strpos($agent, 'MSIE 8') > 0) {
            return 'IE8';
        }
        if (strpos($agent, 'MSIE 9') > 0) {
            return 'IE9';
        }
        if (strpos($agent, 'MSIE 10') > 0) {
            return 'IE10';
        }
        if (strpos($agent, 'like Gecko') > 0) {
            return 'IE11';
        }
        if (strpos($agent, 'MSIE') > 0) {
            return 'IE';
        }

        return 'unknown browser';
    }
    // echo "Browser : ". browser();
?>
<div>
    Browser : <span class="highlight"><?php echo browser(); ?></span>
</div>
<div>
    Browser(js) : <span id="browser" class="highlight"></span>
</div>
<div>
    <div>Device Type : <span id="device_type" class="highlight"></span></div>
    <div>Orientation(js) : <span id="ori" class="highlight"></span></div>
    <div>Orientation(media-query) : <span id="orientation" class="highlight"></span></div>
    <div>Retina : <span id="retina" class="highlight"></span></div>
    <div>Device OS : <span id="device_os" class="highlight"></span></div>
    <div>OS Version: <span id="os_ver" class="highlight"></span></div>
</div>
<div>
    Width : <span id="w" class="highlight"></span>
    <br>
    Height : <span id="h" class="highlight"></span>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        win_size();
        function win_size() {
            var h=window.document.documentElement.clientHeight;
            var w=window.document.documentElement.clientWidth;
            $("#h").html(h);
            $("#w").html(w);
        };
        $(window).resize(function() {
            win_size();
        });
    });
</script>
<script type="text/javascript">
    var deviceTypeBoolean = [device.mobile(), device.tablet(), device.desktop()],
        deviceType = ['mobile', 'tablet', 'desktop'],
        orientationBoolean = [device.portrait(), device.landscape()],
        ori = ['portrait', 'landscape'],
        deviceOsBoolean = [device.mac(), device.ipad(), device.iphone(), device.ipod(), device.android(), device.androidTablet(), device.blackberryTablet(), device.fxos(), device.fxosPhone(), device.fxosTablet(), device.windows(), device.windowsPhone(), device.windowsTablet()],
        deviceOs = ['Mac OS X', 'ipad(iOS)', 'iphone(iOS)', 'ipod(iOS)', 'Android', 'AndroidTablet', 'BlackberryTablet', 'fxos', 'fxosPhone', 'fxosTablet', 'Windows', 'WindowsPhone', 'WindowsTablet'],
        osVersion;
    if (device.ipad() || device.iphone() || device.ipod()) {
        osVersion = (navigator.userAgent).match(/OS\s+([\d\_]+)/i);
        osVersion = osVersion[0];
        osVersion = osVersion.replace(/_/g, '.');
        osVersion = osVersion.replace('OS ', '');
    }
    if (device.android() || device.androidTablet()) {
        osVersion = (navigator.userAgent).match(/Android\s+([\d\.]+)/i);
        osVersion = osVersion[0];
        osVersion = osVersion.replace('Android ', '');
    }
    os_ver.innerHTML = osVersion;
    for (var i = 0; i < deviceTypeBoolean.length; i++) {
        if (deviceTypeBoolean[i]) {
            $('#device_type').html(deviceType[i]);
        }
    }
    for (var j = 0; j < orientationBoolean.length; j++) {
        if (orientationBoolean[j]) {
            $('#ori').html(ori[j]);
        }
    }
    for (var k = 0; k < deviceOsBoolean.length; k++) {
        if (deviceOsBoolean[k]) {
            $('#device_os').html(deviceOs[k]);
        }
    }

    // function browser() {
    //     var agent = navigator.userAgent;
    //     if (agent.search('Edge') > 0) {
    //         return 'Edge';
    //     }
    //     if (agent.search('OPR') > 0) {
    //         return 'Opera';
    //     }
    //     if (agent.search('Opera') > 0) {
    //         return 'Opera';
    //     }
    //     if (agent.search('Firefox') > 0) {
    //         return 'Firefox';
    //     }
    //     if (agent.search('Chrome') > 0) {
    //         return 'Chrome';
    //     }
    //     // check iOS chrome
    //     if(/CriOS/i.test(agent) && /iphone|ipod|ipad/i.test(agent)) {
    //         return 'Chrome';
    //     }
    //     if (agent.search('Safari') > 0) {
    //         return 'Safari';
    //     }
    //     if (agent.search('MSIE 7') > 0) {
    //         return 'IE7';
    //     }
    //     if (agent.search('MSIE 8') > 0) {
    //         return 'IE8';
    //     }
    //     if (agent.search('MSIE 9') > 0) {
    //         return 'IE9';
    //     }
    //     if (agent.search('MSIE 10') > 0) {
    //         return 'IE10';
    //     }
    //     if (agent.search('like Gecko') > 0) {
    //         return 'IE11';
    //     }
    //     if (agent.search('MSIE') > 0) {
    //         return 'IE';
    //     }
    //     return 'unknown browser';
    // }
    $('#browser').html(browser());





function browser() {

    var _that = this,
        currentBrowser = 'unknown browser',
        ua = navigator.userAgent,
        agentArray = [
            {
                agent: ua.search('Edge'),
                browser: 'Edge'
            },
            {
                agent: ua.search('OPR'),
                browser: 'Opera'
            },
            {
                agent: ua.search('Opera'),
                browser: 'Opera'
            },
            {
                agent: ua.search('Firefox'),
                browser: 'Firefox'
            },
            {
                agent: ua.search('Chrome'),
                browser: 'Chrome'
            },
            {
                agent: /CriOS/i.test(ua) && /iphone|ipod|ipad/i.test(ua), // check iOS chrome
                browser: 'Chrome'
            },
            {
                agent: ua.search('Safari'),
                browser: 'Safari'
            },
            {
                agent: ua.search('MSIE 7'),
                browser: 'IE7'
            },
            {
                agent: ua.search('MSIE 8'),
                browser: 'IE8'
            },
            {
                agent: ua.search('MSIE 9'),
                browser: 'IE9'
            },
            {
                agent: ua.search('MSIE 10'),
                browser: 'IE10'
            },
            {
                agent: ua.search('like Gecko'),
                browser: 'IE11'
            },
            {
                agent: ua.search('MSIE'),
                browser: 'IE'
            }
        ];
    for (var i = 0; i < agentArray.length; i++) {
        _that[agentArray[i].browser.toLowerCase()] = false;
    }
    for (var j = 0; j < agentArray.length; j++) {
        if (agentArray[j].agent > 0 || agentArray[j].agent === true) {
            _that[agentArray[j].browser.toLowerCase()] = true;
            currentBrowser = agentArray[j].browser;
            break;
        }
    }
    return currentBrowser;
}

console.log(browser());

window.addEventListener("deviceorientation", handleOrientation, true);

function handleOrientation(event) {
  var absolute = event.absolute;
  var alpha    = event.alpha;
  var beta     = event.beta;
  var gamma    = event.gamma;
    // console.log(absolute);
    // console.log(alpha);
    // console.log(beta);
    // console.log(gamma);
}
var orientation = window.screen.orientation.type;
console.log('orientation', orientation);

function orientationType() {
    if ((window.innerHeight / window.innerWidth) > 1) {
        return 'portrait';
    }
    if ((window.innerHeight / window.innerWidth) < 1) {
        return 'landscape';
    }
}

console.log(orientationType());

window.addEventListener('orientationchange', function(e) {
    console.log('orientationchange');
    console.log(e);
});
window.addEventListener('resize', function(e) {
    console.log('resize');
    console.log(e);
});

</script>
</html>

