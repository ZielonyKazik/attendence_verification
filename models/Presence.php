<?php
/**
 * Created by IntelliJ IDEA.
 * User: kazik
 * Date: 13.08.17
 * Time: 14:09
 */

namespace app\models;

use yii\db\ActiveRecord;

class Presence extends ActiveRecord
{
    public function getLectureDate()
    {
        return $this->hasOne(LectureDate::class, ['id' => 'lecture_date_id']);
    }

    public function getPaticipant()
    {
        return $this->hasOne(Participant::class, ['id' => 'participant_id']);
    }
}