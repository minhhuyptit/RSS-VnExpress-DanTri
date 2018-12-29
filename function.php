<?php
    function getContent($link = 'https://vnexpress.net/rss/the-thao.rss'){
        $data = file_get_contents($link);
		$xml = new SimpleXMLElement($data);

		$i = 0;
		$xhtml = '<ol>';
		foreach($xml->channel->item as $item){
			if($i == 5) break;
			$link  = $item->link;
			$title = $item->title;
			//##imsU partern dò tất cả các dòng không phân biệt hoa thường
			preg_match_all('#.*src="(.*)".*br>(.*)<end>#imsU', $item->description.'<end>', $matches);
			$image 		 = $matches[1][0];
			$description = $matches[2][0];

			$xhtml .= '<li>
						<div class="media">
							<a class="pull-left" href="'.$link.'">
								<img class="media-object" src="'.$image.'">
							</a>
							<div class="media-body">
									<h4 class="media-heading"><a href="'.$link.'">'.$title.'</a></h4>
									'.$description.'
							</div>
						</div>
					</li><br>';	
			$i++;
		}
        $xhtml .= '</ol>';
        return $xhtml;
    }

    function getContent2($link = 'https://dantri.com.vn/the-thao.rss'){
        $data = file_get_contents($link);
		$xml = new SimpleXMLElement($data);

		$i = 0;
		$xhtml = '<ol>';
		foreach($xml->channel->item as $item){
			if($i == 5) break;
			$link  = $item->link;
            $title = $item->title;
			//##imsU partern dò tất cả các dòng không phân biệt hoa thường
            preg_match_all('#.*src="(.*)<end>#imsU', $item->description.'<end>', $matches);
            $image 		 = $matches[1][0];

			$xhtml .= '<li>
						<div class="media">
							<a class="pull-left" href="'.$link.'">
								<img class="media-object" src="'.$image.'
							</a>
							<div class="media-body">
									<h4 class="media-heading"><a href="'.$link.'">'.$title.'</a></h4>
                                    Báo Dân Trí không có phần Description - Báo Dân Trí không có phần Description - Báo Dân Trí không có phần Description
							</div>
						</div>
					</li><br>';	
			$i++;
		}
        $xhtml .= '</ol>';
        return $xhtml;
    }
?>