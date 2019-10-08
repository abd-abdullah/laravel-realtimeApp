class AppStorage{
    storeCredentials(user,token){
        this.setToken(token);
        this.setUser(user);
    }

    setUser(user){
        localStorage.setItem('user', user);
    }

    setToken(token){
        localStorage.setItem('token', token);
    }

    deleteCredentials(){
        localStorage.removeItem('user');
        localStorage.removeItem('token');
    }

    getUser(){
        return localStorage.getItem('user');
    }

    getToken(){
        return localStorage.getItem('token');
    }


}

export default new AppStorage();