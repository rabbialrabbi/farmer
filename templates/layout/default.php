<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
$cakeDescription = 'DAE ADVISORY';
?>
<!DOCTYPE html>
<html>
    <head>
        <?= $this->Html->charset() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
            <?= $cakeDescription ?>:
            <?= $this->fetch('title') ?>
        </title>
        <?= $this->Html->meta('icon') ?>      
        <?php echo $this->html->css('bootstrap.min'); ?>
        <?php echo $this->html->script('jquery-3.1.0.min'); ?>
        <?php echo $this->html->script('jquery-ui.min'); ?>        
        <?php echo $this->html->script('bootstrap.min'); ?>
        <?php echo $this->html->css('jquery-ui.min'); ?>
        <?php echo $this->html->css('jquery-ui.structure.min'); ?>
        <?php echo $this->html->css('jquery-ui.theme.min'); ?>
        <?php echo $this->html->script('dateFormat.min'); ?>
                    
        <?= $this->fetch('meta') ?>
        <?= $this->fetch('css') ?>
        <?= $this->fetch('script') ?>
        <style type="text/css">           

            body {
                overflow-x: hidden;
                font-family: 'Roboto', sans-serif;
                font-size: 16px;             
                /* padding-top: 0px;       */
                padding: 0px;
            }

            /* Toggle Styles */

            #viewport {
                padding-left: 250px;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }

            #content {
                width: 100%;
                position: relative;
                margin-right: 0;
                margin-left: 0;
            }

            /* Sidebar Styles */

            #sidebar {
                z-index: 1000;
                position: fixed;
                left: 250px;
                width: 240px;
                height: 100%;
                margin-left: -250px;
                overflow-y: auto;
                background: #37474F;
                -webkit-transition: all 0.5s ease;
                -moz-transition: all 0.5s ease;
                -o-transition: all 0.5s ease;
                transition: all 0.5s ease;
            }

            #sidebar header {
                background-color: #263238;
                font-size: 20px;
                line-height: 52px;
                text-align: center;
            }

            #sidebar header a {
                color: #fff;
                display: block;
                text-decoration: none;
            }

            #sidebar header a:hover {
                color: #fff;
            }

            #sidebar .nav{

            }

            #sidebar .nav a{
                background: none;
                border-bottom: 1px solid #455A64;
                color:#0F0;
                font-size: 15px;
                padding: 16px 24px;
            }

            #sidebar .nav a:hover{
                background: none;
                color: #ECEFF1;
            }

            #sidebar .nav a i{
                margin-right: 16px;
            }
            .footer {
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                background-color:#fff;
                color: black;
                text-align: right;
                border-bottom: #263238;
            }

        </style>
    </head>
    <body>
        <div id="viewport">
            <!-- Sidebar -->            
            <div id="sidebar">
                <header>
                    <a href="#">DAE ADVISORY</a>
                </header>
                <ul class="nav">         
                    <!--                    <li class="text-primary">Code Books</li>
                                                <li><?= $this->Html->link(_('Regions'), ['controller' => 'Regions', 'action' => 'Index']); ?></li>
                                                <li><?= $this->Html->link(_('Division'), ['controller' => 'Divisions', 'action' => 'Index']); ?></li>
                                                <li><?= $this->Html->link(_('District'), ['controller' => 'Districts', 'action' => 'Index']); ?></li>
                                                <li><?= $this->Html->link(_('Upazilla'), ['controller' => 'Upazilla', 'action' => 'Index']); ?></li>
                                                <li><?= $this->Html->link(_('Union'), ['controller' => 'Tunion', 'action' => 'Index']); ?></li>
                                                <li><?= $this->Html->link(_('Group'), ['controller' => 'Tgroup', 'action' => 'Index']); ?></li>
                                                <li><?= $this->Html->link(_('Project'), ['controller' => 'project', 'action' => 'Index']); ?></li>-->

                    <li class="text-primary">Farmer</li>                

                    <li><?= $this->Html->link(_('Farmer'), ['controller' => 'Farmerapi', 'action' => 'Index']); ?></li>

                    <li class="text-primary">Advisory Management</li>
                    <a href="/test"></a>

                    <li><?= $this->Html->link(_('Advisory Content'), ['controller' => 'Smscontent', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Attachment'), ['controller' => 'Smsdesattachment', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Advisory Dissemination'), ['controller' => 'Smsdesmanagement', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Advisory Return'), ['controller' => 'Smsfedmanagement', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Advisory Feedback'), ['controller' => 'smsmanagement', 'action' => 'Index']); ?></li>

                    <li class="text-primary">Code Books</li>

                    <li><?= $this->Html->link(_('Crops'), ['controller' => 'crops', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Year'), ['controller' => 'cyearen', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Group'), ['controller' => 'tgroup', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Project'), ['controller' => 'Project', 'action' => 'Index']); ?></li>

                    <li class="text-primary">Option</li>
                    <li><?= $this->Html->link(_('Code List'), ['controller' => 'codelist', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('List Item'), ['controller' => 'Codelistdetail', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('User Info'), ['controller' => 'Users', 'action' => 'Index']); ?></li>
                    <li><?= $this->Html->link(_('Settings'), ['controller' => 'Softsettings', 'action' => 'Index']); ?></li>
                </ul>
            </div>
            <!-- Content -->
            <div id="content">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="text-success"><h1>FARMER ADVISORY MANAGEMENT SYSTEM</h1></li>
                        </ul>
                    </div>
                </nav>               
                <div id="maincontent" class="container-fluid">                
                    <div class="container">
                        <?= $this->Flash->render() ?>
                        <?= $this->fetch('content') ?>
                    </div>               
                </div>
            </div>
            <hr />
            <div class="footer">
                <p> <li>Version: 1.0.3</li></p>
            </div>
        </div>


    </body>
</html>
