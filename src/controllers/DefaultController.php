<?php namespace Simple\Redirect;

use \Illuminate\Support\Facades\Redirect;
use \Simple\Cms\PublicController;
use \CMS;
use Exception;


class DefaultController extends PublicController {

	/**
	 * Main action
	 * @return mixed
	 * @throws \Exception
	 */
	public function getIndex() {

		$page = CMS::getCurrentPage();

		$child = CMS::getFirstChild( $page->id );

		if ( ! $child) {
			throw new Exception('Page has no submenus');
		}

		return Redirect::to( CMS::to( $child->url_full) );

	}

}