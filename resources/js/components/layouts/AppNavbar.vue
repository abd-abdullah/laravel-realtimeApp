<template>
    <div>
        <b-navbar toggleable="md" type="dark" variant="dark">
            <b-navbar-brand href="#">Laravel App</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <b-nav-item link to="#">FORUME</b-nav-item>
                    <b-nav-item link to="#">CATEGORY</b-nav-item>
                    <b-nav-item link to="#">ASK QUESTION</b-nav-item>
                </b-navbar-nav>

                <!-- Right aligned nav items -->
                <b-navbar-nav class="ml-auto">

                    <b-nav-item-dropdown text="Lang" right>
                        <b-dropdown-item link to="#">EN</b-dropdown-item>
                        <b-dropdown-item link to="#">ES</b-dropdown-item>
                        <b-dropdown-item link to="#">RU</b-dropdown-item>
                        <b-dropdown-item link to="#">FA</b-dropdown-item>
                    </b-nav-item-dropdown>


                    <b-nav-item link to="/login">Login</b-nav-item>

                    <b-nav-item-dropdown right>
                        <!-- Using 'button-content' slot -->
                        <template v-slot:button-content>
                            <em>Md Abdullah</em>
                        </template>
                        <b-dropdown-item link to="#">Profile</b-dropdown-item>
                        <b-dropdown-item link to="#">Sign Out</b-dropdown-item>
                    </b-nav-item-dropdown>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>