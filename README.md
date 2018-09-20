<img src='http://icry.info/usr/uploads/2018/04/1032564841.png' width='300px'/>

一款轻量级的半基于mdui（没有遵守半点规范2333）的typecho主题 经过我三天打鱼两天晒网的仔细（写bug）打磨，算是基本完善能用了

<img src='http://icry.info/img/wanna.png' width='100%'/>

感谢各位大佬找出的bug和不足（一定会继续完善的），如果觉得主题还行，拜托顺手给我点颗星星啦

[主题预览链接](http://icry.info/)


使用方法


将主题文件夹命名为wanna(很重要，不然缩略图会有问题)
放到typecho目录下 usr/themes 

如果 ‘主页’ 最新回复显示空白，请到 后台->更改外观->设置外观 修改显示数目（一个奇怪的bug）

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
