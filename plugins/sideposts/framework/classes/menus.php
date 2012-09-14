<?php
/**
 * Simple menu manager class.
 *
 * @version		$Rev: 206156 $
 * @author		Jordi Canals
 * @copyright   Copyright (C) 2009, 2010 Jordi Canals
 * @license		GNU General Public License version 2
 * @link		http://alkivia.org
 * @package		Alkivia
 * @subpackage	Framework
 *

	Copyright 2009, 2010 Jordi Canals <devel@jcanals.cat>

	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	version 2 as published by the Free Software Foundation.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 * Class to manage menus.
 *
 * @author		Jordi Canals
 * @package		Alkivia
 * @subpackage	Framework
 * @since		0.9
 * @link		http://wiki.alkivia.org/framework/classes/menus
 */
class akMenus
{
    /**
     * Holds all menus.
     * For each menu[name] it holds a prority array. We set the menu items on this array.
     *
     * @var array
     */
    private $menus = array();

    /**
     * Creates a new menu.
     * We need to create the menu before start adding items to it.
     *
     * @param string $name Menu name. Also will be the menu ID.
     * @return boolean If menu was succesfully created. (If it exists, will return false).
     */
    public function newMenu ( $name, $title = '' )
    {
        if ( isset($this->menus[$name]) ) {
            return false;
        } else {
            $this->menus[$name] = array( 'title' => $title, 'items' => array() );
            return true;
        }
    }

    /**
     * Checks if a menu is already created.
     *
     * @param string $name
     * @return unknown_type
     */
    public function isMenu ( $name ) {
        return isset($this->menus[$name]);
    }

    /**
     * Adds a menu item.
     *
     * @param string $menu Menu name
     * @param string $title Item title
     * @param string $link Item link
     * @param int $priority Item order (or priority)
     * @return bolean If item was succesfully created. (If menu does not exist will return false).
     */
    public function addItem ( $menu, $title, $link, $priority = 50 )
    {
        if ( isset($this->menus[$menu]) ) {
            $this->menus[$menu]['items'][$priority][] = array ( 'title' => $title, 'link' => $link );
        } else {
            return false;
        }
    }

    /**
     * Returns a menu title.
     *
     * @param string $name Menu name or id.
     * @return string|false Returns the menu title or false if menu is not set.
     */
    public function getTitle( $name )
    {
        if ( isset($this->menus[$name]) ) {
            return $this->menus[$name][$title];
        } else {
            return false;
        }
    }

    /**
     * Displays a menu title.
     *
     * @param string $name Menu name or id.
     * @return void
     */
    public function displayTitle ( $name )
    {
        if ( isset($this->menus[$name]) ) {
            echo $this->menus[$name][$title];
        } else {
            echo '';
        }
    }

    /**
     * Returns a formated menu.
     *
     * @param string $name Menu name to return.
     * @return array Returns an array with all menu items.
     */
    public function getItems ( $name )
    {
        if ( ! isset($this->menus[$name]) ) {
            return false;
        }

        ksort($this->menus[$name]['items']);
        $items = array();
        foreach ( $this->menus[$name]['items'] as $priority => $options ) {
            foreach ( $options as $item ) {
                $items[] = $item;
            }
        }
        return $items;
    }

    /**
     * Displays all menu items.
     *
     * @param string $name Menu name
     * @return void
     */
    public function displayItems ( $name )
    {
        if ( ! isset($this->menus[$name]) ) {
            return;
        }

        $items = getMenuItems($name);

        echo "<ul id='{$name}' class='ak-menu'>" . PHP_EOL;
        foreach ( $items as $item ) {
            echo "    <li><a href='{$item['link']}'>{$item['title']}</a></li>" . PHP_EOL;
        }
        $menu .= "</ul>" . PHP_EOL;
    }
}
