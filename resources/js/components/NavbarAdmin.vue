<template>
    <nav class="navbar admin-nav navbar-dark ftco_navbar bg-dark" id="ftco-navbar">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <router-link class="navbar-brand" to="/">HOME</router-link>

            <ul class="navbar-nav ml-auto profile">
                <li class="nav-item">
                    <a class="nav-link disabled">
                        <span class="mr-1">Admin</span>
                        <!-- <div class="avatar">
                            <img class="img-fluid" src="./images/person_2.jpg" />
                        </div> -->
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default{
        name: 'NavbarAdmin'
    }
</script>
