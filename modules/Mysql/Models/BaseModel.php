<?php


use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    //column
    const ID = 'id';
    const CREATED_AT = 'created_at';
    const CREATED_BY = 'created_by';
    const UPDATED_AT = 'updated_at';
    const UPDATED_BY = 'updated_by';

    protected static function boot()
    {
        parent::boot();
    }

    /**
     * Get all column name of table
     *
     * @return array
     */
    public function getTableColumns()
    {
        $result = [];
        $table_columns = $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        foreach ($table_columns as $index => $column_name) {
            $column = new \stdClass();
            $column->column_name = $column_name;
            $result[$index] = $column;
        }
        return $result;
    }

    protected $guarded = [];

    protected function serializeDate(DateTimeInterface $date)
    {
        return (int)$date->format('U');
    }
}
