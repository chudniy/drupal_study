<?php

namespace Drupal\news\Controller;

/**
 * Class NewsSettingsController.
 *
 * @package Drupal\news\Controller
 */
class NewsController {

    /**
     * Returns settings page.
     */
    public function getNews() {
        $element = array();
        $element['#title'] = 'Latest news';
        $element['#theme'] = 'news';
        return $element;
    }
}