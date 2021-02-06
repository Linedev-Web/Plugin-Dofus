<?php

namespace Azuriom\Plugin\Dofus\Utils\Effects;

use Azuriom\Plugin\Dofus\Utils\EffectBase;
use Illuminate\Support\Str;

class EffectDice extends EffectBase
{
    public function deserialize($buffer, &$index)
    {
        parent::internalDeserialize($buffer, $index);
        $index = $index + 2;
        $this->m_dicenum = unpack('s',$buffer, $index)[1];
        $index = $index + 2;
        $this->m_diceface = unpack('s',$buffer, $index)[1];
        $index = $index + 2;
    }
}