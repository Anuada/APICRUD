const getQueryParam = (parameterName) => {
    const queryString = window.location.search
    const urlParams = new URLSearchParams(queryString)

    return urlParams.get(parameterName)
}

let message = getQueryParam("m")
if (message != null) {
    let i = message.length - 1

    if (message[i] != "!") {
        message = message + "!"
        Swal.fire({
            icon: 'success',
            title: message,
            confirmButtonColor: '#5DB075',
            timer: 2000
        })
    } else {
        Swal.fire({
            icon: 'error',
            title: message,
            confirmButtonColor: '#d33',
            timer: 2000
        })
    }
}
