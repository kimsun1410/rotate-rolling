function modalTrigger(title, message, confetti) {
    var isTitle = title !== undefined && title != '';
    var isMessage = message !== undefined && message != '';
    $('#modal-title').toggle(isTitle).text(title);
    $('#modal-message').toggle(isMessage).text(message);

    $('#modal-name').css({ "display": "block" });
    if( confetti !== undefined && confetti === true ) {
        for (var i = 0; i < 250; i++) {
            create(i);
        }
    } else {
        $('[class^=confetti-]').remove()
    }
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}

function goRul() {
	var couponTitle = ['50%', '100원', '10%', '5%', '1000원', '100원'];
	var hour = new Date().getHours();
	if( new Date().getTime() > 1548860399000 ) {
		$('.login_btn').hide();
		modalTrigger('이벤트 기간 종료', '이벤트 기간이 아닙니다.');
		return false;				
	}
	if( hour != 11 && hour != 12 && hour != 23 ) {
		$('.login_btn').hide();
		modalTrigger('참여가능한 시간이 아닙니다.', '오전/오후 11시에 참여해주세요.');
		return false;		
	}
	
	var request = $.ajax({
		url : '/event/roulette_event/api',
		dataType : "text",
		timeout : 5000,
		success: function(seq) {
			$('.login_btn').hide();
			if( seq == 'time' ) {
				$('.login_btn').hide();
			    modalTrigger('참여가능한 시간이 아닙니다.', '오전/오후 11시에 참여해주세요.');
				return false;
			}
			if( seq == '403' ) {
				$('.login_btn').hide();
			    modalTrigger('1일 1회 참가가능', '오늘은 이미 참가하셨습니다.');
				return false;
			}
			if( seq == '401' ) {
				$('.login_btn').show();
			    modalTrigger('로그인 필요', '로그인이 필요한 서비스입니다.');
				return false;
			}
			if( seq == '' ) {
				alert('예기치 않은 에러가 발생되어 페이지를 새로고침 합니다.');
				location.reload();
				return false;
			}
			$('html, body').animate({
				scrollTop: $('[id="pin"]').offset().top
			}, 500, function () {
				$("#rul").rotate({
					angle: 0,
					animateTo: ( (Math.abs(seq - 5) * 60) + getRandomInt(5, 55) ) + (360 * 3),
					center: ["50%", "50%"],
					callback: function () {
							modalTrigger( '[' + couponTitle[seq] + '] 할인쿠폰 당첨!', '마이페이지 - 할인쿠폰에서 확인하세요.', true);
					},
					duration: 5400
				});
			});
		},
		statusCode: {
			401: function() {
				$('.login_btn').show();
			    modalTrigger('로그인 필요', '로그인이 필요한 서비스입니다.');
				return false;
			},
			403: function() {
				$('.login_btn').hide();
			    modalTrigger('1일 1회 참가가능', '오늘은 이미 참가하셨습니다.');
				return false;
			}
		}
		
	});
}

$(".modal-trigger").click(function (e) {
    e.preventDefault();
    dataModal = $(this).attr("data-modal");
    $("#" + dataModal).css({ "display": "block" });
});

$(".close_btn").click(function () {
    $(".modal").css({ "display": "none" });
});

function create(i) {
    var width = Math.random() * 8;
    var height = width * 0.4;
    var colourIdx = Math.ceil(Math.random() * 3);
    var colour = "red";
    switch (colourIdx) {
        case 1:
            colour = "yellow";
            break;
        case 2:
            colour = "blue";
            break;
        default:
            colour = "red";
    }
    $('<div class="confetti-' + i + ' ' + colour + '"></div>').css({
        "width": width + "px",
        "height": height + "px",
        "top": -Math.random() * 20 + "%",
        "left": Math.random() * 100 + "%",
        "opacity": Math.random() + 0.5,
        "transform": "rotate(" + Math.random() * 360 + "deg)"
    }).appendTo('.confetti');

    drop(i);
}

function drop(x) {
    $('.confetti-' + x).animate({
        top: "100%",
        left: "+=" + Math.random() * 15 + "%"
    }, Math.random() * 3000 + 3000, function () {
        //reset(x);
    });
}

function reset(x) {
    $('.confetti-' + x).animate({
        "top": -Math.random() * 20 + "%",
        "left": "-=" + Math.random() * 15 + "%"
    }, 0, function () {
        drop(x);
    });
}
