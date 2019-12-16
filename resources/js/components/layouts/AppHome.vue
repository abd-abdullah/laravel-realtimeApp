<template>
    <div>
        <AppNavbar></AppNavbar>
        <div style="min-height:850px; background-image: url('/img/background.jpg'); background-position: center;
  background-repeat: no-repeat;
  background-size: cover;">
        <router-view></router-view>
        </div>
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
