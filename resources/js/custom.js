
window.myFun = (params) => {
    Swal.fire(params)
}

globalThis.setSwalMessage = (params) => {
    Swal.fire(
    params,
    'That thing is still around?',
    'question'
    )
}

