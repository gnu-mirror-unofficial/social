<?php

if (isset($_SERVER) && array_key_exists('REQUEST_METHOD', $_SERVER)) {
    print "This script must be run from the command line\n";
    exit();
}

define('INSTALLDIR', realpath(dirname(__FILE__) . '/..'));
define('GNUSOCIAL', true);
define('STATUSNET', true);  // compatibility

require_once INSTALLDIR . '/lib/common.php';

class HashTagDetectionTests extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     *
     */
    public function testProduction($content, $expected)
    {
        $rendered = common_render_text($content);
        $this->assertEquals($expected, $rendered);
    }

    static public function provider()
    {
        return array(
                     array('hello',
                           'hello'),
                     array('#hello people',
                           '#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span> people'),
                     array('"#hello" people',
                           '&quot;#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span>&quot; people'),
                     array('say "#hello" people',
                           'say &quot;#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span>&quot; people'),
                     array('say (#hello) people',
                           'say (#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span>) people'),
                     array('say [#hello] people',
                           'say [#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span>] people'),
                     array('say {#hello} people',
                           'say {#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span>} people'),
                     array('say \'#hello\' people',
                           'say \'#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('hello'))) . '" rel="tag">hello</a></span>\' people'),

                     // Unicode legit letters
                     array('#??clair yummy',
                           '#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('??clair'))) . '" rel="tag">??clair</a></span> yummy'),
                     array('#???????????? zh.wikipedia!',
                           '#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('????????????'))) . '" rel="tag">????????????</a></span> zh.wikipedia!'),
                     array('#???????????? russia',
                           '#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('????????????'))) . '" rel="tag">????????????</a></span> russia'),

                     // Unicode punctuators -- the ideographic "???" separates the tag, just as "," does
                     array('#????????????,zh.wikipedia!',
                           '#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('????????????'))) . '" rel="tag">????????????</a></span>,zh.wikipedia!'),
                     array('#???????????????zh.wikipedia!',
                           '#<span class="tag"><a href="' . common_local_url('tag', array('tag' => common_canonical_tag('????????????'))) . '" rel="tag">????????????</a></span>???zh.wikipedia!'),

                     );
    }
}

