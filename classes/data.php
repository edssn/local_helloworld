<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * FlipLearning Logs component
 *
 * @package     local_fliplearning
 * @autor       Edisson Sigua, Bryan Aguilar
 * @copyright   2020 Edisson Sigua <edissonf.sigua@gmail.com>, Bryan Aguilar <bryan.aguilar6174@gmail.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_helloworld;

use stdClass;

require_once dirname(__FILE__) . '/../../../course/lib.php';

class data {

    public static function save_data($text){
        global $DB;
        $record = new stdClass();
        $record->message = s($text);
        $record->timecreated = time();
        $id = $DB->insert_record("local_helloworld_messages", $record, true);
        $record->id = $id;
        return $record;
    }

    public static function retry_data(){
        global $DB;
        $rows = $DB->get_recordset('local_helloworld_messages');
        return $rows;
    }

}