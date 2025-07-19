<?php

declare(strict_types=1);
/*******************************************************************************
 * Copyright (c) 2022. Ankio. All Rights Reserved.
 ******************************************************************************/
/**
 * Package: library\useragent
 * Class Browser
 * Created By ankio.
 * Date : 2023/7/13
 * Time : 21:06
 * Description : 浏览器识别类，用于解析 User-Agent 字符串并识别浏览器类型和版本
 */

namespace nova\plugin\device;

/**
 * 浏览器识别类
 *
 * 该类用于解析 HTTP User-Agent 字符串，识别用户使用的浏览器类型、版本等信息。
 * 支持识别多种主流浏览器，包括桌面浏览器和移动浏览器。
 *
 * @author ankio
 * @since 2023/7/13
 */
class Browser
{
    /**
     * 解析 User-Agent 字符串，识别浏览器信息
     *
     * 该方法通过正则表达式匹配 User-Agent 字符串中的特定标识符，
     * 识别用户使用的浏览器类型、版本等信息。
     *
     * @param  string $ua User-Agent 字符串
     * @return array  返回包含浏览器信息的数组
     *                - code: 浏览器代码标识符
     *                - title: 浏览器完整名称（包含版本号）
     */
    public static function get($ua)
    {
        $version = '';        // 浏览器版本号
        $code = null;         // 浏览器代码标识符

        // 360 安全浏览器识别
        if (preg_match('/360se/i', $ua)) {
            $title = '360 安全浏览器';
            $code = '360';
        }
        // 百度浏览器识别
        elseif (preg_match('/baidubrowser/i', $ua) || preg_match('/\ Spark/i', $ua)) {
            $title = '百度浏览器';
            $version = Version::get($ua, 'Browser');
            $code = 'BaiduBrowser';
        }
        // 搜狗高速浏览器识别
        elseif (preg_match('/SE\ /i', $ua) && preg_match('/MetaSr/i', $ua)) {
            $title = '搜狗高速浏览器';
            $code = 'Sogou-Explorer';
        }
        // QQ 浏览器识别
        elseif (preg_match('/QQBrowser/i', $ua) || preg_match('/MQQBrowser/i', $ua)) {
            $title = 'QQ 浏览器';
            $version = Version::get($ua, 'QQBrowser');
            $code = 'QQBrowser';
        }
        // Google Chrome Frame 识别
        elseif (preg_match('/chromeframe/i', $ua)) {
            $title = 'Google Chrome Frame';
            $version = Version::get($ua, 'chromeframe');
            $code = 'Chrome';
        }
        // Chromium 浏览器识别
        elseif (preg_match('/Chromium/i', $ua)) {
            $title = 'Chromium';
            $version = Version::get($ua, 'Chromium');
        }
        // Google Chrome Mobile 识别
        elseif (preg_match('/CrMo/i', $ua)) {
            $title = 'Google Chrome Mobile';
            $version = Version::get($ua, 'CrMo');
            $code = 'Chrome';
        }
        // Google Chrome for iOS 识别
        elseif (preg_match('/CriOS/i', $ua)) {
            $title = 'Google Chrome for iOS';
            $version = Version::get($ua, 'CriOS');
            $code = 'Chrome';
        }
        // 傲游浏览器识别
        elseif (preg_match('/Maxthon/i', $ua)) {
            $title = '傲游浏览器';
            $version = Version::get($ua, 'Maxthon');
            $code = 'Maxthon';
        }
        // MIUI Browser 识别
        elseif (preg_match('/MiuiBrowser/i', $ua)) {
            $title = 'MIUI Browser';
            $version = Version::get($ua, 'MiuiBrowser');
            $code = 'MIUI-Browser';
        }
        // 世界之窗浏览器识别
        elseif (preg_match('/TheWorld/i', $ua)) {
            $title = '世界之窗浏览器';
            $code = 'TheWorld';
        }
        // UC 浏览器识别（多种标识符）
        elseif (preg_match('/UBrowser/i', $ua)) {
            $title = 'UC 浏览器';
            $version = Version::get($ua, 'UBrowser');
            $code = 'UC';
        } elseif (preg_match('/UCBrowser/i', $ua)) {
            $title = 'UC 浏览器';
            $version = Version::get($ua, 'UCBrowser');
            $code = 'UC';
        } elseif (preg_match('/UC\ Browser/i', $ua)) {
            $title = 'UC 浏览器';
            $version = Version::get($ua, 'UC Browser');
            $code = 'UC';
        } elseif (preg_match('/UCWEB/i', $ua)) {
            $title = 'UC 浏览器';
            $version = Version::get($ua, 'UCWEB');
            $code = 'UC';
        }
        // BlackBerry 浏览器识别
        elseif (preg_match('/BlackBerry/i', $ua)) {
            $title = 'BlackBerry';
        }
        // Coast 浏览器识别
        elseif (preg_match('/Coast/i', $ua)) {
            $title = 'Coast';
            $version = Version::get($ua, 'Coast');
            $code = 'Opera';
        }
        // IE Mobile 识别
        elseif (preg_match('/IEMobile/i', $ua)) {
            $title = 'IE Mobile';
            $code = 'IE';
        }
        // LG Web Browser 识别
        elseif (preg_match('/LG Browser/i', $ua)) {
            $title = 'LG Web Browser';
            $version = Version::get($ua, 'Browser');
            $code = 'LG';
        }
        // Netscape Navigator 识别
        elseif (preg_match('/Navigator/i', $ua)) {
            $title = 'Netscape Navigator';
            $code = 'Netscape';
        }
        // Netscape 浏览器识别
        elseif (preg_match('/Netscape/i', $ua)) {
            $title = 'Netscape';
        }
        // Nintendo 3DS 浏览器识别
        elseif (preg_match('/Nintendo 3DS/i', $ua)) {
            $title = 'Nintendo 3DS';
            $code = 'Nintendo';
        }
        // Nintendo Browser 识别
        elseif (preg_match('/NintendoBrowser/i', $ua)) {
            $title = 'Nintendo Browser';
            $version = Version::get($ua, 'Browser');
            $code = 'Nintendo';
        }
        // Nokia Browser 识别
        elseif (preg_match('/NokiaBrowser/i', $ua)) {
            $title = 'Nokia Browser';
            $version = Version::get($ua, 'Browser');
            $code = 'Nokia';
        }
        // Opera Mini 识别
        elseif (preg_match('/Opera Mini/i', $ua)) {
            $title = 'Opera Mini';
            $code = 'Opera';
        }
        // Opera Mobile 识别
        elseif (preg_match('/Opera Mobi/i', $ua)) {
            if (preg_match('/Version/i', $ua)) {
                $version = Version::get($ua, 'Version');
            } else {
                $version = Version::get($ua, 'Opera Mobi');
            }
            $title = 'Opera Mobile';
            $code = 'Opera';
        }
        // Opera 浏览器识别（桌面版和移动版）
        elseif (preg_match('/Opera/i', $ua) || preg_match('/OPR/i', $ua)) {
            $title = 'Opera';
            $code = 'Opera';
            // 获取 Opera 版本号（支持多种版本标识符）
            if (preg_match('/Version/i', $ua)) {
                $version = Version::get($ua, 'Version');
            } elseif (preg_match('/OPR/i', $ua)) {
                $version = Version::get($ua, 'OPR');
            } else {
                // 使用 Opera 作为后备标识符，因为完整标题可能会变化（Next, Developer 等）
                $version = Version::get($ua, 'Opera');
            }
            // 解析完整版本名称，例如：Opera/9.80 (X11; Linux x86_64; U; Edition Labs Camera and Pages; Ubuntu/11.10; en) Presto/2.9.220 Version/12.00
            if (preg_match('/Edition ([\ ._0-9a-zA-Z]+)/i', $ua, $regmatch)) {
                $title .= ' ' . $regmatch[1];
            } elseif (preg_match('/Opera ([\ ._0-9a-zA-Z]+)/i', $ua, $regmatch)) {
                $title .= ' ' . $regmatch[1];
            }
        }
        // PS4 Web Browser 识别
        elseif (preg_match('/PlayStation\ 4/i', $ua)) {
            $title = 'PS4 Web Browser';
            $code = 'PS4';
        }
        // SEMC Browser 识别
        elseif (preg_match('/SEMC-Browser/i', $ua)) {
            $title = 'SEMC Browser';
            $version = Version::get($ua, 'SEMC-Browser');
            $code = 'Sony';
        }
        // SEMC Java 识别
        elseif (preg_match('/SEMC-java/i', $ua)) {
            $title = 'SEMC Java';
            $code = 'Sony';
        }
        // Nokia S60 识别（Series60 标识符）
        elseif (preg_match('/Series60/i', $ua) && !preg_match('/Symbian/i', $ua)) {
            $title = 'Nokia S60';
            $version = Version::get($ua, 'Series60');
            $code = 'Nokia';
        }
        // Nokia S60 识别（S60 标识符）
        elseif (preg_match('/S60/i', $ua) && !preg_match('/Symbian/i', $ua)) {
            $title = 'Nokia S60';
            $version = Version::get($ua, 'S60');
            $code = 'Nokia';
        }
        // TT 浏览器识别
        elseif (preg_match('/TencentTraveler/i', $ua)) {
            $title = 'TT 浏览器';
            $version = Version::get($ua, 'TencentTraveler');
            $code = 'QQBrowser';
        }
        // Ubuntu Web Browser 识别
        elseif ((preg_match('/Ubuntu\;\ Mobile/i', $ua) || preg_match('/Ubuntu\;\ Tablet/i', $ua) && preg_match('/WebKit/i', $ua))) {
            $title = 'Ubuntu Web Browser';
            $code = 'Ubuntu';
        }
        // Android Webkit 识别
        elseif (preg_match('/AppleWebkit/i', $ua) && preg_match('/Android/i', $ua) && !preg_match('/Chrome/i', $ua)) {
            $title = 'Android Webkit';
            $version = Version::get($ua, 'Version');
            $code = 'Android-Webkit';
        }
        // WebView 识别
        elseif (preg_match('/Chrome/i', $ua) && preg_match('/Mobile/i', $ua) && (preg_match('/Version/i', $ua) || preg_match('/wv/i', $ua))) {
            $title = 'WebView';
            $version = Version::get($ua, 'Version');
            $code = 'Android-Webkit';
        }
        // 以下浏览器识别顺序调整，以确保更好的检测效果
        // Microsoft Edge 识别（需要同时匹配 Edge、Chrome 和 Safari）
        elseif (preg_match('/Edge/i', $ua) && preg_match('/Chrome/i', $ua) && preg_match('/Safari/i', $ua)) {
            $title = 'Microsoft Edge';
            $version = Version::get($ua, 'Edge');
            $code = 'Edge';
        }
        // Google Chrome 识别
        elseif (preg_match('/Chrome/i', $ua)) {
            $title = 'Google Chrome';
            $version = Version::get($ua, 'Chrome');
            $code = 'Chrome';
        }
        // Safari 浏览器识别
        elseif (preg_match('/Safari/i', $ua) && !preg_match('/Nokia/i', $ua)) {
            $title = 'Safari';
            $code = 'Safari';
            if (preg_match('/Version/i', $ua)) {
                $version = Version::get($ua, 'Version');
            }
            // 检测移动版 Safari
            if (preg_match('/Mobile Safari/i', $ua)) {
                $title = 'Mobile ' . $title;
            }
        }
        // Nokia Web Browser 识别
        elseif (preg_match('/Nokia/i', $ua)) {
            $title = 'Nokia Web Browser';
            $code = 'Nokia';
        }
        // Firefox 浏览器识别
        elseif (preg_match('/Firefox/i', $ua)) {
            $title = 'Firefox';
            $version = Version::get($ua, 'Firefox');
        }
        // Internet Explorer 识别（包括 Trident 引擎）
        elseif (preg_match('/MSIE/i', $ua) || preg_match('/Trident/i', $ua)) {
            $title = 'Internet Explorer';
            $code = 'IE';
            if (preg_match('/\ rv:([.0-9a-zA-Z]+)/i', $ua)) {
                // IE11 或更新版本
                $version = Version::get($ua, ' rv');
            } else {
                // IE10 或更早版本，正则表达式：'/MSIE[\ |\/]?([.0-9a-zA-Z]+)/i'
                $version = Version::get($ua, 'MSIE');
            }
            // 检测 IE 兼容模式
            if ($version === '7.0' && preg_match('/Trident\/4.0/i', $ua)) {
                $version = '8.0 (Compatibility Mode)';
            }
        }
        // Mozilla 兼容浏览器识别
        elseif (preg_match('/Mozilla/i', $ua)) {
            $title = 'Mozilla';
            $version = Version::get($ua, ' rv');
            if (empty($version)) {
                $title .= ' Compatible';
                $code = 'Mozilla';
            }
        }
        // 未匹配到任何已知浏览器
        else {
            $title = 'Other Browser';
            $code = 'Others';
        }

        // 如果没有设置代码标识符，使用标题作为代码
        if (is_null($code)) {
            $code = $title;
        }

        // 如果有版本号，将其添加到标题中
        if ($version != '') {
            $title .= " $version";
        }

        // 构建返回结果数组
        $result['code'] = $code;
        $result['title'] = $title;
        return $result;
    }
}
