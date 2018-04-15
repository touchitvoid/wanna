<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="vMenu" id="vMenu">
    <div class="vMenu-onBtn">
        <i class="mdui-icon material-icons">arrow_back</i>
    </div>
    <ul class="small-vMenu-list" id="smallMenu">
        <li class="mdui-ripple">
            <i class="mdui-icon material-icons">book</i>
        </li>
        <li class="mdui-ripple">
            <i class="mdui-icon material-icons">build</i>
        </li>
        <li class="mdui-ripple">
            <i class="mdui-icon material-icons">cloud</i>
        </li>
        <li class="mdui-ripple">
            <i class="mdui-icon material-icons">details</i>
        </li>
    </ul>
    <div class="v-menu-assembly-1">
        <div class="Blog-logo">
            <div class="iam-img"></div>
            <div class="iam-t mdui-typo">
                <h5><?php $this->options->title() ?></h5>
                <p><?php $this->options->description() ?></p>
            </div>
        </div>
    </div>
    <div class="v-menu-assembly-2">
        <ul class="vMenu-item-list">
            <li class="mdui-ripple">归档</li>
            <li class="mdui-ripple">工具</li>
            <li class="mdui-ripple">导航</li>
            <li class="mdui-ripple">Github</li>
        </ul>
    </div>
</div>