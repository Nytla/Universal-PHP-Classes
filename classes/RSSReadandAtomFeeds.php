<?php
/**
 * RSSReadandAtomFeeds.php
 *
 * This is file with RSSReadandAtomFeeds class
 * 
 * @category	classes
 * @copyright	2013
 * @author		Igor Zhabskiy <Zhabskiy.Igor@gmail.com>
 */

/**
 * RSSReadandAtomFeeds
 * 
 * This class read RSS and ATOM feeds
 * 
 * @version 0.1
 */
class RSSReadandAtomFeeds {

	/**
	 * getRssFeeds
	 * 
	 * This function read RSS and ATOM feeds
	 *
	 * @param string $feed_url
	 * @return object $ret
	 */
	static public function getRssFeeds($feed_url) {
		
		/**
		 * Pull the feed contents
		 */
		$content = file_get_contents($feed_url);
		
		/**
		 * Put the feed into a php readable format
		 */
		$x = new SimpleXmlElement($content);
		
		/**
		 * Discern between atom and rss feeds
		 */
		if($x->entry){ //atom
			$ret->title=$x->title.'';
			$ret->description=$x->subtitle.'';
			$ret->copyright=$x->rights.'';
			$ret->logo=$x->logo.'';
			$ret->link=$x->link[1]->attributes()->href.'';
			
			/**
			 * Insert the entries for the feed into the returnable object
			 */
			$c=0;
			
			foreach($x->entry as $entry) {
				$ret->items[$c]->title=$entry->title.'';
				$ret->items[$c]->link=$entry->link.'';
				$ret->items[$c]->author=$entry->author->name.'';
				$ret->items[$c]->published=$entry->published.'';
				$ret->items[$c]->contents=$entry->content.'';
				$c++;
			}
		} else { 

			/**
			 * Determining feed values depending on what exists (RSS)
			 */
			if($x->title) $ret->title=$x->title.'';
			else $ret->title=$x->channel->title.'';
			if($x->description) $ret->description=$x->description.'';
			else $ret->description=$x->channel->description.'';
			if($x->copyright) $ret->copyright=$x->copyright.'';
			else $ret->copyright=$x->channel->copyright.'';
			if($x->image->url) $ret->logo=$x->image->url.'';
			else $ret->logo=$x->channel->image->url.'';
			if($x->link) $ret->link=$x->link.'';
			else $ret->link=$x->channel->link.'';
		
			/**
			 * Insert the entries for the feed into the returnable object
			 */
			$c=0;
		
			foreach($x->channel->item as $entry) {
				$ret->items[$c]->title=$entry->title.'';
				$ret->items[$c]->link=$entry->link.'';
				$ret->items[$c]->author=$entry->author.'';
				$ret->items[$c]->published=strtotime($entry->pubDate);
				$ret->items[$c]->contents=$entry->description.'';
				$c++;
			}
		}
		
		return $ret;
	}
}
?>