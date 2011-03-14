<?php
/*
 * StatusNet - the distributed open-source microblogging tool
 * Copyright (C) 2011, StatusNet, Inc.
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
 */

if (!defined('STATUSNET')) {
    exit(1);
}

/**
 * Class to represent extended profile data
 */
class ExtendedProfile
{
    protected $fields;

    /**
     * Constructor
     *
     * @param Profile $profile
     */
    function __construct(Profile $profile)
    {
        $this->profile  = $profile;
        $this->user     = $profile->getUser();
        $this->fields   = $this->loadFields();
        $this->sections = $this->getSections();
        //common_debug(var_export($this->sections, true));

        //common_debug(var_export($this->fields, true));
    }

    /**
     * Load extended profile fields
     *
     * @return array $fields the list of fields
     */
    function loadFields()
    {
        $detail = new Profile_detail();
        $detail->profile_id = $this->profile->id;
        $detail->find();

        $fields = array();

        while ($detail->fetch()) {
            $fields[$detail->field_name][] = clone($detail);
        }

        return $fields;
    }

    /**
     * Get a the self-tags associated with this profile
     *
     * @return string the concatenated string of tags
     */
    function getTags()
    {
        return implode(' ', $this->user->getSelfTags());
    }

    /**
     * Return a simple string value. Checks for fields that should
     * be stored in the regular profile and returns values from it
     * if appropriate.
     *
     * @param string $name name of the detail field to get the
     *                     value from
     *
     * @return string the value
     */
    function getTextValue($name)
    {
        $key           = strtolower($name);
        $profileFields = array('fullname', 'location', 'bio');

        if (in_array($key, $profileFields)) {
            return $this->profile->$name;
        } else if (array_key_exists($key, $this->fields)) {
            return $this->fields[$key][0]->field_value;
        } else {
            return null;
        }
    }

    function getPhones()
    {
        $phones = (isset($this->fields['phone'])) ? $this->fields['phone'] : null;
        $pArrays = array();

        if (empty($phones)) {
            $pArrays[] = array(
                'label' => _m('Phone'),
                'index' => 0,
                'type'  => 'phone',
                'vcard' => 'tel',
                'rel'   => 'office',
                'value' => null
            );
        } else {
            for ($i = 0; $i < sizeof($phones); $i++) {
                $pa = array(
                    'label' => _m('Phone'),
                    'type'  => 'phone',
                    'index' => intval($phones[$i]->value_index),
                    'rel'   => $phones[$i]->rel,
                    'value' => $phones[$i]->field_value,
                    'vcard' => 'tel'
                );

               $pArrays[] = $pa;
            }
        }
        return $pArrays;
    }

    function getExperiences()
    {
        $companies = (isset($this->fields['companies'])) ? $this->fields['company'] : null;
        $start = (isset($this->fields['start'])) ? $this->fields['start'] : null;
        $end   = (isset($this->fields['end'])) ? $this->fields['end'] : null;

        $cArrays = array();

        if (empty($experiences)) {
            $eArrays[] = array(
                'label'   => _m('Employer'),
                'type'    => 'experience',
                'company' => "Bozotronix",
                'start'   => '1/5/10',
                'end'     => '2/3/11',
                'current' => true,
                'index'   => 0
            );
        }

        return $eArrays;
    }

    /**
     *  Return all the sections of the extended profile
     *
     * @return array the big list of sections and fields
     */
    function getSections()
    {
        return array(
            'basic' => array(
                'label' => _m('Personal'),
                'fields' => array(
                    'fullname' => array(
                        'label' => _m('Full name'),
                        'profile' => 'fullname',
                        'vcard' => 'fn',
                    ),
                    'title' => array(
                        'label' => _m('Title'),
                        'vcard' => 'title',
                    ),
                    'manager' => array(
                        'label' => _m('Manager'),
                        'type' => 'person',
                        'vcard' => 'x-manager',
                    ),
                    'location' => array(
                        'label' => _m('Location'),
                        'profile' => 'location'
                    ),
                    'bio' => array(
                        'label' => _m('Bio'),
                        'type' => 'textarea',
                        'profile' => 'bio',
                    ),
                    'tags' => array(
                        'label' => _m('Tags'),
                        'type' => 'tags',
                        'profile' => 'tags',
                    ),
                ),
            ),
            'contact' => array(
                'label' => _m('Contact'),
                'fields' => array(
                    'phone' => $this->getPhones(),
                    'im' => array(
                        'label' => _m('IM'),
                        'type' => 'im',
                        'multi' => true,
                    ),
                    'website' => array(
                        'label' => _m('Websites'),
                        'type' => 'website',
                        'multi' => true,
                    ),
                ),
            ),
            'personal' => array(
                'label' => _m('Personal'),
                'fields' => array(
                    'birthday' => array(
                        'label' => _m('Birthday'),
                        'type' => 'date',
                        'vcard' => 'bday',
                    ),
                    'spouse' => array(
                        'label' => _m('Spouse\'s name'),
                        'vcard' => 'x-spouse',
                    ),
                    'kids' => array(
                        'label' => _m('Kids\' names')
                    ),
                ),
            ),
            'experience' => array(
                'label' => _m('Work experience'),
                'fields' => array(
                    'experience' => $this->getExperiences(),
                ),
            ),
            'education' => array(
                'label' => _m('Education'),
                'fields' => array(
                    'education' => array(
                        'type' => 'education',
                        'label' => _m('Institution'),
                    ),
                ),
            ),
        );
    }
}
