<?php
namespace App\View\Helper;

use Cake\I18n\Time;
use Cake\Core\Configure;
use Cake\View\Helper;
use Cake\Utility\Hash;
use DateTime;

class AppHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * Outputs the footer menu items
     *
     * @param array $items
     * @return string
     */
    public function menuItems($items)
    {
        $result = '';

        foreach ($items as $key => $options) {
            $class = '';
            $icon = 'fa fa-menu fa-chevron-right';
            $url = $options;
            $linkOptions = ['escape' => false];

            if (is_array($options)) {
                $icon = Hash::get($options, 'icon', $icon);
                $url = Hash::get($options, 'url', '#');
                $class = Hash::get($options, 'class', '');
				$title = Hash::get($options, 'title', '');

				$linkOptions = array_merge($linkOptions, Hash::get($options, 'options', []));
            } else {
				$title = $key;
			}

            $link = $this->Html->link(
                $this->Html->tag('i', '', ['class' => $icon]) . __($title),
                $url,
                $linkOptions
            );

            $result .= $this->Html->tag('li', $link, ['class' => $class]);
        }

        return $result;
    }

	/**
	 * Checks the active and return active class
	 *
	 * @param string $controller
	 * @return string
	 */
	public function active($controller)
	{
		return strtolower($this->request->controller) == strtolower($controller) ? 'active' : '';
	}

	/**
	 * Get days left for cakefest
	 *
	 * @return int
	 */
	public function cakeFestDaysLeft()
	{
		$startDate = Configure::read('Site.cakefest.start_date');
		return (new Time($startDate))->diff(new Time())->days;
	}

	public function cakeFestDates()
	{
		$startDate = new DateTime(Configure::read('Site.cakefest.start_date'));
		$endDate = new DateTime(Configure::read('Site.cakefest.end_date'));
		return __('{0} to {1}', $startDate->format('M d'), $endDate->format('M d'));

	}
}