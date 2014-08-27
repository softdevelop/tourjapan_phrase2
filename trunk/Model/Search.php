<?php
App::uses('AppModel', 'Model');
/**
 * TourPackage Model
 *
 * @property Sponsor $Sponsor
 * @property Area $Area
 * @property Category $Category
 * @property Application $Application
 * status : 0 : hide, 1: open, 2: reserved, 3: close
 */
 class Search extends AppModel{
    var $name = 'Search';
 }
?>