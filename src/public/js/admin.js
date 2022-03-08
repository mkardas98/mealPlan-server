//Login Panel

const loginPage = () => {
    const loginInputs = $('.loginForm__input')
    const input = loginInputs.children('input')

    $(loginInputs[0]).addClass('-focused')

    input.focus((e)=> {
        $(e.target).parent('.loginForm__input').addClass('-focused')
    })
        input.blur((e)=> {
            if($(e.target).val() === '')
                $(e.target).closest('.loginForm__input').removeClass('-focused')
        })
}

//app

const toggleNav = (btn) => {
    $(btn).toggleClass('-hidden')
    $('.leftNav__nav').toggleClass('-hidden')
    $('.leftNav__header').toggleClass('-hidden')
    $('.leftNav').toggleClass('-hidden')
}

const onChangeInput = (input) => {
    $(input).removeClass('is-invalid')
}

const confirmDelete = (id) => {
    const answer = confirm('Czy chcesz usunąć ten element?')
    if (answer){
       $('#'+id).submit()
    }
}
