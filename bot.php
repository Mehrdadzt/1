<?php
ob_start();
/*
این سورس ساخته شده در دو تیم👇

🔹 @Lite_Team 🔹
🔸 @soros_robot 🔸
و توسط ادمین های زیر👇
🔹 @mohammadstar_98 🔹
🔸 @Amirhossein_Taypram 🔸

نوشته شده است😜
*/
define('API_KEY','1479792699:AAE7FBrBTcCej-QEK18Vovl6eoaWEBpr5TE');
//-----------------------------------------------------------------------------------------
//فانکشن MrPHPBot :
function MrPHPBot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
//-----------------------------------------------------------------------------------------
//متغیر ها :
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$from_id = $message->from->id;
mkdir("data/$from_id");
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$first_name = $message->from->first_name;
$last_name = $message->from->last_name;
$username = $message->from->username;
save("data/username.txt/$username");
$textmassage = $message->text;
$Dev = 199078201;
$Dev2 = 199078201;
$txtt = file_get_contents('data/users.txt');
$jj = file_get_contents("http://web-service.000webhostapp.com/joke");
$messageid = $update->callback_query->message->message_id;
$ban = file_get_contents('data/banlist.txt');
$step= file_get_contents("data/$from_id/file.txt");
$truechannel = json_decode(file_get_contents("https://api.telegram.org/botTOKEN/getChatMember?chat_id=@Lite_Team&user_id=".$from_id));
$tch = $truechannel->result->status;
//-----------------------------------------------------------------------------------------
//فانکشن ها :
function SendMessage($chat_id, $text){
MrPHPBot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>$text,
'parse_mode'=>'MarkDown']);
}
function save($filename, $data)
{
$file = fopen($filename, 'w');
fwrite($file, $data);
fclose($file);
}
function sendAction($chat_id, $action){
MrPHPBot('sendChataction',[
'chat_id'=>$chat_id,
'action'=>$action]);
}
function step($step){
    file_put_contents("step.txt",$step);
}
function Forward($KojaShe,$AzKoja,$KodomMSG)
{
MrPHPBot('ForwardMessage',[
'chat_id'=>$KojaShe,
'from_chat_id'=>$AzKoja,
'message_id'=>$KodomMSG
]);
}
//---------------------------------------@Lite_Team--------------------------------------------
if($textmassage=="/start"){
        sendAction($chat_id, 'typing');
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"`سلام من زیزی روبوت هستم خوش اومدی
من دقیق مثل یه انسان صحبت میکنم 😅
ولی مشکلی وجود نداره من هنوز کوچیکم وزیاد صحبت کردن بلد نیستم
تو میتونی به من اموزش بدی برای این کار برروی دکمه بهم یاد بده کلیک کن
وبهم یاد بده ❤️💋`",
        'parse_mode'=>'MarkDown',
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"لینک دعوت شما 🔗"],['text'=>"بهم یاد بده ☺️"]
	],
        [
	['text'=>"پشتیبانی 👤"],['text'=>"ارسال نظر 📩"]
	],
	]
	])

	]);


	}

		elseif($tch != 'member' && $tch != 'creator' && $tch != 'administrator'){
		            sendAction($chat_id, 'typing');
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"📛 برای حمایت از ما و همچنان ربات ابتدا وارد کانال زیر بشید 👇

🆔 @Lite_Team

✅ سپس روی JOIN بزنید و به ربات برگشته عبارت 👇

🔸 /start

✴️ رو بزنید تا دکمه های ربات نمایش داده بشن👌",
      'parse_mode'=>'html',
	]);
	}

	elseif($textmassage=="برگشت"){
        sendAction($chat_id, 'typing');
	MrPHPBot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"به صفحه اصلی برگشتیم :",
	'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"لینک دعوت شما 🔗"],['text'=>"بهم یاد بده ☺️"]
	],
        [
	['text'=>"پشتیبانی 👤"],['text'=>"ارسال نظر 📩"]
	],
	]
	])

	]);


	}elseif($textmassage=="ارسال نظر 📩"){
                        sendAction($chat_id, 'typing');
			save("data/$from_id/file.txt","nazar");
				MrPHPBot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"لطفا نظر خود را بفرستید :",
                 'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت"]
	],
	]
	])

	]);


	}elseif($step=="nazar"){
                       save("data/$from_id/file.txt","none");
                          Forward($Dev,$chat_id,$message_id);
			MrPHPBot('sendmessage',[
			'chat_id'=>$chat_id,
			'text'=>"نظر شما ارسال شد.\nباتشکر",
      'parse_mode'=>'MarkDown',

	]);


	}elseif($textmassage=="لینک دعوت شما 🔗"){
        sendAction($chat_id, 'typing');
				MrPHPBot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"ربات هوش مصنوعی الینا😄
میتونه دوست شما باشه و با شما حرف بزنه😀
میتونی بهش کلمه یاد بدی😺
میتونی تعداد کلمه هایی که یاد دادی رو زیاد کنی و اخر ماه سورسشو رایگان بگیری😮
پس شروع کن🤤
https://telegram.me/ZiZiGolo_Robot?start=$from_id",
    'parse_mode'=>'html',
		]);
		}elseif($textmassage=="پشتیبانی 👤"){
        sendAction($chat_id, 'typing');
				MrPHPBot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"👤 Admin: @mohammadstar_98
🔰 Channel: @Lite_Team",
    'parse_mode'=>'html',
		]);
		}
 //end
elseif($textmassage=="بهم یاد بده ☺️"){
                        sendAction($chat_id, 'typing');
			save("data/$from_id/file.txt","pa2");
				MrPHPBot('sendmessage',[
		'chat_id'=>$chat_id,
		'text'=>"خب دوست خوبم ممنون که میخوای به من صحبت کردن یاد بدی
الان متن یا کلمه ای که میخوای وقتی میفرستی من بهش جواب بدم روبفرست :",
      'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت"]
	],
	]
	])
		]);
		}elseif($step=="pa2"){
                       save("data/$from_id/file.txt","pa3");
			MrPHPBot('sendmessage',[
			'chat_id'=>$chat_id,
			'text'=>"خب افرین حالا من باید به اون متن شما پاسخ بدم متن پاسخ
رافرستید :",
      'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"برگشت"]
	],
	]
	])
			]);
//
save("words/$textmassaage.txt","Tarif Nashode !");
save("last.txt",$textmassage);
}elseif ($step == 'pa3') {
save("data/$from_id/file.txt","pa4");
$last = file_get_contents("last.txt");
$myfile2 = fopen("wordlist.txt", "a") or die("Unable to open file!");
fwrite($myfile2, "$last\n");
fclose($myfile2);
save("words/$last.txt","$textmassage");
	MrPHPBot('sendmessage',[
			'chat_id'=>$chat_id,
			'text'=>"خیلی ممنون گلم حالا من یه چیز  یاد گرفتم دمتگرم.",
      'parse_mode'=>'MarkDown',
'reply_markup'=>json_encode([
	'resize_keyboard'=>true,
	'keyboard'=>[
	[
	['text'=>"لینک دعوت شما 🔗"],['text'=>"بهم یاد بده ☺️"]
	],
        [
	['text'=>"پشتیبانی 👤"],['text'=>"ارسال نظر 📩"]
	],
	]
	])
			]);
}
elseif (file_exists("words/$textmassage.txt")) {
        $send = file_get_contents("words/$textmassage.txt");

        MrPHPBot("sendMessage", [
            'chat_id' => $chat_id,
            'text' =>$send
        ]);

    }
    $txxt = file_get_contents('data/users.txt');
$pmembersid= explode("\n",$txxt);
if (!in_array($chat_id,$pmembersid)){
 $aaddd = file_get_contents('data/users.txt');
 $aaddd .= $chat_id."\n";
 file_put_contents('data/users.txt',$aaddd);
}
/*
این سورس ساخته شده در دو تیم👇

🔹 @Lite_Team 🔹
🔸 @soros_robot 🔸
و توسط ادمین های زیر👇
🔹 @mohammadstar_98 🔹
🔸 @Amirhossein_Taypram 🔸

نوشته شده است😜
*/
                      unlink("error_log");
?>