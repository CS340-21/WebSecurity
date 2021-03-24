//calling from file not work?
function saveToFirebase(email, password) {
    var userObject = {
        email: email
        password: password
    };

    firebase.database().ref('users').push().set(userObject)
        .then(function(snapshot) {
            success(); // some success method
        }, function(error) {
            console.log('error' + error);
            error(); // some error method
        });
}

function hello(){
    alert("hello");
}

//hello();

//saveToFirebase(email, password);
