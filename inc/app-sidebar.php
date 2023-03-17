<div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    
                    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                 <?php if($root->canShowLab($auth)) { ?>
                                 <li>
                                    <a href="?view=invList&title=Investigations Requested">
                                        <i class="metismenu-icon fa fa-list"></i>
                                        Investigations Requested
                                    </a>
                                </li>
                                <?php } ?>
                                <?php if($root->canAccess($auth)) {  ?>
                                <li>
                                     
                                    <a href="#">
                                        <i class="metismenu-icon fa fa-list"></i>
                                        Admin Panel
                                        <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                    </a>
                                    <ul>
                                        <li>
                                            <a href="?view=indexPatient&title=Patients">
                                                <i class="metismenu-icon"></i>
                                                Patients
                                            </a>
                                        </li>

                                        <li>
                                            <a href="?view=indexService&title=Services">
                                                <i class="metismenu-icon"></i>
                                                Services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="?view=indexInv&title=Investigations">
                                                <i class="metismenu-icon">
                                                </i>Investigations
                                            </a>
                                        </li>

                                        <li>
                                            <a href="?view=indexRef&title=References">
                                                <i class="metismenu-icon">
                                                </i>References
                                            </a>
                                        </li>

                                        <li>
                                            <a href="?view=indexUnit&title=Units">
                                                <i class="metismenu-icon">
                                                </i>Units
                                            </a>
                                        </li>

                                     
                                        <li>
                                            <a href="?view=indexSetting&title=Setting">
                                                <i class="metismenu-icon">
                                                </i>Setting
                                            </a>
                                        </li>
                                        <li>
                                            <a href="?view=indexUser&title=Users">
                                                <i class="metismenu-icon">
                                                </i>Users
                                            </a>
                                        </li>

                                        <li>
                                            <a href="?view=indexFrq&title=Frq Report">
                                                <i class="metismenu-icon">
                                                </i>Frq Report
                                            </a>
                                        </li>

                                        
                                       
                                    </ul>
                                </li>
                            <?php } ?>

                             <?php if ($root->canShow($auth)) { ?>
                             <li>
                                  <a href="#">
                                        <i class="metismenu-icon fa fa-list"></i>
                                        Accountant
                                        <i class="metismenu-state-icon fa fa-angle-down caret-left"></i>
                                    </a>

                                    <ul>
                                        <li>
                                            <a href="?view=indexAccount&title=Accounting">
                                                <i class="metismenu-icon">
                                                </i>Accounting
                                            </a>
                                        </li>
                                        
                                    </ul>
                             </li>

                             <?php } ?>
                             
                            </ul>
                        </div>
                    </div>
                </div> 