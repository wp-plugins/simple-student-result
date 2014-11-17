<?php

// Function to get the client IP address
function SSR_get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
$arr = json_decode(file_get_contents('http://freegeoip.net/json/'.SSR_get_client_ip()),true);
if ($arr){
define( 'SSR_Visitor_Country',  $arr['country_name'] );
unset($arr);
}else{define( 'SSR_Visitor_Country',  'unknown');}

	
if (SSR_Visitor_Country=="Bangladesh"){ ?>
<div class="ssr_info">
<p class="ssr_p_t">আপনাকে অনেক ধন্যবাদ এই প্লাগিন ব্যাবহার করার জন্য</p>
<p class="ssr_p"><b class="ssr_st_b_h">Shortcode : </b> [ssr_results] </p>
<p class="ssr_p"><b class="ssr_st_b_h">শুধুমাত্র যে user রা এই প্লাগিন এর মাধ্যমে ফলাফল ইনপুট দিতে পারবে :</b>  Author , Administrator , Super Administrator</p>
<p class="ssr_p">ফলাফলের বছর গত <b class="ssr_st_b_h">১০</b> বছরের টা দেখতে পারবেন  , সুতরাং আপনার কম্পিউটার এর ক্যালেন্ডার এর তারিখ ও বছর ঠিক আছে কিনা দেখবেন।.</p><br>
<p class="ssr_p">প্লাগিন এ  <b class="ssr_st_b_h">ajax</b> ব্যাবহার করা হয়েছে তাই ফলাফল পাবেন তৎক্ষণাৎ পেজ লোড ছাড়াই.</p>
<p class="ssr_p">যে কোন সমস্যার ও সাহায্যের জন্য আমাকে কল করতে পারেন  <b class="ssr_st_b_h">01722889212</b>  নাম্বার এ । বা ইমেইল করতে পারেন saadvi@gmail.com ঠিকানায়</p>
</div>
<?php }else{
?>
<div class="ssr_info">
<p class="ssr_p_t">Welcome to Simple Student Result</p>
<p class="ssr_p"><b class="ssr_st_b_h">Shortcode : </b> [ssr_results] </p>
<p class="ssr_p"><b class="ssr_st_b_h">who can input results :</b>  Author , Administrator , Super Administrator</p>
<p class="ssr_p">Passing year is for last <b class="ssr_st_b_h">10</b> years , make sure your computer date is up-to-date.</p>
</div>
<?php } ?>