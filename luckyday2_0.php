
<?php
// fortune event informations
$eventID = 'luckyday2_0';
$eventTitle = '위메프 운세';
$eventDescription = '매일 보는 버프툰X족집게위메프운세 공짜! 오늘의운세/타로/별자리/애정운/로또까지';
$eventUrl = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PATH_INFO']}?direct=true&amp;ad_type=facebook";
$eventFBImage = 'http://image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-facebook.jpg'; /* SNS_페이스북 이미지*/
$eventKakaoImage = 'http://image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-kakaotalk.jpg'; /* SNS_카카오톡 이미지*/
$eventKakaoStoryImage = 'http://image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-kakaostory.jpg'; /* SNS_카카오스토리 이미지*/

$img_title = '//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-title.jpg?v=2'.$ver;

$img_cover = '//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-bg4.gif?v=2'.$ver;
$alt_title = '위메프 운세';
$alt_cover = '매일 보는 버프툰X족집게위메프운세 공짜! 오늘의운세/타로/별자리/애정운/로또까지';
$body_color = '#fff';
$timeParam = time();

if(strpos($_SERVER['SERVER_NAME'],'gagamel') > 0 && split('=', $_SERVER['QUERY_STRING'])[0] == 'time'){
  $timeParam = strtotime(split('=', $_SERVER['QUERY_STRING'])[1]);
}

$aplLogDomain = "api-log.wemakeprice.com";
$adMolocoAdSserver = "bidfnt-asia.adsmoloco.com";

$env = array("local", "development", "staging");

if (in_array(getenv('APP_ENV'), $env)){
	$aplLogDomain = "test-api-log.wemakeprice.com";
	$adMolocoAdSserver = "test-bidfnt-asia.adsmoloco.com";
}

$os = $_REQUEST["os"];
$app_version = $_REQUEST["app_version"];
$version = $_REQUEST["version"];
$os_type = $_REQUEST["os_type"];
?>

<!DOCTYPE html>
<html lang="ko"><head>
	<meta charset="utf-8">
	<meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width" name="viewport">
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
	<script >
		var os = "<?= $os ?>";
		var app_version = "<?= $app_version ?>";
		var version = "<?= $version ?>";
		var os_type = "<?= $os_type ?>";
		var adMolocoAdSserver = "<?= $adMolocoAdSserver ?>";
		var aplLogDomain = "<?= $aplLogDomain ?>";
		var adUnit = "dc333e349287446487e624bb1f7d717c";
	</script>
	<script type="text/javascript" src="/js/m/lib/jquery-1.7.2.min.js"></script>
	<script src="/js/banner/molocoAd.js?<?php echo $ver; ?>" ></script>

	<style>
		body{background:<?=$body_color?>;}
		body.popup{background:#ffd6d6;}
		button{border:none;background:0 0;}
		*{padding:0;margin:0;}
		#moloco_ad_container, #moloco_ad_container_fallback{position:fixed;width:100%;z-index:100;}
		#moloco_ad_container img, #moloco_ad_container_fallback img{display:block;width:100%;}	/* UIDEV-241 max-width 삭제 */
		#molocoads_view div:first-of-type img{width:auto;}	/* UIDEV-241 추가 */
        #moloco_ad_container #molocoads_view #__mimg {width:100%; height: auto;}
		.luckyday{position:relative;padding-top:15.6%;}
		.luckyday img{display:block;width:100%;vertical-align:top;}
		.luckyday .top-content{position:relative;}
		.luckyday .top-content .button_link{position:absolute;bottom:0;left:17%;width:32.34%;height:12.32%;}
		.luckyday .top-content .button_link span{display:none;font-size:0;line-height:0;}

		.luckyday .entry-content{position:relative;}
		.luckyday .entry-content .button-wrap{position:absolute;top:14.5%;left:0;right:0;padding:0;}
		.luckyday .entry-content button{float:left;display:inline-block;background-color:transparent;}
		.luckyday .button-wrap .type-tit{display:none;font-size:0;line-height:0;}
		.luckyday .button-wrap .titl_img{float:left;display:inline-block;width:50%;}
		.luckyday .button-entry{width:50%;}
		.luckyday .button-entry.full{width:100%;float:none;}

		.luckyday .sns-content {position:absolute; right:0; left:0; bottom:0;}
	    .luckyday .sns-content .button-wrap {position:absolute;top:0;left:26%;right:26.1%;top:0;padding:0;}
	    .luckyday .sns-content .button-wrap > ul {display:table;table-layout:fixed;width:100%;}
	    .luckyday .sns-content .button-wrap > ul li {display:table-cell;padding:0px 4.74%;text-align:center;}
		.luckyday .sns-content button {display:inline-block;margin-top:0;width:100%;background-color:transparent;}
        .luckyday .sns-content .btn_bufftoon{position:absolute;top:43.9%;left: 13.8%;right: 13.8%;}
	</style>
	</head>

	<body>
		<!-- 운세 이벤트 -->
		<section id="wrapper" class="luckyday" data-eventHandler-role="container">
		  <section id="baseLayer">
			<!-- 상단 타이틀 -->
			<!-- <div class="top-content">
				<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-title.gif" alt="위메프 0원 운세 매일보는 버프툰X위메프 '0원'운세 럭키 운세 출첵! 운세 보고 한줄평 남기면 선물 팡팡! 1등 위메프 포인트 50,000P (2명) 2등 롯데리아 새우버거세트 (100명)">
				<a href="wemakeprice://doEvent?cmd_link_type=5&cmd_link=4066059" class="button_link"><span>운세 출첵 바로가기</span></a>
			</div> -->
			<!-- 운세 보기 -->
			<div class="entry-content">
				<div class="button-wrap">
					<button class="button-entry _actionButton btn01" tabindex="0" data-click-value="today_fortune">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img1.png" alt="오늘의 운세">
					</button>
					<button class="button-entry _actionButton btn02" tabindex="0" data-click-value="today_tarot">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img2.png" alt="오늘의 타로">
					</button>
					<button class="button-entry _actionButton" tabindex="0" data-click-value="today_zodiac">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img3.png" alt="주간 별자리 운세">
					</button>
					<button class="button-entry _actionButton" tabindex="0" data-click-value="today_total_love">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img4.png"  alt="오늘의 종합 애정운">
					</button>
					<button class="button-entry _actionButton" tabindex="0" data-click-value="today_tarot_love">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img5.png" alt="사랑 타로">
					</button>
					<button class="button-entry _actionButton" tabindex="0" data-click-value="today_money">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img6.png" alt="금전 타로">
					</button>
					<button class="button-entry _actionButton" tabindex="0" data-click-value="today_12animal">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img7.png" alt="띠 운세">
					</button>
					<button class="button-entry _actionButton" tabindex="0" data-click-value="today_lotto">
						<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-img8.png" alt="행운의 로또번호">
					</button>
				</div>

				<img src="<?=$img_cover?>" alt="<?=$alt_cover?>">
			</div>
			<!-- //운세 보기 -->
			<!-- sns공유하기 -->
			<div class="sns-content">
				<img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-sns.gif" alt="공유하기">
				<div class="button-wrap">
					<ul>
						<li>
                <button class="_snsButton" tabindex="0" data-sns-type="kakaotalk">
                    <img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-kakaotalk-button.png" alt="카카오톡에 공유하기">
                </button>
            </li>
            <li>
                <button class="_snsButton" tabindex="0" data-sns-type="kakaostory">
                    <img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-kakaostory-button.png" alt="카카오스토리에 공유하기">
                </button>
            </li>
            <li>
                <button class="_snsButton" tabindex="0" data-sns-type="facebook">
                    <img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-facebook-button.png" alt="페이스북에 공유하기">
                </button>
            </li>
					</ul>
				</div>

				<div class="btn_bufftoon"> <img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-bufftoon-button.png" alt="BUFF TOON 웹툰 바로가기" onclick="location.href =location.protocol + '//' + location.hostname + '?wemakeprice_json_action=' + encodeURIComponent(JSON.stringify({'type': 9, 'value':location.protocol + '//' + location.hostname+'/m/event/p/toon/app/', 'name': '웹툰'}));"; ></div>
                <!--div class="btn_bufftoon"> <img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-bufftoon-button.png" alt="BUFF TOON 웹툰 바로가기" onclick="location.href ='wemakeprice://doEvent?cmd_link_type=3&' +encodeURIComponent(location.protocol + '//' + location.hostname + '/m/event/p/coupon/?app_version=<?=$app_version ?>&os_type=<?=$os_type?>&version=<?= $version ?>&os=<?=$os?>')"; ></div>
                <!--
                location.href = location.protocol + '//' + location.hostname + '?wemakeprice_json_action=' + encodeURIComponent(JSON.stringify({type: 9, value: eventURL + '/app/', name: eventName}));
                <a href="http://m.wemakeprice.com/m/event/p/toon" class="btn_bufftoon" target="_blank"><img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-bufftoon-button.png" alt="BUFF TOON 웹툰 바로가기"></a>
                -->
                                 <!--div><a><img src="//image.wemakeprice.com/images/m/event/2018/luckyday/luckyday-v4-bufftoon-button.png" alt="BUFF TOON 웹툰 바로가기" onclick="molocoAd.createAdIframe('wemakeprice://doEvent?cmd_link_type=3&' +encodeURIComponent('http://test.wemakeprice.com/m/event/p/coupon/?app_version=<?=$app_version ?>&os_type=<?=$os_type?>&version=<?= $version ?>&os=<?=$os?>'))"; ></a></div-->
            </div>
			<!-- //sns공유하기 -->
		</section>
		<!-- iframe section -->
		<section id="iframeLayer" style="display:none;">
		  <iframe id="iframeElem" width="100%"></iframe>
		</section>
		<!-- //iframe section -->
	  </section>
		<!-- // 운세 이벤트 -->
  <script>
	var versionInfo = '<?php echo $ver; ?>';
  </script>
  <script src="/js/require.min.js?<?= $ver ?>"></script>
  <script src="/js/require.config.js?<?= $ver ?>"></script>

  <script>
	wmpReq(['module/domReady', 'module/wmp.shareRouter', 'module/wmp.weblog', 'module/ui/wmp.layerbox', 'module/wmp.web2app'], function (ready, sRouter, wlog, LayerBox, w2a) {

	  wlog.go();

	  var eventShareUrl = location.protocol + '//' + location.hostname + '/m/events/wembed/<?=$eventID?>/send/';

	  var baseUrl = location.protocol + '//' + location.host + '/m/events/wembed/<?=$eventID?>/';
	  var isApp = location.pathname.split('/').indexOf('app') > -1;

	  var buttonDataSet = {
		'today_fortune': {
		  eventID: 'luckyday1',
          eventName: '오늘의 운세'
		},
        'today_tarot': {
          eventID: 'luckyday7',
          eventName: '오늘의 타로'
        },
        'today_total_love': {
          eventID: 'luckyday15',
          eventName: '오늘의 종합애정운'
        },
        'today_tarot_love': {
          eventID: 'luckyday14',
          eventName: '사랑 타로'
        },
        'today_money': {
		  eventID: 'luckyday9',
          eventName: '금전 타로'
		},
		'today_lotto': {
		  eventID: 'luckyday12',
          eventName: '행운의 로또 번호'
		},
        'today_12animal': {
          eventID: 'luckyday4',
          eventName: '띠 운세'
        },
        'today_zodiac': {
          eventID: 'luckyday6',
          eventName: '주간 별자리 운세'
        }
	  };

	  var snsDataSet = {
		facebook: {
		  title: '<?=$eventTitle?>',
		  desc: '<?=$eventDescription?>',
		  url: baseUrl + 'send/?direct=true&ad_type=facebook',
		  fbImageUrl: '<?=$eventFBImage?>'
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
		},
		appEnv: {
		  isApp: isApp,
		  transWeb: eventShareUrl
		}
	  };

	  var isLogin = '1' === '<?= $this->is_login ?>';
	  var lbox = new LayerBox('body');

	  /**
	   * 로그인 처리 함수
	   * @return {Boolean} 로그인 여부에 따라 true || false;
	   */
	  function doLogin() {

		var link2login = function link2login() {
		  location.href = isApp ? 'wemakeprice://?cmd=login' : '/m/member/login/?rurl=' + encodeURIComponent(location.href);
		};

		if (isLogin) { return true; };
		layerAlert({msgs: '로그인이 필요합니다.<br/>로그인 페이지로 이동하시겠습니까?', useCancelButton: true, cancelButtonCallback: link2login, confirmButtonName: '취소', cancelButtonName: '로그인'});

		return false;
	  }

	  function layerAlert(model) {
		lbox.blocking().init(model);
	  }

	  function attaching(className, clickCallback) {
		var elems = document.getElementsByClassName(className);
		for (var e = 0, loop = elems.length; e < loop; ++e) {
		  var el = elems[e];
		  el.addEventListener('click', function (evt) {
			clickCallback(evt);
		  });
		}
	  }

	  //init
	  ready(function () {

		var baseLayer = document.getElementById('baseLayer');
		var iframeLayer = document.querySelector('#iframeLayer');
		var iframeElem = document.querySelector('#iframeElem');

		//운세보기 버튼 이벤트 바인딩.
		attaching('_actionButton', function (evt) {
		  if (doLogin()) {
			var clickValue = evt.currentTarget.getAttribute('data-click-value');
			var eventID = buttonDataSet[clickValue].eventID;
            var eventName = buttonDataSet[clickValue].eventName;
			var eventURL = location.protocol + '//' + location.hostname + '/m/event/p/' + eventID;
			wlog.gaqPush.apply({}, ['Button Click'].concat(clickValue.split(',')));
			// w2a.runApp({type: 9, link: location.origin + '/m/events/wembed/' + eventID + '/app', onAppMissing: function () {}});
			//location.href = location.protocol + '//' + location.hostname + '?wemakeprice_json_action=' + encodeURIComponent(JSON.stringify({type: 9, value: eventURL + '/app/', name: '운세보기'}));
              location.href = location.protocol + '//' + location.hostname + '?wemakeprice_json_action=' + encodeURIComponent(JSON.stringify({type: 9, value: eventURL + '/app/', name: eventName}));
			evt.preventDefault();
		  }
		});

		//SNS 공유 버튼 이벤트 바인딩
		attaching('_snsButton', function (evt) {
		  var snsType = evt.currentTarget.getAttribute('data-sns-type');
		  wlog.gaqPush.apply({}, ['Button Click'].concat(snsType.split(',')));
		  sRouter.setDataSet(snsDataSet, snsType);
		});

		// 버튼 클릭 안됌
		molocoAd.initialize();
	  });
	});

  </script>
  </body>
</html>
