<template>
    <div>
        <AppNavbar></AppNavbar>
        <router-view></router-view>
        <AppFooter></AppFooter>
    </div>
</template>

<script>
    import AppNavbar from './AppNavbar'
    import Login from '../auth/AppLogin'
    import AppFooter from './AppFooter'
    export default {
        components:{AppNavbar, Login, AppFooter}
    }
</script>
