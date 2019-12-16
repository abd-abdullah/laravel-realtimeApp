import Token from './Token.js'
import AppStorage from './AppStorage.js'

class User {

    login(FormData){
        axios.post('api/auth/login',FormData).then(resData => this.responseAfterLogin(resData))
            .catch(function(failData){
                console.log(failData);
            });
    }

    responseAfterLogin(resData){
        const access_token = resData.data.access_token;
        const  username = resData.data.user;
        if(Token.isValid(access_token)){
            AppStorage.storeCredentials(username,access_token);
            window.location.href = '/forum';
        }
    }


    hasToken(){
        const storedToken = AppStorage.getToken();
        if(storedToken){
            return Token.isValid(storedToken)? true : this.logout();
        }

        return false;
    }


    loggedIn(){
        return this.hasToken();
    }

    logout(){
         AppStorage.deleteCredentials();
         window.location.href = '/forum';
    }

    userName() {
        if (this.loggedIn) {
            return AppStorage.getUser();
        }

        return false;
    }

    userId(){
        if(this.loggedIn()){
            const payload = Token.payload(AppStorage.getToken());
            return payload.sub;
        }
    }

    own(id){
        return this.userId() === id;
    }

    is_admin(){
        return this.userId() == 1;
    }
}

export default User = new User();