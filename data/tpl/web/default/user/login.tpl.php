<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<link type="text/css" rel="stylesheet" href="resource/login/css/default.css" />
<!--必要样式-->
<link type="text/css" rel="stylesheet" href="resource/login/css/styles.css" />
<link type="text/css" rel="stylesheet" href="resource/login/css/demo.css" />
<link type="text/css" rel="stylesheet" href="resource/login/css/loaders.css" />
<!--<div class="system-login" <?php  if(!empty($_W['setting']['copyright']['background_img'])) { ?> style="background-image:url('<?php  echo tomedia($_W['setting']['copyright']['background_img']);?>')" <?php  } else { ?> style="background-image: url('./resource/images/bg-login.png');" <?php  } ?>>-->
<div class='login'>
	<!--
	<div class="head">
		<a href="/" class="logo-version">
			<img src="<?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?><?php  echo tomedia($_W['setting']['copyright']['blogo'])?><?php  } else { ?>./resource/images/logo/logo.png<?php  } ?>" class="logo">
			<span class="version hidden"><?php echo IMS_VERSION;?></span>
		</a>
		<?php  if(!empty($_W['setting']['copyright']['showhomepage'])) { ?>
		<a href="<?php  echo url('account/welcome')?>" class="pull-right">首页</a>
		<?php  } ?>
	</div>-->
	
	
	
	
		<div class='login_title'>
			<span>微信营销系统</span>
		</div>
		
		
		
		
		
		<form action="" method="post" role="form" id="form1" onsubmit="return formcheck();" class="we7-form">
		<div class='login_fields'>
			<div class='login_fields__user'>
			  <div class='icon'>
				<img alt="" src='resource/login/img/user_icon_copy.png'>
			  </div>
			  <input name="username" placeholder='用户名' maxlength="16" type='text' autocomplete="off" />
			  <div class='validation'>
				<img alt="" src='resource/login/img/tick.png'>
			  </div>
			</div>
			<div class='login_fields__password'>
			  <div class='icon'>
				<img alt="" src='resource/login/img/lock_icon_copy.png'>
			  </div>
			  <input name="password" placeholder='密码' maxlength="16" type='text' autocomplete="off" />
			  <div class='validation'>
				<img alt="" src='resource/login/img/tick.png'>
			  </div>
			</div>
			
			<div class='login_fields__password'>
			
			  <div class='icon'>
				
				<!--<img alt="" src='resource/login/img/key.png'>-->
				
			  </div>
			 
			  <!--<input name="code" placeholder='验证码' maxlength="4" type='text' name="ValidateNum" autocomplete="off" />-->
			
				  <div class='validation' style="opacity: 1; right: -5px;top: -3px;">
				
			  <canvas class="J_codeimg" id="myCanvas" onclick="Code();">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>
			  
			  </div>
			  
			</div>
			<div class='login_fields__submit'>
			  <input type="submit" id="submit" name="submit" value="登录" class="btn btn-primary btn-block" />
			</div>
			<input name="token" value="<?php  echo $_W['token'];?>" type="hidden" />
		</div>
		</form>
		
		
		
		<div class='disclaimer'>
			<p>微信营销领导者</p>
			<span>备案号：<a href="https://beian.miit.gov.cn" target="_blank">豫ICP备17023984号-1</a></span>
		</div>
		
		
		
			
		
	
</div>
	
	<div class='authent'>
	  <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
		<div class="loader-inner ball-clip-rotate-multiple">
			<div></div>
			<div></div>
			<div></div>
		</div>
		</div>
	  <p>验证登录中...</p>
	</div>
	<div class="OverWindows"></div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-base', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-base', TEMPLATE_INCLUDEPATH));?>

<link type="text/css" rel="stylesheet" href="resource/login/layui/css/layui.css" />
<script type="text/javascript" src="resource/login/js/jquery.min.js"></script>
<script type="text/javascript" src="resource/login/js/jquery-ui.min.js"></script>
<script type="text/javascript" src='resource/login/js/stopExecutionOnTimeout.js?t=1'></script>
<script type="text/javascript" src="resource/login/layui/layui.js"></script>
<script type="text/javascript" src="resource/login/js/particleground.js"></script>
<script type="text/javascript" src="resource/login/js/treatment.js"></script>
<script type="text/javascript" src="resource/login/js/jquery.mockjax.js"></script>
<script>
function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}
var h = document.documentElement.clientHeight;
$(".system-login").css('height',h);
$('#toggle').click(function() {
	$('#imgverify').prop('src', '<?php  echo url('utility/code')?>r='+Math.round(new Date().getTime()));
	return false;
});
<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
	$('#form1').submit(function() {
		var verify = $(':text[name="verify"]').val();
		if (verify == '') {
			alert('请填写验证码');
			return false;
		}
	});
<?php  } ?>




function formcheck() {
	if($('#remember:checked').length == 1) {
		cookie.set('remember-username', $(':text[name="username"]').val());
	} else {
		cookie.del('remember-username');
	}
	return true;
}
var h = document.documentElement.clientHeight;
$(".system-login").css('height',h);
$('#toggle').click(function() {
	$('#imgverify').prop('src', '<?php  echo url('utility/code')?>r='+Math.round(new Date().getTime()));
	return false;
});
<?php  if(!empty($_W['setting']['copyright']['verifycode'])) { ?>
	$('#form1').submit(function() {
		var verify = $(':text[name="verify"]').val();
		if (verify == '') {
			alert('请填写验证码');
			return false;
		}
	});
<?php  } ?>

var canGetCookie = 0;//是否支持存储Cookie 0 不支持 1 支持
var ajaxmockjax = 1;//是否启用虚拟Ajax的请求响 0 不启用  1 启用
//默认账号密码

//var truelogin = "Richer";
//var truepwd = "freedom";

var CodeVal = 0;
Code();
function Code() {
	if(canGetCookie == 1){
		createCode("AdminCode");
		var AdminCode = getCookieValue("AdminCode");
		showCheck(AdminCode);
	}else{
		showCheck(createCode(""));
	}
}
function showCheck(a) {
	CodeVal = a;
    //var c = document.getElementById("myCanvas");
    //var ctx = c.getContext("2d");
    //ctx.clearRect(0, 0, 1000, 1000);
    //ctx.font = "80px 'Hiragino Sans GB'";
    //ctx.fillStyle = "#E8DFE8";
    //ctx.fillText(a, 0, 100);
}
$(document).keypress(function (e) {
    // 回车键事件  
    if (e.which == 13) {
        $('input[type="button"]').click();
    }
});
//粒子背景特效
$('body').particleground({
    dotColor: '#E8DFE8',
    lineColor: '#133b88'
});
$('input[name="pwd"]').focus(function () {
    $(this).attr('type', 'password');
});
$('input[type="text"]').focus(function () {
    $(this).prev().animate({ 'opacity': '1' }, 200);
});
$('input[type="text"],input[type="password"]').blur(function () {
    $(this).prev().animate({ 'opacity': '.5' }, 200);
});
$('input[name="login"],input[name="pwd"]').keyup(function () {
    var Len = $(this).val().length;
    if (!$(this).val() == '' && Len >= 5) {
        $(this).next().animate({
            'opacity': '1',
            'right': '30'
        }, 200);
    } else {
        $(this).next().animate({
            'opacity': '0',
            'right': '20'
        }, 200);
    }
});
var open = 0;
layui.use('layer', function () {
	//var msgalert = '默认账号:' + truelogin + '<br/> 默认密码:' + truepwd;
	//var index = layer.alert(msgalert, { icon: 6, time: 4000, offset: 't', closeBtn: 0, title: '友情提示', btn: [], anim: 2, shade: 0 });  
	layer.style(index, {
		color: '#777'
	}); 
    //非空验证
    $('input[type="button"]').click(function () {
        var login = $('input[name="login"]').val();
        var pwd = $('input[name="pwd"]').val();
        var code = $('input[name="code"]').val();
        if (login == '') {
            ErroAlert('请输入您的账号');
        } else if (pwd == '') {
            ErroAlert('请输入密码');
        } else if (code == '' || code.length != 4) {
            ErroAlert('输入验证码');
        } else {
            //认证中..
            fullscreen();
            $('.login').addClass('test'); //倾斜特效
            setTimeout(function () {
                $('.login').addClass('testtwo'); //平移特效
            }, 300);
            setTimeout(function () {
                $('.authent').show().animate({ right: -320 }, {
                    easing: 'easeOutQuint',
                    duration: 600,
                    queue: false
                });
                $('.authent').animate({ opacity: 1 }, {
                    duration: 200,
                    queue: false
                }).addClass('visible');
            }, 500);

            //登陆
            var JsonData = { login: login, pwd: pwd, code: code };
			//此处做为ajax内部判断
			var url = "";
			if(JsonData.login == truelogin && JsonData.pwd == truepwd && JsonData.code.toUpperCase() == CodeVal.toUpperCase()){
				url = "Ajax/Login";
			}else{
				url = "Ajax/LoginFalse";
			}
			
			
            AjaxPost(url, JsonData,
                function () {
                    //ajax加载中
                },
                function (data) {
                    //ajax返回 
                    //认证完成
                    setTimeout(function () {
                        $('.authent').show().animate({ right: 90 }, {
                            easing: 'easeOutQuint',
                            duration: 600,
                            queue: false
                        });
                        $('.authent').animate({ opacity: 0 }, {
                            duration: 200,
                            queue: false
                        }).addClass('visible');
                        $('.login').removeClass('testtwo'); //平移特效
                    }, 2000);
                    setTimeout(function () {
                        $('.authent').hide();
                        $('.login').removeClass('test');
                        if (data.Status == 'ok') {
                            //登录成功
                            $('.login div').fadeOut(100);
                            $('.success').fadeIn(1000);
                            $('.success').html(data.Text);
							//跳转操作
							
                        } else {
                            AjaxErro(data);
                        }
                    }, 2400);
            	})
        }
    })
})
var fullscreen = function () {
    elem = document.body;
    if (elem.webkitRequestFullScreen) {
        elem.webkitRequestFullScreen();
    } else if (elem.mozRequestFullScreen) {
        elem.mozRequestFullScreen();
    } else if (elem.requestFullScreen) {
        elem.requestFullscreen();
    } else {
        //浏览器不支持全屏API或已被禁用  
    }
}  
if(ajaxmockjax == 1){
	$.mockjax({  
		url: 'Ajax/Login',  
		status: 200,  
		responseTime: 50,          
		responseText: {"Status":"ok","Text":"登陆成功<br /><br />欢迎回来"}  
	}); 
	$.mockjax({  
		url: 'Ajax/LoginFalse',  
		status: 200,  
		responseTime: 50,          
		responseText: {"Status":"Erro","Erro":"账号名或密码或验证码有误"}
	});   
}

</script>
