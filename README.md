zf-helpers
==========

### [Zend Framework 1.x view helpers](http://framework.zend.com/manual/1.12/en/zend.view.helpers.html)

---

#### Coderwall's blog badge helper.

1. Add CoderwallBadge.php to your view helpers directory.

2. In your view script add:

    For horizontal layout: 

        <?= $this->coderwallBadge('username') ?>

    For verticle layout:

        <?= $this->coderwallBadge('username', true) ?>

---

#### MindMeister mind map widget

1. Add MindMapEditor.php to your view helpers directory.

2. In your controller, do something like this:

        $this->view->secret = 'your_api_secret';
        $this->view->api_params = array(
            'api_key' => 'your_api_key',
            'auth_token' => '', // http://www.mindmeister.com/developers/explore_method?method=mm.auth.getToken
            'id' => 'your_map_id', // map id
        );

3. Then in your view script add this:

        <?= $this->mindMapEditor($this->api_params, $this->secret) ?>

    Optionally set height and width:

        <?= $this->mindMapEditor($this->api_params, $this->secret, '600', '800') ?>
