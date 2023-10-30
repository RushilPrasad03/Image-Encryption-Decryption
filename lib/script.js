let overlay = document.querySelector('.overlay');
let tos = document.querySelector('#tos');
let policy = document.querySelector('#policy');
let image = document.querySelector('.display-img');
let video = document.querySelector('.display-vid');
let file = document.querySelector('.file-img');
let label = document.querySelector('.input-wrapper .input label');

window.onload = function(){
    document.querySelector('#loader-overlay').style.display = 'none';
}

document.querySelector('#tos-open').onclick = () => {
    tos.classList.add('tos-active');
    overlay.style.display='block';
}

document.querySelector('#tos-close').onclick = () => {
    tos.classList.remove('tos-active');
    overlay.style.display='none';
}

document.querySelector('#policy-open').onclick = () => {
    policy.classList.add('tos-active');
    overlay.style.display='block';
}

document.querySelector('#policy-close').onclick = () => {
    policy.classList.remove('tos-active');
    overlay.style.display='none';
}

document.querySelector('#doc').onchange = () => {
    fileName = document.querySelector('#doc').value;
    extension = fileName.split('.').pop();
    if(extension=='jpg' || extension=='jpeg' || extension=='png' || extension=='gif' || extension=='tiff' || extension=='jfif' || extension=='bmp' || extension=='svg' || extension=='webp' || extension=='svgz' || extension=='ico' || extension=='avif'){
        image.src = URL.createObjectURL(event.target.files[0]);
        image.style.display = 'block';
    }
    else if(extension=='mp4' || extension=='mov' || extension=='wmv' || extension=='avi' || extension=='mkv'){
        video.src = URL.createObjectURL(event.target.files[0]);
        video.style.display = 'block';
    }
    else{
        file.style.display = 'block';
        document.querySelector('.file-img img').style.display = 'block';
        document.querySelector('.file-img figcaption').innerHTML = fileName.split(/(\\|\/)/g).pop();
    }
    label.style.display = 'none';
    console.log('show');
}

function nav(navID){
    let navBoxes = document.querySelectorAll('.nav-link');
    let display = document.querySelector('#'+navID);
    let fileName = document.querySelector('#doc');

    document.querySelector('#enc-form').reset();
    image.style.display='none';
    video.style.display='none';
    file.style.display='none';
    label.style.display = 'block';

    for(let i = 0; i < navBoxes.length; i++){
        navBoxes[i].classList.remove('active');
    }
    display.classList.add('active');
    
    if(navID == 'a1' || navID == 'a3' || navID == 'a5'){
        document.querySelector('#op').value='encrypt';
        document.querySelector('#submit').value='encrypt';
    }
    else if(navID == 'a2' || navID == 'a4' || navID == 'a6'){
        document.querySelector('#op').value='decrypt';
        document.querySelector('#submit').value='decrypt';
    }

    if(navID == 'a1' || navID == 'a2'){
        fileName.accept= 'image/*';
    }
    else if(navID == 'a3' || navID == 'a4'){
        fileName.accept= 'video/*';
    }
    else{
        fileName.accept= 'media_type';
    }
    document.querySelector('#title').innerHTML = display.innerHTML;
    document.querySelector('#demo').innerHTML = display.innerHTML+' with password - demo here';
}