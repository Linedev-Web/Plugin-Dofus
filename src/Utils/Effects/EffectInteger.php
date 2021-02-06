<?php

namespace Azuriom\Plugin\Dofus\Utils\Effects;

use Azuriom\Plugin\Dofus\Utils\EffectBase;
use Illuminate\Support\Str;

class EffectInteger extends EffectBase
{
    public function deserialize($buffer, &$index)
    {
        parent::internalDeserialize($buffer, $index);

        $this->m_value = unpack('s',$buffer, $index)[1];
        $index = $index + 2;
    }
}

