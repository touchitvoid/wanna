# wanna

<img src='http://icry.info/usr/uploads/2018/04/1032564841.png' width='300px'/>


半基于mdui的typecho主题
终于算是能用了

由于路径引用的问题目前需要放置字体和图标在/usr/themes目录下  

字体图标包 > [下载链接](http://icry.info/font.zip)

[主题预览链接](http://icry.info/)


提供 '归档' '友链' 模板
请在新建独立页面选择对应的模板）

后台->更改外观->设置外观 进行修改独立页面的链接qwq

 - 大概是没有特色了

 - 后台逐步完善

 - 留言，归档，友链 (success) 后面添加更多模板qwq  
 
 - 全站pjax支持（可能有点生硬，后续加入动画改善）
 
 - 页面样式细节调整
 
 - 文件结构梳理
 
 #### 添加友链的方法
 
> 新建独立页面，选择 ‘友链模板’ 然后编辑内容 插入以下代码
(!!!为typecho输出html的方法!!! [ html代码 ] !!!)

> 
    !!!
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
    !!! 
