<template>
    <main>
        <title>WindWobbles</title>
        <meta charset="utf-8" />
        <link
            href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap"
            rel="stylesheet"
        />
        <NavbarAdmin />
        <div class="body-wrapper d-flex w-100">
            <SidebarAdmin />
            <router-view></router-view>
        </div>
    </main>
</template>

<script>
import NavbarAdmin from './NavbarAdmin';
import SidebarAdmin from './SidebarAdmin';
export default {
    name: 'app',
    components: {
        NavbarAdmin,
        SidebarAdmin
    }
}
</script>
<style>
    @import '/resources/css/bootstrap.min.css';
    @import '/resources/css/elegant-icons.css';
    @import '/resources/css/font-awesome.min.css';
    /* @import '/resources/css/jquery-ui.min.css'; */
    @import '/resources/css/nice-select.css';
    /* @import '/resources/css/owl.carousel.min.css'; */
    @import '/resources/css/slicknav.min.css';
    @import '/resources/css/style.css';
</style>
