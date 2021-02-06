<?php

namespace Azuriom\Plugin\Dofus\Utils;

use Exception;
use Illuminate\Support\Str;

abstract class EffectBase
{
    public $m_id;
    public $m_value;
    public $m_dicenum;
    public $m_diceface;

    public abstract function deserialize($buffer, &$index);

    protected function internalDeserialize($buffer, &$index){
        $header = chr(unpack('C', $buffer, $index++)[1]); //Str::substr($buffer, $index++, 1);

        if ($header == 'C') {
            $this->m_id = unpack('s', $buffer, $index)[1];
            $index = $index + 2;
        }
    }

    public function getFormatedCharacteristic()
    {
        switch ($this->m_id) {
            case 111:
                return $this->m_value.' PA';
            case 112: 
                return $this->m_value.' Dommages';
            case 115: 
                return $this->m_value.'% Critique';
            case 116: 
                return '- '.$this->m_value.' PO';
            case 117: 
                    return $this->m_value.' PO';
            case 118: 
                return $this->m_value.' Force';
            case 119: 
                return $this->m_value.' Agilité';
            case 121: 
                return $this->m_value.' Dommages';
            case 123: 
                return $this->m_value.' Chance';
            case 124: 
                return $this->m_value.' Sagesse';
            case 125: 
                return $this->m_value.' Vitalité';
            case 126: 
                return $this->m_value.' Intelligence';
            case 127: 
                return '- '.$this->m_value.' PM';
            case 128:
                return $this->m_value.' PM';
            case 138:
                return $this->m_value.' Puissance';
            case 142:
                return $this->m_value.' Dommages Physiques';
            case 144:
                return $this->m_value.' Dommages Neutre fixe';
            case 145:
                return '- '.$this->m_value.' Dommages';
            case 152:
                return '- '.$this->m_value.' Chance';
            case 153:
                return '- '.$this->m_value.' Vitalité';
            case 154:
                return '- '.$this->m_value.' Agilité';
            case 155:
                return '- '.$this->m_value.' Intelligence';
            case 156:
                return '- '.$this->m_value.' Sagesse';
            case 157:
                return '- '.$this->m_value.' Force';
            case 158:
                return $this->m_value.' Pods';
            case 159:
                return '- '.$this->m_value.' Pods';
            case 160:
                return $this->m_value.' Esquive PA';
            case 161:
                return $this->m_value.' Esquive PM';
            case 162:
                return'- '. $this->m_value.' Esquive PA';
            case 163:
                return '- '.$this->m_value.' Esquive PM';
            case 164:
                return 'Dommages réduits de '.$this->m_value.'%';
            case 165:
                return $this->m_value.'% Dommages';
            case 168:
                return'- '. $this->m_value.' PA';
            case 169:
                return '- '.$this->m_value.' PM';
            case 170:
                return '- '.$this->m_value.'% Critique';
            case 174:
                return $this->m_value.' Initiative';
            case 175:
                return '- '.$this->m_value.' Initiative';
            case 176:
                return $this->m_value.' Prospection';
            case 177:
                return '- '.$this->m_value.' Prospection';
            case 178:
                return $this->m_value.' Soins';
            case 179:
                return '- '.$this->m_value.' Soins';
            case 186:
                return '- '.$this->m_value.' Puissance';
            case 210:
                return $this->m_value.'% Résistance Terre';
            case 211: 
                return $this->m_value.'% Résistance Eau';
            case 212: 
                return $this->m_value.'% Résistance Air';
            case 213: 
                return $this->m_value.'% Résistance Feu';
            case 214: 
                return $this->m_value.'% Résistance Neutre';
            case 215:
                return '- '.$this->m_value.'% Résistance Terre';
            case 216:
                return '- '.$this->m_value.'% Résistance Eau';
            case 217:
                return '- '.$this->m_value.'% Résistance Air';
            case 218:
                return '- '.$this->m_value.'% Résistance Feu';
            case 219:
                return '- '.$this->m_value.'% Résistance Neutre';
            case 225:
                return $this->m_value.' Dommages Pièges';
            case 226:
                return $this->m_value.' Puissance (pièges)';
            case 240:
                return $this->m_value.' Résistance Terre';
            case 241:
                return $this->m_value.' Résistance Eau';
            case 242:
                return $this->m_value.' Résistance Air';
            case 243:
                return $this->m_value.' Résistance Feu';
            case 244:
                return $this->m_value.' Résistance Neutre';
            case 245:
                return '- '.$this->m_value.' Résistance Terre';
            case 246:
                return '- '.$this->m_value.' Résistance Eau';
            case 247:
                return '- '.$this->m_value.' Résistance Air';
            case 248:
                return '- '.$this->m_value.' Résistance Feu';
            case 249:
                return '- '.$this->m_value.' Résistance Neutre';
            case 250:
                return $this->m_value.'% Résistance Terre JCJ';
            case 251: 
                return $this->m_value.'% Résistance Eau JCJ';
            case 252: 
                return $this->m_value.'% Résistance Air JCJ';
            case 253: 
                return $this->m_value.'% Résistance Feu JCJ';
            case 254: 
                return $this->m_value.'% Résistance Neutre JCJ';
            case 255:
                return '- '.$this->m_value.'% Résistance Terre JCJ';
            case 256: 
                return '- '.$this->m_value.'% Résistance Eau JCJ';
            case 257: 
                return '- '.$this->m_value.'% Résistance Air JCJ';
            case 258: 
                return '- '.$this->m_value.'% Résistance Feu JCJ';
            case 259: 
                return '- '.$this->m_value.'% Résistance Neutre JCJ';
            case 260:
                return $this->m_value.' Résistance Terre JCJ';
            case 261: 
                return $this->m_value.' Résistance Eau JCJ';
            case 262: 
                return $this->m_value.' Résistance Air JCJ';
            case 263: 
                return $this->m_value.' Résistance Feu JCJ';
            case 264: 
                return $this->m_value.' Résistance Neutre JCJ';
            case 265: 
                return 'Dommages réduits de '.$this->m_value.'%';
            case 410: 
                return $this->m_value.' Retrait PA';
            case 411: 
                return '- '.$this->m_value.' Retrait PA';
            case 412: 
                return $this->m_value.' Retrait PM';
            case 413: 
                return '- '.$this->m_value.' Retrait PM';
            case 414: 
                return $this->m_value.' Dommages Poussée';
            case 415: 
                return '- '.$this->m_value.' Dommages Poussée';
            case 416: 
                return $this->m_value.' Résistance Poussée';
            case 417: 
                return '- '.$this->m_value.' Résistance Poussée';
            case 418: 
                return $this->m_value.' Dommages Critiques';
            case 419: 
                return '- '.$this->m_value.' Dommages Critiques';
            case 420: 
                return $this->m_value.' Résistance Critiques';
            case 421: 
                return '- '.$this->m_value.' Résistance Critiques';
            case 422: 
                return $this->m_value.' Dommages Terre';
            case 423: 
                return '- '.$this->m_value.' Dommages Terre';
            case 424: 
                return $this->m_value.' Dommages Feu';
            case 425: 
                return '- '.$this->m_value.' Dommages Feu';
            case 426: 
                return $this->m_value.' Dommages Eau';
            case 427: 
                return '- '.$this->m_value.' Dommages Eau';
            case 428: 
                return $this->m_value.' Dommages Air';
            case 429: 
                return '- '.$this->m_value.' Dommages Air';
            case 430: 
                return $this->m_value.' Dommages Neutre';
            case 431: 
                return '- '.$this->m_value.' Dommages Neutre';
            
            
            
            default:
                return $this->m_id.'-'.$this->m_value;
        }
    }
}