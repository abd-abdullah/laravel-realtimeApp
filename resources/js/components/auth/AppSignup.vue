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
                        <span class="text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
                        <br/>
                        <label for="defaultFormRegisterEmailEx" class="grey-text">Your email</label>
                        <input v-model="form.email" type="email" required id="defaultFormRegisterEmailEx" class="form-control"/>
                        <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        <br/>
                        <label for="defaultFormRegisterConfirmEx" class="grey-text">Confirm your email</label>
                        <input v-model="form.email_confirmation" type="email" required id="defaultFormRegisterConfirmEx" class="form-control"/>
                        <span class="text-danger" v-if="errors.email">{{ errors.email[0] }}</span>
                        <br/>
                        <label for="defaultFormRegisterPasswordEx" class="grey-text">Your password</label>
                        <input v-model="form.password" type="password" required id="defaultFormRegisterPasswordEx" class="form-control"/>
                        <span class="text-danger" v-if="errors.password">{{ errors.password[0] }}</span>
                        <br/>
                        <label for="defaultFormRegisterPasswordConfirmEx" class="grey-text">Confirm your password</label>
                        <input v-model="form.password_confirmation" type="password" required id="defaultFormRegisterPasswordConfirmEx" class="form-control"/>
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
                    email_confirmation:null,
                    password:null,
                    password_confirmation:null,
                },
                errors:{}
            }
        },
        methods:{
            signUp(){
                axios.post('api/auth/signup',this.form).then(function(resData){
                        User.responseAfterLogin(resData)
                    }).catch(function (failData) {
                        this.errors = failData.response.data.errors
                    });
            }
        }
    }
</script>