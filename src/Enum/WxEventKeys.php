<?php


namespace Ineplant\Enum;


class WxEventKeys {

    //按autoreply_messages的id查询回复
    const MESSAGES_REPLAY = 'msg_';

    //关键词回复
    const KEYWORDS_REPLAY = 'kw_';

    const SHARE_SUBSCRIBE = '_share__';
    const COMPANY_SHARE_SUBSCRIBE = '_companyshare__';
    const LOGIN = '_log__';

    //回复活动图文消息 $activityId
    const ACTIVITY = '_activity__';
}