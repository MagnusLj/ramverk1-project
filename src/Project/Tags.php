<?php

namespace Malm18\Project;

use Anax\DatabaseActiveRecord\ActiveRecordModel;

/**
 * A database driven model.
 */
class Tags extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Tags";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     * and more!
     */

    public $id;
    public $questionid;
    public $tag;
}
