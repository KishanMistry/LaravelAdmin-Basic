<div class="row">
    <div class="breadcrumbs-dark breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
            <div class="col s10 m6 l6">
                <h5 class="breadcrumbs-title mt-0 mb-0"><span>{{ Request()->breadcrumbsTitle }}</span></h5>            
                <?php
                if (!empty(Request()->breadcrumbItem) && Request()->breadcrumbItem != 'Dashboard') {
                    ?>
                    <ol class="breadcrumbs mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>                
                        <li class="breadcrumb-item active">{{ Request()->breadcrumbItem }}</li>
                    </ol>
                    <?php
                } else {
                    ?>
                    <ol class="breadcrumbs mb-0">                    
                        <li class="breadcrumb-item active">{{ Request()->breadcrumbItem }}</li>
                    </ol>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
