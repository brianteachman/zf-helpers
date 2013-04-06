<?php
/**
 * Mind Meister embed mind map view helper
 *
 * @author Brian Teachman <me@briant.me>
 */
class Zend_View_Helper_MindMapEditor extends Zend_View_Helper_Abstract
{
    /**
     * @var string
     */
    protected $url = 'http://www.mindmeister.com/maps/show?';

    /**
     * @todo Build method to retrieve auth_token
     * 
     * @var string
     */
    protected $auth_url = 'http://www.mindmeister.com/services/auth/?';

    /**
     * Mind Meister embed mind map view helper
     *
     * $params = array(
     *     'api_key' => 'your_api_key', // required
     *     'id' => 'your_map_id',       // required
     *     'auth_token' => '',
     *     'method' => '', // http://www.mindmeister.com/developers/explore
     * )
     *
     * @link( http://www.mindmeister.com/developers/embed, link)
     * 
     * @param  string[] $params Array of strings containg request parameters
     * @param  string   $secret MindMeister API secret key
     * @return string           Return HTML map widget on success or HTML error message
     */
    public function mindMapEditor($params, $secret, $width="800", $height="600") {

        $FAILED = false;

        if (! array_key_exists('api_key', $params)) {
            $FAILED = true;
        }
        if (! array_key_exists('id', $params)) {
            $FAILED = true;
        }

        $url_params = '';
        foreach ($params as $key => $value) {
            if ($value) {
                $url_params .= $key . '=' . $value . '&';
            }
        }

        $src = $this->url . $url_params . 'api_sig='.$this->signRequest($params, $secret);

        $html_frame = <<<HTML
<iframe width="{$width}"
        height="{$height}" 
        frameborder="0"
        scrolling="auto"
        src="{$src}">
</iframe>
HTML;

        if ($FAILED) {
            return '<div class="error">This mind map is not properly configured.</div>';
        }
        return $html_frame;
    }

    /**
     * Sign REST API Request
     *
     * @link( http://www.mindmeister.com/developers/authentication, link)
     * 
     * @param  string  $secret MindMeister API secret key
     * @param  mixed[] $params Array of request parameters
     * @return string          Return MD5 hashed string
     */
    protected function signRequest($params, $secret) {
        $result = '';
        ksort($params);
        foreach ($params as $key => $value) {
            if ($value) {
                $result .= $key . $value;
            }
        }
        return md5($secret . $result);
    }

}