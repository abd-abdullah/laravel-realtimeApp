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
                    <div class="text-center mt-4">
                        <button class="btn btn-success" type="submit">Login</button>
                    </div>
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
        methods:{
            login() {
                User.login(this.form);
            }
        }
    }
</script>