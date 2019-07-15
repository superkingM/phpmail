<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $url = "http://wufazhuce.com/";//抓取图片
        $html = file_get_contents($url);
        preg_match_all('/<img[^>]*\/>/',$html,$img);
        //如果出现中文乱码使用下面代码
        //$getcontent = iconv("gb2312", "utf-8",$html);
        $preg = '/http:\/\/.*/';
        preg_match_all($preg,$img[0][0],$oneimg);
        $oneimg =substr($oneimg[0][0],0,-11);//图片
        $text_preg = '/<a .*?>.*?<\/a>/';
        preg_match_all($text_preg,$html,$text);
        $reg3="/>(.*)<\/a>/";
        preg_match_all($reg3,$text[0][2],$title);
        $title = $title[1][0];
        $text=['title'=>$title,'img'=>$oneimg];
//        Text::create($text);
//        $emails = Email::where('type',1)->select('email','oneday','city_code')->get();

            $watcher = 'http://t.weather.sojson.com/api/weather/city/101010100';
            $wundu = $this->HttpGet($watcher);
            $wundu = json_decode($wundu, true);
            $day = time()-1495209600;
            $day = ceil($day/86400);
            foreach ($wundu['data']['forecast'] as &$wather ){
                $falg = array_key_exists('aqi',$wather);
                $wather['low']=mb_substr($wather['low'],2,3);
                $wather['high']=mb_substr($wather['high'],2,3);

                if ($falg){
                    $aqi = $wather['aqi'];
                    $wather['quality']=$this->aqi($aqi);
                }

            }

            Mail::send('test', ['tt' => $wundu,'day'=>$day,'img'=>$oneimg,'title'=>$title], function ($message)/* use ($email)*/ {
//                $to =$email['email'];
                $to = ['396656156@qq.com'];
                $message->to($to)->subject('每日暖心');
            });
            // 返回的一个错误数组，利用此可以判断是否发送成功
//            dd(Mail::failures());




    }

    //空气质量
    public function aqi($aqi)
    {
        if ($aqi < 51) {
            return '优';
        }
        if ($aqi > 50 && $aqi < 101) {
            return '良';
        }
        if ($aqi > 100 && $aqi < 151) {
            return '轻度污染';
        }
        if ($aqi > 150 && $aqi < 201) {
            return '中度污染';
        }
        if ($aqi > 200 && $aqi < 301) {
            return '重度污染';
        }
        if ($aqi>300){
            return '严重污染';
        }
    }


    public function HttpGet($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt ( $curl, CURLOPT_TIMEOUT, 500 );
        // curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36');
        //如果用的协议是https则打开鞋面这个注释         //curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, false );
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
