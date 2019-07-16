# 说明

 受到一个node项目的启发，就来写一个PHP版本的，原作者[用Node写一个爬虫脚本每天定时给女朋友发一封暖心邮件](https://github.com/Vincedream/NodeMail)
 
 
![](public/11.png)


## 数据来源

天气信息：https://www.sojson.com/blog/305.html  
文字图片来源：http://wufazhuce.com/

## 环境配置

定时功能使用了laravel框架里面的任务调度。发邮件为自带邮件功能  

### 开启调度器

在服务器上通过 crontab -e 来新增或编辑 Cron 条目  

` php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1`  

路径为你服务器项目路径

###技术支持


利用file_get_contents()来爬取网页内容

利用laravel框架的任务调度来进行人物定时
