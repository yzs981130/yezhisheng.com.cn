<?php
/**
 * 在解析内容前后处理一些事情
 * 
 * @package Content Handler
 * @author Hran
 * @version 1.0.0
 * @link https://hran.me
 */
class ContentHandler_Plugin implements Typecho_Plugin_Interface
{
	/**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
	public static function activate() {
        Typecho_Plugin::factory('Widget_Archive')->title = array('ContentHandler_Plugin', 'title');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->content = array('ContentHandler_Plugin', 'content');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->contentEx = array('ContentHandler_Plugin', 'contentEx');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->excerpt = array('ContentHandler_Plugin', 'excerpt');
        Typecho_Plugin::factory('Widget_Abstract_Contents')->excerptEx = array('ContentHandler_Plugin', 'excerptEx');
    }

	/**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
	public static function deactivate(){}

	/**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
	public static function config(Typecho_Widget_Helper_Form $form) {}

	/**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
	public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 插件方法
     * @param $text
     * @param Widget_Abstract_Contents $widget
     * @return array
     */
    public static function content($text, Widget_Abstract_Contents $widget) {
        return self::parse($text, $widget);
    }
    public static function excerpt($text, Widget_Abstract_Contents $widget) {
        return self::parse($text, $widget);
    }
    
    public static function contentEx($content, Widget_Abstract_Contents $widget) {
        return self::afterParsed($content, $widget);
    }
    public static function excerptEx($content, Widget_Abstract_Contents $widget) {
        return self::afterParsed($content, $widget);
    }
    public static function title($title, Widget_Abstract_Contents $widget) {
        return self::parseBiaoqing($title);
    }
    
 
	/**
     * Parse
     * 
     * @access public
     * @param string $text
     * @param Widget_Abstract_Contents $widget 文章正文
     * @return array
     */
	public static function parse($text, Widget_Abstract_Contents $widget) {
        if ($widget->isMarkdown) {
            $text = self::beforeParseMarkdown($text);
            $content = $widget->markdown($text);
        } else {
            $content = $widget->autoP($text);
        }
        return $content;
	}

    /**
     * After Parsed
     * @param $content
     * @param Widget_Abstract_Contents $widget
     * @return string
     */
    private static function afterParsed($content, Widget_Abstract_Contents $widget) {
        $replaceStartIndex = array();
        $replaceEndIndex = array();
        $currentReplaceId = 0;
        $replaceIndex = 0;
        $searchIndex = 0;
        $searchCloseTag = false;
        $contentLength = strlen($content);
        while (true) {
            if ($searchCloseTag) {
                $tagName = substr($content, $searchIndex, 4);
                if ($tagName == "<cod") {
                    $searchIndex = strpos($content, '</code>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 7;
                } elseif ($tagName == "<pre") {
                    $searchIndex = strpos($content, '</pre>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 6;
                } elseif ($tagName == "<kbd") {
                    $searchIndex = strpos($content, '</kbd>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 6;
                } elseif ($tagName == "<scr") {
                    $searchIndex = strpos($content, '</script>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 9;
                } elseif ($tagName == "<sty") {
                    $searchIndex = strpos($content, '</style>', $searchIndex);
                    if (!$searchIndex) {
                        break;
                    }
                    $searchIndex += 8;
                } else {
                    break;
                }

                if (!$searchIndex) {
                    break;
                }
                $replaceIndex = $searchIndex;
                $searchCloseTag = false;
                continue;
            } else {
                $searchCodeIndex = strpos($content, '<code', $searchIndex);
                $searchPreIndex = strpos($content, '<pre', $searchIndex);
                $searchKbdIndex = strpos($content, '<kbd', $searchIndex);
                $searchScriptIndex = strpos($content, '<script', $searchIndex);
                $searchStyleIndex = strpos($content, '<style', $searchIndex);
                if (!$searchCodeIndex) {
                    $searchCodeIndex = $contentLength;
                }
                if (!$searchPreIndex) {
                    $searchPreIndex = $contentLength;
                }
                if (!$searchKbdIndex) {
                    $searchKbdIndex = $contentLength;
                }
                if (!$searchScriptIndex) {
                    $searchScriptIndex = $contentLength;
                }
                if (!$searchStyleIndex) {
                    $searchStyleIndex = $contentLength;
                }
                $searchIndex = min($searchCodeIndex, $searchPreIndex, $searchKbdIndex, $searchScriptIndex, $searchStyleIndex);
                $searchCloseTag = true;
            }
            $replaceStartIndex[$currentReplaceId] = $replaceIndex;
            $replaceEndIndex[$currentReplaceId] = $searchIndex;
            $currentReplaceId++;
            $replaceIndex = $searchIndex;
        }

        $output = "";
        $output .= substr($content, 0, $replaceStartIndex[0]);
        for ($i = 0; $i < count($replaceStartIndex); $i++) {
            $part = substr($content, $replaceStartIndex[$i], $replaceEndIndex[$i] - $replaceStartIndex[$i]);
            $renderedPart = self::parsePartContent($part);
            $output.= $renderedPart;
            if ($i < count($replaceStartIndex) - 1) {
                $output.= substr($content, $replaceEndIndex[$i], $replaceStartIndex[$i + 1] - $replaceEndIndex[$i]);
            }
        }
        $output .= substr($content, $replaceEndIndex[count($replaceStartIndex) - 1]);
        return $output;
    }

    private static function parsePartContent($content) {
        $content = self::parseBiaoqing($content);
        return $content;
    }

    private static function parseBiaoqing($content) {
        $content = preg_replace('/\#\[\s*(呵呵|哈哈|吐舌|太开心|笑眼|花心|小乖|乖|捂嘴笑|滑稽|你懂的|不高兴|怒|汗|黑线|泪|真棒|喷|惊哭|阴险|鄙视|酷|啊|狂汗|what|疑问|酸爽|呀咩爹|委屈|惊讶|睡觉|笑尿|挖鼻|吐|犀利|小红脸|懒得理|勉强|爱心|心碎|玫瑰|礼物|彩虹|太阳|星星月亮|钱币|茶杯|蛋糕|大拇指|胜利|haha|OK|沙发|手纸|香蕉|便便|药丸|红领巾|蜡烛|音乐|灯泡|开心|钱|咦|呼|冷|生气|弱|吐血)\s*\]/is',
            "<img class=\"biaoqing newpaopao\" src=\"https://abc.qnssl.com/biaoqing/newpaopao/$1@2x.png\" height=\"30\" width=\"30\" no-zoom>", $content);
        $content = preg_replace('/\@\(\s*(呵呵|哈哈|吐舌|太开心|笑眼|花心|小乖|乖|捂嘴笑|滑稽|你懂的|不高兴|怒|汗|黑线|泪|真棒|喷|惊哭|阴险|鄙视|酷|啊|狂汗|what|疑问|酸爽|呀咩爹|委屈|惊讶|睡觉|笑尿|挖鼻|吐|犀利|小红脸|懒得理|勉强|爱心|心碎|玫瑰|礼物|彩虹|太阳|星星月亮|钱币|茶杯|蛋糕|大拇指|胜利|haha|OK|沙发|手纸|香蕉|便便|药丸|红领巾|蜡烛|音乐|灯泡|开心|钱|咦|呼|冷|生气|弱|吐血)\s*\)/is',
            "<img class=\"biaoqing newpaopao\" src=\"https://abc.qnssl.com/biaoqing/newpaopao/$1@2x.png\" height=\"30\" width=\"30\" no-zoom>", $content);
        $content = preg_replace('/\#\(\s*(高兴|小怒|脸红|内伤|装大款|赞一个|害羞|汗|吐血倒地|深思|不高兴|无语|亲亲|口水|尴尬|中指|想一想|哭泣|便便|献花|皱眉|傻笑|狂汗|吐|喷水|看不见|鼓掌|阴暗|长草|献黄瓜|邪恶|期待|得意|吐舌|喷血|无所谓|观察|暗地观察|肿包|中枪|大囧|呲牙|抠鼻|不说话|咽气|欢呼|锁眉|蜡烛|坐等|击掌|惊喜|喜极而泣|抽烟|不出所料|愤怒|无奈|黑线|投降|看热闹|扇耳光|小眼睛|中刀)\s*\)/is',
            "<img class=\"biaoqing alu\" src=\"https://abc.qnssl.com/biaoqing/alu/$1@2x.png\" height=\"33\" width=\"33\" no-zoom>", $content);
        return $content;
    }

    private static function beforeParseMarkdown($text) {
        $text = str_replace("```objective-c", "```objectivec", $text);
        return $text;
    }

}