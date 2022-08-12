

$(".placed").css('display', 'none', '!important')
$(".not-placed").css('display', 'none', '!important')


function loginClicked(e) {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let obj = {
        "email": email,
        "password": password
    }
    $.post("./php/login_validation.php", { "data": obj }, (data) => {
        console.log(data);
        data = JSON.parse(data)
        if (data['valid'] == 1) {
            let token = data['token'];
            let url = `http://localhost/placement_prediction/predict.php?token=${token}&page=predict`;
            window.location = url;
        } else {
            console.log(" NO ")
        }
    })

    return false;

}


function signUpClicked(e) {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let name = document.getElementById("name").value;

    let obj = {
        "email": email,
        "password": password,
        "name": name
    }
    $.post("./php/sign_up.php", { "data": obj }, (data) => {
        console.log(data);
        data = JSON.parse(data)
        if (data['inserted'] == 1) {
            window.location = "http://localhost/placement_prediction/login.php"
        } else {
            window.location = "http://localhost/placement_prediction/error.php?name=during sign up"
        }
    })

    return false;
}


function predictClicked(e) {

    let loading = document.getElementById("loading");
    let secondary = $('#10p').val();
    let seniorSecondary = $('#12p').val();
    let college = $('#collegep').val();
    $(".placed").css('display', 'none', '!important')
    $(".not-placed").css('display', 'none', '!important')

    if (secondary == "" || college == "" || seniorSecondary == "") {
        $("#emptyAlert").css("display", 'block');
        setTimeout(() => {
            $("#emptyAlert").css("display", 'none');
        }, 2000);
        return;
    }

    if (Number(secondary) > 100 || Number(seniorSecondary) > 100 || Number(college) > 100) {
        $("#valuesAlert").css("display", 'block');
        setTimeout(() => {
            $("#valuesAlert").css("display", 'none');
        }, 2000);
        return;
    }
    $(loading).show();
    $('#nosel').hide();

    let obj = {
        "secondary": secondary,
        "college": college,
        "seniorSecondary": seniorSecondary
    }
    obj = JSON.stringify(obj);

    $.post('http://127.0.0.1:5000/predict', obj, (json) => {
        console.log(json)
        let data = JSON.parse(json)
        let ans = data[1]
        if (ans == '1') {
            $(loading).hide();
            console.log(" Placed ")
            $(".result-div").css('background-image', `url('./images/congobg.webp')`)
            $(".result-div").css('background-repeat', `no-repeat`)
            $(".placed").css('display', 'block', '!important')


        } else {
            console.log("Not placed ")
            $(".result-div").css('background-image', `url('./images/congobg.webp')`)
            $(".result-div").css('background-repeat', `no-repeat`)
            $(".not-placed").css('display', 'block', '!important')
            $(loading).hide();

        }
    })

}

