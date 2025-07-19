<?php

declare(strict_types=1);
/*******************************************************************************
 * Copyright (c) 2022. Ankio. All Rights Reserved.
 ******************************************************************************/
/**
 * Package: library\useragent
 * Class Version
 * Created By ankio.
 * Date : 2023/7/13
 * Time : 21:06
 * Description : 版本号提取工具类，用于从 User-Agent 字符串中提取浏览器版本号
 */

namespace nova\plugin\device;

/**
 * 版本号提取工具类
 *
 * 该类用于从 User-Agent 字符串中提取浏览器版本号信息。
 * 通过正则表达式匹配特定的版本标识符来获取版本号。
 *
 * @author ankio
 * @since 2023/7/13
 */
class Version
{
    /**
     * 从 User-Agent 字符串中提取指定标识符的版本号
     *
     * 该方法使用正则表达式在 User-Agent 字符串中查找指定的标识符，
     * 并提取其后面的版本号信息。
     *
     * @param  string $ua    User-Agent 字符串
     * @param  string $title 要查找的版本标识符（如 'Chrome', 'Firefox', 'Version' 等）
     * @return string 返回提取到的版本号，如果未找到则返回空字符串
     */
    public static function get($ua, $title)
    {
        // 使用正则表达式匹配版本号，支持空格、斜杠或冒号作为分隔符
        preg_match('/' . $title . '[\ |\/|\:]?([.0-9a-zA-Z]+)/i', $ua, $regmatch);
        return (!isset($regmatch[1])) ? '' : $regmatch[1];
    }
}
