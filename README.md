# wanna

<img src='http://icry.info/usr/uploads/2018/04/1032564841.png' width='300px'/>


半基于mdui的typecho主题
终于算是能用了

由于路径引用的问题目前需要放置字体和图标在/usr/themes目录下  [下载链接](http://icry.info/font.zip)

[DEMO 主题展示](http://icry.info/)

- 大概是没有特色了


提供 '归档' '友链' 模板
请在新建独立页面选择对应的模板）

后台->更改外观->设置外观 进行修改独立页面的链接qwq

 - 新增简单后台（背景图，侧边栏logo，缩略图，网站图标）

 - 留言，归档，友链 (success) 后面添加更多模板qwq  
 
 - 即将添加全主题ajax（pjax）....
 
 - 谢谢大家了
 
 添加友链的方法
 
> 外观 -> 编辑当前外观 -> friend.php 里面的注释部分添加代码，格式如下

> 
     <a href="博客链接">
        <div class="linksCard">
            <div class="colorBG"></div>
            <div class="linkCon">
                <img src="头像地址">
                <div class="links-text">
                    <div class="blogName">博客名字</div>
                    <div class="blog-emmm">描述</div>
                </div>
            </div>
        </div>
      </a>
