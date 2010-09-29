<?php

/**
 * StatusNet - the distributed open-source microblogging tool
 * Copyright (C) 2010, StatusNet, Inc.
 *
 * A plugin to allow anonymous users to favorite notices
 *
 * PHP version 5
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category  Plugin
 * @package   StatusNet
 * @author    Zach Copley <zach@status.net>
 * @copyright 2010 StatusNet, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://status.net/
 */

if (!defined('STATUSNET')) {
    // This check helps protect against security problems;
    // your code file can't be executed directly from the web.
    exit(1);
}

define('ANONYMOUS_FAVE_PLUGIN_VERSION', '0.1');

/**
 * Anonymous Fave plugin to allow anonymous (not logged in) users
 * to favorite notices
 *
 * @category  Plugin
 * @package   StatusNet
 * @author    Zach Copley <zach@status.net>
 * @copyright 2010 StatusNet, Inc.
 * @license   http://www.fsf.org/licensing/licenses/agpl-3.0.html AGPL 3.0
 * @link      http://status.net/
 */
class AnonymousFavePlugin extends Plugin {

    function onArgsInitialize() {
        // We always want a session because we're tracking anon users
        common_ensure_session();
    }

    /**
     * Hook for ensuring our tables are created
     *
     * Ensures the fave_tally table is there and has the right columns
     *
     * @return boolean hook return
     */

    function onCheckSchema()
    {
        $schema = Schema::get();

        // For storing total number of times a notice has been faved

        $schema->ensureTable('fave_tally',
            array(
                new ColumnDef('notice_id', 'integer', null,  false, 'PRI'),
                new ColumnDef('count', 'integer', null, false),
                new ColumnDef(
                    'modified',
                    'timestamp',
                    null,
                    false,
                    null,
                    'CURRENT_TIMESTAMP',
                    'on update CURRENT_TIMESTAMP'
                )
            )
        );

        return true;
    }

    function onEndShowHTML($action)
    {
        if (!common_logged_in()) {
            // Set a place to return to when submitting forms
            common_set_returnto($action->selfUrl());
        }
    }

    function onEndShowScripts($action)
    {
        // Setup ajax calls for favoriting. Usually this is only done when
        // a user is logged in.
        $action->inlineScript('SN.U.NoticeFavor();');
    }

    function onAutoload($cls)
    {
        $dir = dirname(__FILE__);

        switch ($cls) {
            case 'Fave_tally':
                include_once $dir . '/' . $cls . '.php';
                return false;
            case 'AnonFavorAction':
                include_once $dir . '/' . strtolower(mb_substr($cls, 0, -6)) . '.php';
                return false;
            case 'AnonDisFavorAction':
                include_once $dir . '/' . strtolower(mb_substr($cls, 0, -6)) . '.php';
                return false;
            case 'AnonFavorForm':
                include_once $dir . '/anonfavorform.php';
                return false;
            case 'AnonDisFavorForm':
                include_once $dir . '/anondisfavorform.php';
                return false;
            default:
                return true;
        }
    }

    function onStartInitializeRouter($m) {

        $m->connect('main/anonfavor', array('action' => 'AnonFavor'));
        $m->connect('main/anondisfavor', array('action' => 'AnonDisFavor'));

        return true;
    }

    function onStartShowNoticeOptions($item) {

        if (!common_logged_in()) {
            $item->out->elementStart('div', 'notice-options');
            $item->showFaveForm();
            $item->out->elementEnd('div');
        }

        return true;
    }

    function onStartShowFaveForm($item) {

        if (!common_logged_in()) {

            $profile = $this->getAnonProfile();
            if (!empty($profile)) {
                if ($profile->hasFave($item->notice)) {
                    $disfavor = new AnonDisFavorForm($item->out, $item->notice);
                    $disfavor->show();
                } else {
                    $favor = new AnonFavorForm($item->out, $item->notice);
                    $favor->show();
                }
            }
        }

        return true;
    }

    function createAnonProfile() {

        // Get the anon user's IP, and turn it into a nickname
        list($proxy, $ip) = common_client_ip();
        // IP + time + random number should avoid collisions
        $nickname = 'anonymous-' . $ip . '-' . time() . '-' . common_good_rand(5);

        $profile = new Profile();
        $profile->nickname = $nickname;
        $id = $profile->insert();

        if (!empty($id)) {
            common_log(
                    LOG_INFO,
                    "AnonymousFavePlugin - created profile for anonymous user from IP: "
                    . $ip
                    . ', nickname = '
                    . $nickname
            );
        }

        return $profile;
    }

    function getAnonProfile() {

        $anon = $_SESSION['anon_nickname'];

        $profile = null;

        if (!empty($anon)) {
            $profile = Profile::staticGet('nickname', $anon);
        } else {
            $profile = $this->createAnonProfile();
            $_SESSION['anon_nickname'] = $profile->nickname;
        }

        if (!empty($profile)) {
            return $profile;
        }
    }

    /**
     * Provide plugin version information.
     *
     * This data is used when showing the version page.
     *
     * @param array &$versions array of version data arrays; see EVENTS.txt
     *
     * @return boolean hook value
     */
    function onPluginVersion(&$versions)
    {
        $url = 'http://status.net/wiki/Plugin:AnonymousFave';

        $versions[] = array('name' => 'AnonymousFave',
            'version' => ANONYMOUS_FAVE_PLUGIN_VERSION,
            'author' => 'Zach Copley',
            'homepage' => $url,
            'rawdescription' =>
            _m('Allow anonymous users to favorite notices.'));

        return true;
    }

}
