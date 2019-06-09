<?php
namespace Thoulah\FontAwesomeInline\bootstrap4;

use Thoulah\FontAwesomeInline\Icon;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

class ActiveField extends \yii\bootstrap4\ActiveField {
	public $icon;
	public $iconPrefix = 'svg-inline--fa';

	/**
	 * {@inheritdoc}
	 */
	public function __construct($config = []) {
		parent::__construct($config);
		$this->setInputTemplate();
	}

	public function setInputTemplate() {
		if (empty($this->icon))
			return;

		$icon = new Icon();
		$icon->prefix = $this->iconPrefix;

		if (is_string($this->icon)) :
			$this->inputTemplate = $icon->activeFieldAddon($this->icon);
			return;
		endif;

		$iconName = ArrayHelper::remove($this->icon, 'name');
		$this->inputTemplate = $icon->activeFieldAddon($iconName, $this->icon);
	}
}
