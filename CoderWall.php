<?php
/**
 * View Helper for configuring and displaying coderwall blog badges.
 */
class Zend_View_Helper_CoderWall extends Zend_View_Helper_Abstract
{
    /**
     * @param string $username Username on coderwall.com
     * @param boolean $orientation Defaults to horizontal, set true for vertical layout
     * @return string Returns configured HTML <section> string
     */
    public function coderWall($username, $vertical=false) {

        $orientation = $vertical ? 'vertical': 'horizontal';

        $coderwall_badge = <<<BADGE
<section class="coderwall" data-coderwall-username="{$username}" data-coderwall-orientation="{$orientation}"></section>

BADGE;

        $this->view->headLink()->appendStylesheet('http://coderwall.com/stylesheets/jquery.coderwall.css');
        $this->view->headScript()->appendFile('http://coderwall.com/javascripts/jquery.coderwall.js'); 

        return $coderwall_badge;
    }

}