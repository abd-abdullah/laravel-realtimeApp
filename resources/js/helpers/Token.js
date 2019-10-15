class Token{

    isValid(token){
        const payload = this.payload(token);
        if(payload){
            return payload.iss = "http://localhost/realtimeApp/public/api/auth/login" || "http://localhost/realtimeApp/public/api/auth/signup"? true : false;
        }

    }

    payload(token){
        const payload = token.split('.')[1];
        return this.decode(payload);
    }

    decode(payload){
        return JSON.parse(atob(payload));
    }
}

export default new Token();