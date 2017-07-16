<?php exit; ?> 



2017-03-03 09:11:22------>array (
  0 => 'UPDATE `go_admin` SET `logintime`=\'1488503482\' WHERE (`uid`=\'11\')',
  1 => 'UPDATE `go_admin` SET `loginip`=\'127.0.0.1\' WHERE (`uid`=\'11\')',
) 



2017-03-03 11:47:46------>array (
  0 => 'update `go_activity` set `act_category`=1,`act_title`=\'测试1\',`act_desc`=\'是大法官是梵蒂冈\',`act_content`=\'&lt;p&gt;双方各是第三方 是梵蒂冈是大法官是梵蒂冈是&lt;br/&gt;&lt;/p&gt;\',`act_poster`=\'poster/20170219/25421940471543.jpg\',`act_charge`=50.00,`act_time`=1488512866,`act_start_time`=1493087100,`act_end_time`=1493432700,`act_address`=\'阿斯顿发撒旦法\',`act_latlng`=\'\',`act_num_limit`=50,`act_consult`=\'18305947460\',`act_recommend`=1,`act_active`=1,`act_best`=1,`integral`=10.00,`give_integral`=20,`share_integral`=10,`act_fare`=50,`act_is_group`=1 WHERE `act_id`=4',
  1 => 'update `go_act_step` set `num`=20,`money`= 50.00 WHERE `id`=16',
  2 => 'update `go_act_step` set `num`=30,`money`= 40.00 WHERE `id`=17',
  3 => 'update `go_act_step` set `num`=40,`money`= 30.00 WHERE `id`=18',
  4 => 'update `go_act_step` set `num`=50,`money`= 20.00 WHERE `id`=19',
  5 => 'update `go_act_filter` set `attr_id`=1,`attr_value`=\'深圳\' WHERE `id`=9 AND `act_id`=4',
  6 => 'update `go_act_filter` set `attr_id`=2,`attr_value`=\'2.0\' WHERE `id`=10 AND `act_id`=4',
  7 => 'update `go_item_share` set `title`=\'是大法官是\',`description`=\'是大法官是防盗\',`link`=\'http://www.outmall.com/mobile/activity/activity/4\',`icon`=\'share/20170219/57550439471590.jpg\' WHERE `type`=1 AND `item_id`=4',
  8 => 'update `go_act_notice` set `n_notice`=\'双方各第三方\' WHERE `n_id`=14',
  9 => 'update `go_act_notice` set `n_notice`=\'阿斯顿发\' WHERE `n_id`=15',
  10 => 'update `go_act_notice` set `n_notice`=\'大法深深的\' WHERE `n_id`=16',
  11 => 'update `go_act_notice` set `n_notice`=\'发的规范化的风格\' WHERE `n_id`=17',
) 



2017-03-03 15:50:30------>array (
  0 => 'UPDATE `go_admin` SET `logintime`=\'1488527430\' WHERE (`uid`=\'11\')',
  1 => 'UPDATE `go_admin` SET `loginip`=\'127.0.0.1\' WHERE (`uid`=\'11\')',
) 



2017-03-03 15:50:51------>array (
  0 => 'update `go_act_order` set `o_status` = \'已支付\' WHERE `o_id`=22',
  1 => 'update `go_act_sign` set `s_status` = \'已支付\' WHERE `s_id`=37',
  2 => 'insert into `go_act_refund_log` (`order_id`,`action_user`,`order_status`,`refund_status`,`refund_type`,`action_time`,`status_desc`) VALUES (22,0,\'已支付\',0,0,1488527451,\'设置为已支付\')',
) 



2017-03-03 15:53:37------>array (
  0 => 'update `go_act_order` set `o_status` = \'已支付\' WHERE `o_id`=21',
  1 => 'update `go_act_sign` set `s_status` = \'已支付\' WHERE `s_id`=36',
  2 => 'insert into `go_act_refund_log` (`order_id`,`action_user`,`order_status`,`refund_status`,`refund_type`,`action_time`,`status_desc`) VALUES (21,0,\'已支付\',0,0,1488527617,\'设置为已支付\')',
) 



2017-03-03 16:20:35------>array (
  0 => 'update `go_act_order` set `o_status` = \'未支付\' WHERE `o_id`=21',
  1 => 'update `go_act_sign` set `s_status` = \'未支付\' WHERE `s_id`=36',
  2 => 'insert into `go_act_refund_log` (`order_id`,`action_user`,`order_status`,`refund_status`,`refund_type`,`action_time`,`status_desc`) VALUES (21,0,\'未支付\',0,0,1488529235,\'设置为未支付\')',
) 



2017-03-03 17:14:02------>array (
  0 => 'delete from `go_act_order` WHERE `o_id`=3',
  1 => 'delete from `go_act_sign` WHERE `s_id`=3',
  2 => 'update `go_activity` set `act_num_signed`=`act_num_signed`-1 WHERE `act_id`=1',
) 



