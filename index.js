// const loginpPage = document.querySelector('.loginPage')
// const registerPage = document.querySelector('.registerPage')
// const mainContent = document.querySelector('.mainContent')

// const closeIcons = document.querySelectorAll('.closeIcon')
// function moveHome(){
//     registerPage.style.display = 'none';
//     loginpPage.style.display = 'none';
//     mainContent.style.display = 'block';
    
// }
// closeIcons.forEach(closeIcon => closeIcon.addEventListener('click', moveHome))


// // const emailInput = document.getElementById('email')
// //   const passwordInput = document.getElementById('password')
// //   emailInput.addEventListener('click', function(){
// //       console.log(emailInput.value);
// //   })
  


// const loginBtns = document.querySelectorAll('.login_Btn')
// const registerBtns = document.querySelectorAll('.register_Btn')

// loginBtns.forEach(loginBtn => {
//     loginBtn.addEventListener('click', function(){
//         mainContent.style.display =  'none';
//         registerPage.style.display = 'none'
//         loginpPage.style.display = 'flex';
//     })
// })

// registerBtns.forEach(registerBtn => {
//     registerBtn.addEventListener('click', function(){
//         mainContent.style.display =  'none';
//         loginpPage.style.display = 'none';
//         registerPage.style.display = 'flex';
//     })
// })


// const oddTableRows = document.querySelectorAll('.tableData:nth-child(odd)');
// oddTableRows.forEach(oddTableRow =>{
//     oddTableRow.style.backgroundColor = 'red';
// })


let graphSwiper = new Swiper(".graphDiv", {
    cssMode: true,
    loop: true,
    autoplay: true,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    mousewheel: true,
    keyboard: true,
    mausehold: true,
    drag: true,
   
  });


  



