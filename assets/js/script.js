/**
 * Init for the project
 *
 * @author Marko Radulovic
 * @since 1.0.0
 * @version 1.0.0
 */

'use strict';

// Modal popup
const modalPopup = (n = 0) => {
    
    const modal = document.getElementById(`myModal${n}`);
    const btn = document.querySelector(`.myBtn${n}`);
    const span = document.getElementsByClassName(`close${n}`)[0];

    const postalSubmit = document.querySelector(`#postal-submit${n}`);
    const postalCode = document.querySelector(`#postal-code${n}`);

    btn.onclick = () => modal.style.display = "block";
    span.onclick = () => modal.style.display = "none";
    window.onclick = (e) => e.target == modal ? modal.style.display = "none" : false;

    postalSubmit.addEventListener('click', (e) => {
        e.preventDefault();

        const successNotice = document.createTextNode('We are providing service in your area. You will be redirected soon.');
        const errorNotice = document.createTextNode('We are not providing service in your area. You will be redirected to our subscribe list.');
        const fieldNotice = document.createTextNode('This field is required.');
        const modalNotice = document.querySelector(`#modal-notice${n}`);
        const fieldModalNotice = document.querySelector(`small#notice${n}`);
        const mailingList = document.querySelector(`a#subscribe-to-list${n}`);

        // All of the Postcode for application
        const deliverablePostcode = ['1014', '1015', '1000', '1001', '1002', '1003', '1004', '1005', '1006', '1007', '1010', '1011', '1012', '1017', '1018'];

        if(postalCode.value == '') {
            fieldModalNotice.appendChild(fieldNotice);
        } else if (deliverablePostcode.includes(postalCode.value)) {
            modalNotice.appendChild(successNotice);
            localStorage.setItem('successPostcode', 'successPostcode');
            setTimeout(function () {
                window.location.href = 'https://www.cantineverte.ch/produit/weekly-bundle/';
            }, 4000);
        } else {
            modalNotice.appendChild(errorNotice);
            setTimeout(function () {
                window.location.href = 'https://www.cantineverte.ch/subscribe-list/';
            }, 4000);
        }
    });
};

// If is single product page
if (document.body.classList.contains('single-product')) {
    const insertBefore = (targetedValueBefore, referencedValueBefore) => referencedValueBefore.before(targetedValueBefore);

    insertBefore(document.querySelector('div#single_product_nutr'), document.querySelector('.woocommerce-tabs.wc-tabs-wrapper'));
    document.querySelector('.nutrition-fact.nutrition-fact-ajax').style.marginLeft = "30px";
}

document.querySelector('section.block.pricing-block > .container > .row').classList.add('myBtn3');

document.querySelector('li.btnClick').addEventListener('click', modalPopup('')); // Menu part
document.querySelector('.row.myBtn3').addEventListener('click', modalPopup('3')); // Middle part

// document.querySelector('a.get-started-mobile').addEventListener('click', modalPopup('2')); // Mobile popup

document.querySelector('.get-started-mobile').addEventListener('click', () => {
    const modal2 = document.getElementById("myModal2");
    const btn2 = document.querySelector(".get-started-mobile");
    const span2 = document.getElementsByClassName("close2")[0];

    const postalSubmit2 = document.querySelector('#postal-submit2');
    const postalCode2 = document.querySelector('#postal-code2');

    btn2.onclick = () => modal2.style.display = "block";
    span2.onclick = () => modal2.style.display = "none";
    window.onclick = (e) => e.target == modal2 ? modal2.style.display = "none" : false;

    postalSubmit2.addEventListener('click', (e) => {
        e.preventDefault();

        const successNotice2 = document.createTextNode('We are providing service in your area. You will be redirected soon.');
        const errorNotice2 = document.createTextNode('We are not providing service in your area. You will be redirected to our subscribe list.');
        const modalNotice2 = document.querySelector('#modal-notice2');
        const fieldNotice2 = document.createTextNode('This field is required.');
        const fieldModalNotice2 = document.querySelector('small#notice2');
        const mailingList2 = document.querySelector('a#subscribe-to-list');

        const deliverablePostcode2 = ['1014', '1015', '1000', '1001', '1002', '1003', '1004', '1005', '1006', '1007', '1010', '1011', '1012', '1017', '1018'];

        if(postalCode2.value == '') {
            fieldModalNotice2.appendChild(fieldNotice2);
        } else if (deliverablePostcode2.includes(postalCode2.value)) {
            modalNotice2.appendChild(successNotice2);
            localStorage.setItem('successPostcode', 'successPostcode');
            setTimeout(function () {
                window.location.href = 'https://www.cantineverte.ch/produit/weekly-bundle/';
            }, 4000);
        } else {
            modalNotice2.appendChild(errorNotice2);
            setTimeout(function () {
                window.location.href = 'https://www.cantineverte.ch/subscribe-list/';
            }, 4000);
        }
    });
});