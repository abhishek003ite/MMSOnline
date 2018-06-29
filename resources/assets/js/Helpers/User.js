import AppStorage from './AppStorage'
import Token from './Token'
class User {
    hasToken() {
        const storedToken = AppStorage.getToken();
        if(storedToken) {
            return Token.isValid(storedToken) ? true : false
        }
        return false;
    }

    loggedIn() {
        return this.hasToken()
    }

    logout() {
        AppStorage.clear()
        window.location = "/"
    }

    name() {
        if(this.loggedIn()) {
            return AppStorage.getUser
        }
    }

    id() {
        if(this.loggedIn()) {
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }
}

export default User = new User();
