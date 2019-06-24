<?php

/**
 * @link https://fontawesome.mr42.me/
 * @license https://github.com/Thoulah/yii2-fontawesome-inline/blob/master/LICENSE
 */

namespace thoulah\fontawesome\config;

use yii\base\DynamicModel;
use yii\helpers\Html;

/**
 * Sets default opions
 * @return array Defaults default values
 */
class config
{
    protected $validBootstrap = ['bootstrap4'];
    protected $validGroupSizes = ['sm', 'md', 'lg'];
    protected $validStyles = ['solid', 'regular', 'light', 'brands'];

    /**
     * Construct
     * @param array $options Options
     */
    public function __construct(array $options = null)
    {
        if ($options !== null) {
            foreach ($options as $key => $value) {
                $this->$key = $value;
            }
        }

        return $this;
    }

    /**
     * Checks if validation returned errors and returns the errors
     * @param DynamicModel $model Validation model
     * @return string|null Validation errors
     */
    protected function errorSummary(DynamicModel $model): ?string
    {
        return ($model->hasErrors())
            ? Html::errorSummary($model)
            : null;
    }
}