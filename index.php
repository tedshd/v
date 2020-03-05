<?php require_once 'Mobile_Detect.php';?>
<?php include_once 'browser.php';?>
<?php include_once 'geo.php';?>
<?php
$detect = new Mobile_Detect;
if ($detect->isMobile()) {

} else if ($detect->isTablet()) {

} else {

}

$devide_os = '';

if ($detect->isIOS) {
    $devide_os = 'iOS';
}
if ($detect->isAndroidOS()) {
    $devide_os = 'AndroidOS';
}

$brand = '';

$brand_list = $detect->getPhoneDevices();

foreach ($brand_list as $key => $value) {
    if ($detect->is($key)) {
        $brand = $key;
        break;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tedshd - Version</title>
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
<script src="check_browser.js"></script>
<script src="mobile-detect.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49247550-5', 'auto');
  ga('send', 'pageview');

</script>
<style>
    * {
        font-family: Helvetica, Microsoft JhengHei, Roboto, sans-serif, Arial, monospace, Tahoma, Geneva !important;
    }
    body {
        background: #000;
        color: #fff;
        line-height: 1.5;
        letter-spacing: 2px;
        font-size: 1.25rem;
    }
    h1,
    h2 {
        color: #00ff00;
    }
    h1 {
        margin-bottom: 1rem;
        font-size: 2rem;
    }
    h2 {
        display: inline-block;
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
    <h1>Version: 0.20200305 Beta</h1>
    <ul>
        <li>
            <h2>USER AGENT:</h2>
            <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
        </li>
    </ul>
    <ul>
        <li>
            <h2>IP:</h2>
            <?php echo $geo["ip"] ?>
        </li>
    </ul>
    <ul>
        <li>
            <h2>Browser:</h2>
            <?php echo browser(); ?>
        </li>
        <li>
            <h2>Browser(js):</h2>
            <span id="browser"></span>
        </li>
        <li>
            <h2>Device Type:</h2>
            <span id="device_type"></span>
        </li>
        <li>
            <h2>Device OS:</h2>
            <?php echo $devide_os; ?>
        </li>
        <li>
            <h2>Device OS(js):</h2>
            <span id="device_os"></span>
        </li>
        <li>
            <h2>OS Version:</h2>
            <span id="os_ver"></span>
        </li>
        <li>
            <h2>brand:</h2>
            <?php echo $brand; ?>
        </li>
        <li>
            <h2>brand(js):</h2>
            <span id="brand"></span>
        </li>
    </ul>
    <ul>
        <li>
            <h2>Orientation(js):</h2>
            <span id="ori"></span>
        </li>
        <li>
            <h2>Orientation(media-query):</h2>
            <span id="orientation"></span>
        </li>
        <li>
            <h2>Retina(media-query):</h2>
            <span id="retina"></span>
        </li>
        <li>
            <h2>Width:</h2>
            <span id="w"></span>
        </li>
        <li>
            <h2>Height:</h2>
            <span id="h"></span>
        </li>
    </ul>

</body>
<script>
    function windowSize() {
        var w=window.document.documentElement.clientWidth;
        var h=window.document.documentElement.clientHeight;
        document.querySelector('#w').innerText = w;
        document.querySelector('#h').innerText = h;
    };
    windowSize();
    window.addEventListener('resize', function () {
        windowSize();
    });

    document.querySelector('#browser').innerText = browser();

    var md = new MobileDetect(window.navigator.userAgent);

    var deviceType = '';
    if (md.mobile()) {
        deviceType = 'mobile';
    } else if (md.tablet()) {
        deviceType = 'tablet';
    } else {
        deviceType = 'desktop';
    }
    document.querySelector('#device_type').innerText = deviceType;

    document.querySelector('#device_os').innerText = md.os();

    var osVersion = '';
    if (md.is('AndroidOS')) {
        osVersion = (navigator.userAgent).match(/Android\s+([\d\.]+)/i);
        osVersion = osVersion[0];
        osVersion = osVersion.replace('Android ', '');
    }
    if (md.is('iOS')) {
        osVersion = (navigator.userAgent).match(/OS\s+([\d\_]+)/i);
        osVersion = osVersion[0];
        osVersion = osVersion.replace(/_/g, '.');
        osVersion = osVersion.replace('OS ', '');
    }
    document.querySelector('#os_ver').innerText = osVersion;

    var brand = md.phone() || md.tablet();
    document.querySelector('#brand').innerText = brand;
</script>

<script type="text/javascript">

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

