const text_input = [...document.querySelectorAll('.text_input')];
const btn = document.querySelector('#add');

text_input.forEach(item => {
    item.addEventListener('change', () => {
        if (text_input.every(check)) {
            btn.disabled = false;
            btn.classList.add('disable')
        } else {
            btn.disabled = true;
            btn.classList.remove('disable')
        }
    })
})

const check = (element) => {
    return element.value !== ''
}