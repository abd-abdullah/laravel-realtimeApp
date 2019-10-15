<template>
    <!-- Default form login -->
    <b-container class="bg-white">
        <b-row class="p-5">
            <b-col offset="4" cols="4">
                <form @submit.prevent="login">
                    <p class="h4 text-center mb-4">Sign in</p>
                    <label for="defaultFormLoginEmailEx" class="grey-text">Your email</label>
                    <input v-model="form.email" type="email" id="defaultFormLoginEmailEx" class="form-control"/>
                    <br/>
                    <label for="defaultFormLoginPasswordEx" class="grey-text">Your password</label>
                    <input  v-model="form.password" type="password" id="defaultFormLoginPasswordEx" class="form-control"/>
                    <b-row class="mt-4">
                        <b-col cols="4" class="text-left">
                            <b-link to="/signup">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </b-link>
                        </b-col>
                        <b-col offset="4" cols="4" class="text-right">
                            <button class="btn btn-success btn-block" type="submit">Login</button>
                        </b-col>
                    </b-row>
                </form>
            </b-col>
        </b-row>
    </b-container>
    <!-- Default form login -->
</template>

<script>
    export default {
        data(){
            return{
                form:{
                    email:null,
                    password:null,
                }
            }
        },
        created(){
            if(User.loggedIn()){
                this.$router.push({name:'forum'});
            }
        },
        methods:{
            login() {
                User.login(this.form);
            }
        }
    }
</script>