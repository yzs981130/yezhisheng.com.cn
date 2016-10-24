> # Mirages

示例：[Mirages](https://hran.me/mirages.html)

大概，这是一款简洁的单栏的适合阅读的主题，适合放大段大段的文字、代码，没有炫酷的特效，字体设置上属于个人喜好，但大致上也不是很难看。。说到文字，因为考虑到一些阅读的舒适性的问题，所以栏宽设置的比较窄，<del>因而很难想象类似 iMac 5K 这样的设备上到底有多么糟糕的界面。。。</del>

主题为自适应，移动设备上体验尚可（至少 iPhone 和 iPad 上的阅读体验还可以）

主题内置了夜间模式，根据当地时间自动切换（22 点到第二天凌晨 6 点前为夜间模式）

图：

![首页](https://raw.githubusercontent.com/Dalodd/Mirages-For-Typecho/14d2a30b7f81b0ddce4a9faa13ae730b8c001a2c/imgs/Screenshot-2016-08-25-5-30-19.png)

## 主题安装及使用帮助

[主题安装及使用帮助](https://github.com/Dalodd/Mirages-For-Typecho/wiki)

## 更新

### 2016-08-25 日更新 v1.4.1

- 引入`pangu.js`, 自动在中文与英文之间补充空格

- 更换多说样式加载方式

- 添加注音、删除线、文字高亮等语法

- 添加数学公式使用`$`符书写行内公式的选项

- 风格微调: 部分地方使用虚线

- 添加 PJAX 事件相关设置

- 归档页添加标签云

- 标题及副标题改为居中显示

- banner 现在可以不是直的

- 部分地方添加 backdrop-filter(需浏览器支持)

- 其他细节调整及 BUG 修复

### 2016-07-10 日更新 v1.4.0

- 增加 PJAX

- 其他若干项调整

本次更新有部分设置项变动，请查看[升级向导](https://github.com/Dalodd/Mirages-For-Typecho/wiki/升级向导)以获取更多信息。

关于 PJAX 的若干说明: 

- PJAX 需到`设置外观`启用

- 目前: 搜索、自带评论未使用 PJAX

- 本模板已为百度统计、CNZZ 优化, 未优化的统计代码在启用 PJAX 后仅能统计到第一次访问时的浏览, 其他统计代码请参考其 API 自行处理。

### 2016-07-01 日更新

- 重构 Theme.css

- Use Web Fonts Loader

- 添加打赏及二维码坑位

- 添加「始终显示 Dashboard 」菜单选项

### 2016-06-11 日更新

- 更新版本号至: 1.2.0

- 新增浅色模板

- 新增夜间模式开关

本次更新有部分设置项变动，请查看[升级向导](https://github.com/Dalodd/Mirages-For-Typecho/wiki/升级向导)以获取更多信息。

### 2016-06-05 日更新

- 修复了部分样式问题

- 更新duoshuo.css, 添加博主标识

  你需要到duoshuo.css文件里，修改第一行中的`[data-user-id='0']:after` 中的`user-id`为你自己的User ID。

### 2016-05-28 日更新

- 添加了多说评论的支持

  到设置外观，填入`duoshuoShortName`即可。当然，你也可以直接使用插件，而不用理会这个。

  主题内置了多说的自定义外观，需要的请将`css/duoshuo.css`中的内容拷贝到**多说后台(http://yourdomain.duoshuo.com/admin/settings/)**的自定义CSS处，然后保存。**该自定义外观基于多说官方的暗色线框主题，**因此请在后台(http://yourdomain.duoshuo.com/admin/settings/themes/)启用暗色线框主题。




## License

Mirages-For-Typecho is released under the terms of the [GNU General Public License v3.0](https://github.com/Dalodd/Mirages-For-Typecho/blob/master/LICENSE)