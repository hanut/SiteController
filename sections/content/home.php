<div class="container">
    <div class="row text-center">
        <div class="col-xs-12">
            <h1><u>SiteController</u></h1>
            <b>Author: Hanut Singh</b>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <h3>About SiteController</h3>
            <p>
                A Boiler Plate framework that provides limited but speedy functionality for quickly developing web application in 
                PHP. Can be used for prototyping before shifting to other frameworks such as CakePHP / CodeIgniter as the 
                code is easily portable to either of the two. 
                <br/><br/>
                SiteController focusses on the speedy creation of views that bind with 
                the business logic on the server side. It also provides a minimal impact MVC architecture. (Although it is arguably not MVC since it is yet to include Model support) . Uses a single sitecontroller with view loaders and layouts.
            </p>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <h3>Features</h3>
            <ul>
            <?php
                foreach($this->loadDataset('data') as $val){
                    print $val;
                }
            ?>
            </ul>
            <?php
                debug("A simple method for pretty printing arrays :) in case you debug that way.");
                debug($_SERVER);
            ?>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
        <h3>Handled errors in dev environment</h3>
        <?php $this->loadDataset('doodad'); ?>
        <?php $this->loadSection('doodad'); ?>
        <?php $this->loadSection('../dbooie',null,false); ?>
        </div>
    </div>
    <hr/>
    <div class="row">
    <div class="col-xs-8 col-xs-offset-2">
            <img src="<?php echo $this->base;?>images/cheers.jpg" title='Cheers!' alt="Cheers!" width="100%"/>
        </div>
    </div>
</div>