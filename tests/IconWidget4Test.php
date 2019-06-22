<?php
/**
 *  @link https://fontawesome.mr42.me/
 *  @license https://github.com/Thoulah/yii2-fontawesome-inline/blob/master/LICENSE
 */

namespace thoulah\fontawesome\tests;

use thoulah\fontawesome\IconWidget4 as IconWidget;

class IconWidget4Test extends tests {
	public function testBasic(): void {
		IconWidget::$counter = 0;
		$this->assertStringContainsString('viewBox="0 0 512 512" id="w0" aria-hidden="true" role="img" class="svg-inline--fa svg-inline--fa-w-16"', IconWidget::widget(['name' => 'cookie']));
		$this->assertStringContainsString('viewBox="0 0 192 512" id="w1" aria-hidden="true" role="img" class="svg-inline--fa svg-inline--fa-w-6"', IconWidget::widget(['name' => 'ellipsis-v']));
		$this->assertStringContainsString('viewBox="0 0 496 512" id="w2" aria-hidden="true" role="img" class="svg-inline--fa svg-inline--fa-w-16"', IconWidget::widget(['name' => 'github', 'options' => ['style' => 'brands']]));
		$this->assertStringContainsString('viewBox="0 0 512 512" id="w3" aria-hidden="true" role="img" class="svg-inline--fa svg-inline--fa-w-16"', IconWidget::widget(['name' => '']));
	}

	public function testClass(): void {
		IconWidget::$counter = 0;
		$this->assertStringContainsString('viewBox="0 0 512 512" class="mr42 svg-inline--fa svg-inline--fa-w-16" id="w0" aria-hidden="true" role="img"', IconWidget::widget(['name' => 'cookie', 'options' => ['class' => 'mr42']]));
		$this->assertStringContainsString('viewBox="0 0 496 512" class="mr42 svg-inline--fa svg-inline--fa-w-16" id="w1" aria-hidden="true" role="img"', IconWidget::widget(['name' => 'github', 'options' => ['class' => 'mr42', 'style' => 'brands']]));
	}

	public function testFill(): void {
		$this->assertStringContainsString('fill="currentColor"/></svg>', IconWidget::widget(['name' => 'cookie']));
		$this->assertStringNotContainsString('fill', IconWidget::widget(['name' => 'cookie', 'options' => ['fill' => '']]));
		$this->assertStringContainsString('fill="#003865"/></svg>', IconWidget::widget(['name' => 'cookie', 'options' => ['fill' => '#003865']]));
	}

	public function testFixedWidth(): void {
		$this->assertStringNotContainsString('svg-inline--fa-fw', IconWidget::widget(['name' => 'cookie']));
		$this->assertStringContainsString('svg-inline--fa-fw', IconWidget::widget(['name' => 'cookie', 'options' => ['fixedWidth' => true]]));
	}

	public function testHeight(): void {
		IconWidget::$counter = 0;
		$this->assertStringContainsString('viewBox="0 0 512 512" height="42" id="w0" aria-hidden="true" role="img" width="42"', IconWidget::widget(['name' => 'cookie', 'options' => ['height' => 42]]));
		$this->assertStringContainsString('viewBox="0 0 192 512" height="42" id="w1" aria-hidden="true" role="img" width="16"', IconWidget::widget(['name' => 'ellipsis-v', 'options' => ['height' => 42]]));
	}

	public function testPrefix(): void {
		IconWidget::$counter = 0;
		IconWidget::$defaults = ['prefix' => 'icon'];
		$this->assertStringContainsString('viewBox="0 0 512 512" id="w0" aria-hidden="true" role="img" class="icon icon-w-16"', IconWidget::widget(['name' => 'cookie']));
		$this->assertStringContainsString('viewBox="0 0 192 512" id="w1" aria-hidden="true" role="img" class="icon icon-w-6"', IconWidget::widget(['name' => 'ellipsis-v']));
		$this->assertStringContainsString('viewBox="0 0 496 512" id="w2" aria-hidden="true" role="img" class="icon icon-w-16"', IconWidget::widget(['name' => 'github', 'options' => ['style' => 'brands']]));
		$this->assertStringContainsString('viewBox="0 0 512 512" id="w3" aria-hidden="true" role="img" class="icon icon-w-16"', IconWidget::widget(['name' => '']));
	}

	public function testTitle(): void {
		$this->assertStringContainsString('<title>Demo Title</title>', IconWidget::widget(['name' => 'cookie', 'options' => ['title' => 'Demo Title']]));
	}
}