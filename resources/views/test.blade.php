<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
    <link href="/css/main.css" type="text/css" rel="stylesheet" />
    <title>暖心</title>
</head>
<body>
<div class="content" style="margin: 0 auto;box-shadow: 0 0 10px #333; width: 560px;margin-top: 3.125rem;margin-bottom: 3.125rem; font-size: 1.25rem;color: dimgrey;font-family: '微软雅黑';display: flex;flex-direction: column;text-align: center;">
    <p class="title">今天是我们认识的第 <span style="color: crimson;font-size: 2rem;">{{$day}}</span> 天</p>
    <p class="mind" style="margin-top: 1.5rem;">{{$tt['data']['forecast']['0']['notice']}}</p>
    <p class="wa" style="font-size: 0.875rem;margin-top: 1rem;">最近几天天气</p>
    <p class="wather" style="margin-top: 1rem;font-size: 1rem;">今天  <span></span>{{$tt['data']['forecast']['0']['type']}}  {{$tt['data']['forecast']['0']['low']}}°/{{$tt['data']['forecast']['0']['high']}}°  空气指数：{{$tt['data']['forecast']['0']['aqi']}} {{$tt['data']['forecast']['0']['quality']}}</P>
    <p class="wather" style="margin-top: 1rem;font-size: 1rem;">明天  <span></span>{{$tt['data']['forecast']['1']['type']}}  {{$tt['data']['forecast']['1']['low']}}°/{{$tt['data']['forecast']['1']['high']}}°  空气指数：{{$tt['data']['forecast']['1']['aqi']}} {{$tt['data']['forecast']['1']['quality']}}</P>
    <p class="wather" style="margin-top: 1rem;font-size: 1rem;">后天  <span></span>{{$tt['data']['forecast']['2']['type']}}  {{$tt['data']['forecast']['2']['low']}}°/{{$tt['data']['forecast']['2']['high']}}°  空气指数：{{$tt['data']['forecast']['2']['aqi']}} {{$tt['data']['forecast']['2']['quality']}}</P>
    <p class="one" style="margin-top: 1.25rem; color: cornflowerblue;font-size: 1rem;">{{date('Y/m/d',time())}}</p>
    <div class="img" style="margin-top: 1.25rem;"><img src="{{$img}}" style=" width: 90%;"></div>
    <p class="imgt" style="font-size: 12px;color: darkgray;margin-bottom: 1.25rem;">摄影</p>
    <div class="text" style="font-size: 0.875rem;width: 80%;margin: 0 auto;line-height: 1.5rem;margin-bottom: 3rem;">{{$title}}</div>
    <div style="font-size:12px;margin: 0 auto; margin-bottom: 2rem;">design by @亢龙 带你去映雪湖</div>
</div>
</body>
</html>

