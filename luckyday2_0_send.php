<?php
// fortune event informations
$eventID = 'luckyday';
$eventTitle = '위메프 운세';
$eventDescription = '매일 보는 버프툰X족집게위메프운세 공짜! 오늘의운세/타로/별자리/애정운/로또까지';
$eventUrl = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PATH_INFO']}?direct=true&amp;ad_type=facebook";
$eventFBImage = 'http://image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-facebook.jpg';
$eventKakaoImage = 'http://image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-kakaotalk.jpg';
$eventKakaoStoryImage = 'http://image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-kakaostory.jpg';
?>
<!DOCTYPE HTML>
<html lang="ko">
  <head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="Copyright &copy; WEMAKEPRICE Corporation. All Rights Reserved." name="author">
    <title>위메프 모바일 이벤트 - <?=$eventTitle?></title>
    <!-- Facebook OpenGraphMarkup -->
    <meta property="og:url" content="<?=$eventUrl?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?=$eventTitle?>" />
   	<meta property="og:description" content="<?=$eventDescription?>"/>
    <meta property="og:image" content="<?=$eventFBImage?>"/>
    <!-- //Facebook OpenGraphMarkup -->
    <link href="/css/m/m2.css?20160411_0" rel="stylesheet" type="text/css">
    <link href="/css/m/m_common.css?20160411_0" rel="stylesheet" type="text/css">
    <link href="/css/m/m3.css?20160411_0" rel="stylesheet" type="text/css">
    <style type="text/css">
        body,
        div {padding: 0px; margin: 0px; background-color: #fff;}
        .m-dummy img {width: 100%; vertical-align: top;}
    </style>
  </head>
  <body>
    <div class="m-dummy">
        <?php $this->load->view('mobile/single_image'); ?>
    </div>
    <script src="/js/require.min.js"></script>
    <script src="/js/require.config.js?<?= $ver ?>"></script>
    <script type="text/javascript">
    wmpReq(['module/wmp.shareRouter', 'module/wmp.util', 'module/wmp.weblog', 'module/wmp.web2app', 'module/ui/wmp.layerbox', 'module/wmp.ua'], function (sRouter, wu, weblog, w2a, layerBox, ua) {

      //GA + Weblog 세팅
      if (weblog) {
        weblog.go();
      }
      var queryObject = wu.queryStringToObject(location.search);
      var baseUrl = location.protocol + '//' + location.host + '/m/events/wembed/<?=$eventID?>/';
      var eventURL = location.protocol + '//' + location.host + '/m/event/p/<?=$eventID?>/';
      var eventAppURL = eventURL + 'app/';
      var eventID = '<?=$eventID?>';
      var eventDataSet = {
        facebook: {
          title: '<?=$eventTitle?>',
          description: '<?=$eventDescription?>',
          url: baseUrl + 'send/?direct=true&ad_type=facebook',
          fbImageUrl: '<?=$eventFBImage?>',
          noUseMetaData: true
        },
        kakaotalk: {
          desc: '<?=$eventDescription?>',
          url: baseUrl + 'send/?direct=true&ad_type=kakaotalk',
          imageUrl: '<?=$eventKakaoImage?>',
          imageWidth: 640,
          imageHeight: 731,
          buttonName: '위메프 바로가기'
        },
        kakaostory: {
          title: '<?=$eventTitle?>',
          desc: '<?=$eventDescription?>',
          url: baseUrl + 'send/?direct=true&ad_type=kakaostory',
          images: ['<?=$eventKakaoStoryImage?>']
        }
      };
      var appJSON = {link: eventAppURL, type: '3'};
      var $layerBox;
      var facebookCallback;

      if (queryObject['iframeclose'] && queryObject['iframeclose'] === 'true' && parent) {
        // parent.closeIframeLayer && parent.closeIframeLayer();
        // parent.location.href = 'wmp://?cmd=close';
        location.href = 'wmp://?cmd=close';
        return false;
      }

      if (queryObject['runapp'] && queryObject['runapp'] === 'true') {
        w2a.runApp(appJSON);
        return false;
      }

      /*
       * sns 채널과 os에 따라 튠링크 분기처리.
       * adType = (facebook || kakaotalk || kakaostory) + (aos: 01 || ios: 02)
       * ex) adType = 'facebook01'
       */
      if (queryObject['direct'] && queryObject['direct'] === 'true') {
        // ad_type 빈값으로 들어올 경우, facebook로 트래킹에 잡힐 수 있도록 처리.
        // os 상태 값 (ua.os.ios ? '02' : '01') 은 매체로 확인 가능하여 제거
        var adType = queryObject['ad_type'] || 'facebook';
        var tuneData = {
          ios: {
            destinationID: '456459',
            siteID: '72200'
          },
          android: {
            destinationID: '456460',
            siteID: '63742'
          }
        };

        location.href = 'https://344016.measurementapi.com/serve?action=click&publisher_id=344016&site_id=' + (tuneData[ua.os.name].siteID || tuneData['ios'].siteID) + '&destination_id=' + (tuneData[ua.os.name].destinationID || tuneData['ios'].destinationID) + '&my_campaign=<?=$eventID?>&my_adgroup=' + adType + '&my_ad=a1&my_placement=type%3Devent%26link%3D<?=$eventID?>';
      }

      if (!queryObject['snstype']) { return false; }

      if (queryObject['snstype'] === 'facebook') {
        $layerBox = layerBox('body');
        facebookCallback = function () {
          sRouter.setDataSet(eventDataSet, queryObject['snstype']);
          setTimeout(function() {
//            [ QA-7521 ] 단말기 구분 없이 Alert 제공 후 앱으로 랜딩
//            ua.os.ios ? web2app() : returnApp();
              returnApp();
          }, 2000);
        };
        $layerBox.blocking().init({msgs: '페이스북 공유페이지로 이동합니다.', confirmButtonCallback: facebookCallback});
      } else {
        sRouter.setDataSet(eventDataSet, queryObject['snstype']);
      }

      /**
       * 안드로이드 단말기의 경우 Alert 제공 후 앱으로 랜딩
       */
      function returnApp() {
        $layerBox.blocking().init({msgs: '위메프앱으로 이동합니다.', confirmButtonCallback: function () {
            web2app();
        }});
      }

      /**
       * 앱이 설치되어 있는 경우 앱을 실행 || 모바일웹 이벤트 페이지로 이동
       * @method web2app
       */
      function web2app () {
        var intentUrl = w2a.getIntentUrl(appJSON.type, appJSON.link);
        w2a.web2app({
            urlScheme: w2a.getAppCmnd(appJSON),
            storeURL: eventURL,
            intentURI: w2a.getAppIntent(intentUrl, false, false, eventURL)
        });
      }
    });
    </script>
  </body>
</html>
