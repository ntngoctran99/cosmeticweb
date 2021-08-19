<template>
    <div class="page-sidebar d-none d-md-block">
        <ul>
            <!-- <li>
              <a href="index.html"><i class="fa fa-home"></i> Home</a>
            </li> -->
            <li id="accordionExample">
                <a
                    class="d-flex justify-content-between align-items-center"
                    href=""
                    data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseUtilities"
                >
                    <span><i class="fa fa-tags"></i> Type Products</span>
                    <i class="fa fa-plus-square"></i>
                </a>
                <div
                    id="collapseOne"
                    class="collapse"
                    aria-labelledby="headingUtilities"
                    data-parent="#accordionExample"
                >
                    <ul>
                        <li><router-link to="/type-products">List Type Products</router-link></li>
                        <li><router-link to="/add-type-products">Add Type Product</router-link></li>
                    </ul>
                </div>
            </li>
            <li id="accordionExample">
                <a
                    class="d-flex justify-content-between align-items-center"
                    href=""
                    data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="true"
                    aria-controls="collapseUtilities"
                >
                    <span><i class="fa fa-tags"></i> Products</span>
                    <i class="fa fa-plus-square"></i>
                </a>
                <div
                    id="collapseOne"
                    class="collapse"
                    aria-labelledby="headingUtilities"
                    data-parent="#accordionExample"
                >
                    <ul>
                        <li><router-link to="/list-products">List Products</router-link></li>
                        <li><a href="add-product.html">Add Product</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="orders.html"><i class="fa fa-shopping-cart"></i> Orders</a>
            </li>
        </ul>
    </div>
</template>

<script>
    export default{
        name: 'SidebarAdmin'
    }
</script>