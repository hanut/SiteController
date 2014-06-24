<?php

/* * *****************************************************************************
 * Copyright 2014, Koresoft
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.

 * @author Hanut Singh <hanut@koresoft.in>
 * **************************************************************************** */


/**
 * Defines a lightweight webcontroller file that acts as a base platform for 
 * quickly itegrating other plugins to the framework as well as a center point 
 * for accessing the website.
 *
 * @author Hanut
 */
error_reporting(E_ERROR);

class SiteController {

    //Variable to check local script access for views
    public $local = true;
    //Setup the base address
    public $base = "";
    //Array containing list of js files to be included
    public $js = array();
    //Array containing list of css files to be included
    public $css = array();

    function __construct($options='') {
        $this->base = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https://' : 'http://';
        $this->base .= $_SERVER['SERVER_NAME'] . "/";
        for ($i = 1, $loc = explode('/', $_SERVER['REQUEST_URI']); $i < count($loc) - 1; $i++) {
            $this->base .= $loc[$i] . "/";
        }
    }

    /**
     * Adds a js file to the scripts array. Function receives the complete path to 
     * the script file(Including the extension.
     * 
     * @param String $script The path to the script file
     */
    public function addScript($script) {
        array_push($this->js, $script);
    }

    /**
     * Includes the script file links at the position it is called. Preferably call 
     * at the bottom of the page inside a block set to "display : none;"
     */
    public function includeScripts() {
        foreach ($this->js as $script) {
            echo "<script src='" . $script . "' type='text/javascript'></script>";
        }
    }

    /**
     * Adds a css file to the css array. Function receives the complete path to 
     * the css file(Including the extension.
     * If media property has to be set, add the optional $media variable.
     * 
     * @param String $style The path to the script file
     */
    public function addStyle($style, $media = '') {
        if ($media == '') {
            array_push($this->css, $style);
        } else {
            array_push($this->css, array("name" => $style, "media" => $media));
        }
    }

    /**
     * Includes the stylesheet links at the position it is called. Preferably call 
     * in the head section of the page. Order in which the stylesheets are passed 
     * is the order in which they are output.(First in First Out).
     */
    public function includeStyles() {
        foreach ($this->css as $stylesheet) {
            if (is_array($stylesheet)) {
                echo "<link rel='stylesheet' href='" . $stylesheet['name'] . "' media='" . $stylesheet['media'] . "'></style>";
            } else {
                echo "<link rel='stylesheet' href='" . $stylesheet . "'></style>";
            }
        }
    }

    /**
     * Loads the different sections of the website according to the value passed
     * to it. To include sections from a subfolder
     * 
     * @param String $section Name/Path of section to be included
     * @param Boolean $default If set to false, it uses the section string as an absolute path.
     */
    public function loadSection($section, $values = array(), $default = true) {
        try {
            if ($default == TRUE) {
                require_once './sections/' . $section . ".php";
            } else {
                require_once './' . $section . ".php";
            }
        } catch (Exception $ex) {
            echo "<pre>" . print_r($ex, true) . "</pre>";
        }
    }

    /**
     * Method to load a dataset given by the $name parameter
     * If not found will halt execution and throw a message.
     * 
     * @param String $name The name of the dataset
     */
    public function load_dataset($name = '') {
        if ($name == '') {
            die('Error Loading dataset name : ' . $name);
        } else {
            require_once './datasets/' . $name . ".php";
            return $$name;
        }
    }

    /**
     * Outputs the variable within <pre></pre> tags whether object/array/string
     * Simple helper method.
     * 
     * @param Mixed $var variable to be pretty printed
     */
    public function print_d($var) {
        if (is_array($var) || is_object($var)) {
            echo "<pre>" . print_r($var, true) . "</pre>";
        } else {
            echo "<pre>" . $var . "</pre>";
        }
    }

}
