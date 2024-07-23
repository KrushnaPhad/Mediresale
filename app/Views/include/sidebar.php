<style>
    .header{
        background: #56C7DE !important;
    }
    .nav-header
    {
        background: #56C7DE !important;
    }
    .quixnav
    {
        background: #fff !important;
    }
    .nav-label
    {
        color: #000 !important;
        font-weight:700 !important;
    }

    .quixnav .metismenu > li > a {
    color: #21214f !important;
}

.quixnav .metismenu ul a:hover, .quixnav .metismenu ul a:focus, .quixnav .metismenu ul a.mm-active {
    text-decoration: none;
    color: #21214f !important;
}

.quixnav .metismenu a
{
    color: #21214f !important;
}

.quixnav .metismenu > li:hover > a, .quixnav .metismenu > li:focus > a, .quixnav .metismenu > li.mm-active > a {
    background-color: #64d1e7 !important;
    color: #21214f !important;
}

.quixnav .quixnav-scroll {
    position: relative;
    height: 100%;
    border-right: 1px #c1c7cd dotted;
    box-shadow: none;
}

</style>
<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <!-- <li><a href="index.html"><i class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                    </li> -->
                    <li>
                        <a href="<?php echo base_url('dashboard')?>" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Dashboard</span></a>
                       
                    </li>

                    <li class="nav-label">Operations</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-app-store"></i><span class="nav-text">Equipments</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('equipments')?>">Add Equpments</a></li>
                            
                            <li><a href="<?php echo base_url('view_equipments')?>">View Equipments</a></li>
                        </ul>
                    </li>
                   
                    <li class="nav-label">Extra</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-copy-06"></i><span class="nav-text">Property</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('property')?>">Add Property</a></li>
                            <li><a href="">View Property</a></li>                          
                          
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->