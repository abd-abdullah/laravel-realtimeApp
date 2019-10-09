<template>
    <div>
        <b-navbar toggleable="md" type="dark" variant="dark">
            <b-navbar-brand href="#">Laravel App</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item class="text-uppercase" v-for="item in items" :key="item.title" :to="item.to">{{item.title}}</b-nav-item>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">

                    <b-nav-item-dropdown text="Lang" right>
                        <b-dropdown-item link to="#">EN</b-dropdown-item>
                        <b-dropdown-item link to="#">ES</b-dropdown-item>
                        <b-dropdown-item link to="#">RU</b-dropdown-item>
                        <b-dropdown-item link to="#">FA</b-dropdown-item>
                    </b-nav-item-dropdown>


                    <b-nav-item v-if="!login" link to="/login">Login</b-nav-item>

                    <b-nav-item-dropdown v-if="login" right>
                        <!-- Using 'button-content' slot -->
                        <template  v-slot:button-content>
                            <em >{{username}}</em>
                        </template>
                        <b-dropdown-item link to="#">Profile</b-dropdown-item>
                        <b-dropdown-item link to="#">Sign Out</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                items: [
                    {title:"Forum", to:'/forum', show:false},
                    {title:"Ask Question", to:'/ask',show:User.loggedIn()},
                    {title:"Category", to:'/category',show:User.loggedIn()},
                ],

                username:User.userName(),
                login:User.loggedIn(),
            }
        }
    }
</script>