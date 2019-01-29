<?php

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    public function run()
    {
		$source = public_path() . '/uploads/files/汉译英.tmx';
		$source2 = public_path() . '/uploads/files/英译汉.tmx';
    	$sources = [$source,$source2];
    	// $sources = [public_path() . '/uploads/files/汉译英1.tmx'];
		foreach ($sources as $source){
			$this->saveXml($source);
		}


    }

    private function saveXml($source) {

		$replace_pattern = "/{\\S+\s([^{}]+)}/";
		$match_pattern = "/[?]/";
		$arr = [
			'¡Á' => '×',
			'ЎЎм§А¶' => 'Ф',
			'¢¡¡¡§¬¡ã' => 'Ⅱ',
			'¢¡¡¡¡¨¬¬¡ã' => 'Ⅱ',
			'¢¡¡¨¬¡ã' => 'Ⅱ',
			'¢¡¡¡¡¡§¬¬¡ã' => 'Ⅱ',
			'¦¦΅θ΅έ' => '≥',
			'Ў§Ю¶' => 'Ф',
			'¡æ' => '℃',
			'¦¦΅¦Θ' => 'δ',
			'ЎЎЎЎЎм§АЎ§ЮЎмЎЎЎ§ЮЎм§ЎЎЎм§АЎЎЎЎ§ЮЎм§ЎЎЎм§АЎ§ЮЎЎЎЎм§АЎ§ЮЎмЎЎ¶' => 'Ф',
			'¢¡¡¡¡¡¡ì¬¬¡ã' => 'Ⅱ',
			'¡À' => '±',
			'¡Ü' => '≤',
			'¡å' => '〞',
			'¡ã' => '° ',
			'¡¡§²' => '→',
			'¡Ý' => '≥',
			'¦Μ' => 'μ',
			'¡Ü' => '≤',
			''
		];
		$reader = new \XMLReader();
		$reader->open($source);
		while ($reader->read()){
			if ($reader->nodeType == \XMLReader::ELEMENT){
				$nodeName = $reader->name;
				if ($nodeName == 'tu') {
					$node = $reader->expand();
					$attributes = $node->attributes;
					foreach ($attributes as $attribute){
						$translation[$attribute->nodeName] = $attribute->nodeValue;
					}

					$tuv = $node->getElementsByTagName('tuv');
					$translation['source_language_id'] = $tuv[0]->attributes[0]->nodeValue =='EN-US'?1:2;
					$translation['target_language_id'] = $tuv[1]->attributes[0]->nodeValue =='EN-US'?1:2;
					$translation['source'] = $tuv[0]->getElementsByTagName('seg')[0]->nodeValue;
					$translation['target'] = $tuv[1]->getElementsByTagName('seg')[0]->nodeValue;

					$translation['source'] = preg_replace($replace_pattern, '$1', $translation['source']);
					$translation['target'] = preg_replace($replace_pattern, '$1', $translation['target']);
					$translation['source'] = strtr($translation['source'],$arr);
					$translation['target'] = strtr($translation['target'],$arr);
					$translation['source_md5'] = md5($translation['source']);
					$translation['target_md5'] = md5($translation['target']);
					if (preg_match($match_pattern, $translation['source']) || preg_match($match_pattern, $translation['target'])) {
						continue;
					}

					Translation::insert($translation);
				}
			}
		}
		$reader->close();    	
    }

}

