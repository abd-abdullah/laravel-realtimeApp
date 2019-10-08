<template>
    <!-- Default form login -->
    <b-container class="bg-white">
        <b-row class="p-5">
            <b-col offset="4" cols="4">
                    <!-- Default form register -->
                    <form @submit.prevent="signUp">
                        <p class="h4 text-center mb-4">Sign up</p>
                        <label for="defaultFormRegisterNameEx" class="grey-text">Your name</label>
                        <input v-model="form.name" type="text" required id="defaultFormRegisterNameEx" class="form-control"/>
                        <br/>
                        <label for="defaultFormRegisterEmailEx" class="grey-text">Your email</label>
                        <input v-model="form.email" type="email" required id="defaultFormRegisterEmailEx" class="form-control"/>
                        <br/>
                        <label for="defaultFormRegisterConfirmEx" class="grey-text">Confirm your email</label>
                        <input v-model="form.email_confirm" type="email" required id="defaultFormRegisterConfirmEx" class="form-control"/>
                        <br/>
                        <label for="defaultFormRegisterPasswordEx" class="grey-text">Your password</label>
                        <input v-model="form.password" type="password" required id="defaultFormRegisterPasswordEx" class="form-control"/>
                        <b-row class="mt-4">
                            <b-col cols="4" class="text-left">
                                <b-link to="/login">
                                    <button class="btn btn-success btn-block" type="submit">LogIn</button>
                                </b-link>
                            </b-col>
                            <b-col offset="4" cols="4" class="text-right">
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
                            </b-col>
                        </b-row>

                    </form>
                    <!-- Default form register -->
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
                    name:null,
                    email:null,
                    email_confirm:null,
                    password:null,
                }
            }
        },
        methods:{
            signUp() {
                User.signUp(this.form);
            }
        }
    }
</script>