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
if (SSR_get_client_ip()!='127.0.0.1'){
set_error_handler(
    create_function(
        '$severity, $message, $file, $line',
        'throw new ErrorException($message, $severity, $severity, $file, $line);'
    )
);
try {
    $arr = json_decode(file_get_contents('http://freegeoip.net/json/'.SSR_get_client_ip()),true);
} catch (Exception $e) {
    echo '<br>';

}

restore_error_handler();

if ($arr){
define( 'SSR_Visitor_Country',  $arr['country_name'] );
unset($arr);
}else{define( 'SSR_Visitor_Country',  'unknown');}
}else define( 'SSR_Visitor_Country',  'unknown');
	
if (SSR_Visitor_Country=="Bangladesh"){ ?>
<div class="ssr_info">
<p class="ssr_p_t">আপনাকে অনেক ধন্যবাদ এই প্লাগিন ব্যাবহার করার জন্য</p>
<p class="ssr_p"><b class="ssr_st_b_h">Shortcode : </b> [ssr_results] </p>
<p class="ssr_p"><b class="ssr_st_b_h">শুধুমাত্র যে user রা এই প্লাগিন এর মাধ্যমে ফলাফল ইনপুট দিতে পারবে :</b>  Author , Administrator , Super Administrator</p>
<p class="ssr_p">এই প্লাগিনের প্রিমিয়াম ভার্সন ও আছে , যাতে আপনি csv থেকে import করতে পারবেন , ৩ টা ছবি এবং ২৫ টা ফিল্ড (ছবি ছাড়া) সাপোর্ট করে , আছে আরও ফিচার।</p>
<p class="ssr_p">প্রিমিয়াম ভার্সন এর ডেমো দেখার জন্য ভিসিট করুন <a target="_blank" href="http://ssr.saadamin.info/wp-admin/admin.php?page=Student_Result">http://ssr.saadamin.info/wp-admin/admin.php?page=Student_Result</a></p>
<p class="ssr_p">user : test</p>
<p class="ssr_p">pass : test</p>
<p class="ssr_p">প্লাগিন এ  <b class="ssr_st_b_h">ajax</b> ব্যাবহার করা হয়েছে তাই ফলাফল পাবেন তৎক্ষণাৎ পেজ লোড ছাড়াই.</p>
<p class="ssr_p">প্রিমিয়াম ভার্সন বা যে কোন সমস্যার ও সাহায্যের জন্য আমাকে কল করতে পারেন  <b class="ssr_st_b_h">01722889212</b>  নাম্বার এ । বা ইমেইল করতে পারেন saadvi@gmail.com ঠিকানায়</p>
<p class="ssr_p"> [ssr_results] এই shortcode post/page এ ব্যবহার করুন  ,<a href="http://ssr.saadamin.info" target="_blank">যদি ডেমো দেখতে চান  এখানে ক্লিক করুন </a></p>
</div>
<?php }else{
?>
<div class="ssr_info">
<p class="ssr_p_t">Welcome to Simple Student Result</p>
<p class="ssr_p"><b class="ssr_st_b_h">Shortcode : </b> [ssr_results] </p>
<p class="ssr_p"><b class="ssr_st_b_h">who can input results :</b>  Author , Administrator , Super Administrator</p>
<p class="ssr_p">you can have premium version of this plugin , which support 3 images , csv import system, 25 fields (without images) and more features</p>
<p class="ssr_p">for premium version demo please visit <a target="_blank" href="http://ssr.saadamin.info/wp-admin/admin.php?page=Student_Result">http://ssr.saadamin.info/wp-admin/admin.php?page=Student_Result</a></p>
<p class="ssr_p">user : test</p>
<p class="ssr_p">pass : test</p>
<p class="ssr_p">Please contact with me if you need more features <a href="mailto:saadvi@gmail.com">saadvi@gmail.com</a></p>
<p class="ssr_p">Ajax supported simple student result and display. apply [ssr_results] shortcode in a post/page for show results  , <a href="http://ssr.saadamin.info" target="_blank">Click here for demo</a></p>
</div>
<?php } ?>