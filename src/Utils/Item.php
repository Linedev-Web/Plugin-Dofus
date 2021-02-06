<?php

namespace Azuriom\Plugin\Dofus\Utils;

use Exception;
use Illuminate\Support\Str;
use Azuriom\Plugin\Dofus\Utils\EffectBase;
use Azuriom\Plugin\Dofus\Utils\Effects\EffectDice;
use Azuriom\Plugin\Dofus\Utils\Effects\EffectInteger;

class Item
{
    public $effects;

    public static function from($serializedEffects) {
        $item = new self(self::deserialize($serializedEffects));
        return $item;
    }

    public function __construct($effects) {
        $this->effects = $effects;
    }

    private static function deserialize($serializedEffects) {
        $i = 0;
        $effects = collect();
        while ($i + 1 < Str::length($serializedEffects)) {
            $effects_des = static::deserializeEffect($serializedEffects, $i);
            if($effects_des)
                $effects->push($effects_des);
        }

        return $effects;
    }

    private static function deserializeEffect($buffer, &$index) {
        $identifier = unpack('C',$buffer, $index++)[1];
        $effect = null;

            switch ($identifier) {
                // case 1:
                //     //$effect = new EffectBase ();
                //     break;
                // case 2:
                //     //$effect = new EffectCreature ();
                //     break;
                // case 3:
                //     //$effect = new EffectDate ();
                //     break;
                case 4:
                    $effect = new EffectDice ();
                    break;
                // case 5:
                //     //$effect = new EffectDuration ();
                //     break;
                case 6:
                    $effect = new EffectInteger ();
                    break;
                // case 7:
                //     //$effect = new EffectLadder ();
                //     break;
                // case 8:
                //     //$effect = new EffectMinMax ();
                //     break;
                // case 9:
                //     //$effect = new EffectMount ();
                //     break;
                // case 10:
                //     //$effect = new EffectString ();
                //     break;
                default:
                    throw new Exception ("Incorrect identifier : $identifier");
            }
            if($effect)
                $effect->deserialize($buffer, $index);

            if($identifier == 4)
                return null;

            return $effect;
    }

}