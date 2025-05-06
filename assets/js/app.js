const buttons = document.querySelectorAll('.news-btn-page');
const nextBtn = document.querySelector('.news-latest-button');
const newsBlock = document.querySelectorAll('.news-block');
const itemPer = 4;
let currentIndex = 0;

buttons.forEach((btn, index) => {
    btn.addEventListener('click', () => {
        currentIndex = index;
        updateActiveBtn(buttons);
        showPage(currentIndex)
    });
});

nextBtn.addEventListener('click', () => {
    if (currentIndex < buttons.length - 1) {
        currentIndex++;
        updateActiveBtn(buttons);
        showPage(currentIndex)
    }
});

function updateActiveBtn(buttons) {
    buttons.forEach((btn, index) => {
        btn.classList.remove('news-btn-active');
        if (index === currentIndex) btn.classList.add('news-btn-active');
    });

    if (currentIndex === buttons.length - 1) {
        nextBtn.style.display = 'none';
    }
    else {
        nextBtn.style.display = 'inline-block';
    }
}
function showPage(page) {
    newsBlock.forEach((item, index) => {
        console.log(item)
        item.style.display = (index >= page * itemPer && index < (page + 1) * itemPer) ? 'flex' : 'none';
    }); 
}

updateActiveBtn(buttons)
showPage(currentIndex)