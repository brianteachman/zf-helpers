zf-helpers
==========

### [Zend Framework 1.x view helpers](http://framework.zend.com/manual/1.12/en/zend.view.helpers.html)

---

#### Coderwall's blog badge helper.

1. If your application is not configured to look elsewhere, add CoderwallBadge.php to your Zend/View/Helpers directory.

2. In your view script add:

* for horizontal layout: `<?php echo $this->coderwallBadge('username') ?>`

* for verticle layout: `<?php echo $this->coderwallBadge('username', true) ?>`