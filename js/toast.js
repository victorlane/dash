(() => {
    const params = new URLSearchParams(window.location.search);
    const fail = params.get('fail');
    const used = params.get("used");
    const success = params.get("success");
    
    if(success) {
        if(success == "true" && window.location.href.includes("login")) {
            halfmoon.initStickyAlert({
                content: "Successfully registered, please login!",
                title: "You're in!"
            });
        }
    }

    if(fail) {
        if(fail == "login" && window.location.href.includes("login")) {
            halfmoon.initStickyAlert({
                content: "Login failed. Please try again.",
                title: "Failed Login"
            });
        } else if (fail == 'register' && window.location.href.includes("register")) {
            if(used == "true") {
                halfmoon.initStickyAlert({
                    content: "Registration failed. <br>Username already in use.",
                    title: "Failed Registration"
                });
            } else {
                halfmoon.initStickyAlert({
                    content: "Register failed. Please try again.",
                    title: "Failed Register"
                })
            }
        }
    }
})();
