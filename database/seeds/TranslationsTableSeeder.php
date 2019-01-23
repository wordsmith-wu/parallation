<?php

use Illuminate\Database\Seeder;
use App\Models\Translation;

class TranslationsTableSeeder extends Seeder
{
    public function run()
    {
			$source = '/home/wordsmith/Code/parallation/public/uploads/files/test.tmx';

			$dom = new \DOMDocument();
			$dom->load($source);
			$translation_unit = $dom->getElementsByTagName('tu');

			foreach($translation_unit as $k => $p) {
				foreach ($p->attributes as $attr){
					// $translation[$attr->nodeName]='"' . $attr->nodeValue . '"' ;
					$translation[$attr->nodeName]=$attr->nodeValue;
				}
				if ($p->getElementsByTagName("tuv")->item(0)->attributes->item(0)->nodeValue=="ZH-CN" ){
					$translation['source'] = $p->getElementsByTagName("tuv")->item(0)->getElementsByTagName("seg")->item(0)->childNodes->item(0)->nodeValue;
					$translation['target'] = $p->getElementsByTagName("tuv")->item(1)->getElementsByTagName("seg")->item(0)->childNodes->item(0)->nodeValue;
					$translation['source_language_id'] = 2;
					$translation['target_language_id'] = 1;
				}
				else {
					$translation['source'] = addslashes($p->getElementsByTagName("tuv")->item(0)->getElementsByTagName("seg")->item(0)->childNodes->item(0)->nodeValue);
					$translation['target'] = addslashes($p->getElementsByTagName("tuv")->item(1)->getElementsByTagName("seg")->item(0)->childNodes->item(0)->nodeValue);		
					$translation['source_language_id'] = 2;
					$translation['target_language_id'] = 1;
				}
				$translations[] = $translation;
				// Translation::insert($translation);

			}

        Translation::insert($translations);
    }

}

