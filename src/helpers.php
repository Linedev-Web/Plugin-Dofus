<?php

use Azuriom\Plugin\Dofus\Utils\Item;
use Azuriom\Plugin\Dofus\Models\Account;
use Azuriom\Plugin\Dofus\Models\AccountLink;

/*
|--------------------------------------------------------------------------
| Helper functions
|--------------------------------------------------------------------------
|
| Here is where you can register helpers for your plugin. These
| functions are loaded by Composer and are globally available on the app !
| Just make sure you verify that a function don't exists before registering it
| to prevent any side effect.
|
*/


if (! function_exists('get_level_by_xp')) {
    function get_level_by_xp($experience)
    {
        if ($experience >= 0 && $experience < 110) {
            return ('1');
        }
        if ($experience >= 110 && $experience < 650) {
            return ('2');
        }
        if ($experience >= 650 && $experience < 1500) {
            return ('3');
        }
        if ($experience >= 1500 && $experience < 2800) {
            return ('4');
        }
        if ($experience >= 2800 && $experience < 4800) {
            return ('5');
        }
        if ($experience >= 4800 && $experience < 7300) {
            return ('6');
        }
        if ($experience >= 7300 && $experience < 10500) {
            return ('7');
        }
        if ($experience >= 10500 && $experience < 14500) {
            return ('8');
        }
        if ($experience >= 14500 && $experience < 19200) {
            return ('9');
        }
        if ($experience >= 19200 && $experience < 25200) {
            return ('10');
        }
        if ($experience >= 25200 && $experience < 32600) {
            return ('11');
        }
        if ($experience >= 32600 && $experience < 41000) {
            return ('12');
        }
        if ($experience >= 41000 && $experience < 50500) {
            return ('13');
        }
        if ($experience >= 50500 && $experience < 61000) {
            return ('14');
        }
        if ($experience >= 61000 && $experience < 75000) {
            return ('15');
        }
        if ($experience >= 75000 && $experience < 91000) {
            return ('16');
        }
        if ($experience >= 91000 && $experience < 115000) {
            return ('17');
        }
        if ($experience >= 115000 && $experience < 142000) {
            return ('18');
        }
        if ($experience >= 142000 && $experience < 171000) {
            return ('19');
        }
        if ($experience >= 171000 && $experience < 202000) {
            return ('20');
        }
        if ($experience >= 202000 && $experience < 235000) {
            return ('21');
        }
        if ($experience >= 235000 && $experience < 270000) {
            return ('22');
        }
        if ($experience >= 270000 && $experience < 310000) {
            return ('23');
        }
        if ($experience >= 310000 && $experience < 353000) {
            return ('24');
        }
        if ($experience >= 353000 && $experience < 398500) {
            return ('25');
        }
        if ($experience >= 398500 && $experience < 448000) {
            return ('26');
        }
        if ($experience >= 448000 && $experience < 503000) {
            return ('27');
        }
        if ($experience >= 503000 && $experience < 561000) {
            return ('28');
        }
        if ($experience >= 561000 && $experience < 621600) {
            return ('29');
        }
        if ($experience >= 621600 && $experience < 687000) {
            return ('30');
        }
        if ($experience >= 687000 && $experience < 755000) {
            return ('31');
        }
        if ($experience >= 755000 && $experience < 829000) {
            return ('32');
        }
        if ($experience >= 829000 && $experience < 910000) {
            return ('33');
        }
        if ($experience >= 910000 && $experience < 1000000) {
            return ('34');
        }
        if ($experience >= 1000000 && $experience < 1100000) {
            return ('35');
        }
        if ($experience >= 1100000 && $experience < 1240000) {
            return ('36');
        }
        if ($experience >= 1240000 && $experience < 1400000) {
            return ('37');
        }
        if ($experience >= 1400000 && $experience < 1580000) {
            return ('38');
        }
        if ($experience >= 1580000 && $experience < 1780000) {
            return ('39');
        }
        if ($experience >= 1780000 && $experience < 2000000) {
            return ('40');
        }
        if ($experience >= 2000000 && $experience < 2250000) {
            return ('41');
        }
        if ($experience >= 2250000 && $experience < 2530000) {
            return ('42');
        }
        if ($experience >= 2530000 && $experience < 2850000) {
            return ('43');
        }
        if ($experience >= 2850000 && $experience < 3200000) {
            return ('44');
        }
        if ($experience >= 3200000 && $experience < 3570000) {
            return ('45');
        }
        if ($experience >= 3570000 && $experience < 3960000) {
            return ('46');
        }
        if ($experience >= 3960000 && $experience < 4400000) {
            return ('47');
        }
        if ($experience >= 4400000 && $experience < 4860000) {
            return ('48');
        }
        if ($experience >= 4860000 && $experience < 5350000) {
            return ('49');
        }
        if ($experience >= 5350000 && $experience < 5860000) {
            return ('50');
        }
        if ($experience >= 5860000 && $experience < 6390000) {
            return ('51');
        }
        if ($experience >= 6390000 && $experience < 6950000) {
            return ('52');
        }
        if ($experience >= 6950000 && $experience < 7530000) {
            return ('53');
        }
        if ($experience >= 7530000 && $experience < 8130000) {
            return ('54');
        }
        if ($experience >= 8130000 && $experience < 8765100) {
            return ('55');
        }
        if ($experience >= 8765100 && $experience < 9420000) {
            return ('56');
        }
        if ($experience >= 9420000 && $experience < 10150000) {
            return ('57');
        }
        if ($experience >= 10150000 && $experience < 10894000) {
            return ('58');
        }
        if ($experience >= 10894000 && $experience < 11650000) {
            return ('59');
        }
        if ($experience >= 11650000 && $experience < 12450000) {
            return ('60');
        }
        if ($experience >= 12450000 && $experience < 13280000) {
            return ('61');
        }
        if ($experience >= 13280000 && $experience < 14130000) {
            return ('62');
        }
        if ($experience >= 14130000 && $experience < 15170000) {
            return ('63');
        }
        if ($experience >= 15170000 && $experience < 16251000) {
            return ('64');
        }
        if ($experience >= 16251000 && $experience < 17377000) {
            return ('65');
        }
        if ($experience >= 17377000 && $experience < 18553000) {
            return ('66');
        }
        if ($experience >= 18553000 && $experience < 19778000) {
            return ('67');
        }
        if ($experience >= 19778000 && $experience < 21055000) {
            return ('68');
        }
        if ($experience >= 21055000 && $experience < 22385000) {
            return ('69');
        }
        if ($experience >= 22385000 && $experience < 23529000) {
            return ('70');
        }
        if ($experience >= 23529000 && $experience < 25209000) {
            return ('71');
        }
        if ($experience >= 25209000 && $experience < 26707000) {
            return ('72');
        }
        if ($experience >= 26707000 && $experience < 28264000) {
            return ('73');
        }
        if ($experience >= 28264000 && $experience < 29882000) {
            return ('74');
        }
        if ($experience >= 29882000 && $experience < 31563000) {
            return ('75');
        }
        if ($experience >= 31563000 && $experience < 33307000) {
            return ('76');
        }
        if ($experience >= 33307000 && $experience < 35118000) {
            return ('77');
        }
        if ($experience >= 35118000 && $experience < 36997000) {
            return ('78');
        }
        if ($experience >= 36997000 && $experience < 38945000) {
            return ('79');
        }
        if ($experience >= 38945000 && $experience < 40965000) {
            return ('80');
        }
        if ($experience >= 40965000 && $experience < 43059000) {
            return ('81');
        }
        if ($experience >= 43059000 && $experience < 45229000) {
            return ('82');
        }
        if ($experience >= 45229000 && $experience < 47476000) {
            return ('83');
        }
        if ($experience >= 47476000 && $experience < 49803000) {
            return ('84');
        }
        if ($experience >= 49803000 && $experience < 52211000) {
            return ('85');
        }
        if ($experience >= 52211000 && $experience < 54704000) {
            return ('86');
        }
        if ($experience >= 54704000 && $experience < 57284000) {
            return ('87');
        }
        if ($experience >= 57284000 && $experience < 59952000) {
            return ('88');
        }
        if ($experience >= 59952000 && $experience < 62712000) {
            return ('89');
        }
        if ($experience >= 62712000 && $experience < 65565000) {
            return ('90');
        }
        if ($experience >= 65565000 && $experience < 68514000) {
            return ('91');
        }
        if ($experience >= 68514000 && $experience < 71561000) {
            return ('92');
        }
        if ($experience >= 71561000 && $experience < 74710000) {
            return ('93');
        }
        if ($experience >= 74710000 && $experience < 77963000) {
            return ('94');
        }
        if ($experience >= 77963000 && $experience < 81323000) {
            return ('95');
        }
        if ($experience >= 81323000 && $experience < 84792000) {
            return ('96');
        }
        if ($experience >= 84792000 && $experience < 88374000) {
            return ('97');
        }
        if ($experience >= 88374000 && $experience < 92071000) {
            return ('98');
        }
        if ($experience >= 92071000 && $experience < 95886000) {
            return ('99');
        }
        if ($experience >= 95886000 && $experience < 99823000) {
            return ('100');
        }
        if ($experience >= 99823000 && $experience < 103885000) {
            return ('101');
        }
        if ($experience >= 103885000 && $experience < 108075000) {
            return ('102');
        }
        if ($experience >= 108075000 && $experience < 112396000) {
            return ('103');
        }
        if ($experience >= 112396000 && $experience < 116853000) {
            return ('104');
        }
        if ($experience >= 116853000 && $experience < 121447000) {
            return ('105');
        }
        if ($experience >= 121447000 && $experience < 126184000) {
            return ('106');
        }
        if ($experience >= 126184000 && $experience < 131066000) {
            return ('107');
        }
        if ($experience >= 131066000 && $experience < 136098000) {
            return ('108');
        }
        if ($experience >= 136098000 && $experience < 141283000) {
            return ('109');
        }
        if ($experience >= 141283000 && $experience < 146626000) {
            return ('110');
        }
        if ($experience >= 146626000 && $experience < 152130000) {
            return ('111');
        }
        if ($experience >= 152130000 && $experience < 157800000) {
            return ('112');
        }
        if ($experience >= 157800000 && $experience < 163640000) {
            return ('113');
        }
        if ($experience >= 163640000 && $experience < 169655000) {
            return ('114');
        }
        if ($experience >= 169655000 && $experience < 175848000) {
            return ('115');
        }
        if ($experience >= 175848000 && $experience < 182225000) {
            return ('116');
        }
        if ($experience >= 182225000 && $experience < 188791000) {
            return ('117');
        }
        if ($experience >= 188791000 && $experience < 195550000) {
            return ('118');
        }
        if ($experience >= 195550000 && $experience < 202507000) {
            return ('119');
        }
        if ($experience >= 202507000 && $experience < 209667000) {
            return ('120');
        }
        if ($experience >= 209667000 && $experience < 217037000) {
            return ('121');
        }
        if ($experience >= 217037000 && $experience < 224620000) {
            return ('122');
        }
        if ($experience >= 224620000 && $experience < 232424000) {
            return ('123');
        }
        if ($experience >= 232424000 && $experience < 240452000) {
            return ('124');
        }
        if ($experience >= 240452000 && $experience < 248712000) {
            return ('125');
        }
        if ($experience >= 248712000 && $experience < 257209000) {
            return ('126');
        }
        if ($experience >= 257209000 && $experience < 265949000) {
            return ('127');
        }
        if ($experience >= 265949000 && $experience < 274939000) {
            return ('128');
        }
        if ($experience >= 274939000 && $experience < 284186000) {
            return ('129');
        }
        if ($experience >= 284186000 && $experience < 293694000) {
            return ('130');
        }
        if ($experience >= 293694000 && $experience < 303473000) {
            return ('131');
        }
        if ($experience >= 303473000 && $experience < 313527000) {
            return ('132');
        }
        if ($experience >= 313527000 && $experience < 323866000) {
            return ('133');
        }
        if ($experience >= 323866000 && $experience < 334495000) {
            return ('134');
        }
        if ($experience >= 334495000 && $experience < 345423000) {
            return ('135');
        }
        if ($experience >= 345423000 && $experience < 356657000) {
            return ('136');
        }
        if ($experience >= 356657000 && $experience < 368206000) {
            return ('137');
        }
        if ($experience >= 368206000 && $experience < 380076000) {
            return ('138');
        }
        if ($experience >= 380076000 && $experience < 392278000) {
            return ('139');
        }
        if ($experience >= 392278000 && $experience < 404818000) {
            return ('140');
        }
        if ($experience >= 404818000 && $experience < 417706000) {
            return ('141');
        }
        if ($experience >= 417706000 && $experience < 430952000) {
            return ('142');
        }
        if ($experience >= 430952000 && $experience < 444564000) {
            return ('143');
        }
        if ($experience >= 444564000 && $experience < 458551000) {
            return ('144');
        }
        if ($experience >= 458551000 && $experience < 472924000) {
            return ('145');
        }
        if ($experience >= 472924000 && $experience < 487693000) {
            return ('146');
        }
        if ($experience >= 487693000 && $experience < 502867000) {
            return ('147');
        }
        if ($experience >= 502867000 && $experience < 518458000) {
            return ('148');
        }
        if ($experience >= 518458000 && $experience < 534476000) {
            return ('149');
        }
        if ($experience >= 534476000 && $experience < 502867000) {
            return ('150');
        }
        if ($experience >= 502867000 && $experience < 567839000) {
            return ('151');
        }
        if ($experience >= 567839000 && $experience < 585206000) {
            return ('152');
        }
        if ($experience >= 585206000 && $experience < 603047000) {
            return ('153');
        }
        if ($experience >= 603047000 && $experience < 621374000) {
            return ('154');
        }
        if ($experience >= 621374000 && $experience < 640199000) {
            return ('155');
        }
        if ($experience >= 640199000 && $experience < 659536000) {
            return ('156');
        }
        if ($experience >= 659536000 && $experience < 679398000) {
            return ('157');
        }
        if ($experience >= 679398000 && $experience < 699798000) {
            return ('158');
        }
        if ($experience >= 699798000 && $experience < 720751000) {
            return ('159');
        }
        if ($experience >= 720751000 && $experience < 742772000) {
            return ('160');
        }
        if ($experience >= 742772000 && $experience < 764374000) {
            return ('161');
        }
        if ($experience >= 764374000 && $experience < 787074000) {
            return ('162');
        }
        if ($experience >= 787074000 && $experience < 810387000) {
            return ('163');
        }
        if ($experience >= 810387000 && $experience < 834329000) {
            return ('164');
        }
        if ($experience >= 834329000 && $experience < 858917000) {
            return ('165');
        }
        if ($experience >= 858917000 && $experience < 884167000) {
            return ('166');
        }
        if ($experience >= 884167000 && $experience < 910098000) {
            return ('167');
        }
        if ($experience >= 910098000 && $experience < 936727000) {
            return ('168');
        }
        if ($experience >= 936727000 && $experience < 964073000) {
            return ('169');
        }
        if ($experience >= 964073000 && $experience < 992154000) {
            return ('170');
        }
        if ($experience >= 992154000 && $experience < 1020991000) {
            return ('171');
        }
        if ($experience >= 1020991000 && $experience < 1050603000) {
            return ('172');
        }
        if ($experience >= 1050603000 && $experience < 1081010000) {
            return ('173');
        }
        if ($experience >= 1081010000 && $experience < 1112235000) {
            return ('174');
        }
        if ($experience >= 1112235000 && $experience < 1144298000) {
            return ('175');
        }
        if ($experience >= 1144298000 && $experience < 1177222000) {
            return ('176');
        }
        if ($experience >= 1177222000 && $experience < 1211030000) {
            return ('177');
        }
        if ($experience >= 1211030000 && $experience < 1245745000) {
            return ('178');
        }
        if ($experience >= 1245745000 && $experience < 1281393000) {
            return ('179');
        }
        if ($experience >= 1281393000 && $experience < 1317997000) {
            return ('180');
        }
        if ($experience >= 1317997000 && $experience < 1355584000) {
            return ('181');
        }
        if ($experience >= 1355584000 && $experience < 1404179000) {
            return ('182');
        }
        if ($experience >= 1404179000 && $experience < 1463811000) {
            return ('183');
        }
        if ($experience >= 1463811000 && $experience < 1534506000) {
            return ('184');
        }
        if ($experience >= 1534506000 && $experience < 1616294000) {
            return ('185');
        }
        if ($experience >= 1616294000 && $experience < 1709205000) {
            return ('186');
        }
        if ($experience >= 1709205000 && $experience < 1813267000) {
            return ('187');
        }
        if ($experience >= 1813267000 && $experience < 1928513000) {
            return ('188');
        }
        if ($experience >= 1928513000 && $experience < 2054975000) {
            return ('189');
        }
        if ($experience >= 2054975000 && $experience < 2192686000) {
            return ('190');
        }
        if ($experience >= 2192686000 && $experience < 2341679000) {
            return ('191');
        }
        if ($experience >= 2341679000 && $experience < 2501990000) {
            return ('192');
        }
        if ($experience >= 2501990000 && $experience < 2673655000) {
            return ('193');
        }
        if ($experience >= 2673655000 && $experience < 2856710000) {
            return ('194');
        }
        if ($experience >= 2856710000 && $experience < 3051194000) {
            return ('195');
        }
        if ($experience >= 3051194000 && $experience < 3257146000) {
            return ('196');
        }
        if ($experience >= 3257146000 && $experience < 3474606000) {
            return ('197');
        }
        if ($experience >= 3474606000 && $experience < 3703616000) {
            return ('198');
        }
        if ($experience >= 3703616000 && $experience < 5555424000) {
            return ('199');
        }
        if ($experience >= 5555424000 && $experience < 5605424000) {
            return ('200');
        }
        if ($experience > 5605424000) {
            return ('Omega');
        }
        return ('Omega');
    }
}
if (! function_exists('dofus_hash_password')) {
    function dofus_hash_password($password)
    {
        return md5($password);
    }
}

if(! function_exists('dofus_get_user_characters')) {
	function dofus_get_user_characters($user) {
		$account_links = AccountLink::where('azuriom_user_id', $user->id)->get();
		$characters = collect();

        foreach ($account_links as $account_link) {
			$characters = $characters->concat($account_link->characters) ;
		}
		
		return $characters;
	}
}

if(! function_exists('dofus_deserialize_stuff_effects')) {
	function dofus_deserialize_stuff_effects($effect) {
		return Item::from($effect);
	}
}

if(! function_exists('dofus_get_item_name_by_position')) {
	function dofus_get_item_name_by_position($position) {
		
	}
}

