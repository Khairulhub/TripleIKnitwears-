const pathname = window.location.pathname;
const pagename = pathname.split('/').pop();

if (pagename === 'index.html' || pagename === '') {
    document.querySelector('.home').classList.add('active');
}

if (pagename === 'about.html') {
    document.querySelector('.about').classList.add('active');
}

if (pagename === 'contact.html') {
    document.querySelector('.contact').classList.add('active');
}

if (pagename === 'portfolio.html') {
    document.querySelector('.portfolio').classList.add('active');
}
